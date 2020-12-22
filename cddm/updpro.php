<?php
include('session.php');

$fn="";
$ln="";
$ba="";
$cn="";
$pw="";
$rid="";
 $afn="";
    $aln="";
    $aem="";
    $apn="";
    $aun="";
    $apw="";
$conn=mysqli_connect("localhost","root","");
$dbs=mysqli_select_db($conn,"elpa");
//if (isset($_POST['submit1'])) {
  $rid=$_SESSION['login_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Account</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="shortcut icon" type="image/x-icon" href="logo.jpg">
    <style type="text/css">
  @charset "UTF-8";
.loginbox1{
width: 700px;
height: 780px;
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
.loginbox1 input[type="password"]{
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
    	   <h1>Update Account</h1>
        <form>
         
          <?php
  

//if (isset($_POST['submit1'])) {
 // $rid=$_POST['rid'];
 // $fn=$_POST['fn'];
 // $ln=$_POST['ln'];
 // $ba=$_POST['ba'];
 // $cn=$_POST['cn'];
 // $dt=$_POST['dt'];
  

$sqls="select * from customers where customer_number='$rid'";
/*$sqls="insert into customers(customer_firstname,customer_lastname,customer_phonenumber,customer_email,house_blueprint,personal_id,house_no,kebele,subcity,woreda,Username,Password)
values('$fn','$ln','$pn','$em','$bp','$pid,'$hno','$keb','$sc','$wor','$un','$pw')";*/
$query=mysqli_query($conn,$sqls);
  $rows=mysqli_num_rows($query);
  if($rows==1)
  {
    while($ee=mysqli_fetch_array($query))
    {
      $afn=$ee['customer_firstname'];
    $aln=$ee['customer_lastname'];
    $aem=$ee['customer_email'];
    $apn=$ee['customer_phonenumber'];
    $aun=$ee['username'];
     $apw=$ee['password'];

    //header("location:http://localhost:8080/elpa/ass/ehome.php");
    }
  }
          ?>

          <p>Customer First Name</p>
          <input type="text" name="fn" value="<?php echo $afn; ?>">
          <p>Customer Last Name</p>
          <input type="text" name="ln" value="<?php echo $aln; ?>">
          <p>Bill Amount</p>
          <input type="text" name="ba" value="<?php echo $aem; ?>">
          <p>Phone Number</p>
          <input type="text" name="cn" value="<?php echo $apn; ?>">
         <p> Username</p>
          <input type="text" name="un" value="<?php echo $aun; ?>">
          <p> Password</p>
         
          <input id="password" type="Password" name="pw" value="<?php echo $apw; ?>">
          <span>
         
          <i id="eye" class="fa fa-eye" onclick="myfunction()"></i></span>
          <script>
            var state = false;
            function myfunction(){
              if(state){
                document.getElementById("password").setAttribute("type","password");
                state=false;
              }
              else{
 document.getElementById("password").setAttribute("type","text");
                state=true;
              }
            }

          </script>
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
//}
if (isset($_POST['submit'])) {
  $rrid=$rid;
  //$rrid=$_POST['rid'];
  $fn=$_POST['fn'];
  $ln=$_POST['ln'];
  $ba=$_POST['ba'];
  $cn=$_POST['cn'];
    $un=$_POST['un'];
     $pw=$_POST['pw'];
 // $dt=$_POST['dt'];
  
  
//$conn=mysqli_connect("localhost","root","");
//$dbs=mysqli_select_db($conn,"elpa");
$sqls="update customers 
set customer_firstname='$fn',customer_lastname='$ln',customer_email='$ba',customer_phonenumber='$cn',username='$un',password='$pw' where customer_number='$rrid'";
/*$sqls="insert into customers(customer_firstname,customer_lastname,customer_phonenumber,customer_email,house_blueprint,personal_id,house_no,kebele,subcity,woreda,Username,Password)
values('$fn','$ln','$pn','$em','$bp','$pid,'$hno','$keb','$sc','$wor','$un','$pw')";*/
if('$fn'!="" and '$ln'!="" and '$dt'!="" and '$ba'!="" and '$cn'!="")
{
mysqli_query($conn,$sqls);
//header("location:http://localhost:8080/elpa/ass/nhome.php");
echo "Profile Updated";
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