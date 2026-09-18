<?php

// 1. Unset all of the session variables
$_SESSION = [];

// 2. Destroy the session on the server
session_destroy();

// 3. Delete the session cookie from the browser securely
if (ini_get('session.use_cookies')) {
  $params = session_get_cookie_params();
  setcookie(session_name(), '', time() - 42000,
    $params['path'], $params['domain'],
    $params['secure'], $params['httponly']);
}

// 4. Redirect to home page
header('location: /login');
exit();