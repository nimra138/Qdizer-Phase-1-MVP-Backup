<?php

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'company' => 'Acme Maintenance',
        'phone' => '501234567',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('verification.notice', absolute: false));

    $user = \App\Models\User::where('email', 'test@example.com')->first();
    expect($user)->not->toBeNull();
    expect($user->company)->toBe('Acme Maintenance');
    expect($user->phone)->toBe('501234567');
    expect($user->status)->toBe('trial');
    expect((int) $user->trial_start->diffInDays($user->trial_end))->toBe(14);
});
