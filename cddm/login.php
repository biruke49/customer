<?php
include('slogin.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up Page</title>
</head>
<script type="text/javascript">
function validateinput()
{
var a=document.forms["formm"]["fname"].value;
var b=document.forms["formm"]["lname"].value;
var c=document.forms["formm"]["email"].value;
var d=document.forms["formm"]["phone"].value;


if(a=="" || a==null/* && b="" && c="" && d="" && e="" && f=""*/)
{
alert("First name is required");
}
else if(b="")
{
	alert("Last name is required");
}
else if(c="")
{
	alert("Email is required");
}
else if(d="")
{
	alert("Phonenumber is required");
}
}
</script>
<style type="text/css">
	@charset "UTF-8";
body{
	margin: 0;
	padding: 0;

	font-family: sans-serif;
background-image: url(14.jpg);
background-size: cover;
background-position: center;
}

.signup{
	width: 270px;
	box-shadow: 0 0 3px 0 rgba(0,0,0,0,3);
	background: #fff;
	padding: 20px;
	margin: 8% auto 0;
	text-align: center;
	margin-left:75%;
}
.signup h1{
	color: #1c8adb;
	margin-bottom: 30px;
}
.inputbox{
	border-radius: 20px;
	padding: 10px;
	margin: 10px 0;
	width: 100%;
	border:1px solid #999;
	outline: none;
}
.inputbox:focus{
	border:2px solid #1c8adb;
}



.but
{
	background-color: #1c8adb;
	color: #fff;
	width: 110%;
	padding: 10px;
	border-radius: 20px;
	font-size: 15px;
	margin: 10px 0;
	border: none;
	outline: none;
	cursor: pointer;
}
.but:hover{
	background-color: black;
	color: white;
}


a{
	text-decoration: none;
}
hr{
	margin-top: 20px;
	width:90%;
	margin-left: 0;
}
img{
	width: 100px;

border-radius: 100px;
}

</style>
<body>
	<?php$error="";?>
	<form method="POST" name="formm" onsubmit="validateinput()">
<div class="signup">
	<br><br><br><br><br><br>
	<img src="32.png">
	<h1>Sign In</h1>
	<form>
		<table border="0">
			<tr><td><input name="un" type="text" class="inputbox" placeholder="Username"></td></tr>
			<tr><td><input name="pw" type="password" class="inputbox" placeholder="Password"></td></tr>
			
			<tr><td colspan="2"><input class="but" type="submit" name="submit" value="Sign In"></td></tr>
				<tr><td><?php echo ($error); ?></td></tr>
			
		
<table>
</form>
<div>
<body>
<html>
