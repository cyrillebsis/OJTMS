<?php
session_start();
include '../config.php'; // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION['student_id'];
$query = "SELECT * FROM dtr_submissions WHERE student_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $student_id);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
$columns_query = "SHOW COLUMNS FROM dtr_submissions";
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
                        <a href="dashboard_advisert.php" class="active rounded-3 p-3 d-flex align-items-center">
                            <i class="fas fa-home me-3"></i> 
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="journal.php" class="rounded-3 p-3 d-flex align-items-center">
                            <i class="fas fa-journal-whills me-3"></i>
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
                        <i class="fas fa-journal-whills text-primary me-2 fa-lg"></i>
                        <h5 class="mb-0 fw-semibold">Journal</h5>
                    </div>
                    <div class="ms-auto d-flex align-items-center">
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                                <img src="" class="rounded-circle me-2" width="32" height="32" alt="User">
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
                <i class="fas fa-book me-2"></i> Journal Entries
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>Student Name</th>
                            <th>Month</th>
                            <th>File Name</th>
                            <th>File</th>
                            <th>Upload Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Query to fetch all journal uploads with student information
                        $query = "SELECT j.*, CONCAT(s.first_name, ' ', s.last_name) as student_name 
                                FROM dtr_submissions j 
                                LEFT JOIN students s ON j.student_id = s.student_id";
                        $result = mysqli_query($conn, $query);

                        while ($journal = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($journal['student_name'] ?? 'N/A') . "</td>";
                            echo "<td>" . htmlspecialchars($journal['month'] ?? 'N/A') . "</td>";
                            echo "<td>" . htmlspecialchars($journal['file_name'] ?? 'N/A') . "</td>";
                            echo "<td><a href='../uploads/" . htmlspecialchars($journal['file_path']) . "' target='_blank'>View File</a></td>";
                            echo "<td>" . htmlspecialchars($journal['upload_date'] ?? 'N/A') . "</td>";
                            echo "</tr>";
                        }

                        if (mysqli_num_rows($result) == 0) {
                            echo "<tr><td colspan='6' class='text-center'>No journal entries found</td></tr>";
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
    <script src="script1.js"></script>
   
</body>
</html>