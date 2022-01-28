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

	<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="nav navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php">Dashboard</a>
          </li>
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
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
         
         
          
         
      </div>
      </nav>

         
           
              <div class="container-fluid d-md-flex align-items-stretch">
      <nav id="sidebar">
        <div class="p-4 pt-5 ">
          <h5 p_heading>Categories</h5>
          <ul class="list-unstyled components mb-5">
            <li>
            <li><a href="#">Enter Products</a></li>
              <li><a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">View Product</a>
              <ul class="collapse list-unstyled" id="pageSubmenu1">
                <li><a href="display.php"><span class="fa fa-chevron-right mr-2"></span> Tops</a></li>
                <li><a href="display.php"><span class="fa fa-chevron-right mr-2"></span> Bottoms</a></li>
                <li><a href="display.php"><span class="fa fa-chevron-right mr-2"></span> Dresses</a></li>
                <li><a href="display.php"><span class="fa fa-chevron-right mr-2"></span> Coats</a></li>
              </ul></li>
               <?php
          if(isset($_SESSION['username']))
          {
            ?>
               <li><a href="logout.php">Logout</a></li>
               <?php
       }
       ?>
            </li>
          </ul>
          <div class="mb-5">
            <h5 p_heading>Tags</h5>
            <div class="tagcloud">
              <a href="#" class="tag-cloud-link">trendy</a>
              <a href="#" class="tag-cloud-link">summer</a>
              <a href="#" class="tag-cloud-link">winter</a>
              <a href="#" class="tag-cloud-link">party</a>
              <a href="#" class="tag-cloud-link">casual</a>
              <a href="#" class="tag-cloud-link">lounge</a>
              <a href="#" class="tag-cloud-link">haute</a>
              <a href="#" class="tag-cloud-link">chic</a>
            </div>
          </div>
      </nav>
      <div class="content">
       <form method="post" action="enter.php">
<fieldset>
<legend>
Enter new product details
</legend>
<label for="prodid">Product Id: </label>
<input type="number" name="id"/><br />
<label for="prodName">Product Name: </label>
<input type="text" name="txtName"/><br />
<label for="prodPrice">Price: </label>
<input type="number" name="price" /><br />
<label for="imgName1">Image Filename: </label>
<input type="text" name="txtImg1" /><br />
<label for="imgName2">Second Image Filename: </label>
<input type="text" name="txtImg2" /><br />
<label for="category">Product Name: </label>
<input type="text" name="cat"/><br />
<input type="submit"  name="loginSubmit" />
<input type="reset" value="Clear"  name="clear"/>
</fieldset>
</form>
<?php
//Set up the database access credentials
require_once('connection.php');

//gathering data from "FORM"
if(isset($_POST['loginSubmit']))
{
 $prodid=$_POST['id'];
 $prodName=$_POST['txtName'];
 $prodPrice=$_POST['price'];
 $imgName1=$_POST['txtImg1'];
 $imgName2=$_POST['txtImg2'];
 $category=$_POST['cat'];
 $submit=$_POST['loginSubmit'];

  $sql="INSERT INTO products (prodID,prodName,Price,imgName,Img2,Category) VALUES ('$prodid','$prodName','$prodPrice','$imgName1','$imgName2','$category')";
  //run $query
 $query=mysqli_query($conn,$sql);
  if($query)
   {
    echo "Records added successfully.";
    header('location:display.php');
} 
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
  
 }

 




?>
      </div>
    </div>
            

              <footer>
    <div class="container-fluid ">
      <div class="row text-center">
        <div class="col-md-12">
           <hr class="line">
          <p>000-000-000</p>
          <p>blue_chic@gmail.com</p>
          <p>500 Street Name</p>
          <p>City,District,0000</p>
          <h8>Blossom, 2020 &copy </h8>
              <hr class="line">
        </div>
      </div>        
    </footer>

 
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>