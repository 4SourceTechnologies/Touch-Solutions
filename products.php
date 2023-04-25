<?php include 'common/header.php'; ?>
<?php   
 $banner_id='4';
$banner_sql="SELECT * FROM banner_table where banner_table_id='$banner_id'";
$banner_res=mysql_query($banner_sql);
$banner_row=mysql_fetch_array($banner_res);
?>
<div class="inner-heading"> <img class="img-responsive" src="uploads/<?php  if (isset($banner_row['banner_table_image'])){echo $banner_row['banner_table_image'];}?>" alt="">
<h1><?php  if (isset($banner_row['banner_table_title'])){echo $banner_row['banner_table_title'];}?></h1>
</div>
<section class="checking">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">		<?php include 'common/brand-discount.php'; ?>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="product-content">
		<?php 
								  $query_product="SELECT * FROM product";
									$res_product=mysql_query($query_product) or die($myQuery."<br/><br/>".mysql_error());
								while($row_product=mysql_fetch_array($res_product))
								{
								//print_r($row_product);	
								?>
								
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="featured-pro-details"> <figure><a href="product-detail.php?slug=<?php if (isset($row_product['product_slug'])){echo $row_product['product_slug'];}?>"><img class="img-responsive" src="uploads/<?php  if (isset($row_product['product_image'])){echo $row_product['product_image'];}?>" alt=""></a>
              <figcaption class="cart"> <a href="actioncart.php?page=<?php  if (isset($row_product['product_id'])){echo $row_product['product_id'];}?>">Add to cart</a> <a href="<?php if(isset($_SESSION['customer_login_id'])){ echo"buynow.php";}else{echo "buycheck.php"; }?>?page=<?php  if (isset($row_product['product_id'])){echo $row_product['product_id'];}?>">Buy now</a> </figcaption>
                </figure>
              <a class="product-title" href="product-detail.php?slug=<?php if (isset($row_product['product_slug'])){echo $row_product['product_slug'];}?>"><?php  if (isset($row_product['product_name'])){echo $row_product['product_name'];}?> </a>
              <p>&nbsp;<?php  if (isset($row_product['product_price'])){echo $row_product['product_price'];}?> <span class="review-star pull-right">
			  
			  <?php
			  $product_id_for_rating=$row_product['product_id'];
			 $rating_sql="SELECT AVG(rating_number) FROM rating WHERE product_id='$product_id_for_rating'";
			$rating_res=mysql_query($rating_sql);
             $rating_number=mysql_fetch_array($rating_res);	
			for($i=1;$i<=$rating_number["0"];$i++) {
 ?>
                     <span class="fa fa-star checked"></span>
			<?php } ?>
            <span class="fa fa-star "></span>
			<span class="fa fa-star "></span>
                <span class="fa fa-star "></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span> 
            </span></p>
            </div>
          </div>
		  	<?php  }  ?>
        
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'common/footer.php'; ?>
