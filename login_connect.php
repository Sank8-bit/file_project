<?php
if(isset($_POST['login']))
{
	session_start();

	$username = $_POST['user_name'];
	$password = $_POST['password'];

	$connection = mysqli_connect('localhost','root','','db');
	if(!$connection){die("Connection Error -> ".mysqli_connect_error());}

	$sql = "SELECT * FROM `login` WHERE username = '$username' AND pass = '$password'";
	$result = mysqli_query($connection, $sql);

    if ($connection->query($sql) == TRUE) {
		while($row = $result->fetch_assoc())
		//while($row = mysql_fetch_array($result))
		{
			$fiel1=$row["priv"];
			$fiel2=$row["id"];
			$_SESSION['id'] = $fiel2;
			echo $fiel1;
			//$res=echo ".$row['privilege']."
			if($fiel1==0)
			{
				echo $fiel1;
				header("refresh:1, url=adminwelcome.php");
				echo "New record created successfully";
				$_SESSION['status'] = "Active";
				
				
			}
			
			elseif($fiel1==1){
				header("refresh:1, url=welcome.php");
				echo "New record created successfully";
				$_SESSION['status'] = "Active";

			}
		}
       // header("refresh:1, url=welcome.html");
      } 
	  else {
        echo "Error: " . $sql . "<br>" . $conn->error;
		header("refresh:1, url=login.html");
      }
}


?>