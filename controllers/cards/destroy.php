<?php

use Core\Response;

$config = require base_path('config.php');
$db = new Core\Database($config['database']);

$cardId = $_POST['card_id'] ?? null;

if ($cardId === null) {
  http_response_code(Response::BAD_REQUEST);
  echo json_encode(['error' => 'Missing card_id']);
  exit();
}

$db->query('DELETE FROM cards WHERE id = :id', [
  'id' => $cardId
]);

header('location: /');
exit();
