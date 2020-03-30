<?php  
session_start();
  include("include/db.php");
  include("functions/functions.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="loader/loader.css">
	<title>E-commerce Website</title>
</head>
<body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <div id="loader"></div>

	<div id="top">
		<div class="container">
			<div class="col-md-6 offer">
				<a href="index1.php" class="btn btn-success btn-sm">
      
          <?php

            if(!isset($_SESSION['customer_email'])) {
              echo "Welcome Guest";
            }
            else {
              echo "Welcome : ";
              name() ;

              echo "<a href='checkout.php' class='c1'> ";
              items();
              echo " items | Total Price : $ ";
              total_price();
              echo "</a>";
              
            }

          ?>
            
        </a>				
			</div>

			<div class="col-md-6">
				<ul class="menu">
					<li><a href="register.php">Register</a></li>
          <?php 
            if(isset($_SESSION['customer_email'])) {
              echo "
    					<li><a href='customer/my_account.php'>My Account</a></li>
    					<li><a href='cart.php'>Go to Cart</a></li> ";
            }
          ?>
					<li><a href="checkout.php">
       
            <?php

              if(!isset($_SESSION['customer_email'])) {
                echo "<a href='checkout.php'> Login </a>";
              }

              else {
                echo "<a href='logout.php'> Log Out </a>";
              }

            ?>

          </a></li>
				</ul>
			</div>
		</div>
	</div>


	<div id="navbar" class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a href="index1.php" class="navbar-brand home">
					<img src="images/ecom1.png" alt="Logo" class="hidden-xs">
					<img src="images/ecom11.png" alt="Logo" class="visible-xs">
				</a>

				<button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only">Toggle Navigation</span>
					<i class="fa fa-align-justify"></i>
				</button>

				
			</div>

			<div class="navbar-collapse collapse" id="navigation">
				<div class="padding-nav">
					<ul class="nav navbar-nav left">
						<li class="active"><a href="index1.php">Home</a></li>
						<li><a href="shop.php">Shop</a></li>
            <?php

            if(isset($_SESSION['customer_email'])) {
              echo "
        						<li><a href='customer/my_account.php'>My Account</a></li>
        						<li><a href='cart.php'>Shopping Cart</a></li> ";
              }

              else {
                
                echo "
                      <li><a href='checkout.php'>My Account</a></li>
                      <li><a href='checkout.php'>Shopping Cart</a></li> ";
                
              }
            ?>
						<li><a href="contact.php">Contact us</a></li>
					</ul>
				</div>

        <?php

            if(isset($_SESSION['customer_email'])) {
              echo "
      				<a href='cart.php' class='btn navbar-btn btn-primary right'>
      					<i class='fa fa-shopping-cart'></i>
      					<span>";
              items(); 
              echo " Items in your cart</span> 
      				</a>
                ";
            }

          ?>

				
			</div>
		</div>
	</div>


	<div class="container" id="slider">
       
       <div class="col-md-12">
           
           <div class="carousel slide" id="myCarousel" data-ride="carousel">
               
               <ol class="carousel-indicators">
                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>
                   
               </ol>
               
               <div class="carousel-inner">
              
                <?php 

                  $get_slides = "SELECT * FROM slider LIMIT 0,1";

                  $run_slider = mysqli_query($con, $get_slides);

                  while ($row_slides=mysqli_fetch_array($run_slider)) {
                      
                      $slide_name = $row_slides['slide_name'];
                      $slide_image = $row_slides['slide_image'];
                      $slide_url = $row_slides['slide_url'];

                      echo "

                        <div class='item active'>
                          <a href='$slide_url'>
                          <img src='admin/slides_images/$slide_image' alt='$slide_name' width='100%'>
                          </a>
                        </div>

                      ";
                  }

                  $get_slides = "SELECT * FROM slider LIMIT 1,3";

                  $run_slider = mysqli_query($con, $get_slides);

                  while ($row_slides=mysqli_fetch_array($run_slider)) {
                      
                      $slide_name = $row_slides['slide_name'];
                      $slide_image = $row_slides['slide_image'];
                      $slide_url = $row_slides['slide_url'];


                      echo "

                        <div class='item'>

                          <a href='$slide_url'>
                          <img src='admin/slides_images/$slide_image' alt='$slide_name' width='100%'>
                          </a>
                        </div>

                      ";
                  }

                ?>
                   
               </div>
               
               <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                   
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>
                   
               </a>
               
               <a href="#myCarousel" class="right carousel-control" data-slide="next">
                   
                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>
                   
               </a>
               
           </div>
           
       </div>
       
   </div>

   <div id="advantages">
   		<div class="container">
   			<div class="same-height-row">

   				<div class="col-sm-4">
   					<div class="box same-height">
   						<div class="icon">
   							<i class="fa fa-heart"></i>
   						</div>

   						<h3 style="color: #4fbfa8;">
   							We Love Our Customer
   						</h3>
   						<p>we Provide best Service to Customer</p>
   					</div>
   				</div>

   				<div class="col-sm-4">
   					<div class="box same-height">
   						<div class="icon">
   							<i class="fa fa-tag"></i>
   						</div>

   						<h3 style="color: #4fbfa8;">
   							Best Prices
   						</h3>
   						<p>Provide Products with best Prices</p>
   					</div>
   				</div>

   				<div class="col-sm-4">
   					<div class="box same-height">
   						<div class="icon">
   							<i class="fa fa-thumbs-up"></i>
   						</div>

   						<h3 style="color: #4fbfa8;">
   							100% Original Products
   						</h3>
   						<p>We Care You, that's We always with you</p>
   					</div>
   				</div>
   			</div>
   		</div>
   </div>


   <div id="hot">
   		<div class="box">
   			<div class="container">
   				<div class="col-md-12">	
   					<h2>Our Latest Products</h2>
   				</div>
   			</div>
   		</div>
   </div>


   <div id="content" class="container">
   		<div class="row">
   			
        <?php

          getpro();

        ?>

   		</div>
   </div>

   <script>
    var loader;
    function loadNow(opacity) {
      
      if(opacity<=0) {
        displayContent();
      }
      else {
        loader.style.opacity = opacity;
        window.setTimeout(function() {
          loadNow(opacity - 0.05)
        }, 50);
      }
    }

    function displayContent() {
      loader.style.display = 'none';
    }

    document.addEventListener("DOMContentLoaded", function() {
      loader = document.getElementById('loader');
      loadNow(1);
    });
  </script>

   <?php
   		include("include/footer.php");
   	?>
</body>
</html>