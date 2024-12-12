<?php
$host = 'localhost';
$dbname = 'ojt_db';
$username = 'root';
$password = '';

try {
   
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $course = $_POST['course'];
        $studentId = $_POST['studentId'];
        $year = $_POST['year'];
        $section = $_POST['section'];
        $semester = $_POST['semester'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

      
        $stmt = $conn->prepare("SELECT COUNT(*) FROM students WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            echo "<script>
                alert('Username or email already exists!');
                window.location.href='../register.php';
            </script>";
            exit();
        }

        $sql = "INSERT INTO students (first_name, middle_name, last_name, phone, email, course, 
                student_id, year_level, section, semester, username, password) 
                VALUES (:firstName, :middleName, :lastName, :phone, :email, :course, 
                :studentId, :year, :section, :semester, :username, :password)";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':firstName' => $firstName,
            ':middleName' => $middleName,
            ':lastName' => $lastName,
            ':phone' => $phone,
            ':email' => $email,
            ':course' => $course,
            ':studentId' => $studentId,
            ':year' => $year,
            ':section' => $section,
            ':semester' => $semester,
            ':username' => $username,
            ':password' => $password
        ]);

        echo "<script>
            alert('Registration successful! Please login.');
            window.location.href='../login.php';
        </script>";
    }
} catch(PDOException $e) {
    echo "<script>
        alert('Registration failed: " . $e->getMessage() . "');
        window.location.href='register.php';
    </script>";
}

$conn = null;
?>
