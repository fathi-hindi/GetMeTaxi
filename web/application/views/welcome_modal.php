<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Welcome modal -->
<div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="welcomeModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
		</div>
	</div>
</div>
<script>
	function showWelcomeModal()
	{
		$('#welcomeModal').modal('show');
		window.clearInterval(interval) ;
	}
	interval = window.setInterval(showWelcomeModal, 3000 );
</script>