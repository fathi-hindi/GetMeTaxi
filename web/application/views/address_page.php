<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<h1 class="page-title">Address Book</h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php include('sidebar.php'); ?>
		</div>
		 <div class="col-md-9">
			<div class="row row-wrap">
				<?php foreach ($addresses as $address) { ?>
				<div class="col-md-4" id="address_<?php echo $address->address_id; ?>" >
					<div class="card-thumb card-thumb-primary">
						<ul class="card-thumb-actions">
							<li>
								<a class="fa fa-pencil" href="#" data-toggle="modal" data-target="#addressModal" onClick="AddressHelperJS.setCurrentAddressId(<?php echo $address->address_id; ?>);AddressHelperJS.populateAddress();" ></a>
							</li>
							<li>
								<a class="fa fa-times" href="#" onClick="AddressHelperJS.setCurrentAddressId(<?php echo $address->address_id; ?>);AddressHelperJS.ajaxDeleteAddress();" ></a>
							</li>
						</ul>
						<h5 class="card-thumb-number"><?php echo $address->address1 . ' ' . $address->address2; ?></h5>
						<p class="card-thumb-valid"><?php echo $address->city_name ?>, Palestine</p>
						<a href="#" class="card-thumb-type">Book to this</a>
						<p class="card-thumb-valid"><?php echo $address->orgname; ?></p>
						<p class="card-thumb-valid"><?php echo $address->phone; ?></p>
						<p class="card-thumb-valid"><?php echo $address->mobile; ?></p>
					</div>
				</div>
				<?php } ?>
				<div class="col-md-4">
					<a class="card-thumb popup-text" href="#" data-effect="mfp-zoom-out">
						<i class="fa fa-plus card-thumb-new"></i>
						<p>Add New Address</p>
					</a>
				</div>
			</div>
        </div>
    </div>
</div>
<?php include('address_modal.php'); ?>