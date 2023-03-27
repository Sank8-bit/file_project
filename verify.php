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
        <a href="adminwelcome.php">Home</a>
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
        <?php 
      $id1=$_GET['id'];
      $dbhost = "localhost";
      $dbuser = "root";
      $dbpass = "";
      $db = "db";

      $conn = new mysqli($dbhost,$dbuser,$dbpass,$db)
      or die("Connection Failes: %s \n". $conn->error);
 
      $sql="SELECT * FROM `user` WHERE id='$id1'";
      
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        // Data starts from here
      while($row = $result->fetch_assoc())
        {
          $finame=$row['fname'];
          $laname=$row['lname'];
          echo "<p>$finame $laname</p>";
        }
      }
      else {
        echo "0 records";
      }
      
      $conn->close();

      ?>
        </div>
        <br>
        <table>
          <tr>
            <th>File name</th>
            <th>File</th>
            <th>verification action</th>
          </tr>
          <!-- <tr>
            <td>Alfreds Futterkiste</td>
            <td><button class="btnn">verify</button><button class="btnn">Deny</button></td>
          </tr> --> 
          <?php 
      $id1=$_GET['id'];
      $dbhost = "localhost";
      $dbuser = "root";
      $dbpass = "";
      $db = "db";
      $verr="Verified";
      $verr1="Not Verified";
      $conn = new mysqli($dbhost,$dbuser,$dbpass,$db)
      or die("Connection Failes: %s \n". $conn->error);
 
      $sql="SELECT * FROM `file_uploads` WHERE id='$id1'";
      $i=1;
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        // Data starts from here
        //echo "<td rowspan='5'><button class='btn' name='login' value='login'>Login</button></td>";
        
      while($row = $result->fetch_assoc())
        {
          $name=$row['file_name'];
            echo "<tr>
                    <td>" . $row['file_name'] . "</td>
						       <td> <iframe src='uploads/$name'></iframe>   </td>";
                   if ($i==1) 
                   {
                   echo "<form action='update_status.php' method='post'><td rowspan='5'><a class='btn' href='update_status.php?id=" . $id1 . "&&val=$verr'>Approve</a><br><br><br><br><br>
                   <a class='btn' href='update_status.php?id=" . $id1 . "&&value=.$verr1.'>Reject</a></td></form>"; 
                   
                   $i++;                
                   }
                  echo "</tr>";
        }
      }
      else {
        echo "0 records";
      }
      
      $conn->close();

      ?>
        </table></center>
    </div>
     <!-- SIGN UP FORM CREATION -->

    <script src="index.js"></script>
</body>


</html>
