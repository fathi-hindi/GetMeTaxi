<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if (isset($order) && $order != false) { ?>	
<h5>Order #: <?php echo $order->orders_id; ?></h5>
<ul class="order-payment-list list mb30">
	<li>
		<div class="row">
			<div class="col-md-7 order-details">
				<h5>
					<i class="fa fa-map-marker"></i>
					Pick-up Location:
				</h5>
				<p><?php if (isset($order->from_address)) echo $order->from_address->address1; ?></p>
				<hr/>
				<h5>
					<i class="fa fa-map-marker"></i>
					Drop-off Location:
				</h5>
				<p><?php if (isset($order->to_address)) echo $order->to_address->address1; ?></p>
				<hr/>
				<h5>
					<i class="fa fa-calendar"></i>
					Pick-up Date:
				</h5>
				<p><?php if (isset($order->date)) echo $order->date; ?></p>
				<hr/>
				<h5>
					<i class="fa fa-clock-o"></i>
					Pick-up Time:
				</h5>
				<p><?php if (isset($order->time)) echo $order->time; ?></p>
			</div>
			<div class="col-md-5">
				<div class="booking-item-payment">
					<header class="clearfix">
						<a class="booking-item-payment-img" href="#">
							<img src="/public/images/Maserati-GranTurismo-Sport-facelift.png" alt="Image Alternative text" title="Image Title">
						</a>
						<h4>Taxi Office</h4>
					</header>
					<ul class="booking-item-payment-details">
						<li>
							<h5><a href="#">Taxi An-Najah Office</a></h5>
							<p class="booking-item-payment-date-weekday">+972599107654</p>
						</li>
						<li>
							<h5>4 Passengers Taxi</h5>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</li>
</ul>
<?php } else { ?>
	<h1><?php echo $error_message; ?></h1>
<?php } ?>