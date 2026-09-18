<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<main class="container py-5" style="max-width: 500px;">
    <div class="card bg-dark border-secondary shadow-sm p-4" style="border-radius: 10px;">
        <h1 class="h3 mb-4 text-white text-center">Log In to Task Flow</h1>

        <form action="/login" method="POST">
            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label text-white">Email address</label>
                <input type="email" name="email" id="email" class="form-control bg-body-tertiary text-white border-secondary" 
                value="<?= htmlspecialchars($_SESSION['old']['email'] ?? '', ENT_QUOTES) ?>" placeholder="Enter your email...">
                <?php if (isset($_SESSION['errors']['email'])): ?>
                    <p class="text-danger small mt-1 mb-0"><?= $_SESSION['errors']['email'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Password Field -->
            <div class="mb-4">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" name="password" id="password" class="form-control bg-body-tertiary text-white border-secondary" 
                       placeholder="Enter your password...">
                <?php if (isset($_SESSION['errors']['password'])): ?>
                    <p class="text-danger small mt-1 mb-0"><?= $_SESSION['errors']['password'] ?></p>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary w-100">Log In</button>
        </form>
    </div>
</main>

<?php 
//// Clear temporary session data (errors and old input) after rendering the view 
// to ensure they don't persist on subsequent page requests.
unset($_SESSION['errors']);
unset($_SESSION['old']);
?>

<?php require base_path('views/partials/footer.php') ?>