<?php
session_start();
include '../config.php'; // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$query = "SELECT * FROM students WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
$columns_query = "SHOW COLUMNS FROM students";
$columns_result = $conn->query($columns_query);
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
    <link rel="stylesheet" href="../message1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                        <a href="approve_dtr.php" class="rounded-3 p-3 d-flex align-items-center">
                            <i class="fas fa-journal-whills me-3"></i>
                            <span>Approve Journal</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="studentdtr.php" class="rounded-3 p-3 d-flex align-items-center">
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
                             <i class="fas fa-user-cog me-2"></i>
                             <span class="d-none d-md-inline"></span>
                        </a>
                            <ul class="dropdown-menu dropdown-menu-end">

                                <li><a class="dropdown-item text-danger" href="login.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Main Content Area -->

<div class="container-fluid p-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="fas fa-users me-2"></i> Students Information
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>Full Name</th>
                            <th>Student ID</th>
                            <th>Course</th>
                            <th>Section</th>
                            <th>OJT Company</th>
                            <th>Contact Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Query to fetch all students
                        $query = "SELECT * FROM students";
                        $result = mysqli_query($conn, $query);

                        while ($student = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($student['first_name'] . ' ' . $student['last_name'] . ' ' . $student['middle_name'] ?? 'N/A') . "</td>";
                            echo "<td>" . htmlspecialchars($student['student_id'] ?? 'N/A') . "</td>";
                            echo "<td>" . htmlspecialchars($student['course'] ?? 'N/A') . "</td>";
                            echo "<td>" . htmlspecialchars($student['section'] ?? 'N/A') . "</td>";
                            echo "<td>" . htmlspecialchars($student['company'] ?? 'Not Assigned') . "</td>";
                            echo "<td>" . htmlspecialchars($student['contact_number'] ?? 'N/A') . "</td>";   
                        }

                        if (mysqli_num_rows($result) == 0) {
                            echo "<tr><td colspan='7' class='text-center'>No students found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
            




        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../script1.js"></script>
   
</body>
</html>