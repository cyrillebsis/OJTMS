<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OJT - RMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-expand-lg shadow-sm fixed-top bg-white">
            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <i class="fas fa-chart-line me-2"></i>
                    <h5 class="mb-0 fw-bold">OJT - RMS</h5>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                <i class="fas fa-home me-2"></i>Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </a>
                        </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="registerDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                               <i class="fas fa-user-plus me-2"></i>Register
                           </a>
                           <ul class="dropdown-menu" aria-labelledby="registerDropdown">
                               <li><a class="dropdown-item" href="register.php?type=student">Student</a></li>
                               <li><a class="dropdown-item" href="register2.php?type=adviser">Adviser</a></li>
                           </ul>
                       </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div id="content" class="pt-5">
            <div class="container-fluid p-4 mt-5">
                <div class="card shadow-sm">
                    <div class="card-body text-center py-5">
                        <h1 class="card-title mb-4">Welcome to OJT RMS</h1>
                        <p class="lead"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
