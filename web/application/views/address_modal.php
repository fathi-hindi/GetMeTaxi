<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Address modal -->
<div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="addressModalModalLabel">Add / Update Address</h4>
			</div>
			<div class="modal-body">
				<p>* is requiered field.</p>
				<div class="row">
					<div class="col-md-6 sign-in">
						<div class="form-group form-group-icon-left">
							<i class="fa fa-map-marker input-icon"></i>
							<label>Street Address</label>
							<input class="typeahead form-control" id="addressModal_address1" placeholder="City, Comapny, Street Address" type="text" />
						</div>
					</div>
					<div class="col-md-6 sign-in">
						<div class="form-group form-group-icon-left">
							<i class="fa fa-home input-icon"></i>
							<label>City</label>
							<input class="typeahead form-control" id="addressModal_city" placeholder="City" type="text" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 sign-in">
						<div class="form-group form-group-icon-left">
							<i class="fa fa-map-marker input-icon"></i>
							<label>Street Address Line 2 </label>
							<input class="typeahead form-control" id="addressModal_address2" placeholder="Street Address Line 2" type="text" />
						</div>
					</div>
					<div class="col-md-6 sign-in">
						<div class="form-group form-group-icon-left">
							<i class="fa fa-map-marker input-icon"></i>
							<label>Company / Organization</label>
							<input class="typeahead form-control" id="addressModal_orgname" placeholder="Company / Organization" type="text" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 sign-in">
						<div class="form-group form-group-icon-left">
							<i class="fa fa-map-marker input-icon"></i>
							<label>Phone </label>
							<input class="typeahead form-control" id="addressModal_phone" placeholder="Phone Number" type="text" />
						</div>
					</div>
					<div class="col-md-6 sign-in">
						<div class="form-group form-group-icon-left">
							<i class="fa fa-map-marker input-icon"></i>
							<label>Mobile</label>
							<input class="typeahead form-control" id="addressModal_mobile" placeholder="Mobile Number" type="text" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 sign-in">
						<div class="form-group">
							<button class="btn btn-primary" onClick="">Add / Update</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>