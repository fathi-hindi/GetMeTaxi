<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="tab-pane fade" id="tab-2">
	<h2>Booking Your Taxi Now</h2>
	<p id="taxi_error-message" class="error-message"></p>
	<div class="" id="taxi_step1">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group form-group-lg form-group-icon-left">
					<i class="fa fa-map-marker input-icon"></i>
					<label>Pick-up Location</label>
					<input class="typeahead form-control" id="taxi_fromAddress" placeholder="City, Comapny, Street Address" type="text" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group form-group-lg form-group-icon-left">
					<i class="fa fa-map-marker input-icon"></i>
					<label>Drop-off Location</label>
					<input class="typeahead form-control" id="taxi_toAddress" placeholder="City, Comapny, Street Address" type="text" />
				</div>
			</div>
		</div>
		
		<div class="row">
				<div class="col-md-3">
					<div class="form-group form-group-lg form-group-icon-left">
						<i class="fa fa-home input-icon input-icon-highlight"></i>
						<label>City</label>
						<select class="form-control" id="taxi_city" onChange="CheckoutHelperJS.taxi_onCityChange(this);">
							<option>Select City</option>
							<?php foreach ($citys as $city) { ?>
								<option value="<?php echo $city['city_id'] ?>"><?php echo $city['name'] ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-cab input-icon input-icon-highlight"></i>
						<label>Taxi Type</label>
						<select class="form-control" id="taxi_taxiType">
							<?php foreach ($taxi_types as $taxi_type) { ?>
								<option value="<?php echo $taxi_type['taxitype_id'] ?>"><?php echo $taxi_type['name'] ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			<div class="col-md-6">
				<div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-cab input-icon"></i>
					<label>Taxi Office</label>
					<select class="form-control" id="taxi_taxiOffice">
						<option>Select Taxi Office</option>
					</select>
				</div>
			</div>
		</div>
		<div class="input-daterange" data-date-format="M d, D">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
						<label>Pick-up Date</label>
						<input class="form-control" name="start" id="taxi_date" type="text" />
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-clock-o input-icon input-icon-highlight"></i>
						<label>Pick-up Time</label>
						<input class="time-pick form-control" id="taxi_time" value="12:00 AM" type="text" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group form-group-lg form-group-icon-left">
						<label>You Are Already Have Account? <a href="/logon">Please Sing In.</a></label>
						<button class="btn btn-primary btn-lg" onClick="CheckoutHelperJS.taxi_goToStep(2);">Booking Now As Guest</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="nondisplay" id="taxi_step2">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group form-group-lg form-group-icon-left">
					<i class="fa fa-user input-icon"></i>
					<label>First Name</label>
					<input class="typeahead form-control" id="taxi_firstName" placeholder="First Name" type="text" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group form-group-lg form-group-icon-left">
					<i class="fa fa-user input-icon"></i>
					<label>Last Name</label>
					<input class="typeahead form-control" id="taxi_lastName" placeholder="Last Name" type="text" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group form-group-lg form-group-icon-left">
					<i class="fa fa-map-marker input-icon"></i>
					<label>Phone Number</label>
					<input class="typeahead form-control" id="taxi_phone" placeholder="Phome number (In case of contact you.)" type="text" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group form-group-lg form-group-icon-left">
					<i class="fa fa-envelope input-icon"></i>
					<label>Email</label>
					<input class="typeahead form-control" id="taxi_email" placeholder="Email Address" type="text" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group form-group-lg form-group-icon-left">
					<button class="btn btn-primary btn-lg" onClick="CheckoutHelperJS.taxi_goToStep(1);"> &lt; Back </button>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group form-group-lg form-group-icon-left">
					<button class="btn btn-primary btn-lg" onClick="CheckoutHelperJS.taxi_step2ButtonHandler();">Finish Your Booking</button>
				</div>
			</div>
		</div>
	</div>
</div>