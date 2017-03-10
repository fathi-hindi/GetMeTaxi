<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<h1 class="page-title">Statictics</h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php include('sidebar.php'); ?>
		</div>
		<div class="col-md-9">
			<?php foreach ($statictics as $statictic) { ?>
				<h4><?php echo $statictic['title']; ?></h4>
				<ul class="list list-inline user-profile-statictics mb30">
					<?php foreach ($statictic['values'] as $value) { ?>
						<li>
							<a href="#" >
								<i class="fa <?php echo $value['icon']; ?> user-profile-statictics-icon"></i>
								<h5><?php echo $value['count']; ?></h5>
								<p><?php echo $value['key']; ?></p>
							</a>
						</li>
					<?php } ?>
				</ul>
			<?php } ?>
		</div>
	</div>
</div>