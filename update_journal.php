<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    echo json_encode(['success' => false, 'message' => 'Not authorized']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $journal_id = $_POST['journal_id'];
    $student_id = $_POST['studentId'];
    
    // Verify the journal belongs to this student
    $verify_query = "SELECT * FROM journal_uploads WHERE id = ? AND student_id = ?";
    $stmt = $conn->prepare($verify_query);
    $stmt->bind_param("ii", $journal_id, $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid journal entry']);
        exit();
    }
    
    // Process the new file upload
    if (isset($_FILES['journal_file'])) {
        $file = $_FILES['journal_file'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        
        // Generate new filename
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $newFileName = uniqid('journal_') . '.' . $fileExt;
        $uploadPath = 'uploads/' . $newFileName;
        
        if ($fileError === 0) {
            // Move file to uploads directory
            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                // Update database record
                $update_query = "UPDATE journal_uploads SET 
                    file_path = ?,
                    original_filename = ?,
                    upload_date = NOW(),
                    message = ?
                    WHERE id = ? AND student_id = ?";
                
                $stmt = $conn->prepare($update_query);
                $message = $_POST['message'] ?? '';
                $stmt->bind_param("sssii", $uploadPath, $fileName, $message, $journal_id, $student_id);
                
                if ($stmt->execute()) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Database update failed']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to move uploaded file']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'File upload error']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No file uploaded']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?> 