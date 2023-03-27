<?php

    $id1=$_GET['id'];
    $verr2=$_GET['val'];
	session_start();
	$connection = mysqli_connect('localhost','root','','db');
	if(!$connection){die("Connection Error -> ".mysqli_connect_error());}
    if ($verr2 == "Verified")
    {
        $sql1 = "UPDATE `file_uploads` SET `validation` = 'Verified' WHERE id='$id1'";
        $sql2 = "UPDATE `user` SET `validation`='Verified' WHERE id='$id1'";
        echo "Record Updated successfully";
    }
    else{
       $sql1 ="UPDATE `file_uploads` SET `validation` = 'Rejected' WHERE id='$id1'";
       $sql2 = "UPDATE `user` SET `validation`='Rejected' WHERE id='$id1'";
    }
    //$sql2="INSERT INTO `user`( `fname`, `lname`,`priv`,`validation`) VALUES ('$finame','$laname','$prive','Not Verified')";
	mysqli_query($connection, $sql1);
    mysqli_query($connection, $sql2);
    if ($connection->query($sql1) == TRUE)
    {
        header("refresh:1, url=adminwelcome.php");

    }


?>