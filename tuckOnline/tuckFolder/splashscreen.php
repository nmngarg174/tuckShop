<?php 
	
	$mysqli=new mysqli('localhost','tuck','1234561','tuck');
	//$mysqli=new mysqli('localhost','root','','a9748231_user');
	
	// here we have and 
	
	$sql='select status from juju;'; 
	
	$result=$mysqli->query($sql);
	
	$row=$result->fetch_array(); 
	$status=$row[0]; 
	$response=array('success'=>$status); 
	// here we have and 
	
	
	
	echo json_encode($response); 
	
	
?>