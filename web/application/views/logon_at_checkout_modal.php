<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Logon at checkout modal -->
<div class="modal fade" id="logonAtCheckoutModal" tabindex="-1" role="dialog" aria-labelledby="logonAtCheckoutModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="logonAtCheckoutModalLabel">Sign In or Continue as Guest</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<form name="logonAtCheckoutForm" action="#">
					<div class="col-md-6 sign-in">
						<p>If you alread have account, Please sing in to continue booking!</p>
						<p id="logonAtCheckout_error-panle" class="error-message"></p>
						<div class="form-group form-group-icon-left">
							<i class="fa fa-envelope input-icon"></i>
							<label>User name or Email</label>
							<input class="typeahead form-control" name="logonId" placeholder="User name or Email" type="text" />
						</div>
						<div class="form-group form-group-icon-left">
							<i class="fa fa-lock input-icon"></i>
							<label>Password</label>
							<input class="typeahead form-control" name="password" placeholder="My secret password" type="password" />
						</div>
						<div class="form-group form-group-icon-left">
							<button class="btn btn-primary" type="button" onClick="CheckoutHelperJS.logonToCheckout();">SIGN IN AND CONTINUE</button>
						</div>
					</div>
					</form>
					<form name="guestCheckoutForm" action="#" >
						<div class="col-md-6 guest">
							<p>Don't have account, continue as guest or <a href="/logon">create account</a>.</p>
							<p id="guest_error-panle" class="error-message"></p>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-group-icon-left">
										<i class="fa fa-user input-icon input-icon-show"></i>
										<label>First Name</label>
										<input class="form-control" name="firstName" placeholder="e.g. John" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-group-icon-left">
										<i class="fa fa-user input-icon input-icon-show"></i>
										<label>Last Name</label>
										<input class="form-control" name="lastName" placeholder="e.g. Doe" type="text">
									</div>
								</div>
							</div>
							<div class="form-group form-group-icon-left">
								<i class="fa fa-phone input-icon input-icon-show"></i>
								<label>Phone</label>
								<input class="form-control" name="phone" placeholder="e.g. +970597262705" type="text">
							</div>
							<div class="form-group form-group-icon-left">
								<i class="fa fa-envelope input-icon input-icon-show"></i>
								<label>Email</label>
								<input class="form-control" name="email" placeholder="e.g. johndoe@gmail.com" type="text">
							</div>
									
							<input class="btn btn-primary" type="button" onclick="CheckoutHelperJS.processOrder()" value="CONTINUE AS GUEST">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>