<?php 
	
	// creating the verify.php here  , how ? 
	session_start(); 
	$mysql=new mysqli('localhost','root','','tuck');
	
	$name=$_POST['email'];
	$pass=$_POST['pass'];  
	
	
	$query='select count(*) from login where email="'.$name.'" and pass="'.$pass.'"';
	//echo $query; 
	$result=$mysql->query($query);
	
	//$count=$result->num_rows; 
	 $row=$result->fetch_array();
	 
	  $count=$row[0]; 
	 if($count>0){
		 //echo 'Login Successful';
		//header('Location:start.php');
		// save the values here
		$_SESSION['name']=$name;
		$_SESSION['pass']=$pass;    
		echo '1'; 
		 
		//return 1 ;
	 }else{
		 echo '0';
		 //return 0 ; 
		//echo 'incorrect password or email';  
	 }

	
	 

?>

