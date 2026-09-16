<?php

use Core\Response;

$config = require base_path('config.php');
$db = new Core\Database($config['database']);

$listId = $_POST['list_id'] ?? null;

if ($listId === null) {
  http_response_code(Response::BAD_REQUEST);
  echo json_encode(['error' => 'Missing list_id']);
  exit();
}

// Deleting a list should also delete its cards.
// This relies on ON DELETE CASCADE for cards.list_id in the database.
$db->query('DELETE FROM lists WHERE id = :id', [
  'id' => $listId
]);

header('location: /');
exit();
