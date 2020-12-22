<?php
include('slogin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="shortcut icon" type="image/x-icon" href="logo.jpg">
    <style type="text/css">
  @charset "UTF-8";
.loginbox1{
width: 730px;
height: 520px;
background: #000;
color:#fff;
top: 50%;
left: 40%;
position:absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 67px 30px;
opacity: 85%;
}
h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px; 
}
.loginbox1 p{
    margin: 0;
    padding: 0;
    font-weight: bold;

}
.loginbox1 input{
    width: 50%;
    margin-bottom: 20px;

}
.loginbox1 input[type="text"],input[type="password"]{
    border:none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;

}
.loginbox1 input[type="submit"]{
    border:none;
    outline: none;
    height: 40px;
    background: #333;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.loginbox1 input[type="submit"]:hover{
    cursor: pointer;
    background: red;
    color: white;

}
.loginbox1 a{
    text-decoration: none;
    line-height: 20px; 
    color: darkgrey;
}
.loginbox1 a:hover{
    color: #ffc107;
}

</style>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"> 
    <script src="https://kit.fontawesome.com/36dca2c339.js" crossorigin="anonymous"></script>
</head>

<body> 
<header>
	<nav>
		<div class="logo">
			<a href="eindex.php"><img width="65px" height="65px"  src="logo1000.jpg"></a>
		</div>
		<ul>
			<li><a href="eindex.php">Home</a></li>
			<li><a href="#">Manage <i class="fas fa-angle-down"></i></a>
				<ul>
					<li><a href="eaddcus.php">Add Customer</a></li>
					<li><a href="eenrec.php">Enter Record</a></li>
					
					<li><a href="eupdrec.php">Update Record</a></li>
					
					<li><a href="erep.php">Report</a></li>

				</ul>
   			</li>
			<li><a href="eupdpro.php">Account <i class="fas fa-angle-down"></i></a>
				<ul>
					 <li><a href="eupdpro.php">My Account</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>	
	</nav>
</header>
 
<div class="social">
   <a href="https://www.facebook.com/EEUOfficial/">Facebook<i class="fa fa-facebook-official" aria-hidden="true"></i></a>
  <a href="mailto:eeucommunication@gmail.com">Email<i class="fa fa-envelope" aria-hidden="true"></i>
</i></a>
  <a href="https://twitter.com/EEUEthiopia">Twitter<i class="fa fa-twitter" aria-hidden="true"></i></a>
</div>
<form method="POST">
	<div class="loginbox1">  
    	   
      <?php
$conn=mysqli_connect("localhost","root","");
$dbs=mysqli_select_db($conn,"elpa");
$sqls="select * from record";
$sear=mysqli_query($conn,$sqls);
$rows=mysqli_num_rows($sear);
if ($rows) { 
  echo "<table border=1 cellspacing=5>";
  echo "<tr><td colspan='6'><h2><center>Records</center></h2></td>";
  echo "<tr>";
  echo "<th>Record ID</th>";
echo "<th>Customer First Name</th>";
echo "<th>Customer Last Name</th>";
echo "<th>Record Date</th>";
echo "<th>Bill Amount</th>";
echo "<th>Complaint Number</th>";
echo "</tr>";
while ($rec=mysqli_fetch_array($sear)) {
  echo "<tr>";
  echo "<td>".$rec['record_id']."</td>";
echo "<td>".$rec['customer_firstname']."</td>";
echo "<td>".$rec['customer_lastname']."</td>";
echo "<td>".$rec['r_date']."</td>";
echo "<td>".$rec['bill_amount']."</td>";
echo "<td>".$rec['complaint_number']."</td></tr>";

//echo "<td>".$rec['Fname']."</td></tr>";

}
}
else
echo "No Records";
?>
  
</div>
</body>
</html>
