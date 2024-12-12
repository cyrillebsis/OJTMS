<?php
session_start();
require_once '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $middleName = mysqli_real_escape_string($conn, $_POST['middleName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $usertype = mysqli_real_escape_string($conn, $_POST['usertype']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate passwords match
    if ($password !== $confirmPassword) {
        $_SESSION['error'] = "Passwords do not match!";
        header("Location: ../register2.php");
        exit();
    }

    // Check if email already exists
    $check_email = "SELECT * FROM advisers WHERE email = '$email'";
    $email_result = mysqli_query($conn, $check_email);

    // Check if username already exists
    $check_username = "SELECT * FROM advisers WHERE username = '$username'";
    $username_result = mysqli_query($conn, $check_username);

    if (mysqli_num_rows($email_result) > 0) {
        $_SESSION['error'] = "Email already exists!";
        header("Location: ../register2.php");
        exit();
    }

    if (mysqli_num_rows($username_result) > 0) {
        $_SESSION['error'] = "Username already exists!";
        header("Location: ../register2.php");
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new adviser
    $query = "INSERT INTO advisers (first_name, middle_name, last_name, email, department, username, password, usertype) VALUES ('$firstName', '$middleName', '$lastName', '$email', '$department',
              '$username', '$hashed_password', '$usertype')";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Registration successful! Please login.";
        header("Location: ../login.php");
        exit();
    } else {
        $_SESSION['error'] = "Registration failed: " . mysqli_error($conn);
        header("Location: ../register2.php");
        exit();
    }
} else {
    header("Location: ../register2.php");
    exit();
}

mysqli_close($conn);
?>