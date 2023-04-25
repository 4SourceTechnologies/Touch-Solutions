<?php include 'common/header.php'; 
 if(count($_SESSION['product_id']) =="0"){
	header('location:empty-cart.php');
}
?>
<?php
if(isset($_POST['updatecart'])){
	$_SESSION['qty'] = $_POST['quantity'];		
}
?>
<div class="inner-heading"> 
  <!--
   <img class="imhg-responsive" src="images/inner-background.jpg" alt="">
    <h1>hard disk 10% off</h1>
-->
  <hr>
</div>
<section class="main-cart">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="main-cart-content">
         <h2>cart (<?php if(isset($_SESSION['product_id'])) {
							echo count($_SESSION['product_id']);}
							else 
							{ echo "0";
							}
							?>)</h2>
          <table class="table">
		    <form action="" method="post">	
			<thead>
					<tr>
						<th>Item</th>
						<th>Qty</th>
						<th>Price</th>
						<th>Delivery Details</th>
						<th>Subtotal</th>
					  </tr>
				</thead>
				<tbody>
				<?php 
                          $sum = 0;
                         foreach($_SESSION['product_id'] as $id){
                         $sql="SELECT * FROM product where product_id='$id'";
                       $res=mysql_query($sql);
                        while($row=mysql_fetch_array($res))
                {
                ?>
              <tr>
                <td>
                    <figure>
                        <img src="uploads/<?php echo $row['product_image'];?>" height="120" width="120">
                    </figure>    
                    <div class="product_dtl">
                         <p><b><?php echo $row['product_name'];?></b></p>
                            <?php echo $row['product_detail'];?> 
                        <a href="removecart.php?page=<?php echo $row['product_id'];?>" class="remove">Remove</a>
                    </div>    
                </td>
                <td class="qty" data-th="Qty"><input type="text"  name="quantity[<?php echo $id;?>]" value="<?php if(isset($_SESSION['qty'][$id])){ echo $_SESSION['qty'][$id]; }else{ echo '1' ;} ?>" size="1"/></td>
                <td data-th="Price"><?php echo $row['product_price']?></td>
                <td class="del-dtl" data-th="Delivery Details"><p>Free <span>Delivery in 2 days </span></p></td>
                <td data-th="Subtotal">Rs.<?php echo $row['product_price']*$_SESSION['qty'][$id]; $sum += $row['product_price']*$_SESSION['qty'][$id]; ?></td>
              </tr>
			     <?php  } }  ?>
              <tr>
                  <td colspan="2" class="final-pay">
                      <input type="submit" value="Update cart" name="updatecart">			   
                  </td>
                  <td colspan="3" class="final-pay">
                      <h4>Amount Payable : Rs. <?php echo  $sum;  ?></h4>
                  </td>
              </tr>
            </tbody>
			 </form>
		  </table>
		  
          <ul class="shop-order clearfix">
            <li><a href="products.php">continue shopping</a></li>
            <li><a href="check.php">place order</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
 <!-- <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="main-cart-content">
          <h2>cart (2)</h2>
         
          <ul class="shop-order clearfix">
            <li><a href="#">continue shopping</a></li>
            <li><a href="#">place order</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div> -->
</section>
<?php include 'common/footer.php'; ?>
