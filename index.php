<?php include 'common/header.php'; ?>
<section class="banner-product">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="products">
          <h2>all categories</h2>
          <ul>
		  	<?php 
									
								
								 $query_category="SELECT * FROM category order by category_id desc";
									$res_category=mysql_query($query_category);
									
								while($row_category=mysql_fetch_array($res_category))	
								{   
								?>
            <li><a href="search.php?category=<?php  if(isset($row_category['category_slug'])){echo $row_category['category_slug'];}?>"><?php  if(isset($row_category['category_name'])){echo $row_category['category_name'];}?></a></li>
				<?php  }  ?>
          <!--  <li><a href="#">Keyboards</a></li>
            <li><a href="#">LAPTOPS</a></li>
            <li><a href="#">Mice</a></li>
            <li><a href="#">TABLETS</a></li>
            <li><a href="#">Video adapters</a></li>
            <li><a href="#">Motherboards</a></li>
            <li><a href="#">CPUs</a></li>
            <li><a href="#">CD/DVD drives</a></li>
            <li><a href="#">Software</a></li>
            <li><a href="#">Hard drives</a></li>
            <li><a href="#">Monitors</a></li>
            <li><a href="#">cc camera</a></li> -->
          </ul>
        </div>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="banner">
          <div class="all-ban bxslider">
		  <?php 
									
									$query_slider="SELECT * FROM slider_tabel";
									$res_slider=mysql_query($query_slider);
								while($row_slider=mysql_fetch_array($res_slider))	
								{   
								?>
            <div class="ban-details"> <img class="img-responsive" src="uploads/<?php  if (isset($row_slider['slider_image'])){echo $row_slider['slider_image'];}?>" alt="">
              <div class="ban-content">
                <p><?php  if(isset($row_slider['first_content'])){echo $row_slider['first_content'];}?><span><?php  if(isset($row_slider['second_content'])){echo $row_slider['second_content'];}?></span> </p>
                <a href="<?php  if(isset($row_slider['page_link'])){echo $row_slider['page_link'];}?>">view more</a> </div>
            </div>
				<?php  } ?>
       <!--     <div class="ban-details"> <img class="img-responsive" src="images/banner_1.jpg" alt="">
              <div class="ban-content">
                <p>Lorem Ipsum is simply dummy text of the<span>Lorem Ipsum is simply typesetting industry</span> </p>
                <a href="#">read more</a> </div>
            </div>
            <div class="ban-details"> <img class="img-responsive" src="images/banner_1.jpg" alt="">
              <div class="ban-content">
                <p>Lorem Ipsum is simply dummy text of the<span>Lorem Ipsum is simply typesetting industry</span> </p>
                <a href="#">read more</a> </div>
            </div>
            <div class="ban-details"> <img class="img-responsive" src="images/banner_1.jpg" alt="">
              <div class="ban-content">
                <p>Lorem Ipsum is simply dummy text of the<span>Lorem Ipsum is simply typesetting industry</span> </p>
                <a href="#">read more</a> </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="service">
  <div class="container">
    <div class="row">
		<?php 
									
								
								 $query_category_image="SELECT * FROM category where status='1' order by category_id  LIMIT 2";
									$res_category_image=mysql_query($query_category_image);
									
								while($row_category_image=mysql_fetch_array($res_category_image))	
								{   
								?>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="service-details"> <img class="img-responsive" src="uploads/<?php  if (isset($row_category_image['category_image'])){echo $row_category_image['category_image'];}?>">
          <div class="service-content">
          <!-- <p>Computer <span>accessories</span></p> -->
            <a href="products.php">view more<span><img src="images/view-more-img.png"> </span></a> </div>
        </div>
      </div>
	  	<?php  }  ?>
    <!--  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="service-details"> <img class="img-responsive" src="images/laptop-service.jpg">
          <div class="service-content">
            <p>laptop<span>accessories</span></p>
            <a href="#">view more<span><img src="images/view-more-img.png"> </span></a> </div>
        </div>
      </div> -->
    </div>
  </div>
</section>
<section class="laptop-maintain">
  <div class="container">
    <h2>our service</h2>
    <div class="row">
      <div class="laptop bxslider1">
	  		         	   <?php    
        					    $service_sql="SELECT * FROM service_table";
							    $service_res=mysql_query($service_sql);
								while($service_row=mysql_fetch_array($service_res))	
								{   ?>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="thumbnail"> <img class="img-responsive" src="uploads/<?php  if (isset($service_row['service_image'])){echo $service_row['service_image'];}?>" alt="...">
            <div class="caption">
              <h3><?php  if (isset($service_row['service_name'])){echo $service_row['service_name'];}?></h3>
              <?php  if (isset($service_row['service_content'])){echo substr($service_row['service_content'],0,80);}?>...
              <a href="service.php" class="btn btn-primary" role="button"><img src="images/repier-icon.png"> </a> </div>
          </div>
        </div>
		   <?php  }  ?>
       <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="thumbnail"> <img class="img-responsive" src="images/laptop-rep.png" alt="...">
            <div class="caption">
              <h3>Laptop Case Change</h3>
              <p>In today’s era of high-tech computers, laptops, mobile phones &amp; tablets, all of us tend to mishandle them in one...</p>
              <a href="#" class="btn btn-primary" role="button"><img src="images/repier-icon.png"> </a> </div>
          </div>
        </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="thumbnail"> <img class="img-responsive" src="images/laptop-rep.png" alt="...">
            <div class="caption">
              <h3>Laptop Case Change</h3>
              <p>In today’s era of high-tech computers, laptops, mobile phones &amp; tablets, all of us tend to mishandle them in one...</p>
              <a href="#" class="btn btn-primary" role="button"><img src="images/repier-icon.png"> </a> </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</section>
