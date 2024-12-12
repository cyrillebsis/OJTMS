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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="message1.css">
    
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
                        <a href="Dashboard_student.php" class="rounded-3 p-3 d-flex align-items-center">
                            <i class="fas fa-home me-3"></i> 
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class=" active rounded-3 p-3 d-flex align-items-center">
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

            <!-- Main Dashboard Content -->
            <div class="container-fluid p-4">
                <div class="row">
                    <!-- Upload Card -->
                    <div class="col-12">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Send Files</h5>

                              
                                <form id="fileUploadForm" class="mb-4" action="upload.php" method="POST" enctype="multipart/form-data">
                                   <input type="hidden" name="studentId" value="<?php echo htmlspecialchars($student['student_id']); ?>">
                                   <input type="hidden" name="edit_mode" id="editMode" value="0">
                                   <input type="hidden" name="journal_id" id="journalId" value="">
                                   <div class="mb-3">
                                        <label for="fileInput" class="form-label">Select File</label>
                                            <input type="file" class="form-control" name="journal_file" id="fileInput" accept=".pdf,.doc,.docx,.txt" required>
                                            <div class="form-text">Supported formats: PDF, DOC, DOCX, TXT (Max size: 10MB)</div>
                                        </div>
                                    
                                        <div class="mb-3">
                                            <label for="message" class="form-label">Message (Optional)</label>
                                            <textarea class="form-control" name="message" id="message" rows="3" placeholder="Add a message..."></textarea>
                                        </div>
                                    <button type="submit" class="btn btn-primary" id="submitBtn" name="submit">
                                        <i class="fas fa-paper-plane me-2"></i>Send File
                                    </button>
                                    <button type="button" class="btn btn-secondary d-none" id="cancelEdit">
                                        <i class="fas fa-times me-2"></i>Cancel Edit
                                    </button>
                                </form>
                                </div>
                             
                                <div id="uploadProgress" class="progress d-none mb-3">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table Card -->
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Uploaded Journal Files</h5>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>File Name</th>
                                                <th>Upload Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Fetch journal files for the current student
                                            $query = "SELECT * FROM journal_uploads WHERE student_id = ? ORDER BY upload_date DESC";
                                            $stmt = $conn->prepare($query);
                                            $stmt->bind_param("i", $student['student_id']);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>{$row['original_filename']}</td>";
                                                echo "<td>" . date('M d, Y', strtotime($row['upload_date'])) . "</td>";
                                                echo "<td>{$row['status']}</td>";
                                                echo "<td>
                                                
                                                        <button class='btn btn-sm btn-primary me-2' onclick='editJournal({$row['id']}, \"{$row['original_filename']}\")'>
                                                            <i class='fas fa-edit'></i>
                                                        </button>
                                                    </td>";
                                                echo "</tr>";
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
        </div>
    </div>
            <!-- Add this before closing body tag -->
            <script>
                function editJournal(journalId, fileName) {
                    const form = document.getElementById('fileUploadForm');
                    const editMode = document.getElementById('editMode');
                    const journalIdInput = document.getElementById('journalId');
                    const submitBtn = document.getElementById('submitBtn');
                    const cancelBtn = document.getElementById('cancelEdit');
                    
                    editMode.value = "1";
                    journalIdInput.value = journalId;
                    
                    submitBtn.innerHTML = '<i class="fas fa-save me-2"></i>Update File';
                    cancelBtn.classList.remove('d-none');
                    
                    form.scrollIntoView({ behavior: 'smooth' });
                }

                // Add new cancel edit handler
                document.getElementById('cancelEdit').addEventListener('click', function() {
                    const form = document.getElementById('fileUploadForm');
                    const editMode = document.getElementById('editMode');
                    const submitBtn = document.getElementById('submitBtn');
                    const cancelBtn = document.getElementById('cancelEdit');
                    
                    form.reset();
                    editMode.value = "0";
                    submitBtn.innerHTML = '<i class="fas fa-paper-plane me-2"></i>Send File';
                    cancelBtn.classList.add('d-none');
                });

                // Updated form submission handler
                document.getElementById('fileUploadForm').addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(this);
                    const isEditMode = formData.get('edit_mode') === "1";
                    const endpoint = isEditMode ? 'update_journal.php' : 'upload.php';
                    
                    fetch(endpoint, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.reload();
                        } else {
                            throw new Error(data.message || 'Operation failed');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error.message);
                    });
                });
            </script>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>