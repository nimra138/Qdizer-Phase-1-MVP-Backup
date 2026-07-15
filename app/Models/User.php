<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable  implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
    'name',
    'company',
    'password',
    'phone',
    'email',

    'status',

    'trial_start',
    'trial_end',

    'subscription_start',
    'subscription_end',

    'stripe_id',
    

    'pm_type',
    'pm_last_four',
    'trial_ends_at',
];
protected function casts(): array
{
    return [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',

        'trial_start' => 'datetime',
        'trial_end' => 'datetime',

        'subscription_start' => 'datetime',
        'subscription_end' => 'datetime',

        'trial_ends_at' => 'datetime',
    ];
}
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */


    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
    
    public function companyProfile()
{
    return $this->hasOne(Company::class);
}
    public function quotations()
{
    return $this->hasMany(Quotation::class);
}
public function company()
{
    return $this->belongsTo(Company::class);
}
public function transactions()
{
    return $this->hasMany(SubscriptionTransaction::class);
}

public function isTrial(): bool
{
    return $this->status === 'trial';
}

public function isActive(): bool
{
    return $this->status === 'active';
}

public function isPastDue(): bool
{
    return $this->status === 'past_due';
}

public function isExpired(): bool
{
    return $this->status === 'expired';
}

public function isCancelled(): bool
{
    return $this->status === 'cancelled';
}

public function inTrial(): bool
{
    return $this->isTrial()
        && $this->trial_end
        && now()->lessThan($this->trial_end);
}

public function hasActiveSubscription(): bool
{
    return $this->isActive()
        && $this->subscription_end
        && now()->lessThanOrEqualTo($this->subscription_end);
}

public function canCreateQuotation(): bool
{
    return $this->inTrial() || $this->hasActiveSubscription();
}

public function canGeneratePdf(): bool
{
    return $this->canCreateQuotation();
}

public function canShareQuotation(): bool
{
    return $this->canCreateQuotation();
}

public function trialDaysLeft(): int
{
    if (!$this->trial_end) {
        return 0;
    }

    return max(0, now()->diffInDays($this->trial_end, false));
}

public function subscriptionDaysLeft(): int
{
    if (!$this->subscription_end) {
        return 0;
    }

    return max(0, now()->diffInDays($this->subscription_end, false));
}

public function badgeColor(): string
{
    return match ($this->status) {

        'trial' => 'info',

        'active' => 'success',

        'past_due' => 'warning',

        'expired' => 'danger',

        'cancelled' => 'secondary',

        default => 'secondary',
    };
}
public function refreshSubscriptionStatus(): void
{
    if (
        $this->status === 'trial'
        && $this->trial_end
        && now()->greaterThan($this->trial_end)
    ) {

        $this->update([
            'status' => 'expired',
        ]);

        return;
    }

    if (
        $this->status === 'active'
        && $this->subscription_end
        && now()->greaterThan($this->subscription_end)
    ) {

        $this->update([
            'status' => 'expired',
        ]);
    }
}

}
