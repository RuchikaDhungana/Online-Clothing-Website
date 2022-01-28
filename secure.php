<?php
$servername = '127.0.0.1';
$username = 'root'; //your standard uni id
$password = ''; // the password found on the W: drive
$databaseName = 'blossom'; //the name of the db you are using on phpMyAdmin
$conn = mysqli_connect($servername, $username, $password, $databaseName) or
exit("Unable to connect to database!");
session_start();

$check=$_SESSION['username'];
$query=mysql_query("SELECT Username FROM login WHERE Username='$check'");
$result=mysql_fetch_array($query);
$user=$result['Uname'];
if(!isset($user))

{

header("Location:login.php");

}

?>
?>