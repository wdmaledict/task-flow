<?php
// Renders a single lane (list) with its cards. Expects $lane to be set by the caller (index.view.php).
?>
<div class="card bg-dark border-secondary-subtle shadow-sm lane-column" style="border-radius: 10px;">
    <div class="card-header bg-transparent border-0 pt-3 px-3">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2">
                <span class="badge rounded-pill <?= $lane['badge_color'] ?> px-2 py-1"><?= $lane['count'] ?></span>
                <h6 class="mb-0 fw-bold text-white"><?= htmlspecialchars($lane['title']) ?></h6>
            </div>
            <form action="/lists/delete" method="POST" class="no-drag">
                <input type="hidden" name="list_id" value="<?= $lane['id'] ?>">
                <button type="submit" class="btn btn-link text-secondary p-0" onclick="return confirm('Delete this list and all its cards?')">
                    <i class="bi bi-trash"></i>
                </button>
            </form>
        </div>

        <!-- <details> is a native HTML element that shows/hides its content on click, no JS needed -->
        <details class="no-drag mt-2">
            <summary class="text-secondary small" style="cursor: pointer;">Rename</summary>
            <form action="/lists/update" method="POST" class="mt-2 no-drag">
                <input type="hidden" name="list_id" value="<?= $lane['id'] ?>">
                <input type="text" name="title" value="<?= htmlspecialchars($lane['title']) ?>" maxlength="100" class="form-control form-control-sm bg-dark text-white border-secondary mb-1" required>
                <button type="submit" class="btn btn-sm btn-outline-light w-100">Save</button>
            </form>
        </details>
    </div>

    <div class="card-body d-flex flex-column gap-2 p-2">
        <div class="cards-container d-flex flex-column gap-2" data-list-id="<?= $lane['id'] ?>">
            <?php foreach ($lane['cards'] as $card) : ?>
                <?php require base_path('views/components/card.view.php') ?>
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