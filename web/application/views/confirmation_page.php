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
			
			<h4 class="text-center">You might also need in Nablus</h4>
			<ul class="list list-inline list-center">
				<li><a class="btn btn-primary" href="#"><i class="fa fa-building-o"></i> Hotels</a>
					<p class="text-center lh1em mt5"><small>362 offers<br /> from $75</small>
					</p>
				</li>
				<li><a class="btn btn-primary" href="#"><i class="fa fa-home"></i> Rentlas</a>
					<p class="text-center lh1em mt5"><small>240 offers<br /> from $85</small>
					</p>
				</li>
				<li><a class="btn btn-primary" href="#"><i class="fa fa-dashboard"></i> Cars</a>
					<p class="text-center lh1em mt5"><small>165 offers<br /> from $143</small>
					</p>
				</li>
				<li><a class="btn btn-primary" href="#"><i class="fa fa-bolt"></i> Activities</a>
					<p class="text-center lh1em mt5"><small>366 offers<br /> from $116</small>
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