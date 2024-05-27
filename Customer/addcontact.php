<?php
    include("../connection.php");
    $fullName=$_POST['fullName'];
    $emailAddress=$_POST['emailAddress'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $query="INSERT INTO `contact`( `name`, `email`, `subject`, `message`) VALUES('$fullName','$emailAddress','$subject','$message')";
    $result=mysqli_query($db,$query);
    if($result==true)
    {
        header("Location:contact .php");
    }
?>