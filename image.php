
<?php

	
	$fileName=$_FILES['upload']['name']; 
	$fileTmp=$_FILES['upload']['tmp_name']; 
	$fileError=$_FILES['upload']['error']; 
	$fileSize=$_FILES['upload']['size'] ; 
	$fileExt=$_FILES['upload']['type'];
	
	// after all the credentials match with the conditions here
	
	if(!$fileTmp){
		//set the path to the default image for an item  
		 	
	}
	
	// rather then uploading the file , try to copy it directly into the database and first rename it , then convert to jpg and then resize it then insert it into the database 
	
	
	// first get the file extension 
	
	$end=explode('.',$fileName);
	$fileExt=end($end);  
	
	$target='images/uploads/'.$fileName;
	
	if(!move_uploaded_file($fileTmp,$target)){
		echo ('file not uploaded !! '); 
	}
	// after getting the fileExtension convert into the jpeg format here 
	include_once('imageConvert.php');
	
	if(strtolower($fileExt)!='jpg' ){ 
	
		$targetFile='images/uploads/'.$fileName;
		$newName='images/uploads/'.$end[0].'.jpg'; 
		// now the function here 
		img_convert_to_jpg($targetFile,$newName,$fileExt); 
	
	}else{
		$targetFile='images/uploads/'.$fileName;
		$newName=$targetFile; 
		
	}
	
	$fileName=$end[0].'jpg'; 
	
	$target_file=$newName;
	$newResize='images/uploads/'.$end[0].'.jpg'; 	
	
	//after getting all the values here try to solve for the values of the 
	
	$wmax=100; 
	$hmax=100; 
	echo $target_file; 
	echo $newResize; 
	$fileExt='jpg'; 
	img_resize($target_file,$newResize,$wmax,$hmax,$fileExt);
	
	// now insert the image into the database and along with it its name and itemno. 
	
	// first rename the image here and then upload it into the database 
	
	$mysql=new mysqli('localhost','root','','a9748231_user');
	
	// get the id for the new product from the db by selectting the last element 
	//use the javascript validation for the form on your webpage 
	 
	$category=$_POST['category']; 
	$sql='select id from products1 where category="'.$category.' "order by id desc limit 0,1';
	
	$result=$mysql->query($sql); 
	
	//echo $result; 
	
	$id=$result->fetch_array(); 
	
	echo $id[0];	
	
	// after getting the id increment and insert the item into the db 
	
	$name=$_POST['name'];
	$id[0]+=1; 
	echo $id[0]; 
	$target='C:/wamp/www/ajaxRavinder/jujuGit/images/uploads/'.$end[0].'.jpg';
	echo $name; 
	echo $target; 
	
	$sql1="insert into products1(id,name,category,price,images) values(".$id[0].",'".$name."','".$category."',50,load_file('".$target."'))";
	echo $sql1; 

	if($mysql->query($sql1)){
		echo 'value has been inserted '; 	
	}else{
		echo 'not inserted';	
	}
	 
	 // also make the updateStatus for the correspoinding cate 1 in the other table herer 
	 // image is working but not inserted here , why ? 
	 $sqlUpdate='update addcategory set updateStatus=1 where category="'.$category.'"';
	 session_start(); 
	 
	 if($mysql->query($sqlUpdate)){
		 echo 'Value has been updated too in the update table here' ; 
	 }
	 $_SESSION['message']='Item has been entered successfully';
	 
	 header('location:newAddItem.php'); 
	 //location('addProduct.php');  
	// or also we have here and then or also we have here 
	
	// after inserting the values insert the value for the   	
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