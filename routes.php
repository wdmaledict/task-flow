<?php

$router->get('/', 'controllers/index.php');

$router->post('/lists', 'controllers/lists/store.php');
$router->post('/lists/delete', 'controllers/lists/destroy.php');
$router->post('/lists/update', 'controllers/lists/update.php');

$router->post('/cards', 'controllers/cards/store.php');
$router->post('/cards/move', 'controllers/cards/move.php');
$router->post('/cards/delete', 'controllers/cards/destroy.php');
$router->post('/cards/update', 'controllers/cards/update.php');

$router->post('/register', 'controllers/auth/register.php');
$router->get('/register', 'controllers/auth/create.php');

$router->post('/login', 'controllers/auth/login.php');
$router->get('/login', 'controllers/auth/login_create.php');
