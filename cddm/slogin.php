<?php
session_start();
$error='';
if(isset($_POST['submit'])){
if(empty($_POST['un']) || empty($_POST['pw'])){
	$error="Enter both Username or Password";
}
else
{
	$un=$_POST['un'];
	$pw=$_POST['pw'];
	$connection=mysqli_connect("Localhost","root","");
	$db=mysqli_select_db($connection,"elpa");
	
	$quer=mysqli_query($connection,"select * from customers 
		where Username='$un' and Password='$pw'");
	$query=mysqli_query($connection,"select * from customer 
		where password='$pw' and username='$un'");
	$rows=mysqli_num_rows($query);
	$rowss=mysqli_num_rows($quer);
	if($rows==1)
	{
		while($ee=mysqli_fetch_array($query))
		{
		$_SESSION['login_user']=$ee['ID'];

		header("location:http://localhost:8080/ec/index.php");
		}
	}
	elseif ($rowss==1) {
		while($ee=mysqli_fetch_array($quer))
		{
		$_SESSION['login_user']=$ee['customer_number'];
		header("location:http://localhost:8080/cddm/aindex.php");
		}
	}
	else
	{
		$error="Invalid Username or Password";
	}
	mysqli_close($connection);
}
}
?>
