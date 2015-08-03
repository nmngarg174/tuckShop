<?php
	
	require '\start.php';
	
	var_dump($result);
	 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
	
    
    <?php if($result->payment){
		?>
		Payment Successful
		<?php 
	}else{
		?>
        <a href='#'>Pay your on paypal </a>
        <?php
	}
		?>
<body>
</body>
</html>