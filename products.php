<?php
session_start();
require_once('connection.php');

if(isset($_POST['add']))
{
  //print_r($_POST['product_id']);
  if(isset($_SESSION['favorite']))
  {
    $prod_array_id=array_column($_SESSION['favorite'],"product_id");
     if(in_array($_POST['product_id'],$prod_array_id))
     {
      echo"<script>alert('Its is already added.')</script>";
      echo"<script>window.location='products.php'</script>";
     }
     else
     {
      $count=count($_SESSION['favorite']);
      $prod_array= array
    (
      'product_id'=>$_POST['product_id']
    );
    $_SESSION['favorite'][$count]=$prod_array;
     }
  }
  else
  {
    $prod_array= array
    (
      'product_id'=>$_POST['product_id']
    );
    //Creating new session variable
    $_SESSION['favorite'][0]=$prod_array;
   // print_r($_SESSION['favorite']);
  }
}

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
     <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
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
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="login.php">Login</a>
					</li>
					<li class="nav-item active">
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
      </div>
      </nav>

<hr>        

          <div class="container-fluid d-md-flex align-items-stretch">

  <nav id="sidebar">
        <div class="p-4 pt-5">
          <h6 class="p_heading">Categories</h6>
          <ul class="list-unstyled components mb-5">
            <li>
              <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Clothing</a>
              <ul class="collapse list-unstyled" id="pageSubmenu1">
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Tops</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Bottoms</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Dresses</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Coats</a></li>
              </ul>
            </li>
            <li>
              <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Prices</a>
              <ul class="collapse list-unstyled" id="pageSubmenu2">
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Rs.1000-2000</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Rs.2000-3000</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Rs.3000-4000</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Rs.4000-5000</a></li>
              </ul>
            </li>
          </ul>
          <div class="mb-5">
            <h6 class="p_heading">Tags</h6>
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
        </div>
      </nav>



      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
      <div class="row  text-center padding">
        <?php
        $query="SELECT * FROM products ORDER BY prodID ASC";
  $result=mysqli_query($conn,$query);
  if(mysqli_num_rows($result)>0)
  {
    while($row=mysqli_fetch_array($result))
    {
      ?>
       <div class="col-sm-4">
          <form method="post" action="products.php?action=add&id=<?php echo $row['prodID'];?>">
          <div class="menu">
            <img src="<?php echo $row["imgName"];?>" onmouseover="this.src='<?php echo $row["Img2"];?>'" onmouseout="this.src='<?php echo $row["imgName"];?>'"">
            <h6 class="p_heading">Price:Rs <?php echo $row["Price"];?></h6>
            <input type="hidden" name="hidden_name" value="<?php echo $row["prodName"];?>"/>
            <input type="hidden" name="product_id" value="<?php echo $row["prodID"];?>"/>
            <input type="hidden" name="hidden_price" value="<?php echo $row["Price"];?>"/>
           <button type="submit" name="add" class="btn btn-warning my-3">Add To Favorite <i class="fas fa-heart"></i></button>
         </div>
       </form>
     </div>
     <?php 
   }
    }
        ?>

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
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
