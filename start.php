<?php 
		// creating pat portal using the php and api here
		
		// here we have and then or also we have here and thne ot also we haver her 
		
		// including the concept of the api here and putting it to use here 
		
		require '\pay-pal\vendor\autoload.php';
		session_start(); 
		
		$_SESSION['user_id']=1; 
		
		// write all the api related script here 
		// including the namespaces here 
		
		
		use PayPal\Rest\ApiContext;
		use PayPal\Auth\OAuthTokenCredential;
 
		
		
		$api=new ApiContext(
			new OAuthTokenCredential(
			'ARaT2RCe_cNhI0MCwfWTqGo0kEz-HNjLkyIwDfjjFN16tKB5rkHcSbAwYgjX',
			'ENWhbBDczEZkSCsZzq0hgzZRHSATocQVkG4Q1g1TYY8JpfTY13IJUtvyUPIw'
				)
			);
		
		
		
    $api->setConfig(
        array(
            'mode' => 'sandbox',
			'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => false,
            'log.FileName' => '',
            'log.LogLevel' => 'FINE',
            'validation.level' => 'log',
            'cache.enabled' => true,
            // 'http.CURLOPT_CONNECTTIMEOUT' => 30
            // 'http.headers.PayPal-Partner-Attribution-Id' => '123123123'
        )
    );
	
		try{
		$pdo=new PDO('mysql:dbname=a9748231_user;host=localhost','root','');
		}
		catch(PDOException $e){
			echo $e->getMessage(); 
		}
		
		$user=$pdo->prepare("select * from users where id= :user_id"); 
		
		
		$user->bindParam(':user_id',$_SESSION['user_id']); 
		
		$user->execute(); 
		$result=$user->fetchObject(); 
		
		var_dump($result); 
		
		
		
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