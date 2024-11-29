<body>
<style>
/* General Styles */
body {
  font-family: Arial, sans-serif;
  background-color: #f9f9f9;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

h1 {
  font-size: 28px;
  font-weight: bold;
  margin-bottom: 20px;
  color: #333;
  text-align: center;
  border-bottom: 2px solid #000;
  padding-bottom: 10px;
}

form {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
}

.form-group {
  display: flex;
  flex-direction: column;
  width: 100%;
}

label {
  font-size: 14px;
  font-weight: bold;
  margin-bottom: 5px;
  color: #333;
}

input {
  padding: 12px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 5px;
  transition: border-color 0.3s ease-in-out;
}

input:focus {
  outline: none;
  border-color: #007bff;
  box-shadow: 0 0 3px rgba(0, 123, 255, 0.5);
}

button {
  width: 100%;
  padding: 12px;
  background-color: #007bff;
  color: #fff;
  font-size: 16px;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
}

button:hover {
  background-color: #0056b3;
}

button:active {
  background-color: #003f7f;
}

.form-actions {
  margin-top: 20px;
  text-align: center;
}

/* Modal Styles */
.modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

.modal.active {
  display: flex;
}

.modal-content {
  background: #ffffff;
  padding: 20px 30px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  max-width: 500px;
  width: 100%;
  position: relative;
}

.close-button {
  background: none;
  border: none;
  font-size: 20px;
  color: #333;
  position: absolute;
  top: 10px;
  right: 10px;
  cursor: pointer;
}

.close-button:hover {
  color: #007bff;
}

</style>
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
</body>
