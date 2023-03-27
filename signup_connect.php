<?php
if(isset($_POST['submit']))
{
	session_start();
    echo "New record created successfully";

	$user = $_POST['user_name'];
	$pass = $_POST['password'];
    $finame = $_POST['fname'];
	$laname = $_POST['lname'];
    $prive = $_POST['priv'];
	$connection = mysqli_connect('localhost','root','','db');
	if(!$connection){die("Connection Error -> ".mysqli_connect_error());}
    
    $sql2="INSERT INTO `user`( `fname`, `lname`,`priv`,`validation`) VALUES ('$finame','$laname','$prive','Files Not Uploaded')";
	$result = mysqli_query($connection, $sql2);
	//$num = mysqli_num_rows($result);
	// if($num==1)
	// {
	// 	echo "LOGIN SUCCESSFUL";
	// 	header("refresh:1, url=welcome.html");
	// }
	// else
	// {
	// 	echo "<script>alert('incorrect id or password')</script>";
	// 	echo "<script>location.href='login.php'</script>";
	// }
    $sql = "SELECT * FROM `user` WHERE fname = '$finame' AND lname = '$laname'";
    $result1 = mysqli_query($connection, $sql);
    if ($connection->query($sql) == TRUE) {
        
		while($row = $result1->fetch_assoc())
		//while($row = mysql_fetch_array($result))
		{
			$fiel1=$row["id"];
            $sql1="INSERT INTO `login`( `username`, `pass`,`id`,`priv`) VALUES ('$user','$pass','$fiel1','$prive')";
            mysqli_query($connection, $sql1);
		}
        echo"User Created Succesfully";
       header("refresh:1, url=login.html");
      } 
}


?>