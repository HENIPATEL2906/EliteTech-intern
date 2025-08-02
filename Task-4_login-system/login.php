<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login_auth WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <nav>
        <div class="nav-left">
            <p class="nav-title">Authentication</p>
        </div>
        <div class="nav-right" style="width: 40%;">
            <a href="/">Home</a>
            <a href="/">About</a>
            <a href="/">Servies</a>
            <a href="/">Contact</a>
            <!-- <button type="button" id="btn-login">Login</button> -->
        </div>
    </nav>

    <div class="container" style="width: 30%;" >
        <h2>Login</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button class="btn" type="submit">Login</button><br>
            <p>Don't have Account? <a href="register.php">register</a></p>
        </form>
    </div>
</body>

</html>