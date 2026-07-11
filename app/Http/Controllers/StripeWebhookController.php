<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\StripeEvent;
use App\Models\SubscriptionTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Webhook;

class StripeWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Log::info('Stripe webhook received');
        $payload = $request->getContent();
        $signature = $request->header('Stripe-Signature');

        try {

            $event = Webhook::constructEvent(
                $payload,
                $signature,
                env('STRIPE_WEBHOOK_SECRET')
            );

        } catch (SignatureVerificationException $e) {

            return response()->json([
                'message' => 'Invalid Signature'
            ], 400);

        } catch (\Exception $e) {

            return response()->json([
                'message' => $e->getMessage()
            ], 400);

        }

        /*
        |--------------------------------------------------------------------------
        | Idempotency
        |--------------------------------------------------------------------------
        */

        if (
            StripeEvent::where('event_id', $event->id)->exists()
        ) {
            return response()->json([
                'duplicate' => true
            ]);
        }

        StripeEvent::create([
            'event_id' => $event->id,
            'event_type' => $event->type
        ]);

        DB::beginTransaction();

        try {

            switch ($event->type) {

                /*
                |--------------------------------------------------------------------------
                | Checkout Completed
                |--------------------------------------------------------------------------
                */

                case 'checkout.session.completed':

                    $session = $event->data->object;

                    $user = User::where( 
                        'email',
                        $session->customer_details->email
                    )->first();

                    if ($user) {

                        $user->update([

                            'stripe_customer_id' => $session->customer,

                            'status' => 'active',
                            
                            'trial_ends_at' => now()->addDays(30),

                        ]);

                    }

                    break;


                /*
                |--------------------------------------------------------------------------
                | Subscription Created / Updated
                |--------------------------------------------------------------------------
                */

                case 'customer.subscription.created':

                case 'customer.subscription.updated':

                    $subscription = $event->data->object;

                    $user = User::where(
                        'stripe_customer_id',
                        $subscription->customer
                    )->first();

                    if ($user) {

                        $user->update([

                            'stripe_subscription_id' => $subscription->id,

                            'subscription_status' => $subscription->status,

                            'subscription_start' => Carbon::createFromTimestamp(
                                $subscription->current_period_start
                            ),

                            'subscription_end' => Carbon::createFromTimestamp(
                                $subscription->current_period_end
                            )

                        ]);

                    }

                    break;


                /*
                |--------------------------------------------------------------------------
                | Invoice Paid
                |--------------------------------------------------------------------------
                */

                case 'invoice.payment_succeeded':

                    $invoice = $event->data->object;

                    $user = User::where(
                        'stripe_customer_id',
                        $invoice->customer
                    )->first();

                    if ($user) {

                        SubscriptionTransaction::create([

                            'user_id' => $user->id,

                            'stripe_invoice_id' => $invoice->id,

                            'stripe_payment_intent' => $invoice->payment_intent,

                            'stripe_subscription_id' => $invoice->subscription,

                            'currency' => strtoupper($invoice->currency),

                            'amount' => $invoice->subtotal / 100,

                            'vat' => ($invoice->total - $invoice->subtotal) / 100,

                            'total' => $invoice->total / 100,

                            'status' => 'paid',

                            'payment_method' => 'card',

                            'paid_at' => now(),

                            'payload' => json_encode($invoice)

                        ]);

                        $user->update([
                            'subscription_status' => 'active'
                        ]);

                    }

                    break;


                /*
                |--------------------------------------------------------------------------
                | Payment Failed
                |--------------------------------------------------------------------------
                */

                case 'invoice.payment_failed':

                    $invoice = $event->data->object;

                    $user = User::where(
                        'stripe_customer_id',
                        $invoice->customer
                    )->first();

                    if ($user) {

                        $user->update([
                            'subscription_status' => 'past_due'
                        ]);

                    }

                    break;


                /*
                |--------------------------------------------------------------------------
                | Subscription Deleted
                |--------------------------------------------------------------------------
                */

                case 'customer.subscription.deleted':

                    $subscription = $event->data->object;

                    $user = User::where(
                        'stripe_customer_id',
                        $subscription->customer
                    )->first();

                    if ($user) {

                        $user->update([

                            'subscription_status' => 'inactive',

                            'subscription_end' => now()

                        ]);

                    }

                    break;
            }

            DB::commit();

        } catch (\Throwable $e) {

            DB::rollBack();

            Log::error($e);

            return response()->json([
                'message' => $e->getMessage()
            ], 500);

        }

        return response()->json([
            'success' => true
        ]);
    }
}