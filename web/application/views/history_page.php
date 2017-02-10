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
			<div class="checkbox">
				<label>
					<input class="i-check" type="checkbox" />
					Show only current trip
				</label>
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
						<th>Cancel</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($orders as $order) { ?>
					<tr>
						<td><?php echo $order->orders_id; ?></td>
						<td><?php echo $order->time_placed; ?></td>
						<td><?php if (isset($order->from_address)) echo $order->from_address->address1; ?></td>
						<td><?php if (isset($order->to_address)) echo $order->to_address->address1; ?></td>
						<td><?php if (isset($order->date)) echo $order->date; ?>   <?php if (isset($order->time)) echo $order->time; ?></td>
						<td><?php echo $order->status; ?></td>
						<td class="text-center"><a class="btn btn-default btn-sm" href="#">Cancel</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>