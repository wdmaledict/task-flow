<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<main class="p-4">
    <div class="container-fluid p-0">
        <div class="d-flex gap-3 align-items-start board-wrapper">
            <?php foreach ($lanes as $lane) : ?>
                <div class="card bg-dark border-secondary-subtle shadow-sm lane-column" style="border-radius: 10px;">
                    <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center pt-3 px-3">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge rounded-pill <?= $lane['badge_color'] ?> px-2 py-1"><?= $lane['count'] ?></span>
                            <h6 class="mb-0 fw-bold text-white"><?= $lane['title'] ?></h6>
                        </div>
                        <form action="/lists/delete" method="POST" class="no-drag">
                            <input type="hidden" name="list_id" value="<?= $lane['id'] ?>">
                                <button type="submit" class="btn btn-link text-secondary p-0" onclick="return confirm('Delete this list and all its cards?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                        </form>
                    </div>

                    <div class="card-body d-flex flex-column gap-2 p-2">
                        <div class="cards-container d-flex flex-column gap-2" data-list-id="<?= $lane['id'] ?>">
                            <?php foreach ($lane['cards'] as $card) : ?>
                                <div class="card bg-body-tertiary border-secondary-subtle p-3 shadow-sm task-card" style="cursor: grab; border-radius: 8px;" data-card-id="<?= $card['id'] ?>">
                                    <!-- Title and delete button share a row so the delete action stays compact and out of the way -->
                                    <div class="d-flex justify-content-between align-items-start">
                                        <!-- htmlspecialchars() escapes any HTML/JS a user might enter, preventing XSS -->
                                        <h6 class="fw-semibold text-white fs-6 mb-1"><?= htmlspecialchars($card['title']) ?></h6>
                                        <!-- .no-drag keeps SortableJS from treating this form as part of the draggable card -->
                                        <form action="/cards/delete" method="POST" class="no-drag ms-2">
                                            <input type="hidden" name="card_id" value="<?= $card['id'] ?>">
                                            <button type="submit" class="btn btn-sm btn-link text-secondary p-0" style="line-height: 1;">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <?php if (!empty($card['description'])) : ?>
                                        <p class="text-secondary small mb-0" style="font-size: 0.85rem;"><?= htmlspecialchars($card['description']) ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Add Card form, submits to /cards with this lane's id -->
                        <form action="/cards" method="POST" class="mt-1 no-drag">
                            <input type="hidden" name="list_id" value="<?= $lane['id'] ?>">
                            <input type="text" name="title" class="form-control form-control-sm bg-body-tertiary text-white border-secondary mb-1" placeholder="New card title..." required>
                            <button type="submit" class="btn btn-outline-light btn-sm w-100">+ Add card</button>
                        </form>
                    </div>
                </div>
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