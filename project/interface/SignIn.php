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
    $sql = "INSERT INTO user (User_ID, User_Name, Email, Password) VALUES ('$user_name', '$email', '$hashed_password')";

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

<!DOCTYPE html>
<html>
<head>
<title>Sign In - Reminder Web App</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
  background-color: #161513; /* Set the background color to black */
  color: #fff; /* Set text color to white */
}

/* Style your main content */
.w3-container {
  padding: 64px 16px;
  background-color: #000; /* Set your content background color to black */
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  width: 50%; /* Set the width of the container */
  margin: 0 auto; 
}

/* Add a subtle gray background to sections */
.section-bg {
  background-color: #161513; /* Gray background color */
}

/* Style your buttons */
.w3-button {
  background-color: #000;
  color: #fff;
  padding: 44px 16px;
  border: none;
  text-decoration: none;
  transition: background-color 0.3s ease;
}

.w3-button:hover {
  background-color: #2980b9;
}

/* Style your footer */
footer {
  background-color: #000;
  color: #fff;
  text-align: center;
  padding: 10px;
}

/* Customize the rest of your content as needed */
/* Adjust the width of the input fields */
.w3-input[type="text"],
.w3-input[type="password"] {
  width: 100%; /* Change the width as needed */
  margin-right: 10%; /* Add some spacing between the inputs */
}

</style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide">LOGO</a>

      <a href="#about" class="w3-bar-item w3-button">ABOUT</a>
      <a href="#contact" class="w3-bar-item w3-button">CONTACT</a>
      <a href="login.html" class="w3-bar-item w3-button">LOG IN</a>
      <a href="#signup" class="w3-bar-item w3-button">SIGN UP</a> <!-- Link to the sign-up page -->
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    
  </div>
</div>

<!-- Sign In Form -->
<div class="w3-container section-bg" style="padding: 64px 16px;" id="signin">
  <h2 class="w3-center 23-bottom">Sign In</h2>
  <form class="w3-container w3-card-4">
    <label><b>User Name</b></label>
    <input class="w3-input w3-border" type="text" placeholder="Create your User Name" name="user_name" required>

    <label><b>Email</b></label>
    <input class="w3-input w3-border" type="text" placeholder="Enter your email" name="email" required>

    <label><b>Password</b></label>
    <input class="w3-input w3-border" type="password" placeholder="Enter your password" name="psw" required>

    <button class="w3-button w3-block w3-black w3-section w3-padding" type="submit">Sign In</button>
  </form>
</div>

<!-- Footer Section -->
<footer>
  <p>&copy; 2023 Reminder Web App</p>
</footer>

</body>
</html>
