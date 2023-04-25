<?php 
session_start();
include 'config.php';
$errmsg=''; 
if(null !== $_REQUEST["auth_key"]){
 
 $customer_auth_key=$_REQUEST["auth_key"];
// print_r($_POST);
 //echo $password;
 //die();
 $sql="SELECT * FROM customer_login WHERE customer_auth_key='$customer_auth_key'";
 $res=mysql_query($sql);
 $num_row=mysql_num_rows($res);
 if($num_row==1)
 {
	 $date=date("y-m-d");
	 $row=mysql_fetch_array($res);
	  $_SESSION['customer_id']=$row['customer_login_id'];
	 
	 $blank_query="update customer_login set customer_auth_key='',customer_verif_date='$date',status='1' where customer_login_id='".$row['customer_login_id']."'";
	$result=mysql_query($blank_query);
	if(!$result)
	{
	echo "Something went wrong ";
	}
	else{
	echo "your verification done";
	echo "</br> Thank You";
	}	 
	}
	}
?>