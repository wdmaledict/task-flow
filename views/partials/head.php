<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Task Flow' ?></title>
    <!-- AdminLTE 4 & Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">
        <style>
            body {
                overflow-x: auto !important;
            }

            .board-wrapper {
                overflow-x: auto;
                overflow-y: hidden;
                padding-bottom: 1rem;
            }

            .board-wrapper::-webkit-scrollbar {
                height: 10px;
            }

            .board-wrapper::-webkit-scrollbar-track {
                background: transparent;
            }

            .board-wrapper::-webkit-scrollbar-thumb {
                background-color: #495057;
                border-radius: 10px;
            }

            .lane-column {
                flex: 0 0 320px;
            }
        </style>
</head>
