<?php
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

// Fetch data from the book table
$sql = "SELECT Book, UploadTime FROM book";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Uploaded Files - Reminder Web App</title>
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

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
            text-align: center;
        }

        th, td {
            padding: 15px;
        }
    </style>
</head>

<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-card">
            <a href="http://localhost/project/interface/Profile.php" class="w3-bar-item w3-button">GO BACK</a>
        </div>
    </div>

    <!-- Uploaded Files Content -->
    <div class="w3-container section-bg" id="profile">
        <h2 class="w3-center 23-bottom">Uploaded Files</h2>
        <p class="w3-center">List of files uploaded with their upload times</p>

        <!-- Display the table -->
        <table>
            <thead>
                <tr>
                    <th>Book</th>
                    <th>Time Uploaded</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through the results and display data in the table
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['Book']}</td>";
                    echo "<td>{$row['UploadTime']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
            </Body>
            </html
