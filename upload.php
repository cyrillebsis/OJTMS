<?php
session_start();
include 'config.php';

// Set response header to JSON
header('Content-Type: application/json');

if (!isset($_SESSION['username'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $username = $_SESSION['username'];
        $message = $_POST['message'] ?? '';
        $student_id = ''; // We'll fetch this from the database
        
        // Get student_id from database
        $stmt = $conn->prepare("SELECT student_id FROM students WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($student = $result->fetch_assoc()) {
            $student_id = $student['student_id'];
        }

        // Handle file upload
        if (isset($_FILES['journal_file'])) {
            $file = $_FILES['journal_file'];
            
            // Validate file size (10MB max)
            if ($file['size'] > 10 * 1024 * 1024) {
                throw new Exception('File size exceeds 10MB limit');
            }

            // Validate file type
            $allowed_types = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'text/plain'];
            if (!in_array($file['type'], $allowed_types)) {
                throw new Exception('Invalid file type. Only PDF, DOC, DOCX, and TXT files are allowed');
            }

            // Generate unique filename
            $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $new_filename = uniqid() . '_' . time() . '.' . $file_extension;
            
            // Create uploads directory if it doesn't exist
            $upload_dir = 'uploads/';
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // Move uploaded file
            $upload_path = $upload_dir . $new_filename;
            if (!move_uploaded_file($file['tmp_name'], $upload_path)) {
                throw new Exception('Failed to move uploaded file');
            }

            // Save to database
            $query = "INSERT INTO journal_uploads (student_id, filename, original_filename, file_path, message, upload_date) 
                     VALUES (?, ?, ?, ?, ?, NOW())";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssss", 
                $student_id,
                $new_filename,
                $file['name'],
                $upload_path,
                $message
            );

            if (!$stmt->execute()) {
                // Delete uploaded file if database insert fails
                unlink($upload_path);
                throw new Exception('Failed to save file information to database');
            }

            echo json_encode([
                'success' => true,
                'message' => 'File uploaded successfully',
                'filename' => $new_filename
            ]);
        } else {
            throw new Exception('No file uploaded');
        }
    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
}
