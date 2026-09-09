<?php

$router->get('/', 'controllers/index.php');

$router->post('/lists', 'controllers/lists/store.php');

$router->post('/cards', 'controllers/cards/store.php');