<!DOCTYPE html>
<html>
<head>
    <title>Sign In - Reminder Web App</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top w3-right">
        <div class="w3-bar w3-white w3-card" id="myNavbar">
            <a href="#home" class="w3-bar-item w3-button w3-wide">LOGO</a>
            <a href="#about" class="w3-bar-item w3-button w3-right">ABOUT</a>
            <a href="#contact" class="w3-bar-item w3-button w3-right">CONTACT</a>
            <a href="login.html" class="w3-bar-item w3-button w3-right">LOG IN</a>
            <a href="#signup" class="w3-bar-item w3-button w3-right">SIGN UP</a>
        </div>
    </div>

    <!-- Include the sign-in form from register.php -->
    <?php include('register.php'); ?>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2023 Reminder Web App</p>
    </footer>
</body>
</html>
