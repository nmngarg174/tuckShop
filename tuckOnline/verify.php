<?php 
	
	// creating the verify.php here  , how ? 
	session_start(); 
	//$mysql=new mysqli('localhost','root','','tuck');
	
	$mysql=new mysqli('localhost','tuck','1234561','tuck');
	$name=$_POST['email'];
	$pass=$_POST['pass'];  
        $room=$_POST['room']; 

        
        $q1='update registration set roomno="'.$room.'" where email="'.$name.'"'; 
	
     //   echo $q1; 
	$salt = "thispasswordcannotbehacked";
        $pass = hash('sha256', $salt . $pass);

        
        // make the changes directly into the db here  
	$query='select count(*) from login1 where email="'.$name.'" and pass="'.$pass.'"';
	//echo $query; 
	$result=$mysql->query($query);
	
	//$count=$result->num_rows; 
	 $row=$result->fetch_array();
	 
	  $count=$row[0]; 
	 if($count>0){
		 //echo 'Login Successful';
		//header('Location:start.php');
		// save the values here
                $mysql->query($q1); 
		$_SESSION['namEmail']=$name;
		$_SESSION['pass']=$pass;    
		echo '1'; 
		 
		//return 1 ;
	 }else{
		 echo '0';
		 //return 0 ; 
		//echo 'incorrect password or email';  
	 }

	
	 

?>

