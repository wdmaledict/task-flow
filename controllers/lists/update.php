<?php

use Core\Response;

$config = require base_path('config.php');
$db = new Core\Database($config['database']);

$listId = $_POST['list_id'] ?? null;
$title = trim($_POST['title'] ?? '');

if ($listId === null || $title === '') {
  http_response_code(Response::BAD_REQUEST);
  echo json_encode(['error' => 'Missing list_id or title']);
  exit();
}

if (strlen($title) > 100) {
  http_response_code(Response::BAD_REQUEST);
  echo json_encode(['error' => 'Title is too long (max 100 characters)']);
  exit();
}

// Update the list's title
$db->query('UPDATE lists SET title = :title WHERE id = :id', [
  'title' => $title,
  'id' => $listId
]);

header('location: /');
exit();
