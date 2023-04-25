<?php include 'common/header.php'; ?>
<?php   
$banner_sql="SELECT * FROM banner_table where banner_table_id='5'";
$banner_res=mysql_query($banner_sql);
$banner_row=mysql_fetch_array($banner_res);
?>
<div class="inner-heading"> <img class="img-responsive" src="uploads/<?php  if (isset($banner_row['banner_table_image'])){echo $banner_row['banner_table_image'];}?>" alt="">
<h1><?php  if (isset($banner_row['banner_table_title'])){echo $banner_row['banner_table_title'];}?></h1>
</div>

<section class="blog">
    <div class="container">
        <div class="row">
	<?php	
									$query="SELECT * FROM blog_table";
									$res=mysql_query($query);
									
								while($row=mysql_fetch_array($res))	
								{   
								?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="blog-content">
                    <img src="uploads/<?php  if (isset($row['blog_image'])){echo $row['blog_image'];}?>" alt="" class="img-responsive">
                        <a href="blog-dedicated.php?slug=<?php if (isset($row['blog_slug'])){echo $row['blog_slug'];}?>"><?php  if (isset($row['blog_title'])){echo $row['blog_title'];}?></a>
                            <ul>
                                <li><?php  if (isset($row['author_name'])){echo $row['author_name'];}?></li>       
                                <li><?php $phpdate = strtotime($row['date']); 
				echo $month = date( 'M', $phpdate );?>&nbsp; 
				<?php echo $dates= date('d',$phpdate);?>,
				<?php echo $dates= date('y',$phpdate); ?></li>       
                            </ul>
                                <?php if(isset($row['blog_content'])){echo substr($row['blog_content'],0,80);}?>....
                </div>
            </div>
         
               
               <?php  }  ?>
                <!--  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="blog-content">
                    <img src="images/blog-img.jpg" alt="" class="img-responsive">
                        <a href="blog-dedicated.php">Strategic and commercial approach with issues</a>
                            <ul>
                                <li>By John Doe</li>       
                                <li>January 18, 2017</li>       
                            </ul>
                                <p>consectetur amet incididunt ut labore et dolore.
                                We feel proud for our and for the team.</p>
                </div>
            </div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="blog-content">
                    <img src="images/blog-img.jpg" alt="" class="img-responsive">
                        <a href="blog-dedicated.php">Strategic and commercial approach with issues</a>
                            <ul>
                                <li>By John Doe</li>       
                                <li>January 18, 2017</li>       
                            </ul>
                                <p>consectetur amet incididunt ut labore et dolore.
                                We feel proud for our and for the team.</p>
                </div>
            </div>
            
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="blog-content">
                    <img src="images/blog-img.jpg" alt="" class="img-responsive">
                        <a href="blog-dedicated.php">Strategic and commercial approach with issues</a>
                            <ul>
                                <li>By John Doe</li>       
                                <li>January 18, 2017</li>       
                            </ul>
                                <p>consectetur amet incididunt ut labore et dolore.
                                We feel proud for our and for the team.</p>
                </div>
            </div>
            
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="blog-content">
                    <img src="images/blog-img.jpg" alt="" class="img-responsive">
                        <a href="blog-dedicated.php">Strategic and commercial approach with issues</a>
                            <ul>
                                <li>By John Doe</li>       
                                <li>January 18, 2017</li>       
                            </ul>
                                <p>consectetur amet incididunt ut labore et dolore.
                                We feel proud for our and for the team.</p>
                </div>
            </div>
            
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="blog-content">
                    <img src="images/blog-img.jpg" alt="" class="img-responsive">
                        <a href="blog-dedicated.php">Strategic and commercial approach with issues</a>
                            <ul>
                                <li>By John Doe</li>       
                                <li>January 18, 2017</li>       
                            </ul>
                                <p>consectetur amet incididunt ut labore et dolore.
                                We feel proud for our and for the team.</p>
                </div>
            </div> -->
        </div>
    </div>
</section>

<?php include 'common/footer.php'; ?>
