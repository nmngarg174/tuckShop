<?php
	
	// include the auto scroll feature into the php projct 
	//create a log out session here 
	// remove the jquery from the navigation bar here
	error_reporting(0);
	
		session_start(); 
	
	if(isset($_SESSION['name'])){
		
		$username=$_SESSION['name'];  
	}
	
	if($username==''){
		header('Location:start.html'); 
	} 
	$pageNew = $_SERVER['PHP_SELF'];
	$pageNew.='?log=in';
	$sec = "240";
	header("Refresh: $sec; url=$pageNew");
	if(isset($_GET['submit'])){
			//send the confirmation mail to the person 
			
			$to=$_POST['email'];
			//echo $to; 
			
			$message1=$_POST['message']; 
			//echo $message1; 
			$from='nmngarg174@gmail.com'; 
			$subject='JUJU Order Confirmation';
	
   	 $header='From:nmngarg174@gmail.com \r\n';
	
	 $header.='Cc:nmngarg174@gmail.com \r\n';
	
	 $header.='MIME-Version:1.0 \r\n';
	 
	 $header.='Content-type:text/html \r\n'; 
	 
	 $retval=mail($to,$subject,$message1,$header);
	 
	 //echo 'mail sent';
	 
	 // after sending the mail change the status of that order to sent ie 1
			
	 $sqlStatus='update  cart_online set status=1 where email="'.$to.'"'; 
	 
	 //$mysqli=new mysqli('localhost','root','','tuck'); 
	 $mysqli=new mysqli('localhost','tuck','1234561','tuck');

	 if($mysqli->query($sqlStatus)){
			 
	 }
	}
	
	session_start(); 
	//$log=''; 
	$log=$_REQUEST['log']; 
	//error_reporting(0); 
	if($log=='logout'){
		unset($_SESSION['name']); 
		unset($_SESSION['cart']); 
		session_destroy() ;
		//header("Location:login1.php"); 	
	}
	
	$name=$_SESSION['name']; 
	
	if(empty($name)){
		//header("Location:login1.php"); 	
	}
	
	//securtiy check is performed now display the tables and the navigation bar ..
	
	// using pagination to display the google like results 
	
	$page=1; 
	
	//create connection with mysql 
	
	//$mysqli=new mysqli('localhost','root','','tuck');
	$mysqli=new mysqli('localhost','tuck','1234561','tuck');
	 $sql='select * from cart_online where status=0'; 
	 
	 $result=$mysqli->query($sql);
	 $count=$result->num_rows; 
	 //echo $count; 	  
	 $last=ceil($count/$page); 
	 // pageNum gives the total no. count of all the pages and now to show them 
	 // store the current page no. also here 
	 if(isset($_GET['pgNum']) && $_GET['pgNum']>1)
	 	$curPage=$_GET['pgNum'];
		else{
		$curPage=1;  	
	 }
	 //echo $_GET['pgNum'];  
	 //echo $curPage; 
	 // starting at some record here and then or also we have here
	  
	 $limit='limit '.(($curPage-1)*$page).','.$page;
	// echo $limit;  
	$sqlNew='select * from cart_online where status=0 order by price desc $limit ';
	 $sql1="select * from cart_online where status=0  order by bill desc $limit "; 
	 
	 $result=$mysqli->query($sql1); 
	//echo $sql1; 	
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
	
    
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main_gray.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" >

    <nav class="navbar navbar-custom navbar-fixed-top animated fadeInDown" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                
                <a class="navbar-brand page-scroll" href="indexNew.php?log=in">
                    <i class="glyphicon glyphicon-glass" style="color:#696"></i>  <span class="light" style="color:#696">Hostel J</span>
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
                        <a class="page-scroll" href="newOrderA.php?log=in" style="color:#696">Android Orders</a>
                    </li>
                    <li> 
                    	<a class="page-scroll" href="sorderOffline.php?log=in" style="color:#696">Current Orders</a>
                        </li>
                    <li>
                        <a class="page-scroll" href="newTakeOrder.php?log=in" style="color:#696">Take An Order</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="newFulfilled.php?log=in" style="color:#696">All Orders</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="newAdd.php?log=in" style="color:#696">Add</a>
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

	
    
    <section id="about-us">
        <div class="container wow fadeInDown animated" >
			<div class="center " style="position:relative;top:40px; color:#FFF" >
				<h2 style="color:#696" >Orders Placed</h2>
				<p class="lead" style="color:#696">Take a look at all the<br> Orders placed from the Hostel J Android Application</p>
			</div>
			
			<!-- about us slider -->
		<div class='container-fluid' >
                
                <div class="col-md-6">
                
          <!--<form role='form' style="width:40%; margin-left:30%; float:left; "id='remove2 '>

				<div class='form-group'>                
