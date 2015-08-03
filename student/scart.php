
<?php
	
	// creation of the php cart here and then executing it here
	
	// check for the submit button here 
	//session_start(); 
	error_reporting(0); 
	session_start(); 	
	$mysqli=new mysqli('localhost','root','','tuck');
	
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

    <title>Hostel J Tuck Shop </title>
	
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
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>

<script>
	$(document).ready(function(){
    	
        $('#button2').click(function(){
        		window.location.replace("start.php");
        });
    }); 
	
	
	function direct(){
		
				// first validate the form then pass on to the start page here , how  ? 
				
				
				window.location.replace("start.php");
	}
</script>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" >

    <!-- Navigation -->
    

	
    <section id="about-us "  >
    
        <div class="container " style="position:relative; top:60px;"  >
			
			
            
			<!-- about us slider -->
            
<h2>Cart Page</h2>

<form  action='scart.php' method='post'> 
	
    <table class='table'> 
    	
        <tr> 
        	<th>Sno.</th>
        	<th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Item Price</th>
        </tr>
        <?php
			
			$sql_c="select * from products2 where id in ("; 
					
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

<?php 
	$_SESSION['namEmail']='nmngarg174@gmail.com'; 	
	// get the value for the room no here , how ? 
	
	$sqlR='select roomno from registration where email="'.$_SESSION['namEmail'].'"';
	//echo $sqlR; 
	
	
	$resultR=$mysqli->query($sqlR);
	
	while($row=$resultR->fetch_array()){
		// get the value here for all the column and display them 
		$roomno=$row[0]; 
			
	}
	
	 
?>
 <div class="input-field col s2">
            <input id="input_text" type="text" length="1" value="<?php echo $roomno ?>">
            <label for="input_text">Enter Room No. (Change in case its different)</label>
          </div>

<!--<input type='submit' value='Update the Cart' name='submit' />-->


<button type='submit' name='submit' class='btn btn-default'>Update The Cart</button>
<a href='sprint.php?log=in' id='button2' class="btn btn-default button2"  target="_blank" onClick="direct();">
            
            Finalize Order
            </a>
            <a href='start.php?order=cancel' class="btn btn-default"  ">
            
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

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

</body>
<script>
	  $(document).ready(function() {
    $('input#input_text, textarea#textarea1').characterCounter();
  });
        s

</script>
</html>
