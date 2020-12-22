<?php
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,"payment");
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($connection,"select ID from customer where ID='$user_check'");
$row=mysqli_fetch_assoc($ses_sql);
$login_session=$row['ID'];
if (!isset($login_session)) {
	mysqli_close($connection);
	//header("location:http://localhost:8080/ass/login.php");
}
?>