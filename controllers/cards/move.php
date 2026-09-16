<?php

use Core\Response;

$config = require base_path('config.php');
$db = new Core\Database($config['database']);

// Read the JSON body sent by fetch()
$data = json_decode(file_get_contents('php://input'), true);

$cardId = $data['card_id'] ?? null;
$newListId = $data['list_id'] ?? null;

if ($cardId === null || $newListId === null) {
  http_response_code(Response::BAD_REQUEST);
  echo json_encode(['error' => 'Missing card_id or list_id']);
  exit();
}

// Find the highest position in the target list so the card goes to the end
// TODO: currently always places the card at the end of the target list.
// Could be improved to respect exact drop position within the list.
$positionQuery = $db->query('SELECT MAX(position) as max_pos FROM cards WHERE list_id = :list_id', [
  'list_id' => $newListId
])->find();

$nextPosition = ($positionQuery['max_pos'] ?? 0) + 1;

// Update the card's list and position
$db->query('UPDATE cards SET list_id = :list_id, position = :position WHERE id = :id', [
  'list_id' => $newListId,
  'position' => $nextPosition,
  'id' => $cardId
]);

http_response_code(Response::OK);
echo json_encode(['success' => true]);
exit();
