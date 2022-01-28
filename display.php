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
          <h5 class="p_heading">Categories</h5>
          <ul class="list-unstyled components mb-5">
            <li>
            <li><a href="enter.php">Enter Products</a></li>
             <li> <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">View Product</a>
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
            <h5 class="p_heading">Tags</h5>
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
        <?php
//Set up the database access credentials
require_once('connection.php');
//Select query
$select="SELECT * FROM products";
$result=mysqli_query($conn, $select);

//Displaying the product details

echo '<table border="1" width="700px" cellspacing="0">';
echo'<tr>';
    echo'<th> Product ID</th>';
    echo'<th> Product Name</th>';
    echo'<th>Price</th>';
    echo'<th>Image</th>';
    echo'<th>Category</th>';
    echo'<th>Amend </th>';
    echo'<th>Delete </th>';

echo'</tr>';

While ($row=mysqli_fetch_assoc($result))
{
    echo'<tr>';
    echo '<td>'.$row['prodID']. '<br />'. '</td>';
    echo '<td>'.$row['prodName'] . '<br />'. '</td>';
    echo '<td>'.$row['Price'] . '<br />'. '</td>';
    echo'<td>'. '<img src="' . $row['imgName'] . '" />'. '</td>';
    echo '<td>'.$row['Category'] . '<br />'. '</td>';
    echo '<td>'.'<a href="ammendProd.php?ame='. $row['prodID'].'">Amend</a>'. '</td>';
    echo '<td>'.'<a href="deleteProd.php?del='. $row['prodID'].'">Delete</a>'. '</td>';
echo'</tr>';
}


echo'</table>';
?>
      </div>
    </div>
            

              <footer>
    <div class="container-fluid ">
      <div class="row text-center">
        <div class="col-md-12">
          <h5>Blue Chic</h5>
           <hr class="line">
          <p>000-000-000</p>
          <p>blue_chic@gmail.com</p>
          <p>500 Street Name</p>
          <p>City,District,0000</p>
        </div>
      </div>
  </div>
    </footer>
    <div class="col-12">
          <hr class="line1">
          <div class="hr1">
          <h8>Blue Chic, 2020 &copy </h8>
      </div>
        </div>
            
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
