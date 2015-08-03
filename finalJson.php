<?php 
	
	// the format i want the data is here
	// enter the category no. here and accordingly get the values for the qty and then final price for the bill here
	// create the foriegn key here and then select the values here
	
	$mysqli=new mysqli('localhost','root','','a9748231_user'); 
	
	// get the oid value for the customer here and then store it there 
	
	$sql='select count(*) from cart_online'; 
	
	$result=$mysqli->query($sql);
	
	$row=$result->fetch_array(); 
	$oid=$row[0]; 
	$oid+=1; 
	
	echo $oid; 
	
	$name='naman garg'; 
	$email='nmngarg174@gmail.com';
	
	// from the mail and password get all the values here 
	
	$sqlR='select * from userlogin where email='.$email.''; 
	
	$resultR=$mysqli->query($sqlR);
	$rowR=$resultR->fetch_array(); 
	
	$name=$rowR[0]; 
	$address=$rowR[3]; 
	$phone=$rowR[2];
	
	
	// now insert the values into the database here
	$food='{
			
			"name":["naman garg"],
			"email":["nmngarg174@gmail.com"],
			"category":["burger","pizza","drinks"],
			"phone":["8437928163"],
			"address":["ef-608 j hostel thapar university"],	
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
	
	// understand the json concept throughly here
	// parse the above string here then store in the database here and then display it to the vendor here
	
	$obj=json_decode($food); 
	
	//var_dump($obj) ;
	// or also we have here and then or also we have here
	
	/*
	$name=$obj->name; 
	$address=$obj->address; 
	$email=$obj->email; 
	$phone=$obj->phone; 
	$bill=0; 
	*/
	//var_dump($name); 
	//echo $name[0];
	// insert the order date as well inside the database here
	
	
	$sql1='insert into cart_online(name,bill,address,oid,email,status,phone) values("'.$name.'",'.$bill.',"'.$address.'",'.$oid.',"'.$email.'","waiting","'.$phone.'")';
	
	// execute the above query here 
	echo $sql1; 
	
	$length=count($category);
	$category=$obj->category; 
	$bill=0; 
	
	if(!$mysqli->query($sql1)){
		echo 'some error occured';
	}
	  
	  // now insert the values for the order here
	  // calculate the net bill as well here and then print it here
	  $q=0; 
	for($i=0;$i<$length;$i++){
			// display all the values here
			//echo $category[$i]; 
			$items=$obj->$category[$i]; 
			foreach($items as $key=>$value){
				echo $category[$i]; 
				echo $key; 
				echo $value;
				$q+=(int)$value;  
				echo '<br>'; 
				$sqlN='insert into product_online2(oid,category,item,quantity) values('.$oid.',"'.$category[$i].'","'.$key.'",'.$value.')';
				echo $sqlN; 
				echo '<br>';
				$mysqli->query($sqlN);
				 
				// its working now , insert the values into the db 
			}
	}
	
	echo '<br>';
	echo $q;
	
	$bill=$q*50;
	
	$sqlB='update cart_online set bill='.$bill.' where oid='.$oid.'';
	echo $sqlB;  
	$mysqli->query($sqlB); 
	 
	// after getting these values store them in a db and then show then there 
	// after inserting all the values its over here
	// its working now , insert the order date here and then improve the ui interface and security here
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>