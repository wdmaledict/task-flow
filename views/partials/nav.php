<header class="app-header navbar navbar-expand bg-body-tertiary border-bottom border-secondary-subtle px-4 py-3">
    <div class="container-fluid d-flex align-items-center justify-content-between p-0">
        
        <!-- Left Side: Title & Breadcrumbs (Moved from banner.php) -->
        <div>
            <h4 class="mb-0 fw-bold text-white">Project Board</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 small">
                    <li class="breadcrumb-item"><a href="/" class="text-secondary text-decoration-none">Task Flow</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Board</li>
                </ol>
            </nav>
        </div>

        <!-- Right Side: Search, Actions & Profile -->
        <div class="d-flex align-items-center gap-3">
            
            <!-- Search Bar -->
            <div style="width: 260px;">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-dark border-secondary-subtle text-secondary">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control bg-dark border-secondary-subtle text-white" placeholder="Search tasks...">
                </div>
            </div>

            <!-- New Task Button -->
            <button class="btn btn-primary btn-sm d-flex align-items-center gap-1">
                <i class="bi bi-plus-lg"></i>
                <span>New Task</span>
            </button>

            <!-- User Dropdown Menu -->
            <div class="dropdown">
                <a class="nav-link p-0" data-bs-toggle="dropdown" href="#">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; font-size: 0.85rem;">
                        JD
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-secondary-subtle shadow">
                    <li><a class="dropdown-item text-danger" href="/logout"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                </ul>
            </div>

        </div>

    </div>
</header>