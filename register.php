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
	<title>Register Here</title>
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


	<div id="content">
		<div class="container">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li>
						<a href="index1.php">Home</a>
					</li>

					<li>Register</li>
				</ul>
			</div>

			<div class="col-md-3">
				<?php
			   		include("include/sidebar.php")
			   	?>
			</div>

			<div class="col-md-9">
				<div class="box">
					<div class="box-header">
						<center>
							<h2>Register a New Account</h2>
						</center>

						<form method="post" action="register.php" enctype="multipart/form-data">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="c_name" class="form-control" required>
							</div>

							<div class="form-group">
								<label>Email</label>
								<input type="Email" name="c_email" class="form-control" required>
							</div>

							<div class="form-group">
								<label>Password</label>
								<input type="Password" name="c_pass" class="form-control" required>
							</div>

							<div class="form-group">
								<label>Country</label>
								<input type="text" name="c_country" class="form-control" required>
							</div>

							<div class="form-group">
								<label>City</label>
								<input type="text" name="c_city" class="form-control" required>
							</div>

							<div class="form-group">
								<label>Contact No.</label>
								<input type="number" name="c_contact" class="form-control" required>
							</div>

							<div class="form-group">
								<label>Address</label>
								<input type="text" name="c_address" class="form-control" required>
							</div>

							<div class="form-group">
								<label>Profile Picture</label>
								<input type="file" name="c_image" class="form-control" required>
							</div>


							<div class="text-center">
								<button type="submit" name="register" class="btn btn-primary">
								<i class="fa fa-user-md"></i> Register
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
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


<?php

	if(isset($_POST['register'])) {

		$c_name = $_POST['c_name'];

		$c_email = $_POST['c_email'];

		$c_pass = $_POST['c_pass'];

		$c_country = $_POST['c_country'];

		$c_city = $_POST['c_city'];

		$c_contact = $_POST['c_contact'];

		$c_address = $_POST['c_address'];

		$c_image = $_FILES['c_image']['name'];

		$c_image_tmp = $_FILES['c_image']['tmp_name'];

		move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

		$check_customer = "SELECT * FROM customers WHERE customer_email='$c_email'";

		$check_run = mysqli_query($con, $check_customer);

		$check_tot = 0;
		$check_tot = mysqli_num_rows($check_run);

		if($check_tot > 0) {
			echo "<script> alert('You are already registered! Please Sign in'); </script>";
			echo "<script> window.open('checkout.php', '_self'); </script>";
		}

		else {
			if(strlen($c_pass)>6) {
				$insert_customer = "INSERT INTO customers(customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image) VALUES('$c_name', '$c_email', '$c_pass', '$c_country', '$c_city', '$c_contact', '$c_address', '$c_image')";

				$run_query = mysqli_query($con, $insert_customer);
				
				$_SESSION['customer_email'] = $c_email;

				echo "<script> alert('You have been successfully registered'); </script>";

				echo "<script> window.open('index1.php', '_self'); </script>";
			}
			
			else {
				echo "<script> alert('Password Length must be minimum of 6 charcter!'); </script>";
			}
		}


	}



?>