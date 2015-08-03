<?php 

//include('html_encoder_1.9.php'); 
error_reporting(0);
		
	session_start(); 
	
	if(isset($_SESSION['name'])){
		
		$username=$_SESSION['name'];  
	}
	
	if($username==''){
		header('Location:start.html'); 
	}
	//echo $username; 
	//$mysqli=new mysqli('localhost','root','','tuck'); 
	
    $mysqli=new mysqli('localhost','tuck','1234561','tuck'); 

	$sqlS='select status from juju';
	
	$resultS=$mysqli->query($sqlS);
	 
	$rowS=$resultS->fetch_array();
	 
	$status=$rowS[0];  	
	
        $sqlNM='select status from retailer where name="naman"'; 
        $resultNM=$mysqli->query($sqlNM); 
        $rowNM=$resultNM->fetch_array(); 
        $stat=$rowNM[0]; 
 
	
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hostel J</title>
	
     <link href="css/grayscale.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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

<style>
    .welcome{
        -webkit-animation-duration:1s;
        /* -webkit-animation-iteration-count:; now using the wow effects here */
        -webkit-animation-delay:.1s;
    }
    }
</style>


<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top animated fadeInDown" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                
                <a class="navbar-brand page-scroll" href="indexNew.php?log=in">
                    <i class="glyphicon glyphicon-glass"></i>  <span class="light">Hostel</span> (J)
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                  <!--  
                    <li>
                        <a class="page-scroll" href="newOrderA.php?log=in">Android Orders</a>
                    </li>-->
                    
                    <li>
                    			<?php if($stat==1){ ?><a href='tuckOnOff.php?log=in' style="color:#0F0">WEBSITE : ON</a>
                                <?php }else{ ?>
                                <a href='tuckOnOff.php' style="color:#F00">WEBSITE : OFF</span></a>
                                <?php } ?>
                    </li>
                    <li> 
                    	<a class="page-scroll" href="sorderOffline.php?log=in">Current Orders</a>
                        </li>
                    <!--<li>
                        <a class="page-scroll" href="newTakeOrder.php?log=in">Take An Order</a>
                    </li>-->
                    <li>
                        <a class="page-scroll" href="outOfStock.php?log=in">Inventory</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="newFulfilled.php?log=in">All Orders</a>
                    </li>
                    <!--<li>
                        <a class="page-scroll" href="newAdd.php?log=in">Add</a>
                    </li>-->
                    
                    <li>
                        <a class="page-scroll" href="logOut.php?log=logout">Log-Out</a>
                    </li>

                    <!--<li>
                    			<?php if($status==1){ ?><a href='jujuOnOff.php?log=in' style="color:#0F0">ANDROID : ON</a>
                                <?php }else{ ?>
                                <a href='jujuOnOff.php' style="color:#F00">ANDROID : OFF</span></a>
                                <?php } ?>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro" style="background:url(thaparImg/hostelj.jpg) ; background-size:cover; background-repeat:no-repeat; ">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading wow animated fadeInUp welcome" >Welcome To Hostel-J </h1>
                        <p class="intro-text animated fadeInDown">A Place To Eat Play And Share !!</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row" style="position:relative ; top:-110px;">
            <div class="col-lg-8 col-lg-offset-2 wow animated fadeInDown " data-wow-delay="0.2s">
                <h2>About Hostel J Tuck Shop </h2>
                <p>
                This web portal enables the residents of Hostel J to order their meal online from the tuck shop menu . Food is delivered door to door by the dedicated Hostel-J staff for a small fee amount. We hope this initiative might help students to save there time effort in the tuck shop.</p>
                
            </div>
        </div>
    </section>

    <!-- Download Section -->
    
    
     
    <!-- Map Section -->
    <div id="map"></div>

    <footer>
        <div class="container text-center">
            <p>&nbsp;</p>
        </div>
    </footer>
    <!-- Footer -->
   
    <!-- jQuery -->
    <script src="js/wow.min.js" ></script>

    <script type="text/javascript">
        new WOW().init(); 
    </script>
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/staticmap?center=40.714728,-73.998672&zoom=14&size=640x640&key=AIzaSyDXSw9155vXJV-lLAomQNhWWL1i3tKcSaM"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>
	<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var myCenter=new google.maps.LatLng(30.3532934 , 76.3637091);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:17,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("map"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  icon:'pinkball.png'
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

</body>

</html>
