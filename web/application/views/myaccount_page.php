<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<h1 class="page-title">Travel Profile</h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php include('sidebar.php'); ?>
		</div>
		<div class="col-md-9">
			<h4>Total Traveled</h4>
			<ul class="list list-inline user-profile-statictics mb30">
				<li><i class="fa fa-truck user-profile-statictics-icon"></i>
					<h5>140</h5>
					<p>Orders</p>
				</li>
				<li><i class="fa fa-users user-profile-statictics-icon"></i>
					<h5>123</h5>
					<p>Users</p>
				</li>
				<li><i class="fa fa-car user-profile-statictics-icon"></i>
					<h5>3</h5>
					<p>Delivery</p>
				</li>
				<li><i class="fa fa-taxi user-profile-statictics-icon"></i>
					<h5>2</h5>
					<p>Taxi Office</p>
				</li>
			</ul>
			
			<div>
				<h5>Current Orders</h5>
			</div>
			<table class="table table-bordered table-striped table-booking-history">
				<thead>
					<tr>
						<th>Order #</th>
						<th>Order Date</th>
						<th>Details</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php if(isset($current_orders)) { ?>
						<?php foreach ($current_orders as $order) { ?>
						<tr>
							<td><a href="/order/orderDetails?orderId=<?php echo $order->orders_id; ?>"><?php echo $order->orders_id; ?></a></td>
							<td><?php echo $order->time_placed; ?></td>
							<td>
								<b>From: </b><?php if (isset($order->from_address)) echo $order->from_address->address1; ?>
								<br/><b>To: </b><?php if (isset($order->to_address)) echo $order->to_address->address1; ?>
								<br/><b>At: </b><?php if (isset($order->date)) echo $order->date; ?>   <?php if (isset($order->time)) echo $order->time; ?></td>
							<td><?php echo $order->status; ?></td>
						</tr>
						<?php } ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>