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
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        <a href="journal.php" class="  rounded-3 p-3 d-flex align-items-center">
                            <i class="fas fa-journal-whills me-3"></i>
                            <span>Upload Journal</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="active rounded-3 p-3 d-flex align-items-center">
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
                        <i class="fas fa-clipboard text-primary me-2 fa-lg"></i>
                        <h5 class="mb-0 fw-semibold">Daily Time Record</h5>
                    </div>
                    <div class="ms-auto d-flex align-items-center">
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                                <img src="" class="rounded-circle me-2" width="32" height="32" alt="User">
                                <span class="d-none d-md-inline"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="login.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Main Dashboard Content -->
            <div class="container-fluid p-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Upload DTR</h5>
                        
                        <!-- Updated DTR Upload Form with name field -->
                        <form id="dtrUploadForm" class="mb-4" action="upload_dtr.php" method="POST" enctype="multipart/form-data">
                            
                            
                            <div class="mb-3">
                                <label for="month" class="form-label">Select Month</label>
                                <select class="form-select" id="month" name="month" required>
                                    <option value="">Choose month...</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="fileInput" class="form-label">Upload DTR File</label>
                                <input type="file" class="form-control" id="fileInput" name="dtr_file" accept=".pdf,.doc,.docx,.xlsx,.xls" required>
                                <div class="form-text">Supported formats: PDF, DOC, DOCX, XLSX, XLS (Max size: 10MB)</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="remarks" class="form-label">Remarks (Optional)</label>
                                <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="Add any additional remarks..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-upload me-2"></i>Submit DTR
                            </button>
                        </form>

                        <!-- Upload Progress -->
                        <div id="uploadProgress" class="progress d-none mb-3">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"></div>
                        </div>
                    </div>
                </div>
            </div>

    

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.getElementById('dtrUploadForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Create FormData object
        const formData = new FormData(this);

       

        // Perform the AJAX upload
      
    });
    </script>
</body>
</html>