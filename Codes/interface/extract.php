<?php
if(isset($_GET['file'])) {
    $file_name = $_GET['file'];

    // Assuming the file path is stored in the 'file_path' column of the 'file_upload' table
    $file_path_query = "SELECT file_path FROM file_upload WHERE file_name = '$file_name'";
    $result_file_path = $conn->query($file_path_query);

    if ($result_file_path->num_rows > 0) {
        $row_file_path = $result_file_path->fetch_assoc();
        $file_path = $row_file_path['file_path'];

        // Run the extract.py script to summarize the text
        $command = "python test1.py " . escapeshellarg($file_path);
        $output = shell_exec($command);

        // Display the result
        echo $output;
    } else {
        echo "Error retrieving file path.";
    }
} else {
    echo "Invalid request.";
}
?>
