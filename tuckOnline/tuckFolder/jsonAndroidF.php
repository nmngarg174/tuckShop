<?php 

	$email=$_POST['email'];
	$pass=$_POST['password'];  

        //$email='nmngarg174@gmail.com';
	//$pass='W1FTKQ';  

	$salt='thispasswordcannotbehacked'; 

	$pass=hash('sha256',$salt . $pass);
	
	

	$g1='select count(*) from login1 where email="'.$email.'" and pass="'.$pass.'"';
//echo $g1; 

	$mysql=new mysqli('localhost','tuck','1234561','tuck'); 

	$result=$mysql->query($g1); 
	$row=$result->fetch_array();
	$count=$row[0]; 

	if($count>0){

			$a1=array(); 

	
		$q1='select name,category,price,image from products2 where status=1';

		$result=$mysql->query($q1); 	
        $emparray = array('success'=>'1');
        $x=0;
        while($row =mysqli_fetch_assoc($result))
        {   $x=$x+1;
            $emparray[$x] = $row;
            
        }

        //array_shift($emparray); 
		echo json_encode($emparray); 


//		echo json_encode('success:1'); 	
	}
	else{
		$d=array("success"=>'0'); 
		echo json_encode($d); 
	}

?>