<?php
session_start();
require_once('connection.php');


if(isset($_GET["action"]))
{
  if($_GET["action"]=="delete")
  {
    foreach($_SESSION["favorite"] as $keys=>$values)
    {
      if($values["prod_ID"]==$_GET["prodID"])
      {
        unset($_SESSION["favorite"][$keys]);
        header("location:cart.php");
      }
    }
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
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
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
					<li class="nav-item">
						<a class="nav-link" href="products.php">Products</a>
					</li>
					<li class="nav-item active">
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


<div class="container">
  
  <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
              <th style="width:50%">Product</th>
              <th style="width:30%">Name</th>
              <th style="width:10%">Price</th>
              <th style="width:10%"></th>
            </tr>
          </thead>
          <tbody>
            <?php

            $product_id=array_column($_SESSION['favorite'],'product_id');

           $query="SELECT * FROM products ORDER BY prodID ASC";
  $result=mysqli_query($conn,$query);

  if(mysqli_num_rows($result)>0)
  {
    while($row=mysqli_fetch_array($result))
    {
              foreach($product_id as $id)
              {
                if($row['prodID']==$id)
        {
          ?>
            
            <tr>
              <td data-th="Product">
                
<img src="<?php echo $row["imgName"];?>" alt="..." class="img-responsive"/></td>
                
                    <td><h4 class="product"><?php echo $row["prodName"];?></h4></td>
          
              </td>
              <td data-th="Price"><?php echo $row["Price"];?></td>
              <td class="actions" data-th="">
                <button class="btn btn-danger btn-sm"><a href="cart.php?action=delete&id=<?php echo $row["prodID"]?>;"><i class="fa fa-trash-o"></i></a></button>                
              </td>
            </tr>
            
          
                 <?php
          }
        }
      }
    }
              ?>
              <td><div class="btn btn-warning"><a href="products.php"> <i class="fa fa-angle-left">Continue Shopping</i></a></div></td>
              <td colspan="2" class="hidden-xs"></td>
              <td><a href="#" class="btn btn-success btn-block bg-black">Checkout <i class="fa fa-angle-right"></i></a></td>
        </tbody>
            
         
      

        </table>
</div>

          <hr>
      

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