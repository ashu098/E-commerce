<div class="col-md-9">
	<div class="box">
		<div class="box-header">
			
			<center>
				<h1>
					Login Yourself
				</h1>
			</center>

		</div>

		<form method="post" action="checkout.php">
			<div class="form-group">
				<label> Email</label>
				<input type="text" name="c_email" class="form-control" required>
			</div>

			<div class="form-group">
				<label> Password</label>
				<input type="password" name="c_pass" class="form-control" required>
			</div>

			<div class="text-center">
				<button name="login" value="login" class="btn btn-primary">
					<i class="fa fa-sign-in"></i> Login
				</button>
			</div>
		</form>

		<center>
			<a href="register.php" style="text-decoration: none;">
				<h5> Don't have an account..? Register here</h5>
			</a>
		</center>
	</div>
</div>


<?php

	if(isset($_POST['login'])) {
		$customer_email = $_POST['c_email'];

		$customer_password = $_POST['c_pass'];

		$select_customer = "SELECT * FROM customers WHERE customer_email='$customer_email' AND customer_pass='$customer_password'";

		$run_query = mysqli_query($con, $select_customer);

		$check_customer = mysqli_num_rows($run_query);

		if($check_customer==0) {
			echo "<script> alert('Wrong Email or Password'); </script>";

			echo "<script> window.open('checkout.php', '_self'); </script>";
		}

		else {
			
			$_SESSION['customer_email'] = $customer_email;

			echo "<script> alert('You are Logged in'); </script>";

			echo "<script> window.open('index1.php', '_self'); </script>";
			
		}
	}

?>