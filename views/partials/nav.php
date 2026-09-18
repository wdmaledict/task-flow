<header class="app-header navbar navbar-expand bg-body-tertiary border-bottom border-secondary-subtle px-4 py-3">
    <div class="container-fluid d-flex align-items-center justify-content-between p-0">
        
        
        <!-- Left Side: Title & Breadcrumbs -->
            <div>
                <?php if (isset($_SESSION['user'])) : ?>
                    <!-- Shown when the user is logged in -->
                    <h4 class="mb-0 fw-bold text-white">Project Board</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 small">
                            <li class="breadcrumb-item"><a href="/" class="text-secondary text-decoration-none">Task Flow</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Board</li>
                        </ol>
                    </nav>
                <?php else : ?>
                    <!-- Shown when the user is a guest (not logged in) -->
                    <h4 class="mb-0 fw-bold text-white">Task Flow</h4>
                <?php endif; ?>
            </div>
  
          <?php if (isset($_SESSION['user'])) : ?>
            <!-- User Dropdown Menu -->
            <div class="dropdown">
                <a class="nav-link p-0" data-bs-toggle="dropdown" href="#">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; font-size: 0.85rem;">
                        <?= strtoupper(substr($_SESSION['user']['name'] ?? 'U', 0, 1)) ?>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-secondary-subtle shadow">
                    <li>
                        <form action="/logout" method="POST" class="m-0">
                            <button type="submit" class="dropdown-item text-danger bg-transparent border-0 w-100 text-start">
                                <i class="bi bi-box-arrow-right me-2"></i>Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        <?php else : ?>
            <!-- Guest links -->
            <div class="d-flex gap-2">
                <a href="/login" class="btn btn-primary btn-sm">Log In</a>
                <a href="/register" class="btn btn-primary btn-sm">Register</a>
            </div>
        <?php endif; ?>
    </div>
</header>