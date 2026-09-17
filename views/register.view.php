<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<main class="container py-5" style="max-width: 500px;">
    <div class="card bg-dark border-secondary shadow-sm p-4" style="border-radius: 10px;">
        <h1 class="h3 mb-4 text-white text-center">Register for Task Flow</h1>

        <form action="/register" method="POST">
            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label text-white">Name</label>
                <input type="text" name="name" id="name" class="form-control bg-body-tertiary text-white border-secondary" 
                       value="<?= $_SESSION['old']['name'] ?? '' ?>" placeholder="Enter your name...">
                <?php if (isset($_SESSION['errors']['name'])): ?>
                    <p class="text-danger small mt-1 mb-0"><?= $_SESSION['errors']['name'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label text-white">Email address</label>
                <input type="email" name="email" id="email" class="form-control bg-body-tertiary text-white border-secondary" 
                       value="<?= $_SESSION['old']['email'] ?? '' ?>" placeholder="Enter your email...">
                <?php if (isset($_SESSION['errors']['email'])): ?>
                    <p class="text-danger small mt-1 mb-0"><?= $_SESSION['errors']['email'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Password Field -->
            <div class="mb-4">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" name="password" id="password" class="form-control bg-body-tertiary text-white border-secondary" 
                       placeholder="Enter password (min 6 characters)...">
                <?php if (isset($_SESSION['errors']['password'])): ?>
                    <p class="text-danger small mt-1 mb-0"><?= $_SESSION['errors']['password'] ?></p>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
    </div>
</main>

<?php 
unset($_SESSION['errors']);
unset($_SESSION['old']);
?>

<?php require base_path('views/partials/footer.php') ?>