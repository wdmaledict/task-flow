<?php

$router->get('/', 'controllers/index.php');

$router->post('/lists', 'controllers/lists/store.php');

$router->post('/cards', 'controllers/cards/store.php');
$router->post('/cards/move', 'controllers/cards/move.php');