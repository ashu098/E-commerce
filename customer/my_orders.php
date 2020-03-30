<center>
	<h1>
		My Orders
	</h1>

	<p class="text-muted">
		If you have any work, feel free to contact us. Our Customer Service Work is 24/7
	</p>
</center>

<hr>

<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				
				<th>ON </th>
				<th>Due Amount </th>
				<th>Invoice No. </th>
				<th>Qunatity </th>
				<th>Size </th>
				<th>Order-date </th>
				<th>Paid / Unpaid </th>
				<th>Status </th>
			</tr>
		</thead>

		<tbody>

			<?php

				if(isset($_SESSION['customer_email'])) {
					$customer_email = $_SESSION['customer_email'];

					$sel_custo = "SELECT * FROM customers WHERE customer_email='$customer_email'";

					$run_custo = mysqli_query($con, $sel_custo);

					$row_custo = mysqli_fetch_array($run_custo);

					$customer_id = $row_custo['customer_id'];

					$get_order = "SELECT * FROM customer_orders WHERE customer_id='$customer_id'";

					$run_order = mysqli_query($con, $get_order);

					$i=0;

					while ($row_order = mysqli_fetch_array($run_order)) {
						
						$order_id = $row_order['order_id'];

						$due_amount = $row_order['due_amount'];

						$invoice_no = $row_order['invoice_no'];

						$qty = $row_order['qty'];
						
						$size = $row_order['size'];

						$order_date = substr($row_order['order_date'], 0, 11);

						$order_status = $row_order['order_status'];

						$i++;

						if($order_status == 'Pending') {
							$order_status = 'Unpaid';
						}

						else {
							$order_status = 'Paid';
						}

			?>
			<tr>
				<th><?php echo($i); ?></th>

				<td>$ <?php echo($due_amount); ?></td>
				<td><?php echo($invoice_no); ?></td>
				<td><?php echo($qty); ?></td>
				<td><?php echo($size); ?></td>
				<td><?php echo($order_date); ?></td>
				<td><?php echo($order_status); ?></td>

				<td>
					<?php 
					if($order_status=='Unpaid') {
						echo "<a href='confirm.php?order_id=$order_id' target='_blank' class='btn btn-primary btn-sm'>Confirm Paid</a>";
					}
					else {
						echo "<p style='color:green;'>Complete</p>";
					}

					?>
				</td>
			</tr>

			<?php }} ?>
		</tbody>
	</table>
</div>