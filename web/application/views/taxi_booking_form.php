<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="tab-pane fade" id="tab-2">
	<h2>Booking Your Taxi Now</h2>
	<p id="taxi_error-panle" class="error-message"></p>
	<div>
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
							<option value="">Select City</option>
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
						<option value="">Select Taxi Office</option>
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
						<label>Click below button to finish your booking.</label>
						<button class="btn btn-primary btn-lg" onClick="CheckoutHelperJS.startCheckout();">PLACE YOUR BOOKING</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>