<section class="offer">
<?php   

$banner_sql="SELECT * FROM banner_table where banner_table_id='1'";
$banner_res=mysql_query($banner_sql);
$banner_row=mysql_fetch_array($banner_res);
?>
    <img src="uploads/<?php  if (isset($banner_row['banner_table_image'])){echo $banner_row['banner_table_image'];}?>" alt="" width="100%"/>
<!--
  <div class="container">
    <div class="row">
      <p>laptop repair <span>10% <sup>off</sup></span></p>
    </div>
  </div>
-->
</section>
<section class="featured-products">
  <div class="container">
    <h2>featured products</h2>
    <a href="#">view more</a>
    <div class="row">
      <div class="featured-content">	  <?php 								  $query_product="SELECT * FROM product order by product_id desc limit 4";									$res_product=mysql_query($query_product) or die($myQuery."<br/><br/>".mysql_error());								while($row_product=mysql_fetch_array($res_product))								{								//print_r($row_product);									?>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="featured-pro-details"> <figure><a href="product-detail.php?slug=<?php if (isset($row_product['product_slug'])){echo $row_product['product_slug'];}?>"> <img class="img-responsive" src="uploads/<?php  if (isset($row_product['product_image'])){echo $row_product['product_image'];}?>" alt=""></a>
              <figcaption class="cart"> <a href="actioncart.php?page=<?php  if (isset($row_product['product_id'])){echo $row_product['product_id'];}?>">Add to cart</a> <a href="<?php if(isset($_SESSION['customer_login_id'])){ echo"buynow.php";}else{echo "buycheck.php"; }?>">Buy now</a> </figcaption>
              </figure>
            
            <a class="product-title" href="product-detail.php?slug=<?php if (isset($row_product['product_slug'])){echo $row_product['product_slug'];}?>"><?php  if (isset($row_product['product_name'])){echo $row_product['product_name'];}?></a>
            <p> <?php  if (isset($row_product['product_price'])){echo $row_product['product_price'];}?> <span class="review-star pull-right">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </span></p>
          </div>
        </div>  <?php  }  ?>
  <!--     
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="featured-pro-details"> <a href="product-detail.php"> <img class="img-responsive" src="images/featured-product-1.jpg" alt=""></a>
            <div class="cart"> <a href="#">Add to cart</a> <a href="#">Buy now</a> </div>
            <a class="product-title" href="#">Lorem Ipsum is<span>lorem Ipsum</span> </a>
            <p> &#8377 5000 </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="featured-pro-details"> <a href="product-detail.php"> <img class="img-responsive" src="images/featured-product-1.jpg" alt=""></a>
            <div class="cart"> <a href="#">Add to cart</a> <a href="#">Buy now</a> </div>
            <a class="product-title" href="#">Lorem Ipsum is<span>lorem Ipsum</span> </a>
            <p> &#8377 5000 </p>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</section>
<section class="client-brand">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="client">
          <h2>Happy  clients</h2>
          <hr>
          <div class="client bxslider2">
		  <?php 
								
									$query_testimonial="SELECT * FROM testimonial_table";
									$res_testimonial=mysql_query($query_testimonial);
								while($row_testimonial=mysql_fetch_array($res_testimonial))	
								{   
								?>
            <div class="client-details">
              <?php  if (isset($row_testimonial['client_comment'])){echo $row_testimonial['client_comment'];}?>
              <div class="author"> 
                  <figure>
                      <img src="uploads/<?php  if (isset($row_testimonial['client_image'])){echo $row_testimonial['client_image'];}?>">
                    <figcaption>
                        <p><?php  if (isset($row_testimonial['client_name'])){echo $row_testimonial['client_name'];}?></p>
                    </figcaption>    
                  </figure>      
              </div>
            </div>
			<?php  } ?>
       
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="brands">
          <h2>top Brands</h2>
          <hr>
          <ul class="bxslider3">
		  <?php 
									
									$query_brand="SELECT * FROM brand_table order by brand_id asc";
									$res_brand=mysql_query($query_brand);
								while($row_brand=mysql_fetch_array($res_brand))	
								{   
								?>
            <li> <img class="img-responsive" src="uploads/<?php  if (isset($row_brand['brand_logo'])){echo $row_brand['brand_logo'];}?>" alt=""> </li>
				<?php  }  ?>
            <!--<li> <img class="img-responsive" src="images/brand-logo.jpg" alt=""> </li>
            <li> <img class="img-responsive" src="images/brand-logo.jpg" alt=""> </li> -->
          </ul>
          <ul class="bxslider3">
		  	  <?php 
									$query_brand_bot="SELECT * FROM brand_table order by brand_id desc";
									$res_brand_bot=mysql_query($query_brand_bot);
								while($row_brand_bot=mysql_fetch_array($res_brand_bot))	
								{   
								?>
            <li> <img class="img-responsive" src="uploads/<?php  if (isset($row_brand_bot['brand_logo'])){echo $row_brand_bot['brand_logo'];}?>" alt=""> </li>
				<?php  }  ?>
           <!-- <li> <img class="img-responsive" src="images/brand-logo.jpg" alt=""> </li>
            <li> <img class="img-responsive" src="images/brand-logo.jpg" alt=""> </li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'common/footer.php'; ?>
