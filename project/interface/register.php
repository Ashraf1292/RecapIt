<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if (isset($_POST["submit"])) {
    $user_name = $_POST["user_name"];
    $email = $_POST["email"];
    $password = $_POST["psw"];

    // Hash the password for security (you should use a strong hashing algorithm)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert user data into the 'user' table
    $sql = "INSERT INTO user (User_Name, Email, Password) VALUES ('$user_name', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful
        echo "Registration successful!";
    } else {
        // Registration failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!-- Sign In Form -->
\<div class="w3-container section-bg" style="padding: 64px 16px;" id="signin">
    <!-- Container content -->
    <h2 class="w3-center 23-bottom">Sign In</h2>
    <form class="w3-container w3-card-4" method="POST" action="">
        <label><b>User Name</b></label>
        <input class="w3-input w3-border" type="text" placeholder="Create your User Name" name="user_name" required>
        <label><b>Email</b></label>
        <input class="w3-input w3-border" type="text" placeholder="Enter your Email" name="email" required>
        <label><b>Password</b></label>
        <input class="w3-input w3-border" type="password" placeholder="Enter your password" name="psw" required>
        <button class="w3-button w3-block w3-black w3-section w3-padding" type="submit" name="submit" value="">Sign In</button>
    </form>
</div>
