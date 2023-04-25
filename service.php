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
<section class="inner-service">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		         	   <?php    
        					    $service_sql="SELECT * FROM service_table";
							    $service_res=mysql_query($service_sql);
								while($service_row=mysql_fetch_array($service_res))	
								{   
								?>
               <div class="inner-service-content">
                    <img src="uploads/<?php  if (isset($service_row['service_image'])){echo $service_row['service_image'];}?>" class="img-responsive" alt="#">
                        <h2><?php  if (isset($service_row['service_name'])){echo $service_row['service_name'];}?></h2>
                           <?php  if (isset($service_row['service_content'])){echo $service_row['service_content'];}?>
                                <a href="contact-us.php">contact now</a>
               </div>  
			   <?php  
			   } 
			   ?>
          <!--    <div class="inner-service-content">
                    <img src="images/ser-img.png" class="img-responsive" alt="#">
                        <h2>Laptop Services</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>                                      
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                <a href="contact-us.php">contact now</a>
               </div>
               <div class="inner-service-content">
                    <img src="images/ser-img.png" class="img-responsive" alt="#">
                        <h2>Laptop Services</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>                                      
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                <a href="contact-us.php">contact now</a>
               </div> 
                <div class="inner-service-content">
                    <img src="images/ser-img.png" class="img-responsive" alt="#">
                        <h2>Laptop Services</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>                                      
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                <a href="contact-us.php">contact now</a>
               </div> 
                <div class="inner-service-content">
                    <img src="images/ser-img.png" class="img-responsive" alt="#">
                        <h2>Laptop Services</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>                                      
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                <a href="contact-us.php">contact now</a>
               </div> -->
                
                
                
            </div>
        </div>
    </div>
</section>



<?php include 'common/footer.php'; ?>
