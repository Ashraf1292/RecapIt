<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signup - Reminder Web App</title>
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
            height: 40px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .w3-bar-item {
            flex: 1;
            text-align: center;
        }

        .w3-button-centered {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        

        .signup-container {
            background-image: url('R (2).jpg');
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .signup-box {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
            color: #000;
        }

        #signup-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #signup-form button {
            width: 100%;
            padding: 10px;
            background-color: #b3b3b3;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #signup-form button:hover {
            background-color: #000;
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-card">
            <a href="Homepage.php" class="w3-bar-item w3-button w3-wide">HOME</a>
            <a href="Login.php" class="w3-bar-item w3-button">LOGIN</a>
            <a href="#downloads" class="w3-bar-item w3-button">FEATURES</a>
            <a href="#support" class="w3-bar-item w3-button">SUPPORT</a>
        </div>
    </div>

    <!-- Signup Page Content -->
    <div class="signup-container">
        <div class="signup-box">
            <h2>Signup</h2>
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
        // Redirect to Login page with registration message
        header("Location: Login.php?message=" . urlencode("Registration Successful, now you can use your credentials to login"));
        exit();
    } else {
        // Registration failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>


            <form id="signup-form" method="POST" action="">
                <input type="text" placeholder="Enter Username" name="user_name" required>
                <input type="text" placeholder="Enter Email" name="email" required>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <button type="submit" name="submit">Signup</button>
            </form>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2023 Reminder Web App</p>
    </footer>
</body>

</html>
