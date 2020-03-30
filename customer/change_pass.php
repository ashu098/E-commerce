<?php

	if(isset($_SESSION['customer_email'])) {

?>

<h1 align="center">Change Password</h1>

<form method="post" action="" enctype="multipart/form-data">
	<div class="form-group">
		<label>Your Old Password</label>
		<input type="Password" name="old_pass" class="form-control">
	</div>

	<div class="form-group">
		<label>Your New Password</label>
		<input type="Password" name="new_pass" class="form-control">
	</div>

	<div class="form-group">
		<label>Confirm Your New Password</label>
		<input type="Password" name="new_pass_again" class="form-control">
	</div>

	
	<div class="text-center">
		<button name="submit" class="btn btn-primary" type="submit ">
			<i class="fa fa-user-md"></i> Update
		</button>
	</div>

</form>


<?php 

	if(isset($_POST['submit'])) {
		$c_email = $_SESSION['customer_email'];

		$c_old_pass = $_POST['old_pass'];

		$new_pass = $_POST['new_pass'];

		$new_pass_again = $_POST['new_pass_again'];

		$sel_pass = "SELECT * FROM customers WHERE customer_email='$c_email'";

		$run_pass = mysqli_query($con, $sel_pass);

		$row_pass = mysqli_fetch_array($run_pass);

		$old_pass = $row_pass['customer_pass'];

		if($old_pass != $c_old_pass) {
			echo "<script> alert('Your Old Password is Wrong Please try again!'); </script>";
			echo "<script> window.open('my_account.php?change_pass', '_self'); </script>";
		}

		if($new_pass != $new_pass_again) {
			echo "<script> alert('Your new Password is not match Please try again!'); </script>";
			echo "<script> window.open('my_account.php?change_pass', '_self'); </script>";
		}

		$update = "UPDATE customers SET customer_pass='$new_pass' WHERE customer_email='$c_email'";

		$run_query = mysqli_query($con, $update);

		if($run_query) {
			echo "<script> alert('Your Password has Successfully Changed :)'); </script>";
			echo "<script> window.open('my_account.php', '_self'); </script>";
		}
	}

} ?>