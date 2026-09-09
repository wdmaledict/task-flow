<?php

$config = require base_path('config.php');
$db = new Core\Database($config['database']);

$listId = $_POST['list_id'] ?? null;
$title = trim($_POST['title'] ?? '');
$description = trim($_POST['description'] ?? '');

if ($title === '' || $listId === null) {
  $_SESSION['errors']['title'] = 'The card title is required.';
  header('location: /');
  exit();
}

// Find the highest position in this list so the new card goes to the end
$positionQuery = $db->query('SELECT MAX(position) as max_pos FROM cards WHERE list_id = :list_id', [
  'list_id' => $listId
])->find();

$nextPosition = ($positionQuery['max_pos'] ?? 0) + 1;

// Insert the new card with the correct position
$db->query('INSERT INTO cards (list_id, title, description, position) VALUES (:list_id, :title, :description, :position)', [
  'list_id' => $listId,
  'title' => $title,
  'description' => $description,
  'position' => $nextPosition
]);

header('location: /');
exit();
