<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Popup Login Form</title>
  <!-- Link the external CSS file -->
  <link rel="stylesheet" href="popup.css">
</head>
<body>
 
    <button id="login-btn">Open Login Form</button>
  </div>
  <div class="container"id="popup">
    <h1>Create Account</h1>
    <form action="#" method="post" id="create-account-form">
      <div class="form-group">
        <label for="first-name">First Name</label>
        <input type="text" id="first-name" name="first-name" placeholder="Enter your first name" required>
      </div>
      <div class="form-group">
        <label for="last-name">Last Name</label>
        <input type="text" id="last-name" name="last-name" placeholder="Enter your last name" required>
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Choose a username" required>
      </div>
      <div class="form-group">
        <label for="password">Create Password</label>
        <input type="password" id="password" name="password" placeholder="Create a password" required>
      </div>
      <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
      </div>
      <div class="form-actions">
        <button type="submit" class="create-button">Create Account</button>
      </div>
    </form>
  </div>

  <script>
    // Get elements
    const loginBtn = document.getElementById('login-btn');
    const popup = document.getElementById('popup');
    const closeBtn = document.getElementById('close-btn');

    // Show popup
    loginBtn.addEventListener('click', () => {
      popup.style.display = 'flex';
    });

    // Hide popup
    closeBtn.addEventListener('click', () => {
      popup.style.display = 'none';
    });

    // Close popup when clicking outside of it
    window.addEventListener('click', (e) => {
      if (e.target === popup) {
        popup.style.display = 'none';
      }
    });
  </script>
</body>
</html>
