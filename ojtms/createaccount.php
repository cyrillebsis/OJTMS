<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Create Account</h1>
        <form action="add.php" method="POST">
            <div>
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" name="firstname"required><br><br>
            </div>
            <div>
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="lastname"required><br><br>
            </div>
            <div>
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="full-width"required><br><br>
            </div>
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username"required><br><br>
            </div>
            <div>
                <label for="password">Create Password</label>
                <input type="password" id="password" name="password"required><br><br>
            </div>
            <div>
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" id="confirmpassword" name="confirmpassword"required><br><br>
            </div>
            <div class="back-button">
                <a href="index.php">&#8592; Back</a>
            </div>
            <div class="button-container">
                <button type="sumbit" value="Register"  class="btn" name='register'>Save</button>
            </div>
        </form>
    </div>

</body>
</html>
