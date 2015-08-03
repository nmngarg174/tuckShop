<?php 
	
	// creating an adding menu for the juju application here 
	
	// how ? to add a new category or a new product for a specific category 
	session_start(); 
	$mysqli=new mysqli('localhost','root','','a9748231_user');
	
	$sql='select * from products1 group by category'; 
	
	// display all the categories in the boxes menu , how  ? 
	
	$result=$mysqli->query($sql);
	
		//fetch all the values for the category names from the db 
		 
	error_reporting(0);
	  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Portfolio | Corlate</title>
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
  <!-- jQuery -->
  <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

  <!-- Fotorama -->
  <link href="fotorama/fotorama.css" rel="stylesheet">
  <script src="fotorama/fotorama.js"></script>

  <!-- Just don’t want to repeat this prefix in every img[src] -->
  

<body>

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i>  +0123 456 70 90</p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search"></i>
                                </form>
                           </div>
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li class="active"><a href="portfolio.html">Portfolio</a></li>
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
 
    

                    <?php echo $_SESSION['message'] ?>
                    	<div class='col-md-3' style="position:relative; left:25px; ">

                            <form class='form-horizontal' role='form' action='image.php' method="post" enctype="multipart/form-data">
                            	<div class='form-group'>

                                    
                                    <label for='sel'>Select a category</label>
                                    
                                		<select class='form-control' id='sel' name='category'>
                                        <?php
									while($row=$result->fetch_array()){
		
			// show the value for the category in the select boxes 
			
	
									?>
                                        	<option value='<?php echo $row[2] ?>'><?php echo $row[2] ?></option>
                                            <?php
								
									}
									
									?>
                                            
                                        </select>
                                </div>
                                
                                <div class='form-group'>
                                
                                    
                                	<label for='name' class='control-label'>Enter the item</label>
                                    
                                	<input type="text" id='name' name='name' class="form-control"   />
                                   
                                </div>
                                <div class='form-group' style="position:relative; left:10px;">
                                <label for='upload' class='control-label'>Upload the image </label>
                                	 <input type="file" name='upload' id='upload'  />
                                </div>
                                <br />
                                <div class='form-group'>
                                <button type="submit" name='item' class='btn btn-default'>Enter the item</button>
                                </div>
                                     </form>
                        </div>
                       
  </div>
</div>-->
   <div class='container-fluid'>   
                    <div class='row'>
                    <h1 style="position:relative; left:25px;">Add an Category</h1>
                    <div class='text-danger' style="position:relative; left:20px; ">
                    <?php echo $_SESSION['message1'] ?>
                    </div>
                    	<div class='col-md-3' style="position:relative; left:25px; ">
                        	<!-- To add an item in the menu we populate a list of all the categories , after selecting the category he uploads a file and writes its name there  
                            -->
                            <!--
                            <form class='form-horizontal' role='form' action='addCategory.php' method="post" enctype="multipart/form-data">
                            	
                                <div class='form-group'>
                                
                                    
                                	<label for='category' class='control-label'>Enter the category</label>
                                    
                                	<input type="text" id='category' name='category' class="form-control"   />
                                   
                                </div>
                                <button type="submit" name='submit' class='btn btn-default'>Enter the item</button>
                                     </form>
                                     
                                     -->
                        </div>
                        <div class='col-md-2'>
                        </div>
                        
                </div>
</div>              
    <footer id="footer" class="midnight-blue navbar-fixed-bottom " >
        <div class=". container " style="position:absolute;top:-1000px;">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>
