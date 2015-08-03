<?php 
	// adding the category to the database using the normalization 
	error_reporting(0);
	
		session_start(); 
	
	if(isset($_SESSION['name'])){
		
		$username=$_SESSION['name'];  
	}
	
	if($username==''){
		header('Location:start.html'); 
	}
	error_reporting(0); 
	include('jujuCreden.php');
	//$mysqli=new mysqli('localhost','root','','a9748231_user');
	
	// first rerieve the id values of the last item add 100 to it then insert the new item 
	
	if(isset($_POST['submit'])){
		//	echo 'reacj';
		$category=$_POST['category']; 
	
	$sql1='select max(id) from addcategory ';
	
	$result=$mysqli->query($sql1);
	
	$row=$result->fetch_array();   
	
	$val=$row[0]; 
	
	$val+=100; 
	//echo  $val;
	$sql='insert into addcategory(id,category,endValue,updateStatus) values ('.$val.',"'.$category.'",'.$val.',1)'; 
//	echo $sql;
	if($mysqli->query($sql)){
			$_SESSION['message1']='Category is inserted'; 
			//echo 'bjhbjh';
		}
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
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                        <a class="page-scroll" href="#" style="color:#696">Add A Category</a>
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
    
        <div class="container " style="position:relative; top:40px;"  >
			<div class='center  wow fadeInDown animated'>
				<h2 style="color:#696"></h2>
				<p class="lead" style="color:#696"><br></p>
	
    
    				<!-- srart -->
                    
                    
   <div class='container-fluid'>   
                    <div class='row'>
                    
                                    <h1 style="position:relative; left:25px; color:#666">Add a Category</h1>
                    <div class='text-danger' style="position:relative; left:20px; ">
                    <?php echo $_SESSION['message1'] ?>
                    </div>
                    	<div class='col-md-12 col-xs-12' style="position:relative; left:25px; ">
                        	<!-- To add an item in the menu we populate a list of all the categories , after selecting the category he uploads a file and writes its name there  
                            -->
                            <div class='col-md-4 '>
                            </div>
                            <div class='col-md-4 col-xs-12'>
                            <form class='form-horizontal' role='form' action='newAdd.php' method="post" enctype="multipart/form-data">
                            	
                                <div class='form-group'>
                                
                    
                                	<label for='category' class='control-label'>Enter the category</label>
                                    
                                	<input type="text" id='category' name='category' width=50px; class="form-control"   />
                                   
                                </div>
                                <button type="submit" name='submit' class='btn btn-default'>Enter the Category</button>
                                     </form>
                        </div>
                        
                </div>
</div>          
<div class='col-md-4'>
</div>    
    		</div>
			</div>
			<!-- about us slider -->
			
                	
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
