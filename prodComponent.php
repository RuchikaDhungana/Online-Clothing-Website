<html>
<body>
<?php
function component($id,$name,$price,$img1,$img2,$category)

$element="
<div class="col-sm-4">
          <form method="post" action="products.php?action=add&id=<?php echo $row['prodID'];?>">
          <div class="menu">
            <img src="<?php echo $row["imgName"];?>" onmouseover="this.src='<?php echo $row["Img2"];?>'" onmouseout="this.src='<?php echo $row["imgName"];?>'"">
            <h6 class="p_heading">Price:Rs <?php echo $row["Price"];?></h6>
            <input type="hidden" name="hidden_name" value="<?php echo $row["prodName"];?>"/>
            <input type="hidden" name="product_id" value="<?php echo $row["prodID"];?>"/>
            <input type="hidden" name="hidden_price" value="<?php echo $row["Price"];?>"/>
           <button type="submit" name="favorite" class="btn btn-warning my-3">Add To Favorite <i class="fas fa-heart"></i></button>
         </div>
       </form>
     </div>"
?>
</body>
</html>