<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<h1 class="page-title">Account Settings</h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php include('sidebar.php'); ?>
		</div>
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-5 updateAccountForm">
					<form name="updateAccount">
						<h4>Account Infomation</h4>
						<div class="form-group form-group-icon-left">
							<span>Account Number: </span>
							<span><?php echo $user->users_id; ?></span>
						</div>
						<div class="form-group form-group-icon-left">
							<i class="fa fa-user input-icon"></i>
							<label>User Name / Email</label>
							<input class="form-control" disabled value="<?php echo $user->logon_id; ?>" type="text" />
						</div>
						<div class="gap gap-small"></div>
						<h4>Personal Infomation</h4>
						<p class="error-message" id='updateAccountErrorPanle'></p>
						<div class="form-group form-group-icon-left"><i class="fa fa-user input-icon"></i>
							<label>First Name</label>
							<input name="firstName" class="form-control" value="<?php echo $user->first_name; ?>" type="text" />
						</div>
						<div class="form-group form-group-icon-left"><i class="fa fa-user input-icon"></i>
							<label>Middle Name</label>
							<input name="middleName" class="form-control" value="<?php echo $user->middle_name; ?>" type="text" />
						</div>
						<div class="form-group form-group-icon-left"><i class="fa fa-user input-icon"></i>
							<label>Last Name</label>
							<input name="lastName" class="form-control" value="<?php echo $user->last_name; ?>" type="text" />
						</div>
						<div class="form-group form-group-icon-left"><i class="fa fa-phone input-icon"></i>
							<label>Phone Number</label>
							<input name="phone" class="form-control" value="<?php echo $user->phone; ?>" type="text" />
						</div>
						<div class="form-group form-group-icon-left"><i class="fa fa-phone input-icon"></i>
							<label>Mobile Number</label>
							<input name="mobile" class="form-control" value="<?php echo $user->mobile; ?>" type="text" />
						</div>
						<div class="form-group form-group-icon-left"><i class="fa fa-phone input-icon"></i>
							<label>Fax Number</label>
							<input name="fax" class="form-control" value="<?php echo $user->fax; ?>" type="text" />
						</div>
						<div class="form-group form-group-icon-left"><i class="fa fa-phone input-icon"></i>
							<label>Date Of Birth</label>
							<input name="dateOfBirth" class="form-control" value="<?php if ($user->date_of_birth != '0000-00-00') echo $user->date_of_birth; ?>" type="text" />
						</div>
						<hr>
						<input type="button" class="btn btn-primary" value="Save Changes" onClick="LogonHelperJS.ajaxUpdateAccount();" >
					</form>
				</div>
				<div class="col-md-4 col-md-offset-1">
					<h4>Change Password</h4>
					<form name="changePassword" >
						<p class="error-message" id='changePasswordErrorPanle'></p>
						<div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon"></i>
							<label>Current Password</label>
							<input class="form-control" type="password" name="oldPassword" />
						</div>
						<div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon"></i>
							<label>New Password</label>
							<input class="form-control" type="password" name="newPassword" />
						</div>
						<div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon"></i>
							<label>New Password Again</label>
							<input class="form-control" type="password" name="confirmPassword" />
						</div>
						<hr />
						<input class="btn btn-primary" type="button" value="Change Password" onClick="LogonHelperJS.ajaxChangePassword();" />
					</form>
					<div class="gap"></div>
					<h4>Update Your Avatar</h4>
					<form>
						<div class="form-group">
							<input class="form-control" type="file" />
						</div>
						<input class="btn btn-primary" type="button" value="Upload" onClick="" />
					</form>
				</div>
			</div>

		</div>
	</div>
</div>