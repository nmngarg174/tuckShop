<?php 
	
	// how to get the values from the android phone here 
	//echo date("Y-m-d h:i:s");
	include('jujuCreden.php'); 
	//$mysqli=new mysqli('localhost','root','','a9748231_user'); 
	
	
	$sql='select count(*) from cart_online'; 
	
	$result=$mysqli->query($sql);
	
	$row=$result->fetch_array(); 
	$oid=$row[0]; 
	$oid+=1; 
	
	$email=$_POST['email'];
	$password=$_POST['password'];  
	// from the mail and password get all the values here 
	
	$sqlR='select * from userlogin where email="'.$email.'"'; 
	
	//echo $sqlR; 
	$resultR=$mysqli->query($sqlR);
	$rowR=$resultR->fetch_array(); 
	
	$name=$rowR[0]; 
	$address=$rowR[3]; 
	$phone=$rowR[2];
	
	$food=stripslashes($_POST['food']); 
        //echo $food;  
	/*
	$food='{
			
			"category":["burger","pizza","drinks"],
				"burger":{
				"maha-burger":"2","chicken-burger":"4" 	
				},
				
				"pizza":{
					"chicken":"2","onion":"5"	
				},
				
				"drinks":{
					"fanta":"5","coke":"7"
				}
		
		
		
	}'; 
	
	
	
	*/
	
	
	// understand the json concept throughly here
	// parse the above string here then store in the database here and then display it to the vendor here
	
	$obj=json_decode($food); 
	
	//var_dump($obj) ;
	// or also we have here and then or also we have here
	
	
	$bill=0; 
	
	$category=$obj->category; 
	$length=count($category);
	
	$sql1='insert into cart_online(name,bill,address,oid,email,status,phone) values("'.$name.'",'.$bill.',"'.$address.'",'.$oid.',"'.$email.'","waiting","'.$phone.'")';
	
	// execute the above query here 
	//echo $sql1; 
	
	
	if(!$mysqli->query($sql1)){
		//echo 'some error occured';
		$response['success']=5;
		echo json_encode($response); 
	}else{
		$response['success']=4;
		echo json_encode($response); 
	}
	  
	  // now insert the values for the order here
	  // calculate the net bill as well here and then print it here
	  $q=0; 
	for($i=0;$i<$length;$i++){
			// display all the values here
			//echo $category[$i]; 
			$items=$obj->$category[$i]; 
			foreach($items as $key=>$value){
				//echo $category[$i]; 
				//echo $key; 
				//echo $value;
				$q+=(int)$value;  
				//echo '<br>'; 
			
				
				$sqlN='insert into product_online2(oid,category,item,quantity,orderDate) values('.$oid.',"'.$category[$i].'","'.$key.'",'.$value.','.date("Y-m-d H:i:s").')';
				$mysqli->query($sqlN);
				 
				// its working now , insert the values into the db 
			}
	}
	
	//echo '<br>';
	//echo $q;
	
	$bill=$q*50;
	
	$sqlB='update cart_online set bill='.$bill.' where oid='.$oid.'';
	//echo $sqlB;  
	$mysqli->query($sqlB); 
	 
	 
?>

