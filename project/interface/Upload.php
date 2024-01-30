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
        /* Add your custom styles for the navigation bar and background image */
        .w3-top {
            position: relative;
        }

        .w3-bar {
            height: 40px;
            /* Adjust the height as needed */
            width: 100%;
            /* Set the width to 100% to make it full-width */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .w3-bar-item {
            flex: 1;
            /* Use flex property to distribute space evenly */
            text-align: center;
        }

        #profile {
            padding: 100px 0;
            text-align: center;
            background-position: center;
            background-size: cover;
            /* Replace with your actual image */
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

        .summarize-btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <script>
        function summarizeBook(fileName) {
            // Assuming a common file_path for all files
            var filePath = "E:/XAMPP/htdocs/RecapIt/flop/interface/uploads/";

            // Send an AJAX request to the server for summarization
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        alert("Summarization completed successfully. Check the file_path for the summarized text.");
                        // You can add any additional logic here after summarization.
                    } else {
                        alert("Error during summarization.");
                    }
                }
            };

            // Concatenate file_path and file_name
            var fullPath = filePath + fileName;

            // Encode the file path for safe URL transmission
            var encodedFullPath = encodeURIComponent(fullPath);

            // Set up the AJAX request
            xhr.open("GET", "Upload.php?action=summarize&file=" + encodedFullPath, true);
            xhr.send();
        }
    </script>
</head>

<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-card">
            <a href="Homepage.php" class="w3-bar-item w3-button w3-wide">HOME</a>
            <a href="#features" class="w3-bar-item w3-button">FEATURES</a>
            <a href="?logout=1" class="w3-bar-item w3-button">LOGOUT</a>
            <a href="Support.php" class="w3-bar-item w3-button">SUPPORT</a>
            <a href="Profile.php" class="w3-bar-item w3-button">PROFILE</a>
        </div>
    </div>

    <?php
    // Start or resume the session
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['user_name'])) {
        // If not logged in, redirect to the login page
        header("Location: Login.php");
        exit();
    }

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

    // Fetch User_ID based on User_Name
    $user_name = $_SESSION['user_name'];
    $user_id_query = "SELECT User_ID FROM User WHERE User_Name = '$user_name'";
    $result_user_id = $conn->query($user_id_query);

    if ($result_user_id->num_rows > 0) {
        $row_user_id = $result_user_id->fetch_assoc();
        $user_id = $row_user_id['User_ID'];

        // Fetch file names and timestamps for the user
        $file_query = "SELECT file_name, time_stamp, file_path FROM file_upload WHERE Users_ID = '$user_id'";
        $result_files = $conn->query($file_query);

        if ($result_files->num_rows > 0) {
            // Display the file names and timestamps in a table
            echo "<style>
                    table {
                        width: 90%;
                        margin: auto;
                        border-collapse: collapse;
                        text-align: center;
                        margin-top: 20px;
                    }
                    th, td {
                        border: 1px solid #ddd;
                        padding: 8px;
                    }
                    th {
                        background-color: #000;
                        color: white;
                    }
                </style>";
            echo "<table border='1'>
                <tr>
                    <th>Book Name</th>
                    <th>Date Uploaded</th>
                    <th>Summarize</th>
                </tr>";

            while ($row_file = $result_files->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row_file['file_name'] . "</td>
                        <td>" . $row_file['time_stamp'] . "</td>
                        <td><button class='summarize-btn' onclick='summarizeBook(\"" . $row_file['file_name'] . "\")'>Summarize</button></td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "No books uploaded by the user.";
        }
    } else {
        echo "Error retrieving User_ID.";
    }

    // Close the database connection
    $conn->close();

    // Handle the summarization action
    if (isset($_GET['action']) && $_GET['action'] == 'summarize' && isset($_GET['file'])) {
        $encodedFullPath = $_GET['file'];

        // Decode the file path
        $fullPath = urldecode($encodedFullPath);

        // Run the extract.py script to summarize the text
        $command = "python extractor.py " . escapeshellarg($fullPath);
        echo $command;
        $output = shell_exec($command);

        // Display the result
        echo "<p>Summarization Output: <br>" . nl2br($output) . "</p>";
    }
    ?>

    <!-- Add more content specific to the user's profile as needed -->
    <div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2023 Reminder Web App</p>
    </footer>
</body>

</html>
