<?php 
session_start();
include "config.php";
if(isset($_GET['page']))
{
 echo $id=$_GET['page'];
echo $sql="SELECT * FROM product WHERE product_id='$id'";
$res=mysql_query($sql);
$row=mysql_fetch_array($res);
 if(in_array($row['product_id'], $_SESSION['product_id']))	{
		
 $_SESSION['qty'][$row['product_id']] +=1; 
  }else{	  
  $_SESSION['product_id'][]=$row['product_id'];
  $_SESSION['qty'][$row['product_id']]="1";   
  //print_r($_SESSION);
}
header('Location:cart.php');
}
?>