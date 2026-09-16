<?php

use Core\Response;

$config = require base_path('config.php');
$db = new Core\Database($config['database']);

$cardId = $_POST['card_id'] ?? null;
$title = trim($_POST['title'] ?? '');
$description = trim($_POST['description'] ?? '');

if ($cardId === null || $title === '') {
  http_response_code(Response::BAD_REQUEST);
  echo json_encode(['error' => 'Missing card_id or title']);
  exit();
}

if (strlen($description) > 500) {
  http_response_code(Response::BAD_REQUEST);
  echo json_encode(['error' => 'Description is too long (max 500 characters)']);
  exit();
}

// Update the card's title and description
$db->query('UPDATE cards SET title = :title, description = :description WHERE id = :id', [
  'title' => $title,
  'description' => $description,
  'id' => $cardId
]);

header('location: /');
exit();
