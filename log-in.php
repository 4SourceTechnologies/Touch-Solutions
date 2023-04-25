<?php include 'common/header.php'; ?>
<?php
if(isset($_POST['updatecart'])){
	$_SESSION['qty'] = $_POST['quantity'];		
}
?>
<?php     
if(isset($_POST['registersubmit']))
{
  $customer_name=mysql_real_escape_string($_POST['customer_name']);
  $customer_email=mysql_real_escape_string($_POST['customer_email']);
  $customer_password=MD5(mysql_real_escape_string($_POST['customer_password']));
  $customer_auth=rand(0,2).time();
  $checkdata="SELECT customer_email FROM customer_login WHERE customer_email='$customer_email'";	
     $check_query=mysql_query($checkdata); 
   if(mysql_num_rows($check_query)>0)
 {
    echo "<script>alert('Your email Already exist')</script>";
 }
else{
    // $mail->addAddress($customer_email, $customer_name);  // Add a recipient    
	// Multiple recipients
   $mail->addAddress($customer_email, $customer_name);  // Add a recipient      
    $mail->isHTML(true);
    $mail->Subject = 'Authentication';
    $mail->Body    = "Verification Link: http://touchsolutionskolkata.com/authentication.php?auth_key=".$customer_auth;
		
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';           
            
		if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                  echo "<script>alert('Verification link sent in Your email')</script>";
                }
		
  $sql_registration="INSERT INTO customer_login(customer_name,customer_email,customer_password,customer_auth_key) values 
  ('$customer_name','$customer_email','$customer_password','$customer_auth')";
  $customer_registration=mysql_query($sql_registration);

 }   
//header("Location:products.php");
}
 						////     LOGIN CODE FOR CUSTOMER   /////////////
 						
if(isset($_POST['loginsubmit']))
{
$customer_email=mysql_real_escape_string($_POST['customer_email']);
$customer_password=MD5(mysql_real_escape_string($_POST['customer_password']));

$sql_customer="SELECT * FROM customer_login WHERE customer_email='$customer_email' and customer_password='$customer_password' and status='1'";

 $res_customer=mysql_query($sql_customer);
 $num_of_row=mysql_num_rows($res_customer);
  if($num_of_row==1)
 {
	$row_customer_login=mysql_fetch_array($res_customer);
    $_SESSION["customer_login_id"]=$row_customer_login['customer_login_id'];
	$_SESSION['customer_name']=$row_customer_login['customer_name'];
	if(isset($_SESSION['product_id']))
    {
	header('location:cart.php');
     }
      else
         {
	    header("Location:products.php");
         }	
 }
}
?>
<div class="inner-heading"> 
</div>
<section class="main-cart signup_block">
	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
							<form id="login-form" action="" method="post" role="form" style="display: block;">
								<div class="form-group">
							<input type="text" name="customer_email" id="userid" class="form-control" placeholder="Enter Email ID" value="" required>
									</div>
									<div class="form-group">
								<input type="password" name="customer_password" id="password" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group text-center">
										<input type="checkbox" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-4 col-sm-offset-4">
												<input type="submit" name="loginsubmit" id="login-submit" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
											<!--<a href="#" tabindex="5" class="forgot-password">Forgot Password?</a> -->
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="" method="post" role="form" style="display: none;">
									<div class="form-group">
					<input type="text" name="customer_name" id="name"  class="form-control" placeholder="Your Name" required autocomplete="off">
	 								</div>
									<div class="form-group">
							<input type="email" name="customer_email" id="email"  class="form-control" placeholder="Enter Email ID" required>
									</div>
									<div class="form-group">
					<input type="password" name="customer_password" id="password" class="form-control" placeholder="Enter Password" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-4 col-sm-offset-4">
					<input type="submit" name="registersubmit" id="register-submit" class="form-control btn btn-register" value="SIGN UP">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include 'common/footer.php'; ?>
