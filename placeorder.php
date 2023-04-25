<?php
session_start();
include('config.php');
//$did=$_GET['action'];
     require 'PHPMailer-master/PHPMailerAutoload.php';
     $mail = new PHPMailer;   
     $mail->IsSMTP();                           // telling the class to use SMTP
     $mail->SMTPAuth   = true;                  // enable SMTP authentication
     $mail->SMTPSecure = 'ssl';
     $mail->Host = "sg2plcpnl0059.prod.sin2.secureserver.net";      
     $mail->Port = 465; // or 587             // set the SMTP port
     $mail->Username   = "support@touchsolutionskolkata.com"; // SMTP account username
     $mail->Password   = "support@4";  
     $mail->setFrom('support@touchsolutionskolkata.com', 'Touch Solution');
	 
	 
 $max=count($_SESSION['product_id']);
 for($i=0;$i<$max;$i++){
    $proid=$_SESSION['product_id'][$i];
    $q=$_SESSION['qty'][$_SESSION['product_id'][$i]];
    $customer_id=$_SESSION['customer_login_id'];
	$date = date('Y-m-d H:i:s');
    mysql_query("insert into order_table(customer_id,product_id,product_quantity,date) values ('$customer_id','$proid','$q','$date')");
    $last_id=mysql_insert_id();
	//echo "$last_id";
	
}
	if(isset($last_id)){
		
		$customer_data="select * from customer_login where customer_login_id='$customer_id'";
		$cust_result=mysql_query($customer_data);
		$cust_row=mysql_fetch_array($cust_result);
		
     $mail->addAddress($cust_row['customer_email'],$cust_row['customer_name']);  // Add a recipient  
   
     $mail->addAddress('Touchsolutionkolkata@hotmail.com', 'Touch Solution');  // Add a recipient   
    
    
     $mail->AddBCC('savish@4sourcetechnologies.com', 'Savish'); 	 // Add a recipient   
	 
    $mail->isHTML(true);
    $mail->Subject = 'Order Detail';
    $mail->Body    = '<h2>Touch Solution</h2><br>
                    ------------------------<br>
					 <table>
					<thead>
					<tr>
						<th>Item</th>
						<th>Qty</th>
						<th>Price</th>
						
						<th>Subtotal</th>
					  </tr>
				</thead>
				<tbody>';
				
                          $sum = 0;
                         foreach($_SESSION['product_id'] as $id){
                         $sql="SELECT * FROM product where product_id='$id'";
                       $res=mysql_query($sql);
                        while($row=mysql_fetch_array($res))
						{
          $mail->Body .= '<tr>
                <td>
                   
                        <img src="http://www.touchsolutionskolkata.com/uploads/'.$row["product_image"].'" height="120" width="120">    
                   <br>
                         <p><b>'.$row["product_name"].'</b></p>
                         
                </td>
				<td>'.$_SESSION["qty"][$id].'</td>
                <td>'.$row["product_price"].'</td>
               
                <td>Rs '.$row["product_price"]*$_SESSION["qty"][$id].'  </td> 
				
              </tr>';?>
			<?php  $sum += $row["product_price"]*$_SESSION["qty"][$id]; ?>
			  <?php  } } 
         $mail->Body .= '<tr>
                  <td>
                      <h4>Amount Payable : Rs-'.$sum.' </h4>
                  </td>
              </tr>
            </tbody>
			
		  </table>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';           
				 if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                  echo "<script>alert('Your message has been send successfully')</script>";
                }		
}
  header('location:customer-details.php');


?>