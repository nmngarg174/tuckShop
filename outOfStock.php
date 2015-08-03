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
	<link rel="stylesheet" href="css/style1.css">
    <!-- Custom CSS -->
   

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	
     
    <link href="css/prettyPhoto1.css" rel="stylesheet">
    <link href="css/main_gray1.css" rel="stylesheet">
    <link href="css/responsive1.css" rel="stylesheet">
   
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" >
<div class='row' style="height:150px;">
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
                    <!--<li>
                        <a class="page-scroll" href="newTakeOrder.php?log=in" style="color:#696">Take An Order</a>
                    </li>-->
                    <li>
                        <a class="page-scroll" href="outOfStock.php?log=in" style="color:#696">Inventory</a>
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
</div>


	<!-- creating the panel here , how ? 
    --> 
    
    		
            
<div class='row'>
<div class='col-md-3'>
</div>
<div class='col-md-6'>
<?php 
	
		// insert the code here , how ? 
		
		//$mysql=new mysqli('localhost','root','','tuck'); 
		$mysql=new mysqli('localhost','root','','tuck');

		$sqlc='select * from products2 where status=1'; 
		
		$result=$mysql->query($sqlc);
		
		while($row=$result->fetch_array()){
				
				// after getting the values here , how  ? 
				
				
		
		
	?>
    
<div class="panel panel-success"><div class="panel-heading"><?php echo $row[1] ?></div>
  <div class="panel-body">
  
    Status : <span id="<?php echo $row[0] ?>"  style="dispay:inline;  ">In Stock
	</span>
    <button type="button" class="btn btn-danger <?php echo 'button'.$row[0]?>" style="position:relative; left:350px;" id='1' value="<?php echo $row[0] ?>">Change Status</button>
    
      </div>
  </div>


<?php 
	
	}
?>

<?php 
	
		$mysql=new mysqli('localhost','root','','tuck'); 
		//$mysql=new mysqli('localhost','tuck','1234561','tuck');
	//	$mysql=new mysqli('localhost','tuck','1234561','tuck');
$sqlc='select * from products2 where status=0'; 
		
		$result=$mysql->query($sqlc);
		
		while($row=$result->fetch_array()){
				
?> 

<div class="panel panel-danger">
	
    <div class="panel-heading"><?php echo $row[1] ?></div>
  <div class="panel-body">
  
  
    Status : <div class='content1' style="display:inline;" id="<?php echo $row[0] ?>">Out of Stock</div>
  <button type="button" class="btn btn-success" style="position:relative; left:350px;" id='0' value="<?php echo $row[0] ?>">Change Status</button>
  </div>
    
</div>
  
  <?php 
  
		}
		?>
    
    
	</div>
</div>
<div class='col-md-3'>
</div>
    </div>
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

<script>
	
	// create the script to toggle the status of the button here , how  ? 
	// using the ajax method or the post method here 
	
	$(document).ready(function(){
		//alert('rhun'); 
		$("button").on("click",function(){
			
			//alert('run'); 
			// get the id of the button here , how ? 
			// get the value attribute of the button here , how ? 
			$value=parseInt($(this).val());
			$id=parseInt($(this).attr("id"));
			//alert("id si"+$id);    
			//alert($value); button
			// use the ajax method to implement the query here , how ? 
			// how to actually make this whole concept run here an then 
			
			$.ajax({
			type:"post", 
			url:'toggle.php', 
			data:{value:$value,
			status:$id},
			success:function(response){
				
					//$(".insert").html(response);  
					// change the css of the following files here , how ? 
					
					
			}
				
			
			});  
			
			if($id==1){
					
					$(this).removeClass('btn-danger');
					$(this).addClass('btn-success');
					//$(this).empty();
					 
					
					
				//	$(".content").html("Status : Out Of Stock"); 
					
					//alert("run");
					var first="#";  
					var n=$value;
					$final=first.concat(n); 
					//alert(final);  
					// change the id and the value as well here for the button to reuse it 
					$($final).text("Out Of Stock");    
					//$final.html("Out Of Stock"); 
					// change the id here 
					
					$(this).attr("id","0"); 
					
					
					}else{
						$(this).removeClass('btn-success'); 
						$(this).addClass('btn-danger');
						//$(this).empty(); 
						//$(this).text("In Stock");  
						var first="#";  
						var n=$value;
						$final=first.concat(n); 
						$($final).text("In Stock");    
					
					//$("#$id").html("In Stock"); 
						
					$(this).attr("id","1"); 
						
					}
			
		});
			
	});
	
</script>
</body>

</html>
