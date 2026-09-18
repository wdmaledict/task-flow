<?php

$config = require base_path('config.php');
$db = new Core\Database($config['database']);

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// Initialize errors array in session
$_SESSION['errors'] = [];

// 1. Check if email is empty
if ($email === '') {
  $_SESSION['errors']['email'] = 'Email is required.';
}

// 2. Check if email format is valid (only if email is provided)
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $_SESSION['errors']['email'] = 'Please provide a valid email address.';
}

// 3. Check if password is empty
if ($password === '') {
  $_SESSION['errors']['password'] = 'Password is required.';
}

// If there are validation errors, redirect back with old input (only email)
if (!empty($_SESSION['errors'])) {
  $_SESSION['old'] = [
    'email' => $email
  ];

  header('location: /login');
  exit();
}

// 4. Attempt to find the user in the database
$user = $db->query('SELECT * FROM users WHERE email = :email', [
  'email' => $email
])->find();

// 5. Verify user existence and password securely
// Prevent user enumeration attacks by returning a generic error message
// regardless of whether the email exists in the database or the password is wrong.
if (!$user || !password_verify($password, $user['password'])) {
  $_SESSION['errors']['email'] = 'Invalid email or password.';

  $_SESSION['old'] = [
    'email' => $email
  ];

  header('location: /login');
  exit();
}

// 6. Log in user (set session) and redirect to home page
$_SESSION['user'] = [
  'id' => $user['id'],
  'email' => $user['email'],
  'name' => $user['name']
];

// Prevent session fixation attacks by generating a new session ID upon successful login
session_regenerate_id(true);

header('location: /');
exit();
