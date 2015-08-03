<?php 
	//error_reporting(0);
	
	//creation of a session and a cookie as well for the previously stored values 
	$erruser='';
	$errpass='';
	$errmmsg='';	
	session_start(); 
/*	
	if(isset($_SESSION['name']) and !empty($_SESSION['name'])){
		//retransfer it to the session page 
		header("Location:sort.php"); 	
	}
	*/
	if(!isset($_POST['submit'])){
	//	$name=(isset($_COOKIE['name']))?$_COOKIE['name']:''; 	
	
		
		
?>

<?php 
	
	}else{
		
		//$name=strip_tags($_POST['name']); 
		//$password=strip_tags($_POST['password']);
		
		$name=addslashes($_POST['name']); 
		$password=addslashes($_POST['password']);
		//echo $name; 
		//echo $password; 
		if(empty($name)){
				//use code to show the error message 
			//	die('Please enter the username '); 
				$erruser='Please enter the username'; 
		}
		
		if(empty($password)){
			//	die('Please enter the password');		
				$errpass='Please enter the password';
				 
		}
	
	if(!empty($password) and !empty($name)){
	
	//$mysqli=new mysqli('localhost','root','','a9748231_user'); 
		$mysqli=new mysqli('localhost','tuck','1234561','tuck');
			$sql=("select * from retailer where name='".$name."' and password='".$password."'");
			
			$result=$mysqli->query($sql); 
			if($result->num_rows>0){
				
						//start the new session here
						//session_start(); 
						
						$_SESSION['name']=$name; 
						
						if(($_POST['remember'])){
							setcookie('name',$_POST['name'],mktime()+86400);	
						}
						//after creating the cookie move from here 
						
						header('Location:indexNew.php?log=in'); 
			}else{
					//echo 'You entered incorrect password or username'	; 
					$errmmsg= 'Entered username and password are wrong !! '; 
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Hostel J</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
    
	<body>
<!--login modal-->

<img src="thaparImg/hostelj.jpg" style=" height:768px; width:1400px;  background-repeat:no-repeat; ">

<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Sign In</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" action='login1.php' method='post' >
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Username" name='name'>
              <span class='error'><br /><?php echo $erruser ?></span>
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Password" name='password'>
              <span class='error'><br /><?php echo $errpass; echo $errmmsg ?></span>
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block" name='submit'>Sign In</button>
             <!-- <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>-->
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <a href='start.html'><button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button></a>
		  </div>	
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>