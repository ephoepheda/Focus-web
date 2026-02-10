<?php
session_start();

// Handle Login Logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // CHANGE THESE TO YOUR OWN PASSWORD
    $correct_username = "ephoepheda";
    $correct_password = "@epheda"; 

    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user === $correct_username && $pass === $correct_password) {
        // Set session variable
        $_SESSION['logged_in'] = true;
        // Redirect to admin panel
        header("Location: admin.php");
        exit;
    } else {
        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Using your main stylesheet -->
    
    <style>
        body { display: flex; align-items: center; justify-content: center; height: 100vh; background: #f4f4f4; }
        .login-box { background: white; padding: 40px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 300px; text-align: center; }
        .login-box input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        .error { color: red; font-size: 0.9rem; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="login-box">
        <i class="fas fa-lock fa-3x" style="color: var(--primary-color); margin-bottom: 20px;"></i>
        <h2>Admin Login</h2>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn" style="width: 100%;">Login</button>
        </form>
    </div>
</body>
</html>