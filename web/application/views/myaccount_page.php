<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<h1 class="page-title">Travel Profile</h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php include('sidebar.php'); ?>
		</div>
		<div class="col-md-9">
			<h4>Total Traveled</h4>
			<ul class="list list-inline user-profile-statictics mb30">
				<li><i class="fa fa-truck user-profile-statictics-icon"></i>
					<h5>140</h5>
					<p>Orders</p>
				</li>
				<li><i class="fa fa-users user-profile-statictics-icon"></i>
					<h5>123</h5>
					<p>Users</p>
				</li>
				<li><i class="fa fa-car user-profile-statictics-icon"></i>
					<h5>3</h5>
					<p>Delivery</p>
				</li>
				<li><i class="fa fa-taxi user-profile-statictics-icon"></i>
					<h5>2</h5>
					<p>Taxi Office</p>
				</li>
			</ul>
			<div id="map-canvas" style="width:100%; height:400px;"></div>
		</div>
	</div>
</div>