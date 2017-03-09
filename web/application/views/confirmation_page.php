<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<?php if (isset($order) && $order != false) { ?>
			<i class="fa fa-check round box-icon-large box-icon-center box-icon-success mb30"></i>	
			<h2 class="text-center">Thank you for booking!</h2>
			<h5 class="text-center mb30">Booking details has been send to <?php echo $order_user->email; ?></h5>
			
			<?php include('order_details_section.php'); ?>
			
			<h4 class="text-center">You might also need in Palestine</h4>
			<ul class="list list-inline list-center">
				<li><a class="btn btn-primary" href="#"><i class="fa fa-cab"></i> Taxi</a>
					<p class="text-center lh1em mt5"><small>26+ dirvers<br /> from 10 NIS</small>
					</p>
				</li>
				<li><a class="btn btn-primary" href="#"><i class="fa fa-home"></i> Delivery services</a>
					<p class="text-center lh1em mt5"><small>5 Venders<br /> from 8 NIS</small>
					</p>
				</li>
			</ul>
		<?php } else { ?>
			<h1><?php echo $error_message; ?></h1>
		<?php } ?>
		</div>
	</div>
	<div class="gap"></div>
</div>