<?php

	if(isset($_SESSION['customer_email'])) {

?>


<center>
	<h1> Do You really want to Delete Your Account</h1>

	<form action="" method="post">
		<input type="submit" name="Yes" value="Yes, I Want To Delete" class="btn btn-danger">

		<input type="submit" name="No" value="No, I Want To Delete" class="btn btn-primary">
	</form>
</center>


<?php

	$session_email = $_SESSION['customer_email'];

	if(isset($_POST['Yes'])) {
		$sel = "DELETE FROM customers WHERE customer_email='$session_email'";

		$run = mysqli_query($con, $sel);

		if($run) {
			session_destroy();

			echo "<script> alert('Your Account has Successfully Deleted. Good Bye!'); </script>";
			echo "<script> window.open('../index1.php', '_self'); </script>";
		}
	}
	if(isset($_POST['No'])) {
		echo "<script> window.open('my_account.php', '_self'); </script>";	
	}


}
?>