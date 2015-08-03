
<?php
	
	// creation of the php cart here and then executing it here
	
	// check for the submit button here 
	//session_start(); 
	error_reporting(0); 
	session_start(); 	
	$mysqli=new mysqli('localhost','root','','a9748231_user');
	
	if(isset($_POST['submit'])){
			
			//echo $_POST['quantity'];
			foreach($_POST['quantity'] as $key => $value){
				
				
				if($value==0){
					unset($_SESSION['cart'][$key]); 	
				}else{
					
					$_SESSION['cart'][$key]['quantity']=$value; 
				}
					
			}
			
	}else{
		//session_start(); 	
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
    
        <div class="container " style="position:relative; top:60px;"  >
			
			
            
			<!-- about us slider -->
            
<h2>Cart Page</h2>

<form  action='newCart.php' method='post'> 
	
    <table class='table'> 
    	
        <tr> 
        	<th>Sno.</th>
        	<th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Item Price</th>
        </tr>
        <?php
			
			$sql_c="select * from products1 where id in ("; 
					
					foreach($_SESSION['cart'] as $id=>$value){
						$sql_c.=$id.",";
					}
					
					// subtract the comma from the end here
					$sql_c=substr($sql_c,0,-1).") order by id asc"; 
					
					//echo $sql_c; 
					
					// print all the items in the cart here 
					
					$result=$mysqli->query($sql_c);
					$totalPrice=0;  
					if($result->num_rows>0){
						
						while($row=$result->fetch_array()){
							$subTotal=$_SESSION['cart'][$row['id']]['quantity']*$row['price']; 
							$totalPrice+=$subTotal; 
		?>
        
        <tr> 	
        	<td><?php echo $row[0]?> </td>
            <td> <?php echo $row[1] ?></td>
            <td><input type="text" name="quantity[<?php echo $row[0] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id']]['quantity'] ?>" />  </td>
            <td> <?php echo $row[2] ?></td>
            
            <td> <?php  echo $_SESSION['cart'][$row['id']]['quantity']*$row['price']  ?>Rs</td>
        </tr>
        
        
    <?php
						}
					}
					// now print the total price of the items here and then show the value here
					// create a cancel order button as well here
					
	?>
    	<tr> 	
        	<td>Total Price : <?php echo $totalPrice ; $_SESSION['totalPrice']=$totalPrice; ?> </td>
            </tr>
    </table>
<br />
<hr />
<!--<input type='submit' value='Update the Cart' name='submit' />-->


<button type='submit' name='submit' class='btn btn-default'>Update The Cart</button>
<a href='print.php?log=in' class="btn btn-default"  target="_blank">
            
            Print Invoice
            </a>
            <a href='newTakeOrder.php?order=cancel' class="btn btn-default"  ">
            
            Cancel the Order
            </a>
</form>
<!--
<form action='print.php' method="post" style="float:left">  
	<button type='submit' name='print' value='Print the Bill' class='btn btn-default'>Print Invoice</button>
 
</form>
-->
<br /> 
            
			                </div>
           
                        <div class='col-md-2'>
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
