<?php
require_once 'dbconfig.php';

if (isset($_POST['submit'])) {
    $name = isset($_POST['register_name']) ? $_POST['register_name'] : '';
    $email = isset($_POST['register_email']) ? $_POST['register_email'] : '';
    $mobno = isset($_POST['register_mobno']) ? $_POST['register_mobno'] : '';
    $password = isset($_POST['register_password']) ? $_POST['register_password'] : '';

    if (empty($name) || empty($email) || empty($mobno) || empty($password)) {
        echo "Please fill in all required fields.";
    } else {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // SQL query to insert user data into the database
        $sql = "INSERT INTO users (name, email, mobno, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssss", $name, $email, $mobno, $hashedPassword);

            if ($stmt->execute()) {
                // Registration successful
                echo "Registration successful. You can now log in.";
            } else {
                // Registration failed
                echo "Registration failed: " . $stmt->error;
            }

            $stmt->close();
        } else {
            // Error in preparing the statement
            echo "Error in database query: " . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="content" id="dynamic-content">
    <div class="form-container" id="register-form">
        <h2>Register</h2>
        <form method="post" action="signup.php">
            <div class="form-group">
                <label for="user-name">Name</label>
                <input id="user-name" type="text" name="register_name" required>
            </div>
            <div class="form-group">
                <label for="user-email">Email</label>
                <input id="user-email" type="email" name="register_email" required>
            </div>
            <div class="form-group">
                <label for="user-mobno">Phone Number</label>
                <input id="user-mobno" type="number" name="register_mobno" inputmode="numeric" required>
            </div>
            <div class="form-group">
                <label for="user-password">Password</label>
                <input id="user-password" type="password" name="register_password" required>
            </div>
            <div class="form-actions">
            <button type="submit" name="submit">Register</button>
            </div>
            <div class="switch-form">
                Already have an account? <a href="login" id="show-login-form">Login here</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
