<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<aside class="user-profile-sidebar">
	<div class="user-profile-avatar text-center">
		<img src="<?php echo getUserPhoto(); ?>" alt="Image Alternative text" title="AMaze" />
		<h5><?php echo getUserFirstName() . ' ' . getUserLastName();?></h5>
		<p><?php echo getUserLogonId(); ?></p>
	</div>
	<ul class="list user-profile-nav">
		<li><a href="/account"><i class="fa fa-dashboard"></i>Overview</a></li>
		<li><a href="/account/setting"><i class="fa fa-cog"></i>Settings</a></li>
		<li><a href="/account/currentOrders"><i class="fa fa-clock-o"></i>Current Orders</a></li>
		<li><a href="/account/history"><i class="fa fa-clock-o"></i>Booking History</a></li>
		<li><a href="/account/addressBook"><i class="fa fa-credit-card"></i>Address Book</a></li>
		<li><a href="/account/addressBook"><i class="fa fa-credit-card"></i>Admin Users</a></li>
		<li><a href="/account/addressBook"><i class="fa fa-credit-card"></i>Passengers</a></li>
		<li><a href="/drivers"><i class="fa fa-credit-card"></i>Drivers</a></li>
		<li><a href="/account/addressBook"><i class="fa fa-credit-card"></i>Cars</a></li>
		<li><a href="/account/addressBook"><i class="fa fa-credit-card"></i>Taxi Office</a></li>
		<li><a href="/account/statictics"><i class="fa fa-credit-card"></i>Statictics</a></li>
	</ul>
</aside>
