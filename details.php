<?php  
session_start();
  include("include/db.php");
  include("functions/functions.php");

  if(isset($_GET['pro_id'])) {

  	$product_id = $_GET['pro_id'];

  	$get_product = "SELECT * FROM products WHERE product_id='$product_id'";

  	$run_product = mysqli_query($con, $get_product);

  	$row_product = mysqli_fetch_array($run_product);

  	$p_cat_id = $row_product['p_cat_id'];

  	$cat_id = $row_product['cat_id'];

  	$product_title = $row_product['product_title'];

  	$product_price = $row_product['product_price'];

  	$product_desc = $row_product['product_desc'];

  	$product_img1 = $row_product['product_img1'];

  	$product_img2 = $row_product['product_img2'];

  	$product_img3 = $row_product['product_img3']; 

  	$get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id = '$p_cat_id'";

  	$run_p_cat = mysqli_query($con, $get_p_cat);

  	$row_p_cat = mysqli_fetch_array($run_p_cat);

  	$p_cat_title = $row_p_cat['p_cat_title'];

  	$get_cat = "SELECT * FROM categories WHERE cat_id = '$cat_id' ";

  	$run_cat = mysqli_query($con, $get_cat);

  	$row_cat = mysqli_fetch_array($run_cat);

  	$cat_title = $row_cat['cat_title'];
  }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<title>Product Details</title>
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

					<li>
						<a href="shop.php?cat=<?php echo($cat_id); ?>"> <?php echo($cat_title); ?> </a>
					</li>

					<li>
						<a href="shop.php?p_cat=<?php echo($p_cat_id); ?>"> <?php echo($p_cat_title); ?> </a>
					</li>

					<li>
						<?php echo($product_title); ?>
					</li>
				</ul>
			</div>

			<div class="col-md-3">
				<?php
			   		include("include/sidebar.php")
			   	?>
			</div>

			<div class="col-md-9">
				<div class="row" id="productMain">
					<div class="col-sm-6">
						<div class="mainImage">
							<div class="carousel slide" id="myCarousel" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
									<li data-target="#myCarousel" data-slide-to="1"></li>
									<li data-target="#myCarousel" data-slide-to="2"></li>
								</ol>

								<div class="carousel-inner">
									<div class="item active">
										<center><img class="img-responsive" src="admin/product_images/<?php echo($product_img1); ?>"></center>
									</div>
									<div class="item">
										<center><img class="img-responsive" src="admin/product_images/<?php echo($product_img2); ?>"></center>
									</div>
									<div class="item">
										<center><img class="img-responsive" src="admin/product_images/<?php echo($product_img3); ?>"></center>
									</div>
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

					<div class="col-sm-6">
						<div class="box">
							<h1 class="text-center"><?php echo($product_title); ?></h1>

							<?php  
							add_cart(); ?>

							<form class="form-horizontal" action="details.php?add_cart=<?php echo($product_id); ?>" method="post">
								<div class="form-group">
									<label for="" class="col-md-5 control-label">Products Quantity</label>

									<div class="col-md-7">
										<select class="form-control" name="product_qty" required>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="" class="col-md-5 control-label">Products Size</label>

									<div class="col-md-7">
										<select class="form-control" name="product_size" required>
											<option>Small</option>
											<option>Medium</option>
											<option>Large</option>
										</select>
									</div>
								</div>

								<p class="price">$ <?php echo($product_price); ?></p>

	<p class="text-center buttons"><button class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to Cart</button></p>
							</form>
						</div>

						<div class="row" id="thumbs">
							<div class="col-xs-4">
								<a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb">
									<img src="admin/product_images/<?php echo($product_img1); ?>" class="img-responsive">
								</a>
							</div>

							<div class="col-xs-4">
								<a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb">
									<img src="admin/product_images/<?php echo($product_img2); ?>" class="img-responsive">
								</a>
							</div>

							<div class="col-xs-4">
								<a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb">
									<img src="admin/product_images/<?php echo($product_img3); ?>" class="img-responsive">
								</a>
							</div>
						</div>
					</div>
				</div>


				<div class="box" id="details">
					<h4>Product Details</h4>

					<p>
						<?php echo($product_desc); ?>
					</p>

					<h4>
						Size
					</h4>

					<ul>
						<li>Small</li>
						<li>Medium</li>
						<li>Large</li>
					</ul>

					<hr>
				</div>

				<div class="row same-heigh-row">
					<div class="col-md-3 col-sm-6">
						<div class="box same-height headline">
							<h3 class="text-center">Product You may be like</h3>
						</div>
					</div>

					<?php

						$gett_products = "SELECT * FROM products ORDER BY rand() DESC LIMIT 0,3";

						$runn_products = mysqli_query($con, $gett_products);

						while ($roww_product = mysqli_fetch_array($runn_products)) {

							$prod_id = $roww_product['product_id'];

							$prod_title = $roww_product['product_title'];

							$prod_img1 = $roww_product['product_img1'];

							$prod_price = $roww_product['product_price'];

							echo "

								<div class='col-md-3 col-sm-6 center-responsive'>

									<div class='product same-height'>

										<a href='details.php?pro_id=$prod_id'>

											<img src='admin/product_images/$prod_img1' class='img-responsive'>

										</a>

										<div class='text'>

											<h3>
												<a href='details.php?pro_id=$prod_id'>

													$prod_title

												</a>

											</h3>

											<p class='price'> $ $prod_price </p>

											

										</div>

									</div>

								</div>

							";
						}

					?>
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