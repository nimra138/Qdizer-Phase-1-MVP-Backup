<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscription_transactions', function (Blueprint $table) {

    $table->id();

    $table->foreignId('user_id')->constrained()->cascadeOnDelete();

    $table->string('stripe_payment_intent')->nullable();

    $table->string('stripe_invoice_id')->nullable();

    $table->string('stripe_subscription_id')->nullable();

    $table->string('currency')->default('aed');

    $table->decimal('amount',10,2);

    $table->decimal('vat',10,2)->default(0);

    $table->decimal('total',10,2);

    $table->string('status');

    $table->string('payment_method')->nullable();

    $table->timestamp('paid_at')->nullable();

    $table->json('payload')->nullable();

    $table->timestamps();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_transactions');
    }
};
