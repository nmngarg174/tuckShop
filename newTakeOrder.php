<?php 
 	
	error_reporting(0);
	
		session_start(); 
	
	if(isset($_SESSION['name'])){
		
		$username=$_SESSION['name'];  
	}
	
	if($username==''){
		header('Location:start.html'); 
	}
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
	
	
	//include('jujuCreden.php');
	$mysqli=new mysqli('localhost','root','','tuck');
	
	
	if(isset($_GET['order'])){
		// destroy the session object here 
		//session_unset('cart');
		//echo 'run';
		unset($_SESSION['cart']); 	
		//session_unset('cart'); 
		
	}
	
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
    
    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">
    <script type="text/javascript" src="js/materialize.min.js"></script>

 
</head>

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
	
	.sidemenu { position: fixed;  left: 10px; background: white; width: 150px; top:89px; }
		
	
	
</style>

<script> 
	
	$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

</script>
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
                        <a class="page-scroll" href="indexNew.php" style="color:#696">J-Tuck</a>Shop
                    </li>
                    <li>
                        <a class="page-scroll" href="newOrderA.php?log=in" style="color:#696">Current Orders</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="newTakeOrder.php?log=in" style="color:#696">Take An Order</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="newFulfilled.php?log=in" style="color:#696">Orders Delivered</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="newAdd.php" style="color:#696">Add</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="jujuGall.php" style="color:#696">Gallery</a>
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
				<h2 style="color:#696">Menu</h2>
				<p class="lead" style="color:#696"><br>Gourmet is ready to be served</p>
			</div>
			
			<!-- about us slider -->
			
             	         
           		  <div class='col-md-9 col-xs-9 col-sm-4'> 
									
                                    
                                    
                                  
     			
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
                             
                             
                  <div class="col-md-2 col-xs-2 col-sm-2">
                  		
                  <div class="shift animated fadeIn" ><span class="put"><a href='indexNew.php?log=in'><img src="images/logo.png"/></a></span> 
    
                <h5>J Hostel Cart</h5>
                
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
                            <h3>
                            <p> <?php  echo $row['name'] ?> x <?php  echo $_SESSION['cart'][$row['id']]['quantity'] ?> </p>
                            <?php
							
						}
						 // draw the line 
						?>
                        </h3>
                                               
                        <hr /> 
                        
                        <a href='newCart.php' >Go to the cart page </a><br>
                        <a href='newTakeOrder.php?order=cancel'>Cancel Order</a>
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
       			          
        </div>
                    		
      
                
               
                
                
                			    </div>
                                </div>
        </div>
        </div>
        
                    
   		      </div>
</div>
                    
                 
                 
            

			
	
</section>
    
	


</body>

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
	
<script> 
	
	$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

</script>
</html>
