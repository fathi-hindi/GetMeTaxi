<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="full-page">
	<div class="bg-holder full">
		<div class="bg-mask"></div>
		<div class="bg-img" style="background-image:url(/public/images/people_on_the_beach_1280x852.jpg);"></div>
		<div class="bg-holder-content full text-white">
			<a class="logo-holder" href="index.html">
				<img src="/public/images/logo-white.png" alt="Image Alternative text" title="Image Title" />
			</a>
			<div class="full-center">
				<div class="container">
					<div class="row row-wrap" data-gutter="60">
						<div class="col-md-4">
							<div class="visible-lg">
								<h3 class="mb15">Welcome to Traveler</h3>
								<p>Est nisl facilisis consectetur eget fermentum rutrum suscipit penatibus ultrices eu bibendum mi volutpat mattis cum facilisis nunc platea tincidunt vehicula laoreet montes parturient urna magnis eu etiam eget integer</p>
								<p>Nullam consectetur fames erat scelerisque ac conubia orci mauris facilisi</p>
							</div>
						</div>
						<div class="col-md-4">
							<h3 class="mb15">Login</h3>
							<form name="userLogon" >
								<p class="error-message" id='logon_error-panle'></p>
								<div class="form-group form-group-ghost form-group-icon-left"><i class="fa fa-envelope input-icon input-icon-show"></i>
									<label>Username or email</label>
									<input name="logonId" class="form-control" placeholder="e.g. johndoe@gmail.com" type="text" />
								</div>
								<div class="form-group form-group-ghost form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
									<label>Password</label>
									<input name="password" class="form-control" type="password" placeholder="My secret password" />
								</div>
								<input class="btn btn-primary" type="button" onClick="LogonHelperJS.ajaxUserLogon();" value="Sign in" />
							</form>
						</div>
						<div class="col-md-4">
							<h3 class="mb15">New To Traveler?</h3>
							<form name="userRegistration" >
								<p class="error-message" id='registration_error-panle'></p>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group form-group-ghost form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
											<label>First Name</label>
											<input class="form-control" name="firstName" placeholder="e.g. John" type="text" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group form-group-ghost form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
											<label>Last Name</label>
											<input class="form-control" name="lastName" placeholder="e.g. Doe" type="text" />
										</div>
									</div>
								</div>
								<div class="form-group form-group-ghost form-group-icon-left"><i class="fa fa-envelope input-icon input-icon-show"></i>
									<label>Phone</label>
									<input class="form-control" name="phone" placeholder="e.g. +970597262705" type="text" />
								</div>
								<div class="form-group form-group-ghost form-group-icon-left"><i class="fa fa-envelope input-icon input-icon-show"></i>
									<label>Email</label>
									<input class="form-control" name="email" placeholder="e.g. johndoe@gmail.com" type="text" />
								</div>
								<div class="form-group form-group-ghost form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
									<label>Password</label>
									<input class="form-control" name="password" type="password" placeholder="My secret password" />
								</div>
								<input class="btn btn-primary" type="button" onClick="LogonHelperJS.ajaxUserRegistration();" value="Sign up for Traveler" />
							</form>
						</div>
					</div>
				</div>
			</div>
			<ul class="footer-links">
				<li><a href="#">About</a>
				</li>
				<li><a href="#">Help</a>
				</li>
				<li><a href="#">Hot Deals</a>
				</li>
				<li><a href="#">Popular Locations</a>
				</li>
				<li><a href="#">Cheap Flights</a>
				</li>
				<li><a href="#">Business</a>
				</li>
				<li><a href="#">Media</a>
				</li>
				<li><a href="#">Developers</a>
				</li>
				<li><a href="#">Advertise</a>
				</li>
			</ul>
		</div>
	</div>
</div>