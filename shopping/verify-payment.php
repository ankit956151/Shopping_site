<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{   
    header('location:login.php');
}
else{
    mysqli_query($con,"update orders set paymentMethod='online' where userId='".$_SESSION['id']."' and paymentMethod is null ");
	unset($_SESSION['cart']);
	header('location:order-history.php');
}
?>