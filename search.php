<?php include 'common/header.php'; ?>
<?php   
 $banner_id='3';
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
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">		
          <?php include 'common/brand-discount.php'; ?>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="product-content">
		<?php 
		             $search=$_REQUEST['category'];
			 $query_product_forsearch="SELECT * FROM product where category_slug LIKE '%".$search."%' OR product_brand LIKE '%".$search."%' OR product_name LIKE '%".$search."%'";
                              $res_product_forsearch=mysql_query($query_product_forsearch) or die($myQuery."<br/><br/>".mysql_error());
							  $row_count_forsearch=mysql_num_rows($res_product_forsearch);
							  if($row_count_forsearch >= 1)
							  {
								while($row_product_forsearch=mysql_fetch_array($res_product_forsearch))
									//print_r($row_product_forsearch);
								{									
								?>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="featured-pro-details"> <a href="product-detail.php?slug=<?php if (isset($row_product_forsearch['product_slug'])){echo $row_product_forsearch['product_slug'];}?>"><img class="img-responsive" src="uploads/<?php  if (isset($row_product_forsearch['product_image'])){echo $row_product_forsearch['product_image'];}?>" alt=""></a>
              <div class="cart"> <a href="actioncart.php?page=<?php  if (isset($row_product_forsearch['product_id'])){echo $row_product_forsearch['product_id'];}?> ">Add to cart</a> <a href="<?php if(isset($_SESSION['customer_login_id'])){ echo"buynow.php";}else{echo "buycheck.php"; }?>?page=<?php  if (isset($row_product_forsearch['product_id'])){echo $row_product_forsearch['product_id'];}?>">Buy now</a> </div>
              <a class="product-title" href="#"> <?php  if (isset($row_product_forsearch['product_name'])){echo $row_product_forsearch['product_name'];}?></a>
              <p> <?php  if (isset($row_product_forsearch['product_price'])){echo $row_product_forsearch['product_price'];}?> </p>
            </div>
          </div>
        <?php }  
//unset($search);
		?>
		
					<?php 		  }else{
						 echo "Product Not Found";
				 	} ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'common/footer.php'; ?>
