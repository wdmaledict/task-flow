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

// // TEMPORARY DEBUG - remove after we find the issue
// foreach ($lanes as $lane) {
//     echo "Lane ID: {$lane['id']}, Title: {$lane['title']}, Count: {$lane['count']}<br>";
//     foreach ($lane['cards'] as $card) {
//         echo "&nbsp;&nbsp;→ Card list_id in query: {$card['list_id']}, Title: {$card['title']}<br>";
//     }
// }
// die(); // stop execution here so we can see just this output

view('index.view.php', [
    'heading' => 'Task Flow',
    'lanes' => $lanes
]);
