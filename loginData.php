<?php
session_start();
require_once('connection.php');
if(isset($_POST['signin']))
{
 
if((empty($_POST['uname']))&&(empty($_POST['pass'])))
{
  header("location:signin.php?Empty=Please enter all the fields.");
}
elseif(empty($_POST['pass']))
{
   header("location:signin.php?Empty=Please enter your password.");
}
elseif(empty($_POST['uname']))
{
   header("location:signin.php?Empty=Please enter your username.");
}

else
{
  $uname=mysqli_escape_string($conn,$_POST['uname']);
  $password=mysqli_escape_string($conn,$_POST['pass']);

  $sql="SELECT * FROM Customer WHERE Username='$uname'";
  $result=mysqli_query($conn,$sql);
if($rows =mysqli_fetch_assoc($result))
{
  if($rows['Role']=='user')
  {
    $_SESSION['username']=$uname;
    header("location:index.php");
    exit();
  }
  elseif($rows['Role']=='admin')
  {
    $_SESSION['username']=$uname;
    header("location:dashboard.php");
    exit();
  } 
  else {
echo"There is something wrong";
header ('location:login.php'); 
}

}
}
}

?>