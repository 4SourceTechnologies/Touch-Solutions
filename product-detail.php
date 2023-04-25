<?php include 'common/header.php'; ?>
<section class="product-detail">
  <div class="container">      
  <?php    $product_slug=$_REQUEST['slug']; 	
  $sql_single_product="SELECT * FROM product WHERE product_slug='$product_slug'";	
  $res_single_product=mysql_query($sql_single_product) or die($myQuery."<br/><br/>".mysql_error());		
  $row_single_product=mysql_fetch_array($res_single_product);	
  $product_id_for_image=$row_single_product['product_id'];
  ?>  
  <div class="row">     
  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">   
  <div class="left-detail">          <div id="container" class="cf">    
  <div id="main" role="main">              <section class="slider">    
  <div id="slider" class="flexslider">               
  <ul class="slides">  
  <li class="lokesh">
  <a class="lightbox thumbnail" href="uploads/<?php  if (isset($row_single_product['product_image'])){echo $row_single_product['product_image'];}?>" data-littlelightbox-group="gallery"> <img src="uploads/<?php  if (isset($row_single_product['product_image'])){echo $row_single_product['product_image'];}?>"/> </a></li>
  <?php 
   $sql_single_product_images_result="SELECT * FROM product_images WHERE product_id='$product_id_for_image'";	
  $sql_single_image_res=mysql_query($sql_single_product_images_result) or die($myQuery."<br/><br/>".mysql_error());
 while($row_slider_image=mysql_fetch_array($sql_single_image_res))
 {
  ?>
  <li class="lokesh1"> <a class="lightbox thumbnail" href="uploads/<?php echo $row_slider_image['product_image_single'];?>" data-littlelightbox-group="gallery"> <img src="uploads/<?php echo $row_slider_image['product_image_single'];?>"/> </a> </li>  
<?php } ?>   
<!--  <li><a class="lightbox thumbnail" href="images/pro1-zoom.png" data-littlelightbox-group="gallery"> <img src="images/pro1.png"/> </a></li>           
   
  <li> <a class="lightbox thumbnail" href="images/pro2-zoom.png" data-littlelightbox-group="gallery"> <img src="images/pro2.png"/> </a> </li>  -->     
  </ul>                </div>     
  <div id="carousel" class="flexslider">         
  <ul class="slides">                 
  <li> <img src="uploads/<?php  if (isset($row_single_product['product_image'])){echo $row_single_product['product_image'];}?>" /> </li>    
 <?php 
   $sql_single_product_images_resultss="SELECT * FROM product_images WHERE product_id='$product_id_for_image'";	
  $sql_single_image_resss=mysql_query($sql_single_product_images_resultss) or die($myQuery."<br/><br/>".mysql_error());
 while($row_slider_imagess=mysql_fetch_array($sql_single_image_resss))
 {
  ?>
 <li class> <img src="uploads/<?php  if (isset($row_slider_imagess['product_image_single'])){echo $row_slider_imagess['product_image_single'];}?>" /> </li>        
 <?php } ?>
  <!--<li> <img src="images/pro1.png" /> </li>      
  <li> <img src="images/pro2.png" /> </li>       
  <li> <img src="images/pro1.png" /> </li>       
  <li> <img src="images/pro2.png" /> </li>       
  <li> <img src="images/pro1.png" /> </li>        
  <li> <img src="images/pro2.png" /> </li> -->        
  </ul>          
  </div>             
  </section>      
  </div>          </div>   
  </div>      </div>   
  <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">   
  <div class="right-detail"> 
          <h2><?php  if (isset($row_single_product['product_name'])){echo $row_single_product['product_name'];}?></h2>      
      <ul class="product_dtl_block">  
          <li>
            <p class="review-star">
			<?php
			 $rating_sql="SELECT AVG(rating_number) FROM rating WHERE product_id='$product_id_for_image'";
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
            </p> 
			<?php $review="SELECT COUNT(rating_id) FROM rating WHERE product_id='$product_id_for_image';";
			   $review_res=mysql_query($review);
			   $num_review=mysql_fetch_array($review_res);
			?>
            <p class="total_review"><?php echo $num_review["0"]; ?> Review</p>  
          </li>
          <li>
              <p><?php  if (isset($row_single_product['product_warranty'])){echo $row_single_product['product_warranty'];}?>.</p>    
          </li>          
    </ul>  
  <div class="price-area"> <strike>List Price: Rs. <?php  if (isset($row_single_product['product_price'])){echo $row_single_product['product_price'];}?></strike>         
  <h2>Rs. <?php echo $price=$row_single_product['product_price']-($row_single_product['product_price']/100)*$row_single_product['product_discount'];?></h2>            <div class="off-price">  
  
  <p><?php  if (isset($row_single_product['product_discount'])){echo $row_single_product['product_discount'];}?>% <span>off</span></p>     
  </div>          </div>       
  <ul class="del-heading">    
  <?php  if (isset($row_single_product['product_detail'])){echo $row_single_product['product_detail'];}?>     
  </ul>          <ul class="cart-area">         
  <li> <a href="actioncart.php?page=<?php  if (isset($row_single_product['product_id'])){echo $row_single_product['product_id'];}?>">add to cart</a> </li>         
  <li> <a href="<?php if(isset($_SESSION['customer_login_id'])){ echo"buynow.php";}else{echo "buycheck.php"; }?>?page=<?php  if (isset($row_single_product['product_id'])){echo $row_single_product['product_id'];}?>">buy now</a> </li>  
  </ul>          <!--<div class="social-media">            <ul>              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Tweet</a></li>              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i> Share</a></li>              <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i> Google+ </a></li>              <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i> Pinterest</a></li>            </ul>          </div>-->    
  </div> 
  </div> 
  </div>  </div>
