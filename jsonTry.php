<?php 
	
	
	// first compose the object in the json format then send it on to the other page then 
	// retrieve the values from the other php page here 
	
	// storing all the values inside the array here and then forwarding the request here 
	session_start(); 
	$obj=array(
						"order"=>
						array("burger"=>
						
							array("maha-burger"=>"2","chicken-burger"=>"3") 
							
						),
						array("caffe"=>
						
							array("caffe-latte"=>"4","orange-latte"=>"5"),
							
							),
						array("drinks"=>
						
							array("coke"=>"3","fanta"=>"4"),
							
							
							)
						)
		;
		
		// create an object of this partivular array here 
		$order=$obj; 
		$encode1= json_encode($obj); 
		
		 
		//var_dump($obj); 	
		//echo $obj; 
		
		// initiating a curl object here and then composing the message relevant to it here 
		/*
		$curl=$curl_init(); 
		curl_setopt($curl,CURLOPT_URL,"http://localhost/ajaxRavinder/jujuGit/jsonDecode.php");
		
		// after setting the config we will try to send the object created here
		
		// using another method here
		
		curl_setopt_array($curl,array(
			CURLOPT_RETURNTRANSFER => 1, 
			CURLOPT_URL=>'http://localhost/ajaxRavinder/jujuGit/jsonDecode.php',
			CURLOPT_USERAGENT=>'naman is god',
			CURLOPT_POST=> 1,
			CURLOPT_POSTFIELDS=>$order
		
		
			)
		
		
		
		);  
		
		if(!curl_exec($curl)){
 		   die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
}
		// sending the data here then retrieving the data here
		*/
		//header('Location:http://localhost/ajaxRavinder/jujuGit/jsonDecode.php'); 
		
		// decoding the json object using the php herr 
		
		$data=json_decode($encode1,true);
		
		// here rerieve the value using the loop 
		//var_dump($data);   
		//print_r($data);
		
		$length=count($data);
		
		// using the foreach loop here
		
	
		var_dump($data);
		print_r($data);  
		  
		  // using the foreach loop here
		  // or also we have here and then or also here we have here 
		  // after printing all the values here we get then here
		  echo 'using the foreach loop here'; 
		  echo '<br>'; 
		  foreach($data as $key=>$value){
			  
			  echo $key; 
			  echo '<br>'; 
			  foreach($value as $start=>$final){
				  // print the final value here
				  echo $start; 
				   echo '<br>'; 
				  
				  foreach($final as $category=>$item){
					  
					  echo $category; 
					  echo $item; 
					  echo '<br />'; 
					  
				  }
			  }
			  
		  }
		//foreach($data as $n){
			//echo $n; 
		//}
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