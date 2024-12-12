<?php
session_start();
include 'config.php'; // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch student information from database
$username = $_SESSION['username'];
$query = "SELECT * FROM students WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OJT - RMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="message1.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <!-- Modernized Sidebar -->
        <nav id="sidebar" class="shadow-sm">
            <div class="sidebar-header p-4">
                <h3 class="fw-bold">
                    <i class="fas fa-chart-line me-2"></i>
                    OJT - RMS
                </h3>
            </div>

            <div class="menu-section px-3">
                <p class="menu-label text-uppercase fw-semibold text-muted small mb-2">Menu</p>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="#" class="active rounded-3 p-3 d-flex align-items-center">
                            <i class="fas fa-home me-3"></i> 
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="journal.php" class="rounded-3 p-3 d-flex align-items-center">
                            <i class="fas fa-journal-whills me-3""></i>
                            <span>Upload Journal</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="dtr.php" class="rounded-3 p-3 d-flex align-items-center">
                            <i class="fas fa-clipboard me-3"></i>
                            <span>Upload DTR</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Modernized Page Content -->
        <div id="content">
            <!-- Updated Top Navigation -->
            <nav class="navbar navbar-expand-lg shadow-sm">
                <div class="container-fluid">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-home text-primary me-2"></i> 
                        <h5 class="mb-0 fw-semibold">Dashboard</h5>
                    </div>
                    <div class="ms-auto d-flex align-items-center">
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                                <img src="" class="rounded-circle me-2" width="32" height="32" alt="User">
                                <span class="d-none d-md-inline"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editProfileModal"><i class="fas fa-user me-2"></i>Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="login.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Main Content Area -->
            <div class="container-fluid p-4">
                <!-- Dashboard Cards -->
                <div class="row g-4">
                    <!-- Student Information Card -->
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-white">
                                <h5 class="card-title mb-0">Student Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="info-item">
                                            <label class="text-muted mb-1">First Name</label>
                                            <h6 class="mb-0"><?php echo htmlspecialchars($student['first_name']); ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="info-item">
                                            <label class="text-muted mb-1">Last Name</label>
                                            <h6 class="mb-0"><?php echo htmlspecialchars($student['last_name']); ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="info-item">
                                            <label class="text-muted mb-1">Student ID</label>
                                            <h6 class="mb-0"><?php echo htmlspecialchars($student['student_id']); ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="info-item">
                                            <label class="text-muted mb-1">Course</label>
                                            <h6 class="mb-0"><?php echo htmlspecialchars($student['course']); ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="info-item">
                                            <label class="text-muted mb-1">Year Level</label>
                                            <h6 class="mb-0"><?php echo htmlspecialchars($student['year_level']); ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="info-item">
                                            <label class="text-muted mb-1">Section</label>
                                            <h6 class="mb-0"><?php echo htmlspecialchars($student['section']); ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="info-item">
                                            <label class="text-muted mb-1">Semester</label>
                                            <h6 class="mb-0"><?php echo htmlspecialchars($student['semester']); ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script1.js"></script>
   
</body>
</html>