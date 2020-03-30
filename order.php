<?php
	
	session_start();
  include("include/db.php");
  include("functions/functions.php");
?>

<?php

	if(isset($_GET['c_id'])) {
		$customer_id = $_GET['c_id'];
	}

	$customer_email = $_SESSION['customer_email'];

	$status = "Pending";

	$invoice_no = mt_rand();

	$select_cart = "SELECT * FROM cart WHERE c_email='$customer_email'";

	$run_cart = mysqli_query($con, $select_cart);

	while ($row_cart = mysqli_fetch_array($run_cart)) {
		$p_id = $row_cart['p_id'];

		$qty = $row_cart['qty'];

		$size = $row_cart['size'];

		$get_pro = "SELECT * FROM products WHERE product_id = '$p_id'";

		$run_pro = mysqli_query($con, $get_pro);

		while ($row_pro = mysqli_fetch_array($run_pro)) {
			$sub_total = $row_pro['product_price']*$qty;

			$insert_order = "INSERT INTO customer_orders(customer_id, due_amount, invoice_no, qty, size, order_date, order_status) VALUES('$customer_id', '$sub_total', '$invoice_no', '$qty', '$size', NOW(), '$status')";

			$run_customer = mysqli_query($con, $insert_order);

			$pending_order = "INSERT INTO pending_orders(customer_id, invoice_no, product_id, qty, size, order_status) VALUES('$customer_id', '$invoice_no', '$p_id', '$qty', '$size', '$status')";

			$run_pending_order = mysqli_query($con, $pending_order);

			$delete_cart = "DELETE FROM cart WHERE c_email='$customer_email'";

			$run_delete = mysqli_query($con, $delete_cart);

			echo "<script> alert('Your Order Has been submitted'); </script>";

			echo "<script> window.open('customer/my_account.php?my_orders', '_self'); </script>";
		}
	}

	echo "<script> window.open('cart.php', '_self'); </script>";
?>