<?php
session_start();
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Use prepared statement
    $sql = "SELECT * FROM students WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        
        // Verify password
        if (password_verify($password, $row['password'])) {
            // Password is correct, create session
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];
            $_SESSION['student_id'] = $row['student_id'];
            
            // Regenerate session ID to prevent session fixation
            session_regenerate_id(true);
            
            // Redirect to dashboard
            header("Location: ../Dashboard_student.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid username or password";
            header("Location: ../login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Invalid username or password";
        header("Location: ../login.php");
        exit();
    }
}

// Close connection
mysqli_close($conn);
?> 