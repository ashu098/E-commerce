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
	<title>Your Cart</title>
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
        						<li class='active'><a href='cart.php'>Shopping Cart</a></li> ";
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

					<li>Cart</li>
				</ul>
			</div>

			<div id="cart" class="col-md-9">
				<div class="box">
					<form action="cart.php" method="post" enctype="multipart/form-data">
						<h1>Shopping Cart</h1>

						<?php

							if(isset($_SESSION['customer_email'])) {
								$c_email = $_SESSION['customer_email'];

								$get_cart = "SELECT * FROM cart WHERE c_email = '$c_email'";

								$run_cart = mysqli_query($con, $get_cart);

								$count = mysqli_num_rows($run_cart);
							}

						?>

						<p class="text-muted">You currently have <?php if(isset($_SESSION['customer_email'])) {echo($count);} ?> items in your cart</p>

						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th colspan="2">Product</th>
										<th>Quantity</th>
										<th>Unit Price</th>
										<th>Size</th>
										<th colspan="1">Delete</th>
										<th colspan="2">Sub-Total</th>
									</tr>
								</thead>

								<tbody>

									<?php 
										if(isset($_SESSION['customer_email'])) {
										$total = 0;

										while ($row_cart = mysqli_fetch_array($run_cart)) {
											
											$pro_id = $row_cart['p_id'];

											$pro_qty = $row_cart['qty'];

											$pro_size = $row_cart['size'];

											$get_products = "SELECT * FROM products WHERE product_id='$pro_id'";

											$run_products = mysqli_query($con, $get_products);

											while ($row_products = mysqli_fetch_array($run_products)) {
												
												$product_title = $row_products['product_title'];

												$product_img1 = $row_products['product_img1'];

												$product_price = $row_products['product_price'];

												$sub_total = $product_price * $pro_qty;

												$total += $sub_total;
										

									?>
									<tr>
										<td>
											<img src="admin/product_images/<?php echo($product_img1); ?>" class="img-responsive">
										</td>
										<td>
											<a href="details.php?pro_id=<?php echo($pro_id); ?>"><?php echo($product_title); ?></a>
										</td>
										<td>
											<?php echo($pro_qty); ?>
										</td>
										<td>
											<?php echo($product_price); ?>
										</td>
										<td>
											<?php echo($pro_size); ?>
										</td>
										<td>
											<input type="checkbox" name="remove[]" value="<?php echo($pro_id); ?>">
										</td>
										<td>
											<?php echo($sub_total); ?>
										</td>
									</tr>

									<?php  } } }?>
								</tbody>
								

								<tfoot>
									<tr>
										<th colspan="5">
											Total
										</th>
										<th colspan="2">
											$ <?php if(isset($_SESSION['customer_email'])) {echo($total);} ?>
										</th>
									</tr>
								</tfoot>
							</table>
						</div>

						<div class="box-footer">
							<div class="pull-left">
								<a href="index1.php" class="btn btn-default">
									<i class="fa fa-chevron-left"></i> Continue Shopping
								</a>
							</div>

							<div class="pull-right">
								<button type="submit" name="update" value="Update Cart" class="btn btn-default">
									<i class="fa fa-refresh"></i> Update Cart
								</button>

								<a href="checkout.php" class="btn btn-primary">Proceed Checkout <i class="fa fa-chevron-right"></i></a>
							</div>
						</div>
					</form>
				</div>

				<?php 
					if(isset($_SESSION['customer_email'])) {
					function update_cart() {
						global $con;

						if(isset($_POST['update'])) {

							foreach ($_POST['remove'] as $remove_id) {
								
								$delete_product = "DELETE FROM cart WHERE p_id = '$remove_id'";

								$run_delete = mysqli_query($con, $delete_product);

								if($run_delete) {
									echo "

										<script> window.open('cart.php', '_self') </script>

									";
								}
							}
						}
					}

					echo @$up_cart = update_cart();
				}
				?>

				<div class="row same-heigh-row">
					<div class="col-md-3 col-sm-6">
						<div class="box same-height headline">
							<h3 class="text-center">Product You may be like</h3>
						</div>
					</div>

					<?php

						$get_pro = "SELECT * FROM products ORDER BY rand() LIMIT 0,3";

						$run_pro = mysqli_query($con, $get_pro);

						while ($row_pro = mysqli_fetch_array($run_pro)) {
							
							$pro_id = $row_pro['product_id'];

							$pro_price = $row_pro['product_price'];

							$pro_title = $row_pro['product_title'];

							$pro_img1 = $row_pro['product_img1'];

							echo "

								<div class='col-md-3 col-sm-6 center-responsive'>
									<div class='product same-height'>
										<a href='details.php?pro_id=$pro_id'>
											<img src='admin/product_images/$pro_img1' class='img-responsive'>
										</a>

										<div class='text'>
											<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
											<p class='price'>$ $pro_price</p>
										</div>
									</div>
								</div>

							";
						}

					?>

				</div>

			</div>

			<div class="col-md-3">
				<div class="box" id="order-summary">
					<div class="box-header">
						<h3>Order Summary</h3>
					</div>

					<p class="text-muted">
						Delivery charges and additional costs are added based on items you have purchased
					</p>

					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td> Order Subtotal </td>
									<th> $ <?php if(isset($_SESSION['customer_email'])) {echo($total);} ?></th>
								</tr>

								<tr>
									<td> Shipping and Handling </td>
									<td> $0 </td>
								</tr>

								<tr>
									<td> Taxes </td>
									<th> $0 </th>
								</tr>

								<tr class="total">
									<td> Total Amount </td>
									<th>$<?php if(isset($_SESSION['customer_email'])) {echo($total);} ?></th>
								</tr>

							</tbody>
						</table>
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