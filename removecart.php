<?php
session_start();
$id=$_GET['page'];
$max=count($_SESSION['product_id']);
for($i=0;$i<$max;$i++){
if($id==$_SESSION['product_id'][$i]){
unset($_SESSION['product_id'][$i]);
} }
if(count($_SESSION['product_id']) =="0"){
	header('location:empty-cart.php');
}
else{
header('Location:cart.php');
}
?>