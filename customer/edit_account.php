<?php

	if(isset($_SESSION['customer_email'])) {

		$session_email = $_SESSION['customer_email'];

		$get_cust = "SELECT * FROM customers WHERE customer_email = '$session_email'";

		$run_cust = mysqli_query($con, $get_cust);

		$row_cust = mysqli_fetch_array($run_cust);

		$customer_id = $row_cust['customer_id'];

		$customer_name = $row_cust['customer_name'];

		$customer_email = $row_cust['customer_email'];

		$customer_country = $row_cust['customer_country'];

		$customer_city = $row_cust['customer_city'];

		$customer_contact = $row_cust['customer_contact'];

		$customer_address = $row_cust['customer_address'];

		$customer_image = $row_cust['customer_image'];

?>

<h1 align="center">Edit Your Account</h1>

<form method="post" action="" enctype="multipart/form-data">
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="c_name" class="form-control" value="<?php echo($customer_name); ?>">
	</div>

	<div class="form-group">
		<label>Country</label>
		<input type="text" name="c_country" class="form-control" value="<?php echo($customer_country); ?>">
	</div>

	<div class="form-group">
		<label>City</label>
		<input type="text" name="c_city" class="form-control" value="<?php echo($customer_city); ?>">
	</div>

	<div class="form-group">
		<label>Contact</label>
		<input type="text" name="c_contact" class="form-control" value="<?php echo($customer_contact); ?>">
	</div>

	<div class="form-group">
		<label>Address</label>
		<input type="text" name="c_address" class="form-control" value="<?php echo($customer_address); ?>">
	</div>

	<div class="form-group">
		<label>Profile Picture</label>
		<input type="file" name="c_image" class="form-control" required>
		<img src="customer_images/<?php echo($customer_image); ?>" class="img-responsive">
	</div>

	<div class="text-center">
		<button name="update" class="btn btn-primary" type="submit">
			<i class="fa fa-user-md"></i> Update
		</button>
	</div>

</form>

<?php

	if(isset($_POST['update'])) {
		$update_id = $customer_id;

		$c_name = $_POST['c_name'];

		$c_country = $_POST['c_country'];

		$c_city = $_POST['c_city'];

		$c_contact = $_POST['c_contact'];

		$c_address = $_POST['c_address'];

		$c_image = $_FILES['c_image']['name'];

		$c_image_name = $_FILES['c_image']['tmp_name'];

		move_uploaded_file($c_image_name, "customer_images/$c_image");

		$update_customer = "UPDATE customers SET customer_name='$c_name', customer_country='$c_country', customer_city='$c_city', customer_contact='$c_contact', customer_address='$c_address', customer_image='$c_image' WHERE customer_id='$update_id'";

		$run_update = mysqli_query($con, $update_customer);

		if($run_update) {
			echo "<script> alert('Your Account has Successfully updated :)'); </script>";
			echo "<script> window.open('my_account.php', '_self'); </script>";
		}
	}

}
?>