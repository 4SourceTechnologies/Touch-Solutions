<?php include 'common/header.php';
if(isset($_SESSION['customer_login_id'])) {  
 $customer_id=$_SESSION['customer_login_id'];
}
if(isset($_POST['submitcustomerdetail']))
{
$customer_id=$_SESSION['customer_login_id'];
$customer_name=mysql_real_escape_string($_POST['customer_name']);
$customer_phone=mysql_real_escape_string($_POST['customer_phone']);
$customer_address=mysql_real_escape_string($_POST['customer_address']);
$customer_landmark=mysql_real_escape_string($_POST['customer_landmark']);
$customer_pincode=mysql_real_escape_string($_POST['customer_pincode']);
$customer_city=mysql_real_escape_string($_POST['customer_city']);
$customer_state=mysql_real_escape_string($_POST['customer_state']);


 $checkdata="SELECT * FROM shipping_address_table WHERE customer_id='$customer_id'";	
    $check_query=mysql_query($checkdata); 
   
    
if(mysql_num_rows($check_query)>0) { 
$sql_customer_detail="UPDATE `shipping_address_table` SET customer_name='$customer_name',customer_phone='$customer_phone',customer_address='$customer_address',customer_landmark='$customer_landmark',customer_pincode='$customer_pincode',customer_city='$customer_city',customer_state='$customer_state' WHERE  customer_id='$customer_id'";
mysql_query($sql_customer_detail);
header('Location:order-details.php?status=sucess');
}else{
 $sql_customer_detail="INSERT INTO shipping_address_table (customer_id,customer_name,customer_phone,customer_address,customer_landmark,customer_pincode,customer_city,customer_state) VALUES ('$customer_id','$customer_name','$customer_phone','$customer_address','$customer_landmark','$customer_pincode','$customer_city','$customer_state')";
$result_query=mysql_query($sql_customer_detail);
header('Location:order-details.php?status=sucess');
	
}
} 
?>
<div class="inner-heading">
   <!--   <img class="imhg-responsive" src="images/inner-background.jpg" alt="">    <h1>hard disk 10% off</h1>-->
   <hr></div><section class="main-cart cdtls_block">	<div class="container">		
   <div class="row main">		
   <div class="panel-heading">	 
   <div class="panel-title text-center">	
   <h1 class="title">Customer Details</h1>
   <hr />	               	</div>	            </div> 		
   <?php
if(isset($_SESSION['customer_login_id'])) {  
   $customer_id=$_SESSION['customer_login_id'];
   $check_sql="SELECT * FROM shipping_address_table WHERE customer_id='$customer_id'";
   $res_check=mysql_query($check_sql);
   $res_row=mysql_fetch_array($res_check);
}
   ?>
   <div class="main-login main-center">		
   <form action="" method="post" class="form-horizontal">	
   <div class="form-group">
   <input type="text" name="customer_name" id="name" class="form-control" placeholder="Your Name" value="<?php  if(isset($res_row['customer_name'])){echo $res_row['customer_name'];}?>" required>	
   </div>					
   <div class="form-group">		
   <input type="number" name="customer_phone" id="phone" class="form-control" placeholder="Mobile Number" value="<?php if(isset($res_row['customer_phone'])){echo $res_row['customer_phone'];}?>">		
   </div>				
   <div class="form-group">		
   <input type="text" name="customer_address" id="address" class="form-control" placeholder="Address" value="<?php  if(isset($res_row['customer_address'])){echo $res_row['customer_address'];}?>" required>		
   </div>			
   <div class="form-group">		
   <input type="text" name="customer_landmark" id="landmark" class="form-control" placeholder="Landmark" value="<?php  if(isset($res_row['customer_landmark'])){echo $res_row['customer_landmark'];}?>" required>	
   </div>				
   <div class="form-group">		
   <input type="text" name="customer_pincode" id="pin" class="form-control" placeholder="Pin Code" value="<?php  if(isset($res_row['customer_pincode'])){echo $res_row['customer_pincode'];}?>" required>
   </div>			
   <div class="form-group">				
   <input type="text" name="customer_city" id="city" class="form-control" placeholder="City" value="<?php  if(isset($res_row['customer_city'])){echo $res_row['customer_city'];}?>" required>			
   </div>					
   <div class="form-group">		
   <input type="text" name="customer_state" id="state" class="form-control" placeholder="State" value="<?php  if(isset($res_row['customer_state'])){echo $res_row['customer_state'];}?>" required>		
   </div>			
   <div class="form-group ">			
   <input type="submit" name="submitcustomerdetail" id="submit" class="btn btn-primary" value="Submit">		
   </div></form>			
   </div>			</div>		</div>	
   </div>	</div>
   </section>
   <?php include 'common/footer.php'; ?>