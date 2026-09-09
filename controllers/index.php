<?php

$config = require base_path('config.php');
$db = new Core\Database($config['database']);

$boardId = 1;

// Fetch all lists for this board, ordered by position
$lists = $db->query('SELECT * FROM lists WHERE board_id = :board_id ORDER BY position', [
    'board_id' => $boardId
])->get();

$lanes = [];
foreach ($lists as $list) {
    // Fetch all cards belonging to this list, ordered by position
    $cards = $db->query('SELECT * FROM cards WHERE list_id = :list_id ORDER BY position', [
        'list_id' => $list['id']
    ])->get();

    $lanes[] = [
        'id' => $list['id'],
        'title' => $list['title'],
        'count' => count($cards),
        'badge_color' => 'bg-secondary',
        'cards' => $cards
    ];
}

view('index.view.php', [
    'heading' => 'Task Flow',
    'lanes' => $lanes
]);
