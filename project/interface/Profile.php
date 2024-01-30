<?php
// Start or resume the session
session_start();


// Check if file is uploaded and is a .txt file
if (isset($_POST['submit'])) {
    $targetDir = "E:/XAMPP/htdocs/project/admin/uploads/";
    $targetFile = $targetDir . basename($_FILES["txtFile"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is a .txt file and less than 2MB
    if ($fileType != "txt" || $_FILES["txtFile"]["size"] > 2000000) {
        echo "Error: Only .txt files less than 2MB are allowed to upload.";
    } else {
        // Move uploaded file to uploads folder
        if (move_uploaded_file($_FILES["txtFile"]["tmp_name"], $targetFile)) {
            $filename = $_FILES["txtFile"]["name"];
            $folder_path = $targetDir;
            $time_stamp = date('Y-m-d H:i:s');

           
            // Read the content of the file
            $fileContent = file_get_contents($targetFile);

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

            // Insert into book table with Book and FileContent columns
            $stmt = $conn->prepare("INSERT INTO book (Book, UploadTime, FileContent) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $filename, $time_stamp, $fileContent);
            
            if ($stmt->execute()) {
                echo "File uploaded successfully.";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the database connection
            $stmt->close();
            $conn->close();
        } else {
            echo "Error uploading file.";
        }
    }
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Your Profile - Reminder Web App</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="E:/XAMPP/htdocs/project/css/style.css">
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
            background-color: #000f50;
            

        }

        .w3-bar-item {
            flex: 1; /* Use flex property to distribute space evenly */
            text-align: center;
            color:#fff;
            text-decoration:none;
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .w3-bar-item:not(:last-child) {
        border-right: 1px solid #fff; 
        /* Add a white vertical line to all items except the last one */
    }

    .w3-bar::before {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        width: 1px; /* Adjust the width of the vertical line */
        background-color: #fff; /* Set the color of the vertical line */
    }

        #profile {
            padding: 100px 0;
            text-align: center;
            background-position:  1px 0px;
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url('R (2).jpg'); /* Replace with your actual image */
            height:341px;
            width:1216px;
        }

        .w3-display-bottomleft {
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .w3-large {
            font-size: 18px;
        }
        .form-container {
        text-align: center;
        color:#fff;
        font-size: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .btn-block {
        width: 50%; /* Set the desired width */
        display: block;
        margin: auto; /* Set auto margins to center the button horizontally */
    }
    </style>
</head>
<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
        <div class="w3-bar w3-white w3-card">
            <a href="http://localhost/project/admin/book.php" class="w3-bar-item w3-button w3-wide">MAIN</a>
            <a href="http://127.0.0.1:5001/" class="w3-bar-item w3-button">EXTRACT</a>
            <a href="http://127.0.0.1:5000/" class="w3-bar-item w3-button">SUMMARIZE</a>
            <a href="http://localhost/project/Show.php" class="w3-bar-item w3-button">BOOKS</a>
        </div>
    </div>

    <!-- Your Profile Content -->
    <div class="w3-container section-bg" id="profile">
    </div>

    <div class="form-container">
    <form method="post" enctype="multipart/form-data">
        <!-- Your form content here -->
        <div class="form-group">
            <label for="txtFile">Select Text File (.txt):</label>
            <input type="file" name="txtFile" class="form-control-file" id="txtFile" accept=".txt">
        </div>
        <br>
        <br>
        <div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Upload File</button>
        </div>
    </form>
</div>


</body>
</html>
