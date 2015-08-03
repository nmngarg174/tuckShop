<?php 
	
	
	// creating the toggle.php here , how ? 
	
	$mysql=new mysqli('localhost','root','','tuck'); 
	//$mysql=new mysqli('localhost','tuck','1234561','tuck');
	$value=$_POST['value']; 
	$status=$_POST['status']; 
	echo $value; 
	$value=(int)$value; 
	$status=(int)$status; 
	
	// get the present status value here 
	
	
	// after getting status here we toggle its value here , how ? 
	if($status==1){
	
	$sql='update products2 set status=0 where id='.$value.'' ; 
	$mysql->query($sql); 
	}else{
		
	$sql='update products2 set status=1 where id='.$value.'' ;
	$mysql->query($sql); 
	}
	
	// after setting the value here we have and then or also we have here 
	// how ? 
	
	
	return $value; 
	
?>