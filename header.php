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
		<div class="row">
			<div class="col-12">
				<div class="boxH">
					<?php

include('secure.php');

if($_SESSION['name']){

echo '<a href="logout.php"><input type="submit" name="submit" value="logout"></a>';

}else{

echo '<a href="login.php"><input type="submit" name="submit" value="login"></a>';

}

?>

				</div>

			</div>
		</div>
	</div>
</body>
</html>






