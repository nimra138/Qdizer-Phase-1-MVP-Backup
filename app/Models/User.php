<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable  implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

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
        'trial_start',
        'trial_end',
        'status',
    ];

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
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    protected $casts = [
    'trial_end' => 'datetime',
];
    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
    // public function company()
    // {
    //     return $this->hasOne(Company::class);
    // }
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
}
