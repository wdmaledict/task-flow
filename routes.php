<?php

$router->get('/', 'controllers/index.php')->auth();

$router->post('/lists', 'controllers/lists/store.php')->auth();
$router->post('/lists/delete', 'controllers/lists/destroy.php')->auth();
$router->post('/lists/update', 'controllers/lists/update.php')->auth();

$router->post('/cards', 'controllers/cards/store.php')->auth();
$router->post('/cards/move', 'controllers/cards/move.php')->auth();
$router->post('/cards/delete', 'controllers/cards/destroy.php')->auth();
$router->post('/cards/update', 'controllers/cards/update.php')->auth();

$router->post('/register', 'controllers/auth/register.php')->guest();
$router->get('/register', 'controllers/auth/create.php')->guest();

$router->post('/login', 'controllers/auth/login.php')->guest();
$router->get('/login', 'controllers/auth/login_create.php')->guest();

$router->post('/logout', 'controllers/auth/destroy.php')->auth();