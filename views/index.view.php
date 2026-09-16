<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<main class="p-4">
    <div class="container-fluid p-0">
        <div class="d-flex gap-3 align-items-start board-wrapper">
            <?php foreach ($lanes as $lane) : ?>
                <?php require base_path('views/components/lane.view.php') ?>
            <?php endforeach; ?>

            <!-- Add List Form Card -->
            <div class="card bg-dark border-secondary-subtle shadow-sm p-3 lane-column" style="border-radius: 10px;">
                <form action="/lists" method="POST">
                    <input type="hidden" name="board_id" value="1">
                    <div class="mb-2">
                        <input type="text" name="title" class="form-control bg-body-tertiary text-white border-secondary" placeholder="New list title..." required>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-sm w-100">+ Add List</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>