<?php
$host = "localhost";
$username = "root"; 
$password = "";
$dbname = "create_account";
$con = mysqli_connect($host, $username, $password, $dbname);
if(mysqli_connect_errno()){
    echo"failed" .mysqli_connect_errno();
}
 ///else{
   // echo"connected";
 ///}
?> 