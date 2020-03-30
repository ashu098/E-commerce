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
  <title>Checkout</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="loader/loader.css">
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
						<li><a href="index1.php">Home</a></li>
						<li><a href="shop.php">Shop</a></li>
            <?php

            if(isset($_SESSION['customer_email'])) {
              echo "
        						<li class='active'><a href='customer/my_account.php'>My Account</a></li>
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


	<div id="content">
		<div class="container">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li>
						<a href="index1.php">Home</a>
					</li>

					<li>Sign in</li>
				</ul>
			</div>

			<div class="col-md-3">
				<?php
			   		include("include/sidebar.php")
			   	?>
			</div>

			<?php
				if(!isset($_SESSION['customer_email'])) {
					include("customer/login.php");
				}

				else {
					include("payment.php"); 
				}
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
