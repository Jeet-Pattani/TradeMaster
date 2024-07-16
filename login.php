<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<?php
  include 'sidebar.php';
  ?>
  <div class="content" id="dynamic-content">
  <div class="form-container" id="login-form">
        <h2>Login</h2>
        <form method="post">
            <div class="form-group">
                <label for="user-email">Email</label>
                <input id="user-email" type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="user-password">Password</label>
                <input id="user-password" type="password" name="password" required>
            </div>
            <div class="form-actions">
                <button type="submit">Login</button>
            </div>
            <div class="switch-form">
                Don't have an account? <a href="signup" id="show-register-form">Register here</a>
            </div>
        </form>
    </div>

    
  </div>
    
</body>
</html>
