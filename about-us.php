<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>About Us | Corlate</title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
	
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    
    
</head><!--/head-->

  <script>
   
	$(document).ready(function(){
		$('#about-us .container .center wow fadeInDown .lead .container .col-md-2 #sidemenu').visualNav(
		{
		     	
		}
		);
	});
	
	</script>
 
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


<?php 
 	
	session_start();
	
	// verify the session here
	
	$log=$_REQUEST['log'];
	
	error_reporting(0); 
	
	if($log=='logout'){
		unset($_SESSION['name']); 
		unset($_SESSION['cart']);
	//	unset($_SESSION['cart']); 
		//header("Location:login1.php");  
	}
	
	$name=$_SESSION['name']; 
	
	// find the value for the name here
	// create a logout button here and use it here
	if(empty($name)){
	//	header("Location:login1.php"); 
	
	}
	
	$mysqli=new mysqli('localhost','root','','a9748231_user');
	
	if(isset($_GET['page'])){
		
		$pages=array("products","cart");
		
		if(in_array($_GET['page'],$pages)){
		
		$_page=$_GET['page']; 
			
		}else{
			
			$_page='products'; 	
		}
		
	}else{
		
		$_page='products'; 
	}
 
?>

<body>

    <header id="header">
    
        <nav class="navbar navbar-inverse navbar-fixed-top" role="banner" >
            <div class="container" >
                <div class="navbar-header " >
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right ">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="about-us.html">About Us</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-item.html">Blog Single</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="404.html">404</a></li>
                                <li><a href="shortcodes.html">Shortcodes</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html">Blog</a></li> 
                        <li><a href="contact-us.html">Contact</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
	</header><!--/header-->
<div class='row'>
</div>
    <section id="about-us "  >
    
        <div class="container " style="position:relative; top:40px;"  >
			<div class='center hidden-xs wow fadeInDown'>
				<h2>Menu</h2>
				<p class="lead"><br>Gourmet is ready to be served</p>
			</div>
			
			<!-- about us slider -->
			
            <div class="container"> 
                	<div class='col-md-1'> 
                    
                    <div class="sidemenu " id="sidemenu" data-wow-duration="1000ms" data-wow-delay="600ms">
                  
                    <h5>Categories</h5>
                    <ul class='nav nav-pills nav-stacked'>
                    	<li><a href='#wrap'>Wraps</a></li>
                        <li><a href='#burger'>Burger</a></li>
                        <li><a href='#caffe'>Caffe</a></li>
                        <li><a href='#juice'>Juices</a></li>
                        <li><a href='#frappe'>Frappe</a></li>
                        <li><a href='#icetea'>IceTea</a></li>
                        <li><a href='#icecream'>IceCream</a></li>
                        <li><a href='#maggi'>Maggi</a></li>
                        <li><a href='#pasta'>Pasta</a></li>
                        <li><a href='#pepsi'>Pepsi</a></li>
                        <li><a href='#sandwich'>Sandwiches</a></li>
                        <li><a href='#ontherocks'>OnTheRocks</a></li>
                        <li><a href='#lite'>Lite</a></li>
                        
                        
                          
                    </ul>
                    
                    </div>
               	  </div>
             	         
           		  <div class='col-md-9'> 
									
                                    
                                    
                                  
     			
	<!--<div id=container style="margin-left:340px;">  -->
		<!--<h1>Product List</h1>-->    	
        		<div id=''  data-wow-duration="1000ms" data-wow-delay="1100ms">
        
       					 <?php require($_page.".php") ; ?> 
        	
      	  </div>
        <!--
        <a href='home.php?log=logout'>Log Out </a><br /> -->
        
        
        <!--<div id='sidebar'>-->
        		<!-- insert the cart code here-->
                        	
   							 </div>
                             
                             
                  <div class="col-md-2">
                  		
                  <div class="shift " data-wow-duration="1000ms" data-wow-delay="600ms"><span class="put"><a href='../../../Users/princEvil/Desktop/project/www.juju.in'><img src="images/juju.jpg"/></a></span> 
    
                <h4>Juju Cart</h4>
                
                <?php 
                if(isset($_SESSION['cart'])){
                	
					$sql_c="select * from products1 where id in ("; 
					
					foreach($_SESSION['cart'] as $id=>$value){
						$sql_c.=$id.",";
					}
					
					// subtract the comma from the end here
					$sql_c=substr($sql_c,0,-1).") order by id asc"; 
					
				//	echo $sql_c; 
					
					// print all the items in the cart here 
					
					$result=$mysqli->query($sql_c);
					 
					if($result->num_rows>0){
						
						while($row=$result->fetch_array()){
							// print all the values of the cart here
							?>
                            
                            <p><h5> <?php  echo $row['name'] ?> x <?php  echo $_SESSION['cart'][$row['id']]['quantity'] ?> </h5></p>
                            <?php
							
						}
						 // draw the line 
						?>
                        
                                               
                        <hr /> 
                        
                        <a href='cart.php' >Go to the cart page </a>
                        
                        <?php
					}
					
                }else{
					echo 'Your cart is empty. Please add some products..'; 	
				}
				
				?>
       <!-- </div> -->
       <br />
       <br />
       <br />
       <br />
       			          <a href='search.php?log=logout'><button class='btn btn-danger' style="float:right;" name='log'>Log Out</button></a>
      
        </div>
                    		
      
                
               
                
                
                			    </div>
                    
   		      </div>
</div>
                    
                 
                 
            

			
	
</section>
    

    <script src="js/jquery.js"></script>
    <script type="text/javascript">
        $('.carousel').carousel()
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>