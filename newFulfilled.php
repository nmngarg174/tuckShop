<?php
	
	//create a log out session here 
	error_reporting(0);
	
		session_start(); 
	
	if(isset($_SESSION['name'])){
		
		$username=$_SESSION['name'];  
	}
	
	if($username==''){
		header('Location:start.html'); 
	}
	//$log=''; 
	$log=$_REQUEST['log']; 
	error_reporting(0); 
	if($log=='logout'){
		unset($_SESSION['name']); 
		//header("Location:login1.php"); 	
	}
	
	$name=$_SESSION['name']; 
	
	if(empty($name)){
		//header("Location:login1.php"); 	
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

<link rel="stylesheet" href="sorter/css/jq.css">
	<link rel="stylesheet" href="sorter/css/bootstrap.min.css">
	<link href="sorter/css/prettify.css" rel="stylesheet">
	
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="background:url(images/slider/newBg1.jpg)">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top animated fadeInDown" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="glyphicon glyphicon-glass"></i>  <span class="light">JuJu's</span> Cafe
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="newOrderA.php?log=in">Current Orders</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="newTakeOrder.php?log=in">Take An Order</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="newFulfilled.php?log=in">Orders Delivered</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="newAdd.php?log=in">Add</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="newjujuGall.php">Gallery</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="logOut.php?log=logout">Log-Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	
    
    <section id="about-us">
        <div class="container wow fadeInDown animated" >
			<div class="center " style="position:relative;top:40px; color:#FFF" >
				<h2 style=" color:#FFF" >Orders History</h2>
				<p class="lead">Take a look at all the<br> Orders placed </p>
			</div>
			
			<div class='container-fluid' > 
            		            	            
<table class='table table-hover' id='mytable' cellspacing="0" style="position:relative; top:-240px;">
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
