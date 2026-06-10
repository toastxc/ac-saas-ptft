<?php

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'given_name' => 'Test User2',
        'email' => 'test@example.com',
        'password' => 'passwordpasswordpasswordpassword',
        'password_confirmation' => 'passwordpasswordpasswordpassword',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});
