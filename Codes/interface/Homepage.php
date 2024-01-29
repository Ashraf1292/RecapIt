<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reminder Web App</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Add your custom styles if needed -->
    <style>
   
    .w3-top {
        position: relative;
    }

    .w3-bar {
        height: 40px; 
        width: 100%; 
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .w3-bar-item {
        flex: 1; /* flex property to distribute space evenly */
        text-align: center;
        
    }

    .w3-button-centered {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    #home {
        padding: 100px 0;
        text-align: center;
    }

    .bgimg-1 {
        background-position: center;
        background-size: cover;
        background-image: url('R (2).jpg'); /* background image */
        min-height: 100%;
    }

    .w3-large{
        text-align: center;
       
    }
    .w3-center{
        padding: 120px;
    }

</style>

</head>
<body>
    <!-- Navbar (sits on top) -->
    <div class="w3-top">
        <div class="w3-bar">
            <a href="Features.php" class="w3-bar-item w3-button">FEATURES</a>
            <a href="Signup.php" class="w3-bar-item w3-button">SIGNUP</a>
            <a href="Login.php" class="w3-bar-item w3-button">LOGIN</a>
            <a href="Support.php" class="w3-bar-item w3-button">SUPPORT</a>
        </div>
    </div>

    <!-- Header with full-height image -->
    <header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
        <div class="w3-center">
            <br>
            <br>
            <span class="w3-large">Welcome to the Reminder Web App<br>
            <span class="w3-large">Extract and summarize highlighted text from your books effortlessly.</span>
        </div>
       
    </header>

    <p class="w3-button-centered">
        <a href="Signup.php" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Get Started</a>
    </p>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2023 Reminder Web App</p>
    </footer>
</body>
</html>
