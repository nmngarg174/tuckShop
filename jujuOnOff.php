<?php 
	
	
	//include('jujuCreden.php');
	$mysqli=new mysqli('localhost','root','','a9748231_user'); 
	 
	
	$sql='select status from juju'; 
	
	$result=$mysqli->query($sql);
	
	// find the values here
	
	$row=$result->fetch_array(); 
	
	$n=$row[0]; 
	
	if($n==0){
		$status=1; 	
	}else{
		$status=0; 
	}
	 
	 $sql1='update juju set status='.$status.''; 
	
	if($mysqli->query($sql1)){
		
		echo 'value updated here'; 
	}else{
		echo 'some error occured';	
	}
	 
	header("location:indexNew.php?log=in");
	  
?>
