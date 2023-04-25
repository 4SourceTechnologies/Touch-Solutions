<?php include 'common/header.php'; ?>
<?php   
$banner_sql="SELECT * FROM banner_table where banner_table_id='6'";
$banner_res=mysql_query($banner_sql);
$banner_row=mysql_fetch_array($banner_res);
?>
<div class="inner-heading"> <img class="img-responsive" src="uploads/<?php  if (isset($banner_row['banner_table_image'])){echo $banner_row['banner_table_image'];}?>" alt="">
<h1><?php  if (isset($banner_row['banner_table_title'])){echo $banner_row['banner_table_title'];}?></h1>
</div>
<?php
$slug=$_REQUEST['slug'];          
 $dedicated_blog_sql="SELECT * FROM blog_table where blog_slug='$slug'";
 $dedicated_blog_res=mysql_query($dedicated_blog_sql);			
 $dedicated_blog_row=mysql_fetch_array($dedicated_blog_res);
  $blog_table_id=$dedicated_blog_row['blog_table_id'];
  ?>
   <?php 
 
 if(isset($_POST['guest_form']))         //code to insert guest comment 
 {
	 $blog_table_ids=$blog_table_id;
	$guest_name=mysql_real_escape_string($_POST['guest_name']); 
	$guest_email=mysql_real_escape_string($_POST['guest_email']);
	$guest_comment=mysql_real_escape_string($_POST['guest_comment']);
	$comment_date=date("y-m-d");
	$guest_comment_insert_sql="INSERT INTO allguest_comment(blog_table_id,guest_name,guest_email,guest_comment,comment_date) VALUES ('$blog_table_ids','$guest_name','$guest_email','$guest_comment','$comment_date')";
	mysql_query($guest_comment_insert_sql);
 }
 ?>
<section class="blog-dedicated">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="blog-details">
                    <img src="uploads/<?php  if (isset($dedicated_blog_row['blog_image'])){echo $dedicated_blog_row['blog_image'];}?>" alt="">
                        <h2><?php  if (isset($dedicated_blog_row['blog_title'])){echo $dedicated_blog_row['blog_title'];}?></h2>
                             <ul>
                                <li><?php  if (isset($dedicated_blog_row['author_name'])){echo $dedicated_blog_row['author_name'];}?></li>       
                                <li><?php $phpdate = strtotime($dedicated_blog_row['date']); 
 echo $month = date( 'M', $phpdate );?>&nbsp; 
 <?php echo $dates= date('d',$phpdate);?>,
  <?php echo $dates= date('y',$phpdate); ?></li>       
                            </ul>
                   <!--  <ul class="social-media">
                         <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>      
                         <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>       
                         <li><a href=""><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>       
                         <li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>   
                         <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>   
                    </ul> -->
                    
                  <?php  if (isset($dedicated_blog_row['blog_content'])){echo $dedicated_blog_row['blog_content'];}?>
                </div>
                
                
                
                
<div class="blog-form">   

 <h3>LEAVE A COMMENTS</h3>  
 <form action="" method="POST"> 
  <textarea placeholder="Message" name="guest_comment"></textarea> 
 <input type="text" class="form-control" placeholder="Name" name="guest_name">      
 <input type="email" class="form-control" placeholder="Email" name="guest_email">  
 <div class="blog-submit"><input type="submit" value="SEND" name="guest_form"></div>  
 </form>        
 </div>
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
             <!--   <div class="blog-right-part">
                    <form>
              <input type="search" class="form-control" name="" placeholder="Search">
              <div class="blog-search-button">
                <input type="submit" value="">
              </div>
            </form>
                </div> -->
                
                
                <div class="popular-post">
                    <h2>popular post</h2>
                    <hr>
                    <ul>
					<?php	
									$query_comment="SELECT * FROM blog_table where status='1'";
									$res_comment=mysql_query($query_comment);
									
								while($row_comment=mysql_fetch_array($res_comment))	
								{   
								?>
                        <li><?php  if (isset($row_comment['blog_title'])){echo $row_comment['blog_title'];}?>.</li>
							
							    <?php  }  ?>
                        
                     <!--   <li>Lorem Ipsum is simply dummy text of 
                            and typesetting industry. Lorem Ipsu .</li>
                        
                        <li>Lorem Ipsum is simply dummy text of 
                            and typesetting industry. Lorem Ipsu .</li>
                        
                        <li>Lorem Ipsum is simply dummy text of 
                            and typesetting industry. Lorem Ipsu .</li> -->
                    </ul>
                </div>
            
            
            </div>
            
            
            
            
            
        </div>
    </div>
</section>

<?php include 'common/footer.php'; ?>
