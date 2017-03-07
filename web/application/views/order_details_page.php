<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<?php if (isset($order) && $order != false && isset($is_checkout_summary) && $is_checkout_summary == true) { ?>
				<h2 class="text-center">Order Summary</h2>
				<h5 class="text-center">Order #: <?php echo $order->orders_id ?></h5>
			<?php } ?>
			<?php include('order_details_section.php'); ?>
			<?php if (isset($order) && $order != false && isset($is_checkout_summary) && $is_checkout_summary == true) { ?>
				<a class="btn btn-primary" href="/checkout/confirmation?orderId=<?php echo $order->orders_id ?>" >Confirm Order</a>
				<a class="btn btn-primary" href="/checkout/cancel?orderId=<?php echo $order->orders_id ?>" >Cancel Order</a>
			<?php } ?>
		</div>
	</div>
	<div class="gap"></div>
</div>