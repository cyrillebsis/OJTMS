<?php
session_start();
include '../config.php';

// Handle status update if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dtr_id']) && isset($_POST['status'])) {
    $dtr_id = $_POST['dtr_id'];
    $status = $_POST['status'];
    $feedback = $_POST['feedback'] ?? '';

    $query = "UPDATE dtr_submissions SET status = ?, remarks = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $status, $feedback, $dtr_id);
    $stmt->execute();
}

// Fetch DTR submissions
$query = "SELECT d.*, s.first_name, s.last_name 
          FROM dtr_submissions d 
          JOIN students s ON d.student_id = s.student_id 
          ORDER BY d.upload_date DESC";
$result = $conn->query($query);
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
                        <a href="dashboard_advisert.php" class="rounded-3 p-3 d-flex align-items-center">
                            <i class="fas fa-home me-3"></i> 
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="journal.php" class=" active rounded-3 p-3 d-flex align-items-center">
                            <i class="fas fa-journal-whills me-3"></i>
                            <span>Upload Journal</span>
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




    <div class="container mt-4">
        <h2 class="mb-4">DTR Submissions</h2>
        
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Month</th>
                        <th>Upload Date</th>
                        <th>File</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></td>
                            <td><?php echo date('F', mktime(0, 0, 0, $row['month'], 1)); ?></td>
                            <td><?php echo date('M d, Y', strtotime($row['upload_date'])); ?></td>
                            <td>
                                <a href="<?php echo htmlspecialchars($row['file_path']); ?>" target="_blank" class="btn btn-sm btn-primary">
                                    <i class="fas fa-file-download"></i> View
                                </a>
                            </td>
                            <td>
                                <span class="badge bg-<?php 
                                    echo match($row['status']) {
                                        'approved' => 'success',
                                        'rejected' => 'danger',
                                        default => 'warning'
                                    };
                                ?>">
                                    <?php echo ucfirst($row['status']); ?>
                                </span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#approvalModal<?php echo $row['id']; ?>">
                                    Update Status
                                </button>

                                <!-- Modal for each submission -->
                                <div class="modal fade" id="approvalModal<?php echo $row['id']; ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update DTR Status</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form action="approve_dtr.php" method="POST">
                                                <div class="modal-body">
                                                    <input type="hidden" name="dtr_id" value="<?php echo $row['id']; ?>">
                                                    
                                                    <div class="mb-3">
                                                        <label class="form-label">Status</label>
                                                        <select name="status" class="form-select" required>
                                                            <option value="approved" <?php echo $row['status'] === 'approved' ? 'selected' : ''; ?>>Approved</option>
                                                            <option value="rejected" <?php echo $row['status'] === 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label class="form-label">Feedback/Remarks</label>
                                                        <textarea name="feedback" class="form-control" rows="3"><?php echo htmlspecialchars($row['remarks']); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Show success message if status was updated
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        document.addEventListener('DOMContentLoaded', function() {
            const toast = new bootstrap.Toast(document.querySelector('.toast'));
            toast.show();
        });
        <?php endif; ?>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../script1.js"></script>
</body>
</html> 