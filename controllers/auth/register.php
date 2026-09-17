<?php

$config = require base_path('config.php');
$db = new Core\Database($config['database']);

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// Initialize errors array in session
$_SESSION['errors'] = [];

// 1. Check if name is empty
if ($name === '') {
  $_SESSION['errors']['name'] = 'Name is required.';
}

// 2. Check if email is empty
if ($email === '') {
  $_SESSION['errors']['email'] = 'Email is required.';
}

// 3. Check if email format is valid, @ (only if email is provided)
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $_SESSION['errors']['email'] = 'Please provide a valid email address.';
}

// 4. Check if email already exists in the database (only if format is okay so far)
if ($email !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
  ])->find();

  if ($user) {
    $_SESSION['errors']['email'] = 'That email is already taken.';
  }
}

// 5. Check if password is empty
if ($password === '') {
  $_SESSION['errors']['password'] = 'Password is required.';
}

// 6. Check password length (only if password is provided)
if ($password !== '' && strlen($password) < 6) {
  $_SESSION['errors']['password'] = 'Password must be at least 6 characters long.';
}

// If there are any errors, redirect back with old input
if (!empty($_SESSION['errors'])) {
  $_SESSION['old'] = [
    'name' => $name,
    'email' => $email
  ];

  header('location: /register');
  exit();
}

// 7. Hash password and save user to database
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)', [
  'name' => $name,
  'email' => $email,
  'password' => $hashedPassword
]);

// 8. Log in user and redirect to home page or dashboard
$_SESSION['user'] = [
  'id' => $db->lastInsertId(),
  'email' => $email,
  'name' => $name
];

header('location: /');
exit();
