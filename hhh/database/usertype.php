<?php
// usertype.php
class UserType {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    // Get user type by ID
    public function getUserType($user_id) {
        $query = "SELECT ut.type_name 
                 FROM users u 
                 JOIN usertypes ut ON u.user_type_id = ut.type_id 
                 WHERE u.user_id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($row = $result->fetch_assoc()) {
            return $row['type_name'];
        }
        return false;
    }

    // Check user type permission
    public function checkUserTypePermission($user_id, $required_type) {
        $user_type = $this->getUserType($user_id);
        return $user_type === $required_type;
    }

    // Set user type
    public function setUserType($user_id, $type_id) {
        $query = "UPDATE users SET usertype_id = ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $type_id, $user_id);
        return $stmt->execute();
    }
}

// Example usage in login.php:
session_start();
require_once './config.php';
require_once 'usertype.php';

if(isset($_POST['login'])) {
    // Your existing login validation code here
    
    // After successful login:
    $userType = new UserType($conn);
    $type = $userType->getUserType($user_id);
    
    $_SESSION['usertype'] = $type;
    
    // Redirect based on user type
    switch($type) {
        case 'student':
            header('Location: Dashboard_student.php');
            break;
        case 'adviser':
            header('Location: adviser/Dashboard_advisert.php');
            break;
    }
}
?>