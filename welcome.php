<?php


session_start();

if ($_SESSION['status'] != "Active") {
    header("location:login.html");
}
$connection = mysqli_connect('localhost','root','','db');
if(!$connection){die("Connection Error -> ".mysqli_connect_error());}
$id1=$_SESSION['id'];
$sql = "SELECT * FROM `file_uploads` WHERE id='$id1'";
$result = mysqli_query($connection, $sql);
if ($connection->query($sql) == TRUE) {
    if($result->num_rows>0)
    {
        header("refresh:1, url=uploaded.php");
    }
   // header("refresh:1, url=welcome.html");
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DS</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!-- navbar -->
    <header class="header">
        <nav class="navbar">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
            <a href="#">Help</a>
            <a href="login.html">log out</a>
        </nav>
        <div class="company">
            <h2 class="logo"></i>DOCSAFE</h2>
        </div>
    </header>
    <!-- login -->
    <div class="background"></div>
    <div class="container">
        <div class="item">
            <div class="text-item">
                <h2>Hey User<br></h2>
                <h3>Upload files here</h3>
            </div>
        </div>
        <div class="login-section">
            <div class="form-box login">


                <form id="uploadForm" action="file_upload.php" method="POST" enctype="multipart/form-data">
                    <label for="file">
                        <h2>File upload</h2>
                    </label>
                    <div class="input-box">
                        <input type="file" id="file" name="file1" required>
                    </div>

                    <div class="input-box">
                        <input type="file" id="file" name="file2" required>
                    </div>

                    <div class="input-box">
                        <input type="file" id="file" name="file3" required>
                    </div>

                    <div class="input-box">
                        <input type="file" id="file" name="file4" required>
                    </div>

                    <div class="input-box">
                        <input type="file" id="file" name="file5" required>
                    </div>

                    <button class="btn" type="submit" name="submit" value="submit">submit</button>
                    <!-- <button class="btn"><input name="submit" type="submit" value="submit"></button> -->
                </form>

            </div>
        </div>
    </div>
    <!-- SIGN UP FORM CREATION -->

    <script src="index.js"></script>
</body>


</html>