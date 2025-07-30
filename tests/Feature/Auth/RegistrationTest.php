<?php

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'first_name' => 'Test',
        'last_name' => 'User',
        'contact_number' => '1234567890',
        'company_name' => 'Test Company',
        'email' => 'test@example.com',
        'password' => 'Str0ngP@sswOrd!',
        'password_confirmation' => 'Str0ngP@sswOrd!',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect('/');
});
