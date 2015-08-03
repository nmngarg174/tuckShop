<?php 
	
	
	// store the value of the session here 
	
	session_start(); 
	if(isset($_SESSION['name'])){
		
	}else{
		header('Location:start.html'); 
	}
	
	
	
	//$mysqli=new mysqli('localhost','root','','tuck');
	$mysqli=new mysqli('localhost','tuck','1234561','tuck');
	
	if(isset($_GET['order'])){
		
		unset($_SESSION['cart']); 	
		//session_unset('cart'); 
		
	}
	
	if(isset($_GET['page'])){
		
		$pages=array("sproduct","cart");
		
		if(in_array($_GET['page'],$pages)){
		
		$_page=$_GET['page']; 
			
		}else{
			
			$_page='sproduct'; 	
		}
		
	}else{
		
		$_page='sproduct'; 
	}
 
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hostel J</title>
</head>
<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style1.css" type="text/css" rel="stylesheet" media="screen,projection"/>

<body>
    
<nav>
    <div class="nav-wrapper white">
      <a href="#!" class="brand-logo" style="position:relative; left:70px; top:-6px;">Hostel</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
       <img style="height:50px; width:50px; position:relative; left:75px; top:3px; " src="images/jlogo.png"/>
      <ul class="right hide-on-med-and-down">
        <li><a href="components.html">Manage</a></li>
        <li><a href="scart.html">Cart</a></li>
        <li><a href="logout.php">Log-Out</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="components.html">Manage</a></li>
        <li><a href="scart.html">Cart</a></li>
        <li><a href="logout.php">Log-Out</a></li>
      </ul>
      
    </div>
    
  </nav>


		  <div>
        
       					 <?php require($_page.".php") ; ?> 
        				 
                                   
                  <div class="col-md-2 col-xs-2 col-sm-2">
                  		
                  <div  ><span class="put"><a href='indexNew.php?log=in'><img src="images/jlogo.png"/></a></span> 
    
                <p>J Hostel Cart</p>
                
                <?php 
                if(isset($_SESSION['cart'])){
                	
					$sql_c="select * from products2 where id in ("; 
					
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
                            
                            <p> <?php  echo $row['name'] ?> x <?php  echo $_SESSION['cart'][$row['id']]['quantity'] ?> </p>
                            <?php
							
						}
						 // draw the line 
						?>
                        
                                               
                        <hr /> 
                        
                        <a  id='button' href='scart.php' class="waves-effect waves-light btn modal-trigger button" ">Go to the cart page </a><br>
                        <br>
                        <a href='newTakeOrder1.php?order=cancel' class="waves-effect waves-light btn modal-trigger button">Cancel Order</a>
                        <br>
                        <br>
                   		<a href='sprint.php?log=in' id='button2' class="btn btn-default button2"  target="_blank" >
            
            Finalize And Print Order
            </a>
                        <?php
					}
					
                }else{
					echo 'Your cart is empty. Please add some products..'; 	
				}
				
				// remove the separate  cart system and add the system for the direct payment here , how ? 
				
				// using ajax we have here and then or also we have here 
				
				
				
				?>
       <!-- </div> -->
       <br />
       <br />
       <br />
       <br />
       			          
        </div>
                    		
      
                
               
                
                
                			    </div>	
                        
      	  </div>


</body>
<script> 
   
   $(document).ready(function() {
    	//alert('run hereee'); 
		$('.button').click(function(){
				alert('run here'); 
				// here we have here
				$('#overlay').css("opacity",0.8);
				 
				 var val=$('#overlay').css("display"); 
				if(val=="block"){
					$('#overlay').fadeOut("slow").css("display","none");  
					$('#specialBox').fadeOut("slow").css("display","none");  
				}else{
					$('#overlay').fadeIn("slow").css("display","block");  
					$('#specialBox').fadeIn("slow").css("display","block");
				}
				
		}); 
});

function swap(){
		
				//alert('run here'); 
				// here we have here
				alert('run'); 
				$('#overlay').css("opacity",0.8);
				 
				 var val=$('#overlay').css("display"); 
				if(val=="block"){
					$('#overlay').fadeOut("slow").css("display","none");  
					$('#specialBox').fadeOut("slow").css("display","none");  
				}else{
					$('#overlay').fadeIn("slow").css("display","block");  
					$('#specialBox').fadeIn("slow").css("display","block");
				}
				
	 alert('run jfdsk'); 
	
}
// after displaying the message scroll upwards to insert the div here


    </script>  
  
	
</html>