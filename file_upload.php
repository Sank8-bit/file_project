<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'db');
session_start();

if ($_SESSION['status'] != "Active") {
    header("location:login.html");
}
$id1=$_SESSION['id'];
// Uploads files
if (isset($_POST['submit'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename1 = $_FILES['file1']['name'];
    $filename2 = $_FILES['file2']['name'];
    $filename3 = $_FILES['file3']['name'];
    $filename4 = $_FILES['file4']['name'];
    $filename5 = $_FILES['file5']['name'];

    // destination of the file on the server
    $destination1 = 'uploads/' . $filename1 ;
    $destination2 = 'uploads/' . $filename2 ;
    $destination3 = 'uploads/' . $filename3 ;
    $destination4 = 'uploads/' . $filename4 ;
    $destination5 = 'uploads/' . $filename5 ;

    // get the file extension
    $extension1 = pathinfo($filename1, PATHINFO_EXTENSION);
    $extension2= pathinfo($filename2, PATHINFO_EXTENSION);
    $extension3 = pathinfo($filename3, PATHINFO_EXTENSION);
    $extension4 = pathinfo($filename4, PATHINFO_EXTENSION);
    $extension5 = pathinfo($filename5, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file1 = $_FILES['file1']['tmp_name'];
    $size1 = $_FILES['file1']['size'];
    $file2 = $_FILES['file2']['tmp_name'];
    $size2 = $_FILES['file2']['size'];
    $file3 = $_FILES['file3']['tmp_name'];
    $size3 = $_FILES['file3']['size'];
    $file4 = $_FILES['file4']['tmp_name'];
    $size4 = $_FILES['file4']['size'];
    $file5 = $_FILES['file5']['tmp_name'];
    $size5 = $_FILES['file5']['size'];

    
    if (!in_array($extension1, ['pdf'])) 
    {
       echo "<script>alert('Only pdf file allowed!')</script>";
        header("location:welcome.php");

    } 
    elseif ($_FILES['file1']['size'] > 10000000) 
    { // file shouldn't be larger than 1Megabyte
        echo "<script>alert('File too large!')</script>";
        header("location:welcome.php");
    } 
    

    elseif (!in_array($extension2, ['pdf'])) 
    {
        echo "<script>alert('Only pdf file allowed!')</script>";
        header("location:welcome.php");
    } 
    elseif ($_FILES['file2']['size'] > 10000000) 
    { // file shouldn't be larger than 1Megabyte
         echo "<script>alert('File too large!')</script>";
        header("location:welcome.php");
    } 
 
    elseif (!in_array($extension3, ['pdf'])) 
    {
        echo "<script>alert('Only pdf file allowed!')</script>";
        header("location:welcome.php");
    } 
    elseif ($_FILES['file3']['size'] > 10000000) 
    { // file shouldn't be larger than 1Megabyte
         echo "<script>alert('File too large!')</script>";
        header("location:welcome.php");
    } 
    

    elseif (!in_array($extension4, ['pdf'])) 
    {
        echo "<script>alert('Only pdf file allowed!')</script>";
        header("location:welcome.php");
    } 
    elseif ($_FILES['file4']['size'] > 10000000) 
    { // file shouldn't be larger than 1Megabyte
         echo "<script>alert('File too large!')</script>";
        header("location:welcome.php");
    } 
    

    elseif (!in_array($extension5, ['pdf'])) 
    {
        echo "<script>alert('Only pdf file allowed!')</script>";
        header("location:welcome.php");
    } 
    elseif ($_FILES['file5']['size'] > 10000000) 
    { // file shouldn't be larger than 1Megabyte
         echo "<script>alert('File too large!')</script>";
        header("location:welcome.php");
    } 
    else 
    {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file1, $destination1)) {
            $sql = "INSERT INTO file_uploads (file_name,id,validation) VALUES ('$filename1',$id1,'Not Verified')";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";

            }
        } 
        if (move_uploaded_file($file2, $destination2)) {
            $sql = "INSERT INTO file_uploads (file_name,id,validation) VALUES ('$filename2',$id1,'Not Verified')";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";

            }
        } 
        
        if (move_uploaded_file($file3, $destination3)) {
            $sql = "INSERT INTO file_uploads (file_name,id,validation) VALUES ('$filename3',$id1,'Not Verified')";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";

            }
        } 
        if (move_uploaded_file($file4, $destination4)) {
            $sql = "INSERT INTO file_uploads (file_name,id,validation) VALUES ('$filename4',$id1,'Not Verified')";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";

            }
        } 
        if (move_uploaded_file($file5, $destination5)) {
            $sql = "INSERT INTO file_uploads (file_name,id,validation) VALUES ('$filename5',$id1,'Not Verified')";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";

            }

        } 

        else {
            echo "Failed to upload file.";
        }
        $sql2 = "UPDATE `user` SET `validation`='Not Verified' WHERE id='$id1'";
        mysqli_query($conn, $sql2);
   
    }
    header("location:welcome.php");


}
