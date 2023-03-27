<?php


session_start();

if ($_SESSION['status'] != "Active") {
    header("location:login.html");
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
          <a href="login.html">Log out</a>
    </nav>
    <div class="company">
        <h2 class="logo"></i>DOCSAFE</h2>
    </div>
   </header>
    <!-- login -->
    <div class="background"></div>
    <div class="container">
        <center><br>
        <div class="des">
            <p>User Files<p>
        </div>
        <br>
        <table>
          <tr>
            <th>First Name</th>
            <th>Last name</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          <!-- <tr>
            <td>Alfreds Futterkiste</td>
            <td>Maria Anders</td>
            <td>Germany</td>
            <td><button class="btn">verify</button></td>
          <tr>
            <td>Centro comercial Moctezuma</td>
            <td>Francisco Chang</td>
            <td>Mexico</td>
            <td><button class="btn">verify</button></td>
          </tr>
          <tr>
            <td>Ernst Handel</td>
            <td>Roland Mendel</td>
            <td>Austria</td>
            <td><button class="btn">verify</button></td>
          </tr> -->
          <tbody>
      <?php 

      $dbhost = "localhost";
      $dbuser = "root";
      $dbpass = "";
      $db = "db";

      $conn = new mysqli($dbhost,$dbuser,$dbpass,$db)
      or die("Connection Failes: %s \n". $conn->error);
 
      $sql="SELECT * FROM `user` WHERE priv=1";
      
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        // Data starts from here
      while($row = $result->fetch_assoc())
        {
            echo "<tr>
                    <td>" . $row['fname'] . "</td>
                    <td>" . $row['lname'] . "</td>
                    <td>" . $row['validation'] . "</td>
                    <td><button><a class='btn' href='verify.php?id=" . $row['id'] . "'>verify</a></button></td>
                    
                  </tr>";
        }
      }
      else {
        echo "0 records";
      }
      
      $conn->close();

      ?>
    </tbody>
        </table></center>
    </div>
     <!-- SIGN UP FORM CREATION -->

    <script src="index.js"></script>
</body>


</html>