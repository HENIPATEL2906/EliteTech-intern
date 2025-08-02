<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO login_auth (first_name, last_name, phone, email, gender, username, password)
            VALUES ('$first_name', '$last_name', '$phone', '$email', '$gender', '$username', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        echo "<p>Registration successful. <a href='login.php' style='margin-right: 40px;'>Login here</a></p>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <script>
    function validateForm() {
        var pwd = document.getElementById("password").value;
        var cpwd = document.getElementById("confirm_password").value;
        if (pwd !== cpwd) {
            alert("Passwords do not match!");
            return false;
        }
        return true;
    }
    </script>
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

    <div class="container" style="margin-top: 100px;">
        
        <h2>Register</h2>
        <form method="post" onsubmit="return validateForm();">
            <div class="box">
                <input type="text" name="first_name" style="margin-right: 10px;" placeholder="First Name" required ><br>
                <input type="text" name="last_name" style="margin-left: 10px;" placeholder="Last Name" required><br>
            </div>
            <div class="box">
                <input type="text" name="phone" style="margin-right: 10px;" placeholder="Phone Number" required><br>
                <input type="email" name="email" style="margin-left: 10px;" placeholder="Email" required><br>
            </div>

            <label>
                <p>Gender:</p>
                <select name="gender" required>
                    <option value="">--Select--</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </label>

            <input type="text" name="username" placeholder="Username" required><br>

            <div class="box">
                <input type="password" id="password" name="password" style="margin-right: 10px;" placeholder="Password" required><br>
                <input type="password" id="confirm_password" name="confirm_password" style="margin-left: 10px;" placeholder="Confirm Password" required><br>
            </div>

            <button type="submit" class="btn">Register</button><br>
            <p>Already have Account? <a href="login.php">login</a></p>
        </form>
    </div>
</body>

</html>