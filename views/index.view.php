<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<main class="p-4">
    <div class="container-fluid p-0">
        <div class="d-flex gap-3 overflow-auto justify-content-center align-items-start pb-4">
            <?php foreach ($lanes as $lane) : ?>
                <div class="card bg-dark border-secondary-subtle flex-shrink-0 shadow-sm" style="width: 320px; border-radius: 10px;">
                    <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center pt-3 px-3">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge rounded-pill <?= $lane['badge_color'] ?> px-2 py-1"><?= $lane['count'] ?></span>
                            <h6 class="mb-0 fw-bold text-white"><?= $lane['title'] ?></h6>
                        </div>
                        <button class="btn btn-link text-secondary p-0"><i class="bi bi-three-dots"></i></button>
                    </div>

                    <div class="card-body d-flex flex-column gap-2 p-2">
                        <?php foreach ($lane['cards'] as $card) : ?>
                            <div class="card bg-body-tertiary border-secondary-subtle p-3 shadow-sm task-card" style="cursor: grab; border-radius: 8px;">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge <?= $card['tag_color'] ?> px-2 py-1" style="font-size: 0.7rem; text-transform: uppercase;"><?= $card['tag'] ?></span>
                                    <i class="bi bi-grip-vertical text-secondary"></i>
                                </div>
                                <h6 class="fw-semibold text-white fs-6 mb-1"><?= $card['title'] ?></h6>
                                <?php if (isset($card['desc'])) : ?>
                                    <p class="text-secondary small mb-3 text-truncate-2" style="font-size: 0.85rem;"><?= $card['desc'] ?></p>
                                <?php endif; ?>
                                <div class="d-flex justify-content-between align-items-center mt-2 pt-2 border-top border-secondary-subtle text-secondary small">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold" style="width: 26px; height: 26px; font-size: 0.75rem;">
                                        <?= $card['user'] ?>
                                    </div>
                                    <?php if (isset($card['date'])) : ?>
                                        <span style="font-size: 0.75rem;"><i class="bi bi-calendar3 me-1"></i><?= $card['date'] ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <button class="btn btn-outline-secondary btn-sm border-dashed mt-2 w-100 text-secondary">+ Add card</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>