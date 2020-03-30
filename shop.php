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
	<title>Shopping Here</title>
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
			</div>		</div>
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
						<li class="active"><a href="shop.php">Shop</a></li>
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

					<li>Shop</li>
				</ul>
			</div>

			<div class="col-md-3">
				<?php
			   		include("include/sidebar.php")
			   	?>
			</div>

			<div class="col-md-9">

				<?php 

				if(!isset($_GET['p_cat']) and !isset($_GET['cat'])) {

					echo "
						<div class='box'>
							<h1>Shop</h1>
							<p>Online shopping site - Shop Electronics, Mobile, Men & Women Clothing, Shoes, Home & Kitchen appliances online on Snapdeal in India. ☆ Next Day Delivery ...</p>
						</div>

					";

				}


				?>

				<div class="row">
					<?php

						if(!isset($_GET['p_cat']) and !isset($_GET['cat'])) {

							$per_page = 6;

							if(isset($_GET['page'])) {

								$page = $_GET['page'];

							}

							else {
								$page=1;

							}
								

							$start_from = ($page-1)*$per_page;

							$get_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT $start_from, $per_page";

							$run_products = mysqli_query($con, $get_products);

							while ($row_products = mysqli_fetch_array($run_products)) {
								
								$pro_id = $row_products['product_id'];
								$pro_title = $row_products['product_title'];
								$pro_price = $row_products['product_price'];
								$pro_img1 = $row_products['product_img1'];

								echo "

									<div class='col-md-4 col-sm-6 center-responsive'>

										<div class='product'>

											<a href='details.php?pro_id=$pro_id'> 

												<img src='admin/product_images/$pro_img1' class='img-responsive'>

											</a>


											<div class='text'>

												<h3>
													<a href='details.php?pro_id=$pro_id'>

														$pro_title

													</a>

												</h3>

												<p class='price'> $ $pro_price </p>

												<p class='buttons'>

													<a href='details.php?pro_id=$pro_id' class='btn btn-default'>

														View details

													</a>

													<a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

														<i class='fa fa-shopping-cart'></i> Add to Cart

													</a>


												</p>

											</div>


										</div>

									</div>

								";
							

							}
						

					?>
				</div>

				<center>
					<ul class="pagination">
						
						<?php

							
								$query = "SELECT * FROM products";

								$results = mysqli_query($con, $query);

								$total_records = mysqli_num_rows($results);

								$per_page = 6;
								
								$total_pages = ceil($total_records / $per_page);
							
								

								echo "

									<li>

										<a href='shop.php?page=1'> ".'First Page'." </a>
									</li>

								";


								for($i=1;$i<=$total_pages;$i++)  {

									echo "

										<li>

											<a href='shop.php?page=".$i."'> ".$i." </a>
										</li>

									";
								}

								echo "

									<li>

										<a href='shop.php?page=$total_pages'> ".'Last Page'." </li>
									</li>

								";
							}

						?>

					</ul>
				</center>

				
					<?php

						getpcatpro();

						getcatpro();

					?>
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