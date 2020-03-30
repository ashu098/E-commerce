<?php
	
	$con = mysqli_connect("localhost", "root", "", "ecom_store");

	function name() {

		global $con;

		if(isset($_SESSION['customer_email'])) {

			$customer_email = $_SESSION['customer_email'];
			$select_customer = "SELECT * FROM customers WHERE customer_email='$customer_email'";

			$run_query = mysqli_query($con, $select_customer);

			while ($row_query = mysqli_fetch_array($run_query)) {
				$nam = $row_query['customer_name'];
				echo($nam);
			}
		}
	}

	function add_cart() {

		global $con;

		if(isset($_GET['add_cart'])) {

			$c_email = $_SESSION['customer_email'];

			$p_id = $_GET['add_cart'];

			$product_qty = $_POST['product_qty'];

			$product_size = $_POST['product_size'];

			$check_product = "SELECT * FROM cart WHERE p_id = '$p_id'";

			$run_product = mysqli_query($con, $check_product);

			$check_id = 0;
			$flag=1;
			$check_id = mysqli_num_rows($run_product);

			if($_SESSION['customer_email']) {
				if($check_id>0) {
					while($row_product = mysqli_fetch_array($run_product)) {
						if($row_product['c_email'] == $c_email) {
							echo "<script> alert('This Product has already been added in Cart') </script>";
							echo "<script> window.open('details.php?pro_id=$p_id', '_self') </script>";
							$flag = 0;
							break;
						}
					} 

					if($flag == 1) {
						$sel_query = "INSERT INTO cart(p_id, c_email, qty, size) VALUES('$p_id', '$c_email', '$product_qty', '$product_size')";

						$run_query = mysqli_query($con, $sel_query);
						echo "<script> alert('Item Successfully Added to Your Shopping Cart'); </script>";
						echo "<script> window.open('details.php?pro_id=$p_id', '_self'); </script>";
					}
				}

				else {
					$query = "INSERT INTO cart(p_id, c_email, qty, size) VALUES('$p_id', '$c_email', '$product_qty', '$product_size')";

					$run_query = mysqli_query($con, $query);
					echo "<script> alert('Item Successfully Added to Your Shopping Cart'); </script>";
					echo "<script> window.open('details.php?pro_id=$p_id', '_self'); </script>";
				}
			}

			else {
				echo "<script> window.open('checkout.php', '_self'); </script>";
			}
		}
	}

	function getpro() {
		global $con;

		$get_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0,8";

		$run_products = mysqli_query($con, $get_products);

		while ($row_products = mysqli_fetch_array($run_products)) {
			
			$pro_id = $row_products['product_id'];
			$pro_title = $row_products['product_title'];
			$pro_price = $row_products['product_price'];
			$pro_img1 = $row_products['product_img1'];

			echo "

				<div class='col-md-4 col-sm-6 single'>

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

							<p class='button'>

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
	}


	function getPCats() {

		global $con;

		$get_p_cats = 'SELECT * FROM product_categories';

		$run_p_cats = mysqli_query($con, $get_p_cats);

		while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
			
			$p_cat_id = $row_p_cats['p_cat_id'];

			$p_cat_title = $row_p_cats['p_cat_title'];

			echo "

				<li>

					<a href='shop.php?p_cat=$p_cat_id'>
						$p_cat_title
					</a>

				</li>

			";


		}
	}


	function getCats() {

		global $con;


		$get_cats = 'SELECT * FROM categories';

		$run_cats = mysqli_query($con, $get_cats);


		while ($row_cats = mysqli_fetch_array($run_cats)) {
			$cat_id = $row_cats['cat_id'];

			$cat_title = $row_cats['cat_title'];

			echo "

				<li>

					<a href='shop.php?cat=$cat_id'>

						$cat_title

					</a>

				</li>

			";
		}

	}


	function getpcatpro() {

		global $con;

		if(isset($_GET['p_cat'])) {

			$p_cat_id = $_GET['p_cat'];

			$get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id='$p_cat_id' ";

			$run_p_cat = mysqli_query($con, $get_p_cat);

			$row_p_cat = mysqli_fetch_array($run_p_cat);

			$p_cat_title = $row_p_cat['p_cat_title'];

			$p_cat_desc = $row_p_cat['p_cat_desc'];

			$get_products = "SELECT* FROM products WHERE p_cat_id='$p_cat_id' LIMIT 0,6";

			$run_products = mysqli_query($con, $get_products);

			$count = mysqli_num_rows($run_products);


			if($count==0) {
				echo "

					<div class='box'>

						<h1> No Product Found in this Category </h1>

					</div>

				";
			}

			else {
				echo "

					<div class='box'>

						<h1> $p_cat_title </h1>
						<p> $p_cat_desc </p>

					</div>

				";
			}

			while ($row_products=mysqli_fetch_array($run_products)) {
				
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

								<p class='button'>

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

		}

	}


	function getcatpro() {

		global $con;

		if(isset($_GET['cat'])) {
			$cat_id = $_GET['cat'];

			$get_cat = "SELECT * FROM categories WHERE cat_id='$cat_id'";

			$run_cat = mysqli_query($con, $get_cat);

			$row_cat = mysqli_fetch_array($run_cat);

			$cat_title = $row_cat['cat_title'];

			$cat_desc = $row_cat['cat_desc'];

			$get_products = "SELECT * FROM products WHERE cat_id='$cat_id' LIMIT 0,6";

			$run_products = mysqli_query($con, $get_products);

			$count = mysqli_num_rows($run_products);

			if($count==0) {
				echo "

					<div class='box'>

						<h1> NO Product Found in this Category </h1>

					</div>

				";
			}

			else {
				echo "

					<div class='box'>

						<h1> $cat_title </h1>
						<p> $cat_desc </p>

					</div>

				";
			}


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


		}
	}


	function items() {
		
		global $con;
if(isset($_SESSION['customer_email'])) {
		$c_email = $_SESSION['customer_email'];

		$get_items = "SELECT * FROM cart WHERE c_email = '$c_email'";

		$run_items = mysqli_query($con, $get_items);

		$no_rows = mysqli_num_rows($run_items);

		echo($no_rows);
	}
	}


	function total_price() {

		global $con;

		$c_email = $_SESSION['customer_email'];

		$get_itm = "SELECT * FROM cart WHERE c_email = '$c_email'";

		$run_itm = mysqli_query($con, $get_itm);

		$tot = 0;

		while($row_items = mysqli_fetch_array($run_itm)) {

			$p_id = $row_items['p_id'];

			$gett_items = "SELECT * FROM products WHERE product_id = '$p_id'";

			$runn_items = mysqli_query($con, $gett_items);

			while($roww_items = mysqli_fetch_array($runn_items)) {

				$pro_price = $roww_items['product_price'];

				$tot = $tot + $row_items['qty']*$pro_price;
			}
		}

		echo($tot);
	}

?>