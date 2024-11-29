<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Jobs</title>
    <link rel="stylesheet" href="home.css">
    <style>
        /* Modal styling */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            position: relative;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
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
  width: 280%;
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
  max-width: 700px;
  width: 100%;
    padding: 30px;
    width: 600px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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
</head>
<body>
<div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
      <span></span>
    </label>

    <ul class="menu__box">
      <li><a class="menu__item" href="#">Home</a></li>
      <li><a class="menu__item" href="#">About</a></li>
      <li><a class="menu__item" href="#">Team</a></li>
      <li><a class="menu__item" href="#">Contact</a></li>
      <li><a class="menu__item" href="#">Twitter</a></li>
    </ul>
</div>

<header>
    <h1>Company name</h1>
</header>

<main>
        <h2>Internship Jobs</h2>
        <div class="job-listings">
            <div class="job-card">
                <p class="date">20 May, 2024</p>
                <h3>Web Developer</h3>
                <button class="open-modal-button" data-job="Web Developer">Apply</button>
            </div>
            <div class="job-card">
                <p class="date">20 May, 2024</p>
                <h3>Project Accountant</h3>
                <button class="open-modal-button" data-job="Project Accountant">Apply</button>
            </div>
            <div class="job-card">
                <p class="date">20 May, 2024</p>
                <h3>Mobile Developer</h3>
                <button class="open-modal-button" data-job="Mobile Developer">Apply</button>
            </div>
            <div class="job-card">
                <p class="date">20 May, 2024</p>
                <h3>Graphic Designer</h3>
                <button class="open-modal-button" data-job="Graphic Designer">Apply</button>
            </div>
            <div class="job-card">
                <p class="date">20 May, 2024</p>
                <h3>System Administrator</h3>
                <button class="open-modal-button" data-job="System Administrator">Apply</button>
            </div>
            <div class="job-card">
                <p class="date">20 May, 2024</p>
                <h3>Human Resources</h3>
                <button class="open-modal-button" data-job="Human Resources">Apply</button>
            </div>
        </div>
    </main>

<!-- Modal structure -->
<div id="modal" class="modal">
  <div class="modal-content">
    <button class="close-button" id="close-modal-button">&times;</button>
    <div id="modal-body">
      <h2>Apply for <span id="job-title"></span></h2>
      
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
</div>

<script>
    // JavaScript for handling the modal
    const modal = document.getElementById("modal");
    const closeModalButton = document.getElementById("close-modal-button");
    const modalBody = document.getElementById("modal-body");
    const jobTitleElement = document.getElementById("job-title");

    // Open modal when "Apply" button is clicked
    document.querySelectorAll(".open-modal-button").forEach(button => {
        button.addEventListener("click", () => {
            const jobTitle = button.getAttribute("data-job");
            jobTitleElement.textContent = jobTitle;
            modal.style.display = "flex";
        });
    });

    // Close modal
    closeModalButton.addEventListener("click", () => {
        modal.style.display = "none";
    });

    // Close modal if clicking outside of it
    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
</script>
</body>
</html>
