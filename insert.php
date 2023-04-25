<?php 
include "config.php";
if($_REQUEST['email']){
	$name=$_REQUEST['email'];
	$sql="insert into news_letter values('$name')";
	$result=mysql_query($sql);
	if($result){
	    echo "Data entered Sucessfully";
	}	
}
?>