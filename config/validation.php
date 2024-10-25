<?php

return [
    'login' => [
        'email' => 'required|email',
        'password' => 'required|string|min:4',
    ],

    'register' => [
        'first_name' => 'required|string|min:3|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email:rfc,dns|unique:users,email',
        'date_of_birth' => 'required|date',
    ],

    'change_password' => [
        'current_password' => 'required|string',
        'new_password' => 'required|string|min:8|confirmed',
    ],
];
