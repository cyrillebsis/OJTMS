<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Internship Jobs</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #0d0d25;
      color: white;
    }
    .container {
      padding: 20px;
    }
    .title {
      text-align: center;
      margin-bottom: 20px;
    }
    .jobs-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
    }
    .job-card {
      background-color: #f2f2f2;
      color: #333;
      border-radius: 10px;
      padding: 20px;
      text-align: center;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .job-card h3 {
      margin: 5px 0;
    }
    .job-card button {
      background: black;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 20px;
  cursor: pointer;
  font-size: 0.9rem;
  transition: background 0.3s;
  position: relative;
   top: 15%;
  left: 30%;
      cursor: pointer;
    }
    .job-card button:hover {
      background-color: #333;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="title">Internship Jobs</h1>
    <div class="jobs-grid">
      <div class="job-card" style="background-color: #f9eecb;">
        <small>20 May, 2024</small>
        <h3>Web Developer</h3>
        <button class="job-card" class>Apply</button>
      </div>
      <div class="job-card" style="background-color: #fbd4d4;">
        <small>20 May, 2024</small>
        <h3>Project Accountant</h3>
        <button>Apply</button>
      </div>
      <div class="job-card" style="background-color: #d9f0f6;">
        <small>20 May, 2024</small>
        <h3>Mobile Developer</h3>
        <button>Apply</button>
      </div>
      <div class="job-card" style="background-color: #e5f9e0;">
        <small>20 May, 2024</small>
        <h3>Graphic Designer</h3>
        <button>Apply</button>
      </div>
      <div class="job-card" style="background-color: #e0f5f9;">
        <small>20 May, 2024</small>
        <h3>System Administrator</h3>
        <button>Apply</button>
      </div>
      <div class="job-card" style="background-color: #dff6ff;">
        <small>20 May, 2024</small>
        <h3>Human Resources</h3>
        <button>Apply</button>
      </div>
    </div>
  </div>
</body>
</html>
