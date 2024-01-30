<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['book_id'])) {
    $bookID = $_GET['book_id'];

    // Fetch content from the database based on Book_ID
    $stmt = $conn->prepare("SELECT Content, Book FROM book WHERE Book_ID = ?");
    $stmt->bind_param("i", $bookID);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($content, $bookName);
        $stmt->fetch();

        // Provide the content for download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $bookName . '.txt"');
        echo $content;
    } else {
        echo "Book not found.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
