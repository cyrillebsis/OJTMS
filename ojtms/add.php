<?php
include("connection.php");
if(isset($_POST['register'])){
    $firstname =$_POST['firstname'];
    $lastname =$_POST['lastname'];
    $email =$_POST['email'];
    $username =$_POST['username']; 
    $password =md5($_POST['password']); 
    $confirmpassword =md5($_POST['confirmpassword']); 
    $query = "INSERT INTO `create_accountdb`(`firstname`, `lastname`, `email`, `username`, `password`, `confirmpassword`) VALUES ('$firstname', '$lastname', '$email','$username', '$password', '$confirmpassword')";
    $result = mysqli_query($con , $query);
    if($result)
    {
        ?>
        <script>
            alert("Added");
            window.location.href='createaccount.php';
        </script>
        <?php
    }   
    else
    {
     ?>
     <script>
        alert('failed to add');
        window.location.href='connection.php'
     </script>
     <?php
    }
}
?>