<?php
session_start();
require_once('connection.php');
if(isset($_POST['loginSubmit']))
{
 
 $password=$_POST['txtPass'];
 $userType=$_POST['user_type'];
 
 
if((empty($_POST['Uname']))&&(empty($password)))
{
  header("location:login.php?Empty=Please enter all the fields.");
}
elseif(empty($password))
{
   header("location:login.php?Empty=Please enter your password.");
}
elseif(empty($_POST['Uname']))
{
   header("location:login.php?Empty=Please enter your username.");
}

else
{
  $uname=mysqli_escape_string($conn,$_POST['Uname']);
  $password=mysqli_escape_string($conn,$_POST['txtPass']);

  $sql="SELECT * FROM login WHERE Username='$uname'";
  $result=mysqli_query($conn,$sql);
if($rows =mysqli_fetch_assoc($result))
{
  if($rows['UserType']=='user')
  {
    $_SESSION['username']=$username;
    header("location:index.php");
    exit();
  }
  elseif($rows['UserType']=='admin')
  {
    $_SESSION['username']=$username;
    header("location:dashboard.php");
    exit();
  } 
  else {
echo'There is something wrong';
header ('location:login.php'); 
}

}
}
}

?>