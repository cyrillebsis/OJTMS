<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submit Application</title>
  <link rel="stylesheet" href="applycss.css">
</head>
<body>
  <div class="container">
    <button class="back-button">&#x2190;</button>
    <h1>Submit Application</h1>
    <form action="#" method="post" enctype="multipart/form-data">
      <div class="form-row">
        <div class="form-group">
          <label for="school-name">Name of School</label>
          <input type="text" id="school-name" name="school-name" required>
        </div>
        <div class="form-group">
          <label for="course">Course / Program</label>
          <input type="text" id="course" name="course" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="address">School Address</label>
          <input type="text" id="address" name="address" required>
        </div>
        <div class="form-group">
          <label for="email">Email Address (School)</label>
          <input type="email" id="email" name="email" required>
        </div>
      </div>
      <div class="form-row upload-section">
        <label for="resume" class="upload-label">
          <span>Upload your Resume here</span>
          <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
        </label>
      </div>
      <button type="submit" class="submit-button">Submit</button>
    </form>
  </div>
</body>
</html>
