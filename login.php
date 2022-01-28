<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Ruchika">
    <title>Blossom</title> 
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="css/style.css">
     <meta name="viewport" content="width=device-width,initial-scale=1.0">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
     <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
<div class="container-fluid">

	<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="nav navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="login.php">Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="products.php">Products</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cart.php">MyCart</a>
					</li>
				</ul>
			</div>
			<div class="social  padding">
				  <a href="https://www.facebook.com" target="_blank"><img src="f.png" width="25px" height="20px" align="center"  alt="Facebook" title="Facebook"/></a>
              <a href="https://www.twitter.com" target="_blank"> <img src="t.png" width="20px" height="20px" align="center"  alt="Youtube" title="Youtube"/></a>
              <a href="https://www.pinterest.com" target="_blank"> <img src="p.png" width="20px" height="20px" align="center" alt="tumblr" title="Tumblr"/></a>
              <a href="https://www.instagram.com" target="_blank"> <img src="i.png" width="20px" height="20px" align="center" alt="instagram" title="instagram"/></a>
            
          </div>
          <?php
          if(isset($_SESSION['username']))
          {
            ?>
         
          <a href="logout.php" class="btn btn danger">Logout</a>
         <?php
       }
       ?>
           </nav>
      </div>
     
      <hr>
      <div class="conainer-fluid">
      	<div class="row padding">
      		<div class="col-12">
      			<div class="box5">
      			<h3>Join US</h3>
      		</div>
      	</div>
      </div>
  </div>

       
          <div class="container-fluid">
          	<div class="row padding">
<div class="col-12">

<form method="post" action="process.php">
<fieldset>
<legend>
Login
</legend>
<label for="username">User Name: </label><br />
<input type="text" name="Uname"/><br />
<label for="password">Password: </label><br />
<input type="password" name="txtPass" /><br /><br />
<input type="hidden" name="user_type"/>
<input type="submit" name="loginSubmit" value="Login">
<p class="register">New Customer?<a href="register.php">Sign Up</a></p>
</fieldset>
</form>
</div>
</div>
</div>

  <footer>

  <div class="row justify-content-center">
    <div class="col-md-12 text-center">
      <h5>Blossom</h5>
           <hr class="line">
          <p>000-000-000</p>
          <p>blue_chic@gmail.com</p>
          <p>500 Street Name</p>
          <p>City,District,0000</p>
          <hr class="line">
          <h8>Blossom, 2020 &copy </h8>
        </div>
      </div>
</footer>

   
        	
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>