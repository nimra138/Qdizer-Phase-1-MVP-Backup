<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class UpdateSubscriptionStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriptions:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update expired trial and subscription statuses';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Expire trial users
        User::where('status', 'trial')
            ->whereNotNull('trial_end')
            ->where('trial_end', '<', now())
            ->update([
                'status' => 'expired',
            ]);

        // Expire active subscriptions
        User::where('status', 'active')
            ->whereNotNull('subscription_end')
            ->where('subscription_end', '<', now())
            ->update([
                'status' => 'expired',
            ]);

        // Expire cancelled subscriptions after end date
        User::where('status', 'cancelled')
            ->whereNotNull('subscription_end')
            ->where('subscription_end', '<', now())
            ->update([
                'status' => 'expired',
            ]);

        $this->info('Subscription statuses updated successfully.');

        return self::SUCCESS;
    }
}