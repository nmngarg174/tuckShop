<?php
include "config.php";
$email=$_POST['email'];
$password=$_POST['password'];
$food=$_POST['food'];
$response = array(); 
if($result=mysql_query("Select `userlogin`.`name`,`userlogin`.`address`,`userlogin`.`phone` from userlogin where `userlogin`.`email`='$email' and `userlogin`.`password`='$password'")){
	$row=mysql_num_rows($result);
	if($row==1){
		$fetch=mysql_fetch_array($result,MYSQL_ASSOC);
		$name=$fetch['name'];
		$address=$fetch['address'];
		$phone=$fetch['phone'];
		if(mysql_query("INSERT INTO order_food (name,address,phone,food) VALUES ('$name','$address','$phone','$food')")){
			$response['success']=4;//successfully inserted
                }
		else{
                        echo mysql_error();
			$response['success']=5;//something went wrong
		}
	}
	else{
			$response['success']=5;//something went wrong
	}
}
else{
	$response['success']=5;//something went wrong
}
echo json_encode($response);
?>
