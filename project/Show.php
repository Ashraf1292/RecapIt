<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Book_ID, Book, UploadTime, Content FROM book";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Uploaded Files - Reminder Web App</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   
    <style>
        /* Add your custom styles for navigation bar and background image */
        .w3-top {
            position: relative;
        }

        .w3-bar {
            background-color: #000f50;
            height: 40px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .w3-bar-item {
            flex: 1;
            text-align: center;
            color: #fff;
        }

        #profile {
            padding: 100px 0;
    text-align: center;
    background-position: center;
    background-size: cover;
    background-image: url('interface/PL.jpg'); /* Replace with the path to your background image */
    height: 555px;
    color:#fff;
    text-shadow:2px 0 #000, -2px 0 #000, 0 2px #000, 0 -2px #000,
            1px 1px #000, -1px -1px #000, 1px -1px #000, -1px 1px #000;
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
            border: 2px  #fff;
            text-align: center;
            color:#fff;
            text-shadow:2px 0 #000, -2px 0 #000, 0 2px #000, 0 -2px #000,
            1px 1px #000, -1px -1px #000, 1px -1px #000, -1px 1px #000;
            box-shadow: 0px 0px 36px 15px rgba(0.28, 0.28, 0.28, 0.28);
        }

        th, td {
            padding: 15px;
        }
    </style>
</head>

<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-card" style="background-color: #000f50;">
            <a href="http://localhost/project/interface/Profile.php" class="w3-bar-item w3-button">GO BACK</a>
        </div>
    </div>

    <div class="w3-container section-bg" id="profile">
        <h2 class="w3-center 23-bottom">Uploaded Files</h2>
        <p class="w3-center">List of files uploaded with their upload times</p>

        <table>
            <thead>
                <tr>
                    <th>Book</th>
                    <th>Time Uploaded</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><a href='download_book.php?book_id={$row['Book_ID']}' target='_blank'>{$row['Book']}</a></td>";
                    echo "<td>{$row['UploadTime']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
