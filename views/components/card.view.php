<?php
// Renders a single card. Expects $card to be set by the caller (lane.view.php).
?>
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

    <!-- <details> is a native HTML element that shows/hides its content on click, no JS needed -->
    <details class="no-drag mt-2">
        <summary class="text-secondary small" style="cursor: pointer;">Edit</summary>
        <form action="/cards/update" method="POST" class="mt-2 no-drag">
            <input type="hidden" name="card_id" value="<?= $card['id'] ?>">
            <input type="text" name="title" value="<?= htmlspecialchars($card['title']) ?>" maxlength="255" class="form-control form-control-sm bg-dark text-white border-secondary mb-1" required>
            <textarea name="description" maxlength="500" class="form-control form-control-sm bg-dark text-white border-secondary mb-1" rows="2"><?= htmlspecialchars($card['description'] ?? '') ?></textarea>
            <button type="submit" class="btn btn-sm btn-outline-light w-100">Save</button>
        </form>
    </details>

    <?php if (!empty($card['description'])) : ?>
        <hr class="my-2" style="border-color: rgba(238, 230, 230, 0.15);">
        <p class="text-white small mb-0" style="font-size: 0.85rem;"><strong>Description:</strong> <?= htmlspecialchars($card['description']) ?></p>
    <?php endif; ?>
</div>