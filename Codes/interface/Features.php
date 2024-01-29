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
    /* Add your custom styles for navigation bar and button alignment */
    .w3-top {
        position: relative;
    }

    .w3-bar {
        height: 40px; /* Adjust the height as needed */
        width: 100%; /* Set the width to 100% to make it full-width */
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .w3-bar-item {
        flex: 1; /* Use flex property to distribute space evenly */
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
        background-size: 100% 100%;
        background-image: url('lib5.png'); /* Replace with your actual image */
        min-height: 100%;
        background-repeat: no-repeat;
    }

    .w3-display-bottomleft {
        position: absolute;
        bottom: 0;
        left: 0;
    }

    .w3-large {
        font-size: 18px;
    }

    /* Additional style for the instruction section */
    #instructions {
        padding: 50px;
        text-align: left;
    }

    </style>

</head>
<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-card">
            <a href="Homepage.php" class="w3-bar-item w3-button w3-wide">HOME</a>
            <a href="Signup.php" class="w3-bar-item w3-button">SIGNUP</a>
            <a href="Login.php" class="w3-bar-item w3-button">LOGIN</a>
            <a href="Profile.php" class="w3-bar-item w3-button">PROFILE</a>
        </div>
    </div>

    <!-- Header with full-height image -->
    <header class="bgimg-1 w3-display-container w3-grayscale-min" id="support">
        <div class="w3-center w3-bottom w3-text-white">
            <br>
            <br>
            <span class="w3-xxlarge w3-hide-large w3-hide-medium">Welcome to the Reminder Web App</span><br>
        </div>
        <div class="w3-display-bottomleft w3-text-grey w3-large" style="padding:24px 48px">
            <!-- Add your social media links/icons here -->
        </div>
    </header>

    <!-- Instruction Section -->
    <div id="instructions">
        <h2>How to Use Reminder Web App</h2>
        <p>
            To get started with the Reminder Web App, follow these steps:
        </p>
        <ol>
            <li>Create a profile by signing up and logging in.</li>
            <li>From your profile, upload the desired book in PDF format.</li>
            <li>Highlight the specific contents you want summarized.</li>
            <li>Set the timer for the email delivery in your profile settings.</li>
            <li>Receive a summarized version of your selected contents in your email at the scheduled time.</li>
        </ol>
        <p>
            Enjoy using the Reminder Web App for efficient book summarization and timely email delivery!
        </p>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2023 Reminder Web App</p>
    </footer>
</body>
</html>
