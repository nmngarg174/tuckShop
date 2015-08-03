// creating the time script using the php here 

<?php 

	date_default_timezone_set("Asia/Kolkata");
	$t1=date("His"); 

	echo $t1; 

	// after getting the time here , we have here and then or also we have here 
	// store the date and time the 24 hour format as am and pm cant be compared here 


	$t2=170000; 
	$t3=173000;

	$t4=223000; 
	$t5=234500; 
      
       // $t4=000001;   
//$t5=235959;

		if(($t1<=$t3 && $t1>=$t2) || ($t1<=$t5 && $t1>=$t4)){

				echo 'Welcome to the Tuck Shop'; 

		}else{

			echo 'Tuck App is closed right now '; 
		}



?>