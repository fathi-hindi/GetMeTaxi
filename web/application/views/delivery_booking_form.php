<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="tab-pane fade" id="tab-3">
	<h2>In Demand Delivery In Minutes!</h2>
	<form>
		<div class="form-group form-group-lg form-group-icon-left">
			<i class="fa fa-map-marker input-icon"></i>
			<label>Express delivery for small items (up to 5 Kg) Pickup in 10 minutes or less!</label>
			<input class="typeahead form-control" placeholder="City, Airport, Point of Interest or U.S. Zip Code" type="text" />
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-cab input-icon input-icon-highlight"></i>
					<label>Delivery Vendor</label>
					<select class="form-control" id="taxi_taxiType">
						<?php foreach ($taxi_types as $taxi_type) { ?>
							<option value="<?php echo $taxi_type['taxitype_id'] ?>"><?php echo $taxi_type['name'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group form-group-lg form-group-icon-left">
					<i class="fa fa-phone input-icon input-icon-show"></i>
					<label>Phone</label>
					<input class="form-control" name="phone" placeholder="e.g. +970597262705" type="text">
				</div>
			</div>
		</div>
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
					<input class="time-pick form-control" id="taxi_time" type="text" />
				</div>
			</div>
		</div>
		
		<button class="btn btn-primary btn-lg" type="submit">Search for Vacation Rentals</button>
	</form>
</div>