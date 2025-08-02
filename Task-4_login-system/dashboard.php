<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <!-- ✅ CSS link placed here -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="container">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>This is your secured dashboard.</p>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>
