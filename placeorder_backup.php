<?php
session_start();
include('config.php');
//$did=$_GET['action'];

 $max=count($_SESSION['product_id']);
for($i=0;$i<$max;$i++){
    $proid=$_SESSION['product_id'][$i];
    $q=$_SESSION['qty'][$_SESSION['product_id'][$i]];
    $customer_id=$_SESSION['customer_login_id'];
	$date = date('Y-m-d H:i:s');
    mysql_query("insert into order_table(customer_id,product_id,product_quantity,date) values ('$customer_id','$proid','$q','$date')");
    //$last_id=mysql_insert_id();
	//echo "$last_id";
}
	
	header('location:customer-details.php');
  


?>