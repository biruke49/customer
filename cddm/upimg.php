<?php
session_start();
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
width: 400px;
height: 400px;
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

.total{
    font-size:16px;
}
</style>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"> 
    <script src="https://kit.fontawesome.com/36dca2c339.js" crossorigin="anonymous"></script>
</head>

<body> 
<header>
	<nav>
		<div class="logo">
			<a href="aindex.php"><img width="65px" height="65px"  src="logo1000.jpg"></a>
		</div>
		<ul>
			<li><a href="aindex.php">Home</a></li>
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
 
<div class="social">
  <a href="https://www.facebook.com/EEUOfficial/">Facebook<i class="fa fa-facebook-official" aria-hidden="true"></i></a>
  <a href="mailto:eeucommunication@gmail.com">Email<i class="fa fa-envelope" aria-hidden="true"></i>
</i></a>
  <a href="https://twitter.com/EEUEthiopia">Twitter<i class="fa fa-twitter" aria-hidden="true"></i></a>
</div>
<form method="POST">
	<div class="loginbox1">  
<body>
  Meter Reading  <input type="text" name="meter">         
     <input type="submit" name="submit" id="submit">    
      <?php
    if (isset($_POST['submit'])) {
      $id=$_SESSION['login_user'];
      $cmr=$_POST['meter'];
$conn=mysqli_connect("localhost","root","");
$dbs=mysqli_select_db($conn,"elpa");
$sqls="select * from record where c_number='$id'";
$sear=mysqli_query($conn,$sqls);
$rows=mysqli_num_rows($sear);
if ($rows) { 
  echo "<table border=1 cellspacing=5>";
  
 
while ($rec=mysqli_fetch_array($sear)) {
$pmr = $rec['Previous_reading'];
$nbill=$cmr - $pmr;

if($nbill <= '50'){
    $nbill=$nbill*0.273;
}
elseif($nbill>'50' && $nbill<='100'){
    $nbill=$nbill*0.6644;
}
elseif($nbill>'100' && $nbill<='200'){
    $nbill=$nbill*1.3436;
}
elseif($nbill>'200' && $nbill<='300'){
    $nbill=$nbill*1.6375;
}
elseif($nbill>'300' && $nbill<='400'){
    $nbill=$nbill*1.7917;
}
elseif($nbill>'400' && $nbill<='500'){
    $nbill=$nbill*1.9508;
}
else
$nbill=$nbill*2.0343;
echo "<br><strong>Your Current Bill is: ".$nbill." Birr</strong>";



}
}
else
echo "No Records";
?>
           
<?php
if (isset($_POST['dele'])) {
$uid=$_POST['uid'];
$conn=mysqli_connect("localhost","root","");
$dbs=mysqli_select_db($conn,"elpa");
$sqld="delete from record where record_id='$uid'";
$qwe=mysqli_query($conn,$sqld);
if ($qwe) {
echo "Record Deleted";
}
}
    }
?>
</div>
</body>
</html>
