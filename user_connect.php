<?php
if(isset($_POST['login']))
{
	session_start();

	$id = $_POST['id'];
	$filename = $_POST['filename'];

	$connection = mysqli_connect('localhost','root','','db');
	if(!$connection){die("Connection Error -> ".mysqli_connect_error());}

	$sql = "SELECT * FROM `file_uploads` WHERE filename = '$username' AND pass = '$password'";
	$result = mysqli_query($connection, $sql);

    if ($connection->query($sql) == TRUE) {
		while($row = $result->fetch_assoc())
		//while($row = mysql_fetch_array($result))
		{
			$fiel1=$row["priv"];
			
			echo $fiel1;
			//$res=echo ".$row['privilege']."
			if($fiel1==0)
			{
				echo $fiel1;
				header("refresh:1, url=adminwelcome.html");
				echo "New record created successfully";
			}
			
			elseif($fiel1==1){
				header("refresh:1, url=welcome.html");
				echo "New record created successfully";

			}
		}
       // header("refresh:1, url=welcome.html");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
}


?>