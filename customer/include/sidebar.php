<div class="panel panel-default sidebar-menu">
	<div class="panel-heading">
		
		<?php
			if(isset($_SESSION['customer_email'])) {
				$customer_email = $_SESSION['customer_email'];

				$sel_cust = "SELECT * FROM customers WHERE customer_email='$customer_email'";

				$run_cust = mysqli_query($con, $sel_cust);

				$row_cust = mysqli_fetch_array($run_cust);

				$customer_image = $row_cust['customer_image'];

				$customer_name = $row_cust['customer_name'];

			 
				echo "

					<center>

						<img src='customer_images/$customer_image' class='img-responsive'>

					</center>

					<br/>

					<h3 class='panel-title' align='center'>

						$customer_name

					</h3>

				";
			}

		?>
	</div>

	<div class="panel-body">
		<ul class="nav-pills nav-stacked nav">
			<li class="<?php if(isset($_GET['my_orders'])) {echo "active";}?>">
				<a href="my_account.php?my_orders">
					<i class="fa fa-list">
					</i>
					My Orders
				</a>
			</li>

			<li class="<?php if(isset($_GET['edit_account'])) {echo "active";}?>">
				<a href="my_account.php?edit_account">
					<i class="fa fa-pencil">
					</i>
					Edit Account
				</a>
			</li>

			<li class="<?php if(isset($_GET['change_pass'])) {echo "active";}?>">
				<a href="my_account.php?change_pass">
					<i class="fa fa-user">
					</i>
					Change Password
				</a>
			</li>

			

			<li class="<?php if(isset($_GET['delete_account'])) {echo "active";}?>">
				<a href="my_account.php?delete_account">
					<i class="fa fa-trash-o">
					</i>
					Delete Account
				</a>
			</li>

			<li>
				<a href="logout.php">
					<i class="fa fa-sign-out">
					</i>
					Log Out
				</a>
			</li>
		</ul>
	</div>
</div>