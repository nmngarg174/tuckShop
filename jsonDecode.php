<?php 
	
	
	// reading the data from the user then 
	
	// here we have using the file_get_contents here and then or also we have here 
	
	$data=json_decode(file_get_contents('php://input'),true);
	
	var_dump($data); 
	 
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