<?php
// Start or resume the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
    // If not logged in, redirect to the login page
    header("Location: Login.php");
    exit();
}

// Get the user's name from the session
$user_name = $_SESSION['user_name'];

// Check if a registration message is present
if (isset($_GET['message'])) {
    $registrationMessage = urldecode($_GET['message']);
    echo "<p>$registrationMessage</p>";
}

// Handle logout
if (isset($_GET['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page after logout
    header("Location: Login.php");
    exit();
}

// Check if file is uploaded
if (isset($_POST['submit'])) {
    $targetDir = "E:/XAMPP/htdocs/RecapIt/flop/interface/uploads/";
    $targetFile = $targetDir . basename($_FILES["pdfFile"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is PDF and less than 2MB
    if ($fileType != "pdf" || $_FILES["pdfFile"]["size"] > 2000000) {
        echo "Error: Only PDF files less than 2MB are allowed to upload.";
    } else {
        // Move uploaded file to uploads folder
        if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
            $filename = $_FILES["pdfFile"]["name"];
            $folder_path = $targetDir;
            $time_stamp = date('Y-m-d H:i:s');

            // Assuming you have a database connection established earlier
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "data";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve User_ID based on User_Name
            $user_id_query = "SELECT User_ID FROM User WHERE User_Name = '$user_name'";
            $result = $conn->query($user_id_query);

            if ($result->num_rows > 0) {
                // Fetch the User_ID
                $row = $result->fetch_assoc();
                $user_id = $row['User_ID'];

                // Insert into file_upload table with User_ID
                $sql = "INSERT INTO file_upload (file_name, file_path, time_stamp, Users_ID)
                        VALUES ('$filename', '$folder_path', '$time_stamp', '$user_id')";

                if ($conn->query($sql) === TRUE) {
                    echo "File uploaded successfully.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error retrieving User_ID.";
            }

            // Close the database connection
            $conn->close();
        } else {
            echo "Error uploading file.";
        }
    }
}
header("Location: upload.php");
exit();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Profile - Reminder Web App</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Add your custom styles for navigation bar and background image */
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

        #profile {
            padding: 100px 0;
            text-align: center;
            background-position: center;
            background-size: cover;
            background-image: url('lib3.jpg'); /* Replace with your actual image */
            min-height: 100%;
        }

        .w3-display-bottomleft {
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .w3-large {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-card">
            <a href="Homepage.php" class="w3-bar-item w3-button w3-wide">HOME</a>
            <a href="#features" class="w3-bar-item w3-button">FEATURES</a>
            <a href="?logout=1" class="w3-bar-item w3-button">LOGOUT</a>
            <a href="Support.php" class="w3-bar-item w3-button">SUPPORT</a>
            <a href="Upload.php" class="w3-bar-item w3-button">UPLOAD</a>
        </div>
    </div>

    <!-- Your Profile Content -->
    <div class="w3-container section-bg" id="profile">
        <h2 class="w3-center 23-bottom">Your Profile</h2>
        <p class="w3-center">Welcome to your profile, <?php echo $user_name; ?>!</p>
        <!-- Add more content specific to the user's profile as needed -->
        
         <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="pdfFile">Select PDF File:</label>
            <input type="file" name="pdfFile" class="form-control-file" id="pdfFile">
    </div>
    <br>
    <br>
    <div>
    <button type="submit" name="submit" class="btn btn-primary btn-block">Upload File</button>
    </form>
    
    </div>
    <!-- Add more content specific to the user's profile as needed -->
</div>

<style>
    .upload-button {
        background-color: black;
        color: white;
        padding: 10px;
        cursor: pointer;
        transition: background-color 0.3s;
        height: 40px;
        width: 100px;
        align-items: center; 
        border-radius: 5px;
    }

    .upload-button:hover {
        background-color: white;
        color: black;
    }
</style>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2023 Reminder Web App</p>
    </footer>
</body>
</html>
