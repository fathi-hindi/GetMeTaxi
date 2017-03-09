<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<aside class="user-profile-sidebar">
	<div class="user-profile-avatar text-center">
		<img src="<?php echo getUserPhoto(); ?>" alt="Image Alternative text" title="AMaze" />
		<h5><?php echo getUserFirstName() . ' ' . getUserLastName();?></h5>
		<p><?php echo getUserLogonId(); ?></p>
	</div>
	<ul class="list user-profile-nav">
		<li><a href="/account"><i class="fa fa-user"></i>Overview</a>
		</li>
		<li><a href="/account/setting"><i class="fa fa-cog"></i>Settings</a>
		</li>
		<li><a href="/account/history"><i class="fa fa-clock-o"></i>Booking History</a>
		</li>
		<li><a href="/account/addressBook"><i class="fa fa-credit-card"></i>Address Book</a>
		</li>
	</ul>
</aside>