<select class='form-control' name="drop" id="drop" onchange="dynamic_select(this.value)"  >

	<option value=" ">Select Filter</option>
	<option value="name">Name</option>
	<option value="price">Price</option>
	<option value="date1">Date</option>
	
		</select>
	</div>
</form>-->
	<?php
	$i=1;
		while($row=$result->fetch_array()){
			$arr1=explode(" ",$row[2]); 
			  
    	$arr=explode('-',$arr1[0]);
		
	?>		
		
        	<div class='row'>
        <ul id="plans" style="background: rgba(255,255,255,0.90);
	border-radius:20px 20px 20px 20px;

	">
    
    <div class="thumbnail " style="position:relative;  data-wow-duration="1000ms" data-wow-delay="1000ms"">
			<li class="plan" >
				<ul class="planContainer" style="position:relative;top:12px; ">
                	
					<li class="title"><h2 style="padding-left:5px;">Order <?php echo $row[5] ?></h2></li>
					<li class="price" "><p style="padding-left:5px;">Total Bill: Rs<?php echo $row[1]?></p></li>
					<li>
						<ul class="options">
							<li style="padding-left:5px;">Customer <span><?php echo ucfirst($row[0])?></span></li>
							<li style="padding-left:5px;">Placed On: <span><?php echo date('d-F ,Y ',mktime(0,0,0,$arr[1],$arr[2],$arr[0])) ?></span></li>
							<li style="padding-left:5px;">Address: <span><?php echo $row[3] ?></span></li>
							<li style="padding-left:5px;">Contact: <span><?php echo $row[8]?></span></li>
							
						</ul>
					</li>
					<li class="button" style="padding-left:5px;"><a href="#" data-toggle='modal' data-target='#basicModal<?php echo $row[0]?>' style="padding-left:5px;"> Send Mail Confirmation</a></li>
                    <li class="button" style="padding-left:5px;"><a href="#" data-toggle='modal' data-target='#basicModal<?php echo $row[5]+2 ?>' style="padding-left:5px;"> View Order Details</a></li>
                    
				</ul>
                
			</li>
            </div>
            </ul>
            
			<!--<h4>OrderId: <?php //echo $row[5]; ?></h4>	
        	<h5 style="color:#b0b0b0;"><u><?php //echo strtoupper($row[0]).' Order Placed On '.date('d-F ,Y ',mktime(0,0,0,$arr[1],$arr[2],$arr[0])).' Its been '.round((time()-mktime(0,0,0,$arr[1],$arr[2],$arr[0]))/(24*60*60)).' days since the order placed' ?></u></h5>
            <small style="color:#b0b0b0;"><?php echo 'Address:'.$row[3].' Order:'.$row[3] ; 
			$a=$row[0]; 
			$b=$row[1]; 
			$c=$row[6]; 
			?></small>
            <br />
            -->
            
            <!--<a href='#' class="button" data-toggle='modal' data-target='#basicModal<?php //echo $row[0]?>'>
            
            Send Delivery Mail
            </a>-->
            
        <div class="modal fade" id="basicModal<?php echo $row[0]?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">CLOSE</button>
            <h4 class="modal-title" id="myModalLabel">JuJu OrderConfirmation Mail</h4>
            </div>
            <div class="modal-body">
                <h3>Mail Message</h3>
                <form class="form-horizontal" role="form" action="home.php?log=in&&submit=1" method="post">
  <div class="form-group">
  <label class="control-label col-sm-2" for="name">To:</label>
    <div class="col-sm-10">
      <input type="text" name='to' class="form-control" id="to" placeholder="Enter email" value=<?php echo strtoupper($a) ?>>
      
    </div>
    
    </div>
    
    
    <div class='form-group'>
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" name='email' class="form-control" id="email" placeholder="Enter email" value=<?php echo $c ?>>
      </div>
    </div>
    <div class='form-group'>
    <label class="control-label col-sm-2" for="message"> Message:</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="comment" row='5' name='message' placeholder="Enter message" ><?php 
	  $message='Dear '.ucfirst($a).' ,
	  Your order for has been confirmed and is out for delivery ,Kindly arrange the cash for payment of  Rs.'.$b;
	  echo $message ?>
      
      </textarea>
      
    </div>
  </div>
  	
  	        <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel Mail</button>
                <button type="submit" class="btn btn-default">Send The Confirmation</button>
        </div>
        </form>
                
                
            </div>
      
    </div>
  </div>
</div>
<!--
<a href='#' class="btn btn-default" data-toggle='modal' data-target='#basicModal<?php echo $row[5]+2 ?>'>
            
            Show Order Details
            </a>-->
        <div class="modal fade" id="basicModal<?php echo $row[5]+2 ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">CLOSE</button>
            <h4 class="modal-title" id="myModalLabel">Customer Order Details</h4>
            <h4>Customer <?php echo ucfirst($row[0]) ?></h4>
            
            </div>
            <div class="modal-body">
            
                <h3>Order Placed</h3>
                <?php
				 	
					// creating  a new connection to display quantity of all the items in db
					
					// get the oid of the following customer here
					
					//$sqlOrder="select p.*,p1.name,p1.category from product_online p,products1 p1 where p.oid='".$row[5]."' and p.id=p1.id "; 
					
					$sqlOrder="select p.*,c.bill from product_online2 p,cart_online c where c.oid='".$row[5]."'  and p.oid='".$row[5]."'"; 
				 	//echo $sqlOrder1; 
				 //$mysqli1=new mysqli('localhost','root','','a9748231_user');
				 $mysqli1=new mysqli('localhost','tuck','1234561','tuck');
				 
				 $result1=$mysqli1->query($sqlOrder);
				 $bill=0; 
				 while($row2=$result1->fetch_array()){
					 
				 $bill=$row2[4]; 
				   
				 ?>
                 
                <ul class="list-group">
   					<li class="list-group-item"><span class="badge" style="position:relative; left:10px; top:-1px;">Quantity <?php echo $row2[3] ?></span><?php echo $row2[2]; ?></li>
   				<?php }
				
				?>	
                <li class="list-group-item">Total Bill: Rs<?php echo $bill; ?></li>
			</ul>
                
                
                
            </div>
      <div class="modal-footer">
            <h4>Address :<?php echo ucfirst($row[3]) ?></h4>
           <!-- <h3>Email: <?php //echo $row[6] ?></h3>-->
            <h4>Order Date: <?php echo ucfirst($row[2]) ?></h4>
                
        </div>
    </div>
  </div>
</div>

    <!--<button type='button' class='btn btn-default'>
            Send Cancellation Mail
            </button>-->
                </div>	<br />
			 	
            <?php
			//display the contents above using the section tag for each row
	 }
	 		$paginationCtrls=''; 
			
			if($last!=1){
					if($curPage>1){
						$previous=$curPage-1;
						//printing the previous page link here 
						$paginationCtrls.='<li><a href="'.$_SERVER['PHP_SELF'].'?log=in&&pgNum='.$previous.'">Previous</a></li> &nbsp &nbsp';
						
						// displaying the previous 4 pages here
						//echo 'print'; 
						//$paginationCtrls.='<ul class="pagination">';
						for($i=$curPage-2;$i<$curPage;$i++){
							
							if($i>0){
								// attach the pages here	
								$paginationCtrls.='<li class="active"><a href="'.$_SERVER['PHP_SELF'].'?log=inpgNum='.$i.'">'.$i.'</a></li> &nbsp';
								
								 
							}
						}
					}
					
					$paginationCtrls.='<li class="disabled"><a href="#">'.$curPage.'</a></li> &nbsp;'; 
					
					
					for($i=$curPage+1;$i<$last;$i++){
						
						// vsry the ctrl section 
						
						$paginationCtrls.='<li class="active"><a href="'.$_SERVER['PHP_SELF'].'?log=in&&pgNum='.$i.'">'.$i.'</a></li> &nbsp'; 
						if($i>$curPage+2)
							break; 
							
					}
					//$paginationCtrls.='</ul>';
						
					// include the next page option here when there is only 1 page or multiple pages 
					
					if($curPage!=$last-1){
						
					$next=$curPage+1; 
					$paginationCtrls.='<li><a href="'.$_SERVER['PHP_SELF'].'?log=in&&pgNum='.$next.'">NEXT</a></li> &nbsp;';
					
					}
					?>
                    <ul class='pagination'>
                    
                    <?php 
					echo $paginationCtrls;
					 
				}
			
			
			?>
		</ul>
	
            </div >
            <div class='' data-wow-duration="1000ms" data-wow-delay="600ms">
    		<div class='col-md-5 ' >
            
            		<img src="images/android.png"  /> 
                    
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
   <script //src="js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

</body>

</html>
