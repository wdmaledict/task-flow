<?php

$config = require base_path('config.php');
$db = new Core\Database($config['database']);

$boardId = $_POST['board_id'] ?? 1;
$title = trim($_POST['title']);

if ($title === '') {
    $_SESSION['errors']['title'] = 'The list title is required.';
    header('location: /');
    exit();
}

// Find the highest position for this board so the new list goes to the end
$positionQuery = $db->query('SELECT MAX(position) as max_pos FROM lists WHERE board_id = :board_id', [
    'board_id' => $boardId
])->find();

$nextPosition = ($positionQuery['max_pos'] ?? 0) + 1;

// Insert the new list with the correct position
$db->query('INSERT INTO lists (board_id, title, position) VALUES (:board_id, :title, :position)', [
    'board_id' => $boardId,
    'title' => $title,
    'position' => $nextPosition
]);

header('location: /');
exit();
