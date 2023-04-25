<?php include 'common/header.php'; ?>
<?php   
 $banner_id='2';
$banner_sql="SELECT * FROM banner_table where banner_table_id='$banner_id'";
$banner_res=mysql_query($banner_sql);
$banner_row=mysql_fetch_array($banner_res);
?>
<div class="inner-heading"> <img class="img-responsive" src="uploads/<?php  if (isset($banner_row['banner_table_image'])){echo $banner_row['banner_table_image'];}?>" alt="">
<h1><?php  if (isset($banner_row['banner_table_title'])){echo $banner_row['banner_table_title'];}?></h1>
</div>
<section class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php   
      $about_sql="SELECT * FROM about_us";
      $about_res=mysql_query($about_sql);
      $about_row=mysql_fetch_array($about_res);
      ?>
                <div class="about-content">
              <img src="uploads/<?php  if (isset($about_row['image'])){echo $about_row['image'];}?>" alt="" class="img-responsive">
                        <h2><?php  if (isset($about_row['title'])){echo $about_row['title'];}?></h2>  
                      <?php  if (isset($about_row['content'])){echo $about_row['content'];}?>     
                </div>
            </div>
        </div>
    </div>
</section>



<?php include 'common/footer.php'; ?>
