
<?php 

	
	// creating the values here , how  ? 


	$a1=array(); 

	$mysql=new mysqli('localhost','tuck','1234561','tuck'); 

	$q1='select name,category,price,image from products2 where status=1';

	$result=$mysql->query($q1); 
        $emparray[] = array();
        while($row =mysqli_fetch_assoc($result))
        {
            $emparray[] = $row;
        }
        array_shift($emparray); 
	echo json_encode($emparray); 




?>