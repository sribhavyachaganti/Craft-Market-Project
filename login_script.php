<?php
require ("includes/common.php");
session_start();

$email=$_POST['lemail'];
$email=mysqli_real_escape_string($con,$email);

$password=$_POST['lpassword'];
$password=mysqli_real_escape_string($con,$password);
$password=md5($password);

$query="SELECT id,email_id,password,status from users where email_id='".$email."' and  password='".$password."'";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
if($num==0){
    $m = "Please enter correct E-mail id and Password";
    header('location: index.php?errorl='.$m);
}else{
    $row = mysqli_fetch_array($result);
    $_SESSION['email'] = $row['email_id'];
    $_SESSION['user_id'] = $row['id'];
    if ($row['status'] == 'admin') {
        // Redirect to admin panel if the user is an admin
        header('location: admin.php');
    } else {
        // Redirect to regular user page if the user is not an admin
        header('location: products.php');
    }
}



?>