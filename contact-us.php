<?php include 'common/header.php'; ?>
<?php  
if(isset($_POST["submit"])){
$name=mysql_real_escape_string($_POST["name"]);
$email=mysql_real_escape_string($_POST["email"]);
$ph_number=mysql_real_escape_string($_POST["ph_number"]);
$city=mysql_real_escape_string($_POST["city"]);
$message=mysql_real_escape_string($_POST["message"]);

     $mail->addAddress('Touchsolutionkolkata@hotmail.com', 'Touch Solution');  // Add a recipient    
        

    $mail->isHTML(true);
    $mail->Subject = 'Contact Form';
    $mail->Body    = '<h2>Touch Solution</h2><br>
                    ------------------------<br>
                    Name: '.$name.'<br>
		   Email: '.$email.'<br>
                    Phone: '.$ph_number.'<br>	
		   City: '.$city.'<br>	
		    Message: '.$message.'<br>
                    ------------------------';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';           

		$res=mysql_query("INSERT INTO contact_us(name,email,phone_number,city,message) VALUES ('$name','$email','$ph_number','$city','$message')");		
				 if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                  echo "<script>alert('Your message has been send successfully')</script>";
                }
}
?>

<div class="inner-heading">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7366.846001753788!2d88.432174!3d22.600674!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4c8f8a3a501d27ce!2sTouch+Solutions+Kolkata!5e0!3m2!1sen!2sin!4v1509794733670" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>

<!--
   <img class="imhg-responsive" src="images/inner-background.jpg" alt="">
    <h1>hard disk 10% off</h1>
-->

</div>
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="contact-form">
                    <h2> contact us </h2>
                    <form action="" method="POST">
                    <div class="contact-details">
                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                        <input type="number" class="form-control" placeholder="Phone" name="ph_number"  required>
                    </div>
                        <div class="contact-details">
                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                        <input type="text" class="form-control" placeholder="City" name="city" required>
                    </div>
                      
                    <div class="contact-details">
                        <textarea placeholder="Message" name="message" required></textarea>
                    </div>
                    <div class="submit"><input type="submit" value="SUBMIT" name="submit"></div>
                </form>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="contact-content">
                    <h2>contact details</h2>
                    <ul class="address">
                            <li><?php if(isset($footer_row['address_sectiom'])){ echo $footer_row['address_sectiom']; }?></li>
                            <li> <a href="#">  <a href="tel:+<?php if(isset($footer_row['phone_number'])){ echo $footer_row['phone_number']; }?>"><?php if(isset($footer_row['phone_number'])){ echo $footer_row['phone_number']; }?></a>,
                       <a href="tel:+<?php if(isset($footer_row['phone_number2'])){ echo $footer_row['phone_number2']; }?>"><?php if(isset($footer_row['phone_number2'])){ echo $footer_row['phone_number2']; }?> </a></a> </li>
                            <li> <a href="mail-to:<?php if(isset($footer_row['email'])){ echo $footer_row['email']; }?>"><?php if(isset($footer_row['email'])){ echo $footer_row['email']; }?></a> </li>
                      
                        </ul>
                    
                    <ul class="contact-social-icon">
                          <li><a href="<?php if(isset($footer_row['facebook'])){ echo $footer_row['facebook']; }?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="<?php if(isset($footer_row['twitter'])){ echo $footer_row['twitter']; }?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
<!--                            <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>-->
                            <li><a href="<?php if(isset($footer_row['google_plus'])){ echo $footer_row['google_plus']; }?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="<?php if(isset($footer_row['instragram'])){ echo $footer_row['instragram']; }?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</section>

<?php include 'common/footer.php'; ?>