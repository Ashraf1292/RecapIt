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

// Check if the file parameter is set in the URL
if (isset($_GET['file'])) {
    // Filename to be downloaded
    $filename = $_GET['file'];

    // Fetch FileContent from the database
    $stmt = $conn->prepare("SELECT FileContent FROM book WHERE Book = ?");
    $stmt->bind_param("s", $filename);
    $stmt->execute();
    $stmt->bind_result($fileContent);

    if ($stmt->fetch()) {
        // Set appropriate headers for download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . strlen($fileContent));

        // Output the FileContent to the browser
        echo $fileContent;
    } else {
        echo 'File not found.';
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    echo 'Invalid request.';
}
?>
