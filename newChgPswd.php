<?php
	
	//changing the password 
	// script not working here
	
	error_reporting(0);
	
		session_start(); 
	
	if(isset($_SESSION['name'])){
		
		$username=$_SESSION['name'];  
	}
	
	if($username==''){
		header('Location:start.html'); 
	}
	
	//error_reporting(0); 
	if(isset($_POST['submit']))
	{
		
		$pwd1=$_POST['pwd1']; 
		//echo $name; 
		//echo $pwd1; 
		$pwd2=$_POST['pwd2']; 
		//echo $password;
			//echo $pwd2 ; 
		$pwd3=$_POST['pwd3'];
			//echo $pwd3; 
		$mysqli=new mysqli('localhost','root','','a9748231_user');
		
		if(!strcmp($pwd2,$pwd3)){
			//echo 'match';	
				$sql1='select password from retailer where name="'.$_SESSION['name'].'"';
				//echo $sql1;  
				$result=$mysqli->query($sql1); 
				$row=$result->fetch_array(); 
				//echo $row[0]; 
				
				if(!strcmp($pwd1,$row[0])){
					
					//change the password 
					
					$sql3='update retailer set password="'.$pwd2.'" where name="'.$_SESSION['name'].'"';
				//	echo $sql3; 
					if($mysqli->query($sql3)){
							$_SESSION['messagePSWD']='Password updated successfully';
							unset($_SESSION['errmsg']);
					}else{
					//	echo 'error occured' ; 	
					}	
				}
				 
		}else{
			$_SESSION['errmsg']='New passwords dont match'; 
			unset($_SESSION['messagePSWD']);	
		}
		
		//$sql='insert into retailer(name,password) values("'.$name.'","'.$password.'") ';
		
		// after insertion 
		
		
		  
		
		
	}

	
	
?>

<style>

.jumbotron {
	
	background-color:black; 
	opacity:1; 	
	color:black;	
}
.no{
	color:black;	
	opacity:1;
}

.put{
	margin-left:2px; 
	 	
	color:white; 
	font-size:18px;
}


.btn btn-default{
	
	position:relative; 
	float:left;  
	color:white; 
	margin-left:80%; 
	margin-bottom:50px; 
	font-size:18px;	
}
</style>


<style> 

a{
	color:#48577D; text-decoration:none; 
}

a:hover{
	text-decoration:underline; 	
}

body{
	
	font-family:verdana; 
	font-size:12px;
	color:#444;  
}

h1,h2{
	margin-bottom:15px; 	
}

h1{
	font-size:18px; 
	font-size:14px; 	
}

/*
#container{
	width:700px; 
	margin::150px auto; 
	backgroung-color:#eee; 
	padding:15px; 	
	overflow:hidden; 
}
*/
#main{
	width:490px; 
	float:left; 	


}

#main table{
	width:480px; 
		
}

#main table th{
	padding:10px; 
	background-color:#485770; 
	color:#fff; 
	text-align:left; 	
}

#main table td{
	padding:5px ; 	
}

#sidebar{
	width:200px ; 
	float:left; 	
}

</style>


    
<style> 	
	
	.sidemenu { position: fixed;  left: 10px; background: white; width: 120px; top:89px; }
		
	.sidemenu li { margin: 5px; padding: 5px; ; text-align: left; }
	.sidemenu li.selected { background: white; }
	.sidemenu a { text-decoration: none; color: #bbbbff; }
	.sidemenu a:hover { color: #fff; }
	ul{
		list-style-type:none; 	
	}
	
	.shift{
		position:fixed; 
		top:170px;	
	}
	
	
</style>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JuJu's Cafe</title>
	
     <link href="css/grayscale.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
    <!-- Custom CSS -->
   

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	
    
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main_gray.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    
    

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" >

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top wow fadeInDown animated" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                
                <a class="navbar-brand page-scroll" href="#page-top" style="color:#696">
                    <i class="glyphicon glyphicon-glass"></i>  <span class="light" style="color:#696">JuJu's</span> Cafe
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav" >
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden" >
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="indexNew.php" style="color:#696">Juju</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="newAddItem.php" style="color:#696">Add An Item</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="newAdd.php?log=in" style="color:#696">Add A Category</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="newAddEmp.php?log=in" style="color:#696">Add Employee</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="newChgPswd.php" style="color:#696">Change Password</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="logOut.php?log=logout" style="color:#696">Log-Out</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	
    <section id="about-us "  >
    
			
            
			<!-- about us slider -->
			
 <div class='container-fluid'>
                </div>
                    <div class='row'>
                    <h1 style="position:relative; left:25px; color:#666;"><center>Change the password</center></h1>
                    
                    <div class='text-danger' style="position:relative; left:20px; "><center>
                    <?php echo $_SESSION['messagePSWD'] ?>
                    <?php echo $_SESSION['errmsg']?>
                    </center>
                    </div>
                    <div class='col-md-4'>
                    </div>
                    	<div class='col-md-4' style="position:relative; left:25px; text-align:center;">
                        	<!-- To add an item in the menu we populate a list of all the categories , after selecting the category he uploads a file and writes its name there  
                            -->
                            <form class='form-horizontal' role='form' action='newChgPswd.php' method="post" enctype="multipart/form-data">
                            	
                                <div class='form-group'>
                                
                                    
                                	<label for='pwd1' class='control-label'>Enter the previous password</label>
                                    
                                	<input type="password" id='pwd1' name='pwd1' class="form-control"   />
                                   
                                </div>
                                <br />
                                <div class='form-group'>
                                
                                    
                                	<label for='pwd2' class='control-label'>Enter the new password</label>
                                    
                                	<input type="password" id='pwd2' name='pwd2' class="form-control"   />
                                   
                                </div>
                                <br />
                                <div class='form-group'>
                                
                                    
                                	<label for='password' class='control-label'>Renter the new password</label>
                                    
                                	<input type="password" id='pwd3' name='pwd3' class="form-control"   />
                                   
                                </div>
                                <br />
                                
                                <div class='form-group'>
                                <button type="submit" name='submit' class='btn btn-default'>change the password</button>
                                </div>
                                     </form>
                        </div>
                </div>
                </div>                        
                </div>
</div>           
                	
</div>
                    
                 
                 
            

			
	
</section>
    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

</body>

</html>