</section>
<section class="rating_block">
    <div class="container">
        <div class="row">
            <h3>Rating &amp; Reviews:</h3>
            <p class="rating_number"><b><?php echo substr($rating_number["0"],0,3);?></b> <span class="fa fa-star checked"></span></p>
			
            <p class="rating_dtls"><?=$num_review["0"];?> Ratings &amp; <?=$num_review["0"];?> Reviews</p>
            <ul id="myList">
			<?php $rating_sql="SELECT * FROM rating where product_id='$product_id_for_image'";
							  $rating_res=mysql_query($rating_sql);
							 while($row=mysql_fetch_array($rating_res))
							  {
						?>
                <li class="rtng_block">
                    <hr>
                    <p class="rating_heading"><span class="label label-primary"><?php  if(isset($row['rating_number'])){echo $row['rating_number'];}?> <span class="fa fa-star checked"></span></span> <b><?php  if(isset($row['rating_title'])){echo $row['rating_title'];}?></b></p>
                   <ul><li><?php  if(isset($row['rating_comment'])){echo $row['rating_comment'];}?></li></ul>
           <p class="rating_pro"><b><?php  if(isset($row['customer_name'])){echo $row['customer_name'];} $phpdate=strtotime($row['date']);?>, <?php echo $date=date('d',$phpdate);?> <?php echo  $month=date('M',$phpdate);?> <?php echo $year=date('Y',$phpdate);?></b></p>
                </li>
					<?php  } ?>
        
            </ul>    
            <p class="btn_block">
                <button id="loadMore" class="btn btn-default">View More</button>
                <button id="showLess" class="btn btn-default">Show less</button>
            </p>
        </div>
    </div>
</section>
<section class="featured-products pro-det"> 
  <div class="container"> 
  <div class="row">    
  <h3>top sellers</h3>    
  <hr>      <ul class="bxslider4">    
 <?php 								  $query_product="SELECT * FROM product order by product_id desc limit 6";									$res_product=mysql_query($query_product) or die($myQuery."<br/><br/>".mysql_error());								while($row_product=mysql_fetch_array($res_product))								{								//print_r($row_product);									?>  
  <li>        
  <div class="featured-pro-details"> <figure><a href="product-detail.php?slug=<?php if (isset($row_product['product_slug'])){echo $row_product['product_slug'];}?>"> <img class="img-responsive" src="uploads/<?php  if (isset($row_product['product_image'])){echo $row_product['product_image'];}?>" alt=""></a>     
  <figcaption class="cart"> <a href="actioncart.php?page=<?php  if (isset($row_product['product_id'])){echo $row_product['product_id'];}?>">Add to cart</a> <a href="<?php if(isset($_SESSION['customer_login_id'])){ echo"buynow.php";}else{echo "buycheck.php"; }?>">Buy now</a></figcaption>  </figure>     
  <a class="product-title" href="product-detail.php?slug=<?php if (isset($row_product['product_slug'])){echo $row_product['product_slug'];}?>"><?php  if (isset($row_product['product_name'])){echo $row_product['product_name'];}?> </a>
  <p> <?php  if (isset($row_product['product_price'])){echo $row_product['product_price'];}?> </p>          </div>        </li> 
   <?php  }  ?>
<!--  
  <li>    
  <div class="featured-pro-details"> <a href="product-detail.php"> <img class="img-responsive" src="images/featured-product-1.jpg" alt=""></a>   
  <div class="cart"> <a href="#">Add to cart</a> <a href="#">Buy now</a> </div>     
  <a class="product-title" href="#">Lorem Ipsum is<span>lorem Ipsum</span> </a>
  <p> &#8377 5000 </p>          </div>        </li>     
  <li>         
  <div class="featured-pro-details"> <a href="product-detail.php">
  <img class="img-responsive" src="images/featured-product-1.jpg" alt=""></a>    
  <div class="cart"> <a href="#">Add to cart</a> <a href="#">Buy now</a> </div>    
  <a class="product-title" href="#">Lorem Ipsum is<span>lorem Ipsum</span> </a>
  <p> &#8377 5000 </p>          </div>        </li>      
  <li>     
  <div class="featured-pro-details"> <a href="product-detail.php">
  <img class="img-responsive" src="images/featured-product-1.jpg" alt=""></a> 
  <div class="cart"> <a href="#">Add to cart</a> <a href="#">Buy now</a> </div>      
  <a class="product-title" href="#">Lorem Ipsum is<span>lorem Ipsum</span> </a>      
  <p> &#8377 5000 </p>          </div>        </li>   -->
  </ul>
  </div>  
  </div></section><?php include 'common/footer.php'; ?>