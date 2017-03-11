<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<h1 class="page-title">Users</h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php include('sidebar.php'); ?>
		</div>
		<div class="col-md-9">
			<div>
				<h5>All Users</h5>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group form-group-icon-left">
						<i class="fa fa-user input-icon input-icon-highlight"></i>
						<label>First Name</label>
						<input class="form-control" name="firstName" placeholder="First Name" type="text">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group form-group-icon-left">
						<i class="fa fa-user input-icon input-icon-highlight"></i>
						<label>Last Name</label>
						<input class="form-control" name="lastName" placeholder="Last Name" type="text">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group form-group-icon-left">
						<i class="fa fa-user input-icon input-icon-highlight"></i>
						<label>Last Name</label>
						<input class="form-control" name="lastName" placeholder="Last Name" type="text">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group form-group-icon-left">
						<i class="fa fa-user input-icon input-icon-highlight"></i>
						<label>Last Name</label>
						<input class="form-control" name="lastName" placeholder="Last Name" type="text">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group form-group-icon-left">
						<i class="fa fa-user input-icon input-icon-highlight"></i>
						<label>Last Name</label>
						<input class="form-control" name="lastName" placeholder="Last Name" type="text">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group form-group-icon-left">
						<i class="fa fa-user input-icon input-icon-highlight"></i>
						<label>Last Name</label>
						<input class="form-control" name="lastName" placeholder="Last Name" type="text">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group form-group-icon-left find-order-button">
						<button class="btn btn-primary" type="button" onclick="CheckoutHelperJS.validateTrackingOrderForm(document.trackingOrderForm);">Find User</button>
					</div>
				</div>
			</div>
			<hr/>
			<table class="table table-bordered table-striped table-booking-history">
				<thead>
					<tr>
						<th>Id</th>
						<th>Type</th>
						<th>Date Of Birth</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Middle Name</th>
						<th>email</th>
						<th>Phone</th>
						<th>fax</th>
						<th>mobile</th>
						<th>photo</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $user) { ?>
					<tr>
						<td><a href=""><?php echo $user->users_id; ?></a></td>
						<td><?php echo $user->user_type; ?></td>
						<td><?php echo $user->date_of_birth; ?></td>
						<td><?php echo $user->first_name; ?></td>
						<td><?php echo $user->last_name; ?></td>
						<td><?php echo $user->middle_name; ?></td>
						<td><?php echo $user->email; ?></td>
						<td><?php echo $user->phone; ?></td>
						<td><?php echo $user->fax; ?></td>
						<td><?php echo $user->mobile; ?></td>
						<td><?php echo $user->photo; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>