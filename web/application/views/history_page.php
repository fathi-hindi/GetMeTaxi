<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<h1 class="page-title">Booking History</h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php include('sidebar.php'); ?>
		</div>
		<div class="col-md-9">
			<div>
				<h5>Current Orders</h5>
			</div>
			<table class="table table-bordered table-striped table-booking-history">
				<thead>
					<tr>
						<th>Order #</th>
						<th>Order Date</th>
						<th>From</th>
						<th>To</th>
						<th>Date / Time</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($current_orders as $order) { ?>
					<tr>
						<td><a href="/order/orderDetails?orderId=<?php echo $order->orders_id; ?>"><?php echo $order->orders_id; ?></a></td>
						<td><?php echo $order->time_placed; ?></td>
						<td><?php if (isset($order->from_address)) echo $order->from_address->address1; ?></td>
						<td><?php if (isset($order->to_address)) echo $order->to_address->address1; ?></td>
						<td><?php if (isset($order->date)) echo $order->date; ?>   <?php if (isset($order->time)) echo $order->time; ?></td>
						<td><?php echo $order->status; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		
			<div>
				<h5>All Orders</h5>
			</div>
			<table class="table table-bordered table-striped table-booking-history">
				<thead>
					<tr>
						<th>Order #</th>
						<th>Order Date</th>
						<th>From</th>
						<th>To</th>
						<th>Date / Time</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($orders as $order) { ?>
					<tr>
						<td><a href="/order/orderDetails?orderId=<?php echo $order->orders_id; ?>"><?php echo $order->orders_id; ?></a></td>
						<td><?php echo $order->time_placed; ?></td>
						<td><?php if (isset($order->from_address)) echo $order->from_address->address1; ?></td>
						<td><?php if (isset($order->to_address)) echo $order->to_address->address1; ?></td>
						<td><?php if (isset($order->date)) echo $order->date; ?>   <?php if (isset($order->time)) echo $order->time; ?></td>
						<td><?php echo $order->status; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>