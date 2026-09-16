<?php

$router->get('/', 'controllers/index.php');

$router->post('/lists', 'controllers/lists/store.php');
$router->post('/lists/delete', 'controllers/lists/destroy.php');

$router->post('/cards', 'controllers/cards/store.php');
$router->post('/cards/move', 'controllers/cards/move.php');
$router->post('/cards/delete', 'controllers/cards/destroy.php');