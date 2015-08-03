<?php
	
	//create a log out session here 
	
	session_start(); 
	//$log=''; 
	$log=$_REQUEST['log']; 
	error_reporting(0); 
	if($log=='logout'){
		unset($_SESSION['name']); 
		header("Location:login1.php"); 	
	}
	
	$name=$_SESSION['name']; 
	
	if(empty($name)){
		header("Location:login1.php"); 	
	}
	
	//securtiy check is performed now display the tables and the navigation bar ..
	// use the table sorter to show all the values in a sorted order here 
	
?>

<?php
	
	 
	
	$mysqli=new mysqli('localhost','root','','a9748231_user');
	
	//if($ch!=' '){
	
	$sql1=("select * from cart_online  "); 
	 
	 $res=array() ; 
	 $result=$mysqli->query($sql1); 
	 
	 //return all the data and display 
	 /*
	 while($row=$result->fetch_array()){
			//get the values here 
			array_push($res,array('sno'=>$row[0],'name'=>$row[1],'address'=>$row[2],'order'=>$row[3],'date'=>$row[4],'price'=>$row[5]));  
	 }
	 */
	  
?>
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

	<!-- Demo stuff -->
	<link rel="stylesheet" href="sorter/css/jq.css">
	<link rel="stylesheet" href="sorter/css/bootstrap.min.css">
	<link href="sorter/css/prettify.css" rel="stylesheet">
	
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
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-item.html">Blog Single</a></li>
                                <li class="active"><a href="pricing.html">Pricing</a></li>
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

    <section class="pricing-page">
        <div class="container">
            <div class="center">  
                <h2>Order Status Table</h2>
                <p class="lead">Viewing all the orders <br> has never been so easy</p>
            </div>  
            <div class="pricing-area text-center">
                <div class="row">
                	
                    <div class='container-fluid' > 
            		            	            
<table class='table table-hover' id='mytable' cellspacing="0" style="position:relative; top:-60px;">
<thead>
<tr> 	
	<th>Sno.</th>
    <th>Name</th>
    <th>Address</th>
    
    <th>Date</th>
    <th>Price</th>
    <th>Email</th>
    <th>Status</th>
</tr> 	
</thead>

<tbody>

           
<?php
	
	// insert the values into the table and the whole html code using jquery ajax method here
	
	$result=$mysqli->query($sql1);
	
	while($row=$result->fetch_row()){
		
		if($row[7]==0){
			$a='Pending'; 
		}else if($row[7]==1){
			$a='Delivered'; 
		}else{
			$a='Cancelled'; 
		}
		
		echo "<tr>
		<td>".$row[5]."</td> 
		<td>".$row[0]."</td>
		<td>".$row[3]."</td>
		<td>".$row[2]."</td>
		<td>".$row[1]."</td>
		<td>".$row[6]."</td>
		<td>".$a."</td>
		
		</tr><br />"; 
		
		//<td><span style='cursor:pointer'><img  onclick='myfunction(".$row[0].")' //src='images/deliver.png' height='70' width='100' ></img></span></td>
	} 
	

?>
</tbody>
</table>
           </div>
                  
                </div>
            </div><!--/pricing-area-->
        </div><!--/container-->
    </section><!--/pricing-page-->
                
    
    <footer id="footer" class="midnight-blue">
        <div class="container">
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
    <script type="text/javascript">
        $('.carousel').carousel()
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="sorter/js/prettify.js"></script>
	<script src="sorter/js/docs.js"></script>

	<!-- Tablesorter: required for bootstrap -->
	<link rel="stylesheet" href="sorter/css/theme.bootstrap.css">
	<script src="sorter/js/jquery.tablesorter.js"></script>
	<script src="sorter/js/jquery.tablesorter.widgets.js"></script>

	<!-- Tablesorter: optional -->
	<link rel="stylesheet" href="sorter/addons/pager/jquery.tablesorter.pager.css">
	<script src="sorter/addons/pager/jquery.tablesorter.pager.js"></script>

<!-- tablesorter widgets (optional) -->
<script type="text/javascript" src="sorter/jquery.tablesorter.widgets.js"></script>
<script>
	
	
	$(function() {
		//alert('dfghf');
  $.extend($.tablesorter.themes.bootstrap, {
    table      : 'table table-bordered',
    caption    : 'caption',
    header     : 'bootstrap-header', // give the header a gradient background
    footerRow  : '',
    footerCells: '',
    icons      : '', // add "icon-white" to make them white; this icon class is added to the <i> in the header
    sortNone   : 'bootstrap-icon-unsorted',
    sortAsc    : 'icon-chevron-up glyphicon glyphicon-chevron-up',     // includes classes for Bootstrap v2 & v3
    sortDesc   : 'icon-chevron-down glyphicon glyphicon-chevron-down', // includes classes for Bootstrap v2 & v3
    active     : '', // applied when column is sorted
    hover      : '', // use custom css here - bootstrap class may not override it
    filterRow  : '', // filter row class
    even       : '', // odd row zebra striping
    odd        : ''  // even row zebra striping
  });

  // call the tablesorter plugin and apply the uitheme widget
  $(".container-fluid #mytable").tablesorter({
    // this will apply the bootstrap theme if "uitheme" widget is included
    // the widgetOptions.uitheme is no longer required to be set
    theme : "bootstrap",

    widthFixed: true,

    headerTemplate : '{content} {icon}', // new in v2.7. Needed to add the bootstrap icon!

    // widget code contained in the jquery.tablesorter.widgets.js file
    // use the zebra stripe widget if you plan on hiding any rows (filter widget)
    widgets : [ "uitheme", "filter", "zebra" ],

    widgetOptions : {
      // using the default zebra striping class name, so it actually isn't included in the theme variable above
      // this is ONLY needed for bootstrap theming if you are using the filter widget, because rows are hidden
      zebra : ["even", "odd"],

      // reset filters button
      filter_reset : ".reset"

      // set the uitheme widget to use the bootstrap theme class names
      // this is no longer required, if theme is set
      // ,uitheme : "bootstrap"

    }
  })
  .tablesorterPager({

    // target the pager markup - see the HTML block below
    container: $(".ts-pager"),

    // target the pager page select dropdown - choose a page
    cssGoto  : ".pagenum",

    // remove rows from the table to speed up the sort of large tables.
    // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
    removeRows: false,

    // output string - default is '{page}/{totalPages}';
    // possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
    output: '{startRow} - {endRow} / {filteredRows} ({totalRows})'

  });

});
</script>
</body>
</html>