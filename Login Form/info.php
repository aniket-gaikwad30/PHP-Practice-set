<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Info Page</title>
</head>
<body>
  <h1>Submitted Info</h1>

  <?php
  if (isset($_GET['username']) && isset($_GET['password'])) {
      // Escape output to prevent XSS
      $username = htmlspecialchars($_GET['username']);
      $password = htmlspecialchars($_GET['password']);

      echo "<p>Username: $username</p>";
      echo "<p>Password: $password</p>";
  } else {
      echo "<p>No login data received.</p>";
  }
  ?>
</body>
</html>
