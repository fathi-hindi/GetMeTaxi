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
				<form action="/account/users" method="get" >
					<div class="col-md-3">
						<div class="form-group form-group-icon-left">
							<i class="fa fa-users input-icon input-icon-highlight"></i>
							<label>User Type</label>
							<select class="form-control" name="type" >
								<option value="ALL">All</option>
									<option value="R">Passenger</option>
									<option value="G">Guest</option>
									<option value="A">Admin</option>
									<option value="O">Office Admin</option>
									<option value="D">Driver</option>
							</select>
						</div>
					</div>
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
							<i class="fa fa-envelope input-icon input-icon-highlight"></i>
							<label>Email</label>
							<input class="form-control" name="email" placeholder="Email" type="text">
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="form-group form-group-icon-left find-order-button">
							<button class="btn btn-primary" type="submit" >Find User</button>
						</div>
					</div>
				</form>
			</div>
			<hr/>
			<table class="table table-bordered table-striped table-booking-history">
				<thead>
					<tr>
						<th>Id</th>
						<th>Type</th>
						<th>Logon Id</th>
						<th>Status</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>email</th>
						<th>Phone</th>
						<th>mobile</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $user) { ?>
					<tr>
						<td><a href=""><?php echo $user->users_id; ?></a></td>
						<td><?php echo $user->user_type; ?></td>
						<td><?php echo $user->logon_id; ?></a></td>
						<td><?php echo $user->status; ?></td>
						<td><?php echo $user->first_name; ?></td>
						<td><?php echo $user->last_name; ?></td>
						<td><?php echo $user->email; ?></td>
						<td><?php echo $user->phone; ?></td>
						<td><?php echo $user->mobile; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>