<div class="col-md-9">
	<div class="box">

		<?php

			$session_email = $_SESSION['customer_email'];

			$select_customer = "SELECT * FROM customers WHERE customer_email='$session_email'";

			$run_customer = mysqli_query($con, $select_customer);

			$row_customer = mysqli_fetch_array($run_customer);

			$customer_id = $row_customer['customer_id'];



		?>
		<h1 class="text-center">
			Payments option for You
		</h1>

		<p class="lead text-center">
			<a href="order.php?c_id=<?php echo($customer_id); ?>" class="" style="text-decoration: none;"> Offline Payment</a>
		</p>

		<center>
			<p class="lead">
				<a href="#" style="text-decoration: none;">
					Paypall Payment
					<img src="images/Paypal.png" class="img-responsive">
				</a>
			</p>
		</center>

	</div>
</div>