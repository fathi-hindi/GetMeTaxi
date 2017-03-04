<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="gap gap-small"></div>
	<div class="row row-wrap" data-gutter="60">
		<h2>Trackig your order</h2>
		<span>If you already sign in, you can find your orders in <a href="/account/history" >My Account</a> page.</span>
		<form action="/order/orderDetails" method="GET" name="trackingOrderForm">
			<p id="tracking_error-panle" class="error-message"></p>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group form-group-icon-left">
						<i class="fa fa-calendar  input-icon"></i>
						<label>Order Number #</label>
						<input class="typeahead form-control" placeholder="Order #" name="orderId" type="text" />
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group form-group-icon-left">
						<i class="fa fa-user input-icon input-icon-highlight"></i>
						<label>First Name</label>
						<input class="form-control" name="firstName" placeholder="First Name" type="text" />
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group form-group-icon-left">
						<i class="fa fa-user input-icon input-icon-highlight"></i>
						<label>Last Name</label>
						<input class="form-control" name="lastName" placeholder="Last Name" type="text" />
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group form-group-icon-left find-order-button">
						<button class="btn btn-primary" type="button" onClick="CheckoutHelperJS.validateTrackingOrderForm(document.trackingOrderForm);">Find Your Order</button>
					</div>
				</div>
			</div>
		</form>					
	</div>
	<div class="gap gap-small"></div>
</div>