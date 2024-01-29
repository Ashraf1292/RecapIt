<!DOCTYPE html>
<html>
<head>
    <title>Upload Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body, h1, h2, h3, h4, h5, h6 {
            font-family: "Raleway", sans-serif;
        }

        body, html {
            height: 100%;
            line-height: 1.8;
            background-color: #000;
            color: #fff;
        }

        /* Full height image header */
        .bgimg-1 {
            background-position: center;
            background-size: cover;
            background-image: url("/your-background-image.jpg");
            min-height: 100%;
        }

        .w3-bar .w3-button {
            padding: 16px;
        }

        /* Style your header text */
        .w3-display-left .w3-text-white {
            padding: 48px;
            background-color: rgba(0, 0, 0, 0.6);
        }

        /* Style your main content */
        .w3-container {
            padding: 64px 16px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        /* Style your buttons */
        .w3-button {
            background-color: #28282B;
            color: #fff;
            padding: 10px 20px;
            border: none;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .w3-button:hover {
            background-color: #2980b9;
        }

        /* Style your footer */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        /* File Upload Form Styles */
        .upload-form {
            margin-top: 20px;
        }

        /* Customize the rest of your content as needed */
    </style>
</head>
<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-card" id="myNavbar">
            <a href="#home" class="w3-bar-item w3-button w3-wide">LOGO</a>
            <div class="w3-right">
                <a href="#about" class="w3-bar-item w3-button">ABOUT</a>
                <a href="#upload" class="w3-bar-item w3-button">UPLOAD</a>
                <a href="#contact" class="w3-bar-item w3-button">CONTACT</a>
                <a href="Login.html" class="w3-bar-item w3-button">LOG IN</a>
                <a href="#SignIn.html" class="w3-bar-item w3-button">SIGN IN</a>
            </div>
        </div>
    </div>

    <!-- Upload Section -->
    <div class="w3-container" style="padding:128px 16px" id="upload">
        <h3 class="w3-center">UPLOAD YOUR FILE</h3>
        <p class="w3-center w3-large">Start uploading your files here</p>

        <!-- File Upload Form -->
        <form action="/upload" method="post" enctype="multipart/form-data" class="upload-form">
            <label for="file">Select a file:</label>
            <input type="file" name="file" id="file" accept=".pdf, .doc, .docx">
            <br>
            <input type="submit" value="Upload" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">
        </form>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2023 Your Web App</p>
    </footer>
</body>
</html>
