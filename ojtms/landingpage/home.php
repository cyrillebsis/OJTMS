<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Jobs</title>
    <link rel="stylesheet" href="home.css">
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
                <button id="open-modal-button" onclick="document.location='CREATE/account.php'">Apply</button>
            </div>
            <div class="job-card">
                <p class="date">20 May, 2024</p>
                <h3>Project Accountant</h3>
                <button id="open-modal-button" onclick="document.location='create-account-form.php'">Apply</button>
            </div>
            <div class="job-card">
                <p class="date">20 May, 2024</p>
                <h3>Mobile Developer</h3>
                <button id="open-modal-button" onclick="document.location='create-account-form.php'">Apply</button>
            </div>
            <div class="job-card">
                <p class="date">20 May, 2024</p>
                <h3>Graphic Designer</h3>
                <button id="open-modal-button" onclick="document.location='create-account-form.php'">Apply</button>
            </div>
            <div class="job-card">
                <p class="date">20 May, 2024</p>
                <h3>System Administrator</h3>
                <button id="open-modal-button" onclick="document.location='create-account-form.php'">Apply</button>
            </div>
            <div class="job-card">
                <p class="date">20 May, 2024</p>
                <h3>Human Resources</h3>
                <button id="open-modal-button" onclick="document.location='create-account-form.php'">Apply</button>
            </div>
        </div>
    </main>
    <!-- Modal structure -->
<div id="modal" class="modal">
  <div class="modal-content">
    <button class="close-button" id="close-modal-button">&times;</button>
    <div id="modal-body">
      <!-- Form content will be loaded here dynamically -->
    </div>
  </div>
</div>
    <script src="scripts/main.js"></script>
</body>
</html>
