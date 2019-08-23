<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['change']))
{

if ($_POST[""] != 0)
  {
        echo "<script>alert('invalid');</script>" ;
    } 
        
        else {
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=($_POST['newpassword']);
  $sql ="SELECT EmailId FROM tblstudents WHERE EmailId=$email and MobileNumber=$mobile";
   $result = mysqli_query($dbh,$sql);
$query=mysqli_execute();
if($query -> rowCount() > 0)
{
$con="update tblstudents set Password=:newpassword where EmailId=$email and MobileNumber=$mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1=mysqli_execute();


echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
}
}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>KCMIT Library Management System | Password Recovery </title>
  
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
  
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    
    <link href="assets/css/style.css" rel="stylesheet" />
   
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>

</head>
<body>
   
<?php include('includes/header.php');?>

<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">User Password Recovery</h4>
</div>
</div>
             
         
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 LOGIN FORM
</div>
<div class="panel-body">
<form role="form" name="chngpwd" method="post" onSubmit="return valid();">

<div class="form-group">
<label>Enter Reg Email id</label>
<input class="form-control" type="email" name="email" required autocomplete="off" />
</div>

<div class="form-group">
<label>Enter Reg Mobile No</label>
<input class="form-control" type="text" name="mobile" required autocomplete="off" />
</div>

<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="newpassword" required autocomplete="off"  />
</div>

<div class="form-group">
<label>ConfirmPassword</label>
<input class="form-control" type="password" name="confirmpassword" required autocomplete="off"  />
</div>

 

 <button type="submit" name="change" class="btn btn-info">Change Password</button> | <a href="index.php">Login</a>
</form>
 </div>
</div>
</div>
</div>  
          
             
 
    </div>
    </div>
  
 <?php include('includes/footer.php');?>
      
    <script src="assets/js/jquery-1.10.2.js"></script>
   
    <script src="assets/js/bootstrap.js"></script>
     
    <script src="assets/js/custom.js"></script>

</body>
</html>
