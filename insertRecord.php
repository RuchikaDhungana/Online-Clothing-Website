<?php

$servername = '127.0.0.1';
$username = 'root'; //your standard uni id
$password = ''; // the password found on the W: drive
$databaseName = 'blossom'; //the name of the db you are using on phpMyAdmin
$conn= mysqli_connect($servername, $username, $password, $databaseName) or exit("Unable to connect to database!");


if(isset($_POST['loginSubmit']))
{
$firstName=$_POST['fname'];
 $secondName =$_POST['sname'];
 $password=$_POST['txtPass'];
 $gender=$_POST['Gender'];
 $age =$_POST['age'];

if((empty($_POST['Uname']))||(empty($_POST['txtPass']))||(empty($_POST['txtEmail']))||(empty($_POST['fname']))||(empty($_POST['sname'])))
{
  echo "Please fill all the fields.";
}

else 
  {
    if (!filter_var($_POST['txtEmail'], FILTER_VALIDATE_EMAIL))
{
  echo "The email is not valid.";
}

else
{
  $uname=mysqli_escape_string($conn,$_POST['Uname']);
  $sql_u = "SELECT * FROM login WHERE Username='$uname'";
   $result_U=mysqli_query($conn,$sql_u);
//Checking if username is available
if(mysqli_num_rows($result_U)>0)
{
  echo "Sorry!Username already taken.";
   
}
else
{
  $email=mysqli_escape_string($conn,$_POST['txtEmail']);
  $sql_e = "SELECT * FROM login WHERE Email='$email'";
  $result_e=mysqli_query($conn,$sql_e);
  if (mysqli_num_rows($result_e)>0)
   {
     echo "Sorry!Email already taken.";
  }
  
else
{
   $insert= "INSERT INTO login (Firstname,Surname,Email,Username,Password,Gender,Age) VALUES ('$firstName','$secondName','$email','$uname','$password','$gender','$age')";
   $result_i=mysqli_query($conn,$insert);
   if($result_i)
   {
    echo "Records added successfully.";
    header('location:login.php');
} 
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

}

}
}
}
}



?>