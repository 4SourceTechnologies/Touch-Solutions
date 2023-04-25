<?php include 'common/header.php';
 if($_REQUEST["status"]=='sucess'){
	  echo "<script>alert('Your Order has been Placed Successfully')</script>";
 }
 ?>
<div class="inner-heading">

</div>
 <?php  
								 
										$id=$_SESSION["customer_login_id"];
										//echo $id;
										$sql="SELECT * FROM shipping_address_table WHERE customer_id='$id'";
										$res=mysql_query($sql);
										$row=mysql_fetch_array($res);
								   
									?>
<section class="order-details">
    <div class="container">
        <div class="order-content crt_dtls">
            <div class="">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                
                    <h2>Shipping Address</h2>
                    <address>
                        <p><b><?php echo $row['customer_name'];?></b></p>
                        <p><b>Address:</b> <?php echo $row['customer_address'];?> <br><?php echo $row['customer_landmark'];?> <br><?php echo $row['customer_city'];?> <br><?php echo $row['customer_state'];?> - <?php echo $row['customer_pincode'];?> <br> India</p>
                        <p><b>Phone:</b> <?php echo $row['customer_phone'];?></p>
                    </address>  
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="customer-content">
                       <p><b>Payment Method:</b> Cash On Delivery (COD)</p>
                    </div>
                </div>
                
            </div>
             
        </div>
    </div>
</section>
<section class="main-cart cart_dtls order_dtls"> 
  <div class="container">
    <div class="main-cart-content">
        <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
          <table class="table">
		    <form action="" method="post"></form>	
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
                 $sum=0;									
	 //$sql1="SELECT order_table.product_quantity,product.product_name,product.product_price,product.product_image FROM order_table JOIN product ON order_table.product_id=product.product_id WHERE order_table.customer_id='$id'";
	      //$res1=mysql_query($sql1);
		   //while($row1=mysql_fetch_array($res1))
			       foreach($_SESSION['product_id'] as $id){
                         $sql="SELECT * FROM product where product_id='$id'";
                       $res=mysql_query($sql);
                        while($row_product_detail=mysql_fetch_array($res))
		   {
									?>
				              <tr>
                <td>
                    <figure>
                        <img src="uploads/<?php echo $row_product_detail['product_image'];?>" height="120" width="120">
                    </figure>
                    <div class="product_dtl">
                        <p><b><?php if(isset($row_product_detail['product_name'])){echo $row_product_detail['product_name'];}?></b></p>
                        <p><?php if(isset($row_product_detail['product_detail'])){ echo $row_product_detail['product_detail']; }?></p>
                    </div>    
                <td class="qty" data-th="Qty"><?php if(isset($_SESSION['qty'][$id])){ echo $_SESSION['qty'][$id]; }else{ echo '1' ;} ?><span><?php //echo $row1['product_quantity'];?></span></td>
                <td data-th="Price"><?php if(isset($row_product_detail['product_price'])){ echo $row_product_detail['product_price']; }?></td>
                <td class="del-dtl" data-th="Delivery Details"><p>Free <span>Delivery in 2 days, Fri </span></p></td>
                <td data-th="Subtotal">Rs.<?php echo $row_product_detail['product_price']*$_SESSION['qty'][$id]; $sum += $row_product_detail['product_price']*$_SESSION['qty'][$id]; ?></td>
              </tr>
				   <?php } } ?>
              <tr>
                <td colspan="5" class="final-pay">
                    <h4>Amount Payable : Rs. <?php echo $sum;?></h4>
                </td>
              </tr>
            </tbody>
			 
		  </table>
		  
          <!--<ul class="shop-order clearfix">
            <li><a href="products.php">continue shopping</a></li>
            <li><a href="check.php">place order</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>



<?php include 'common/footer.php'; ?>