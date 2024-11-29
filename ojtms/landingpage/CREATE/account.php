<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account</title>
  <link rel="stylesheet" href="account.css">
</head>
<body>

  <div id="modal" class="modal">
    <div class="modal-content">
      <button class="close-button" id="close-modal-button">&times;</button>
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
  </div>

  <script>
    const modal = document.getElementById('modal');
    const openModalButton = document.getElementById('open-modal-button');
    const closeModalButton = document.getElementById('close-modal-button');

    openModalButton.addEventListener('click', () => {
      modal.classList.add('active');
    });

    closeModalButton.addEventListener('click', () => {
      modal.classList.remove('active');
    });

    window.addEventListener('click', (event) => {
      if (event.target === modal) {
        modal.classList.remove('active');
      }
    });
  </script>
</body>
</html>
