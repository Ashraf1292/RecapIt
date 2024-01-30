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
    $bookId = $_GET['book_id'];
    $sql = "SELECT Book, FileContent FROM book WHERE Book_ID = $bookId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $book = $row['Book'];
        $fileContent = $row['FileContent'];
    } else {
        die("Book not found");
    }
} else {
    die("Book ID not provided");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $book; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <h2><?php echo $book; ?></h2>
    <p>File Content:</p>
    <pre><?php echo $fileContent; ?></pre>
</body>

</html>
