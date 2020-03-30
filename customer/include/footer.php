<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-3">
				<h4>
					Pages
				</h4>

				<ul>
					<li><a href="../shop.php">Shop</a></li>
					<?php 

					if(isset($_SESSION['customer_email'])) {
						echo "<li><a href='../customer/my_account.php'>My Account</a></li>
						<li><a href='../cart.php'>Shopping Cart</a></li>";
						
					}
					else {
						echo "<li><a href='../checkout.php'>My Account</a></li>
						<li><a href='../checkout.php'>Shopping Cart</a></li>";
					}

					?>
					<li><a href="../contact.php">Contact us</a></li>
				</ul>

				<hr>
				<h4>User Section</h4>
				<ul>
					<li><a href="../checkout.php">Login</a></li>
					<li><a href="../register.php">Register</a></li>
				</ul>

				<hr class="hidden-md hidden-lg hidden-sm">
			</div>

			<div class="col-sm-6 col-md-3">
				<h4>Top Products Categories</h4>

				<ul>
					<?php
						$get_p_cats = "SELECT * FROM product_categories";
						$run_p_cats = mysqli_query($con, $get_p_cats);

						while($row_p_cats = mysqli_fetch_array($run_p_cats)) {
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

					?>
				</ul>

				<hr class="hidden-md hidden-lg">
			</div>

			<div class="col-sm-6 col-md-3">
				<h4>Find Us:</h4>

				<p> 
					<br>IIIT Kota 
					<br>MNIT Jaipur
					<br>Rajasthan 302017
					<br>+919650712619
					<br>paliwalashutosh1@gmail.com
				</p>

				<a href="../contact.php" class="contact-col">Check out our contact Page</a>
				<hr class="hidden-md hidden-lg">
			</div>


			<div class="col-sm-6 col-md-3">
				

				<hr>

				<h4>
					Keep in Touch
				</h4>

				<p class="social">
					<a href="https://www.facebook.com/ashutosh.paliwal.1420" class="fa fa-facebook"></a>
					<a href="https://www.instagram.com/ashu.0101/" class="fa fa-instagram"></a>
					<a href="https://github.com/ashu098" class="fa fa-github"></a>
				</p>

			</div>

			<hr>

		</div>
	</div>
</div>



<div id="copyright">
	<div class="container">
		<div class="col-md-12">
			<p class="con" style="text-align: center;">
				&copy; Developed by Ashutosh Paliwal
			</p>
		</div>
	</div>
</div>