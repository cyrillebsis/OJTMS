<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account</title>
  <link rel="stylesheet" href="input.css">
</head>
<body>
  <div class="container">
    <h1>Create Account</h1>
    <form>
      <div class="form-group">
        <label for="first-name">First Name</label>
        <input type="text" id="first-name" name="first-name">
      </div>
      <div class="form-group">
        <label for="last-name">Last Name</label>
        <input type="text" id="last-name" name="last-name">
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email">
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username">
      </div>
      <div class="form-group">
        <label for="password">Create Password</label>
        <input type="password" id="password" name="password">
      </div>
      <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password">
      </div>
      <button type="submit" class="create-button">Create</button>
    </form>
  </div>
</body>
</html>
