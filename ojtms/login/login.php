<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
    <style>
        body {
            background-image: url('Background.jpg'); /* Replace 'your_image.jpg' with your actual image filename */
            background-size: cover; /* Adjust background size as needed */
            background-repeat: no-repeat; /* Prevent image repetition */
            background-attachment: fixed; 1  /* Keep image fixed on scroll */
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h1>Log in<span>.</span></h1>
        <form id="login-form" action="#" method="post" class="login-form">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username"required="required">            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required="required">
            
            <a href="" class="forgot-password">Forgot password?</a>
            <a href="../landingpage/DB.php" class="login-button" >Log In</a>
            
        </form>
    </div>
</body>
</html>