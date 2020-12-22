<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Admin Homepage</title>
    <link rel="stylesheet" href="style.css"> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"> 
      <link rel="shortcut icon" type="image/x-icon" href="logo.jpg">
    <script src="https://kit.fontawesome.com/36dca2c339.js" crossorigin="anonymous"></script>

</head>
<body> 
	
<header>
	<nav>
		<div class="logo">
			<a href="aindex.php"><img width="65px" height="65px"  src="logo1000.jpg"></a>
		</div>
		<ul>
			
			<li><a href="#">Manage <i class="fas fa-angle-down"></i></a>
				<ul>
        <li><a href="addemp.php">Complaint</a></li>
					<li><a href="upimg.php">Bill</a></li>
					
					<li><a href="rep.php">Record</a></li>
				</ul>
   			</li>
			<li><a href="updpro.php">Account <i class="fas fa-angle-down"></i></a>
				<ul>
					<li><a href="updpro.php">My Account</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>	
	</nav>
</header>
<h1>WELCOME <?php echo $_SESSION['login_user']?></h1>
<div class="social">
	<a href="https://www.facebook.com/EEUOfficial/" target="_blank">Facebook<i class="fa fa-facebook-official" aria-hidden="true"></i></a>
	<a href="mailto:eeucommunication@gmail.com" target="_blank">Email<i class="fa fa-envelope" aria-hidden="true"></i>
</i></a>
	<a href="https://twitter.com/EEUEthiopia" target="_blank">Twitter<i class="fa fa-twitter" aria-hidden="true"></i></a>

</div>

</body>
</html>