<?php

$lanes = [
    [
        'title' => 'Backlog',
        'count' => 3,
        'badge_color' => 'bg-secondary',
        'cards' => [
            ['tag' => 'tech debt', 'tag_color' => 'bg-secondary', 'title' => 'Audit unused SCSS variables', 'desc' => 'Identify deprecated Bootstrap 5.3.4 variables and add comments.', 'user' => 'DM'],
            ['tag' => 'docs', 'tag_color' => 'bg-info', 'title' => 'Document hreflang setup', 'user' => 'JD'],
            ['tag' => 'bug', 'tag_color' => 'bg-danger', 'title' => 'Investigate Safari iOS calendar drag bug', 'date' => 'May 28', 'user' => 'MK']
        ]
    ],
    [
        'title' => 'To do',
        'count' => 2,
        'badge_color' => 'bg-primary',
        'cards' => [
            ['tag' => 'feature', 'tag_color' => 'bg-primary', 'title' => 'Add Tom Select recommended-integration doc', 'desc' => 'Cover install, theming, single + multi select examples.', 'date' => 'May 24', 'user' => 'JD'],
            ['tag' => 'feature', 'tag_color' => 'bg-primary', 'title' => 'Wire up profile page avatar upload', 'user' => 'EM']
        ]
    ],
    [
        'title' => 'In progress',
        'count' => 2,
        'badge_color' => 'bg-warning text-dark',
        'cards' => [
            ['tag' => 'feature', 'tag_color' => 'bg-primary', 'title' => 'Build kanban board demo', 'desc' => 'SortableJS, draggable between lanes, MIT license.', 'date' => 'Today', 'user' => 'JD'],
            ['tag' => 'qa', 'tag_color' => 'bg-warning text-dark', 'title' => 'Tabulator + FullCalendar integration QA', 'user' => 'OB']
        ]
    ],
    [
        'title' => 'Done',
        'count' => 3,
        'badge_color' => 'bg-success',
        'cards' => [
            ['tag' => 'feature', 'tag_color' => 'bg-primary', 'title' => 'Upgrade to Bootstrap 5.3.8', 'user' => 'DN'],
            ['tag' => 'feature', 'tag_color' => 'bg-primary', 'title' => 'Ship 8 Tier-1 page templates', 'desc' => 'Profile, settings, invoice, pricing, FAQ, 404/500/maintenance.', 'user' => 'JD'],
            ['tag' => 'tech debt', 'tag_color' => 'bg-secondary', 'title' => 'Drop dead eslint-config-xo deps', 'user' => 'DN']
        ]
    ]
];

view('index.view.php', [
    'heading' => 'Task Flow',
    'lanes' => $lanes
]);
