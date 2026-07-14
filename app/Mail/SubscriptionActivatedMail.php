<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionActivatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the email.
     */
    public function build()
    {
        return $this->from(
                        config('mail.from.address'),
                        config('mail.from.name')
                    )
                    ->subject('🎉 Welcome to QDizer Pro')
                    ->view('user.email.activated')
                    ->with([
                        'user' => $this->user,
                    ]);
    }
}