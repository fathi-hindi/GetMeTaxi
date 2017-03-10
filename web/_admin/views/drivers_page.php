<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <section class="content drivers-list">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Drivers</h2>
            </div>
            <div class="row clearfix">
                <?php foreach ($drivers as $driver) { ?>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <img src="<?php echo USER_PHOTO_FOLDER_PATH . ($driver->photo != '' ? $driver->photo : USER_PHOTO_DEFAULT_IMG ); ?>" width="120" height="120" />
                        </div>
                        <div class="content">
                            <div class="text"><h3><?php echo $driver->first_name . ' ' . $driver->last_name; ?></h3></div>
                            <div class="text"><p><?php echo $driver->phone; ?></p></div>
                            <span class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></span>
							<span>   Orders</span>
                        </div>
                    </div>
                </div>
				<?php } ?>
            </div>
            <!-- #END# Widgets -->
        </div>
    </section>