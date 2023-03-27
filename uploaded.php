<?php


session_start();

if ($_SESSION['status'] != "Active") {
    header("location:login.html");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- navbar -->
    <header class="header">
        <nav class="navbar">
        <a href="welcome.php">Home</a>
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
        <div class="items">
           <h1>Files Uploaded!</h1>
           <h1>verification Status : <?php 
           $connection = mysqli_connect('localhost','root','','db');
           if(!$connection){die("Connection Error -> ".mysqli_connect_error());}
           $id1=$_SESSION['id'];
           $sql = "SELECT * FROM `user` WHERE id = '$id1'";
           $result = mysqli_query($connection, $sql);
       
           if ($connection->query($sql) == TRUE) {
               while($row = $result->fetch_assoc())
               //while($row = mysql_fetch_array($result))
               {
                   $fiel1=$row["validation"];
                   
                   
                   //$res=echo ".$row['privilege']."
                   if($fiel1=="Not Verified")
                   {
                       echo "Verification in Progress";
                   }
                   
                   else{
                       
                    echo $fiel1;
       
                   }
                }
               }?></h1>
        </div>
    </div>
    <!-- SIGN UP FORM CREATION -->
    <script src="index.js"></script>
</body>

</html>