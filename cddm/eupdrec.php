<?php
$fn="";
$ln="";
$ba="";
$cn="";
$rid="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="shortcut icon" type="image/x-icon" href="logo.jpg">
    <style type="text/css">
  @charset "UTF-8";
.loginbox1{
width: 700px;
height: 750px;
background: #000;
color:#fff;
top: 70%;
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
    width: 100%;
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
    	   <h1>Update Record</h1>
        <form>
         <p>Record ID</p>
          <input type="text" name="rid" placeholder="Enter Record ID" value="<?php echo $rid; ?>">
          <input type="submit" name="submit1" value="Retrieve">
          <?php
  
$conn=mysqli_connect("localhost","root","");
$dbs=mysqli_select_db($conn,"elpa");
if (isset($_POST['submit1'])) {
  $rid=$_POST['rid'];
 // $fn=$_POST['fn'];
 // $ln=$_POST['ln'];
 // $ba=$_POST['ba'];
 // $cn=$_POST['cn'];
 // $dt=$_POST['dt'];
  

$sqls="select * from record where record_id='$rid'";
/*$sqls="insert into customers(customer_firstname,customer_lastname,customer_phonenumber,customer_email,house_blueprint,personal_id,house_no,kebele,subcity,woreda,Username,Password)
values('$fn','$ln','$pn','$em','$bp','$pid,'$hno','$keb','$sc','$wor','$un','$pw')";*/
$query=mysqli_query($conn,$sqls);
  $rows=mysqli_num_rows($query);
  if($rows==1)
  {
    while($ee=mysqli_fetch_array($query))
    {
      $cnum=$ee['c_number'];
    $fn=$ee['customer_firstname'];
    $ln=$ee['customer_lastname'];
    $ba=$ee['bill_amount'];
    $cn=$ee['complaint_number'];

    //header("location:http://localhost:8080/elpa/ass/ehome.php");
    }
  }
          ?>

          <p>Customer First Name</p>
          <input type="text" name="fn" value="<?php echo $fn; ?>">
          <p>Customer Last Name</p>
          <input type="text" name="ln" value="<?php echo $ln; ?>">
          <p>Bill Amount</p>
          <input type="text" name="ba" value="<?php echo $ba; ?>">
          <p>Complaint Number</p>
          <input type="text" name="cn" value="<?php echo $cn; ?>">
         
          <input type="submit" name="submit" value="Submit">

          <input type="submit" name="submit" value="Reset">
         
        </form>
     

<?php

if('$fn'!="" and '$ln'!="" and '$dt'!="" and '$ba'!="" and '$cn'!="")
{
mysqli_query($conn,$sqls);
//header("location:http://localhost:8080/elpa/ass/nhome.php");
}
else
{
  echo "Data must be filled";
}
}
if (isset($_POST['submit'])) {
  $rrid=$_POST['rid'];
  $fn=$_POST['fn'];
  $ln=$_POST['ln'];
  $ba=$_POST['ba'];
  $cn=$_POST['cn'];
 // $dt=$_POST['dt'];
  
  
//$conn=mysqli_connect("localhost","root","");
//$dbs=mysqli_select_db($conn,"elpa");
$sqls="update record 
set customer_firstname='$fn',customer_lastname='$ln',bill_amount='$ba',complaint_number='$cn' where record_id='$rrid'";
/*$sqls="insert into customers(customer_firstname,customer_lastname,customer_phonenumber,customer_email,house_blueprint,personal_id,house_no,kebele,subcity,woreda,Username,Password)
values('$fn','$ln','$pn','$em','$bp','$pid,'$hno','$keb','$sc','$wor','$un','$pw')";*/
if('$fn'!="" and '$ln'!="" and '$dt'!="" and '$ba'!="" and '$cn'!="")
{
mysqli_query($conn,$sqls);
//header("location:http://localhost:8080/elpa/ass/nhome.php");
echo "Record Updated";
}
else
{
  echo "Data must be filled";
}
}
?>
 </div>
</body>
</html>