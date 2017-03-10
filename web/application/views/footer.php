<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
        <?php if (!isset($hide_footer) || $hide_footer == false) { ?>
		<footer id="main-footer">
            <div class="container">
                <div class="row row-wrap">
                    <div class="col-md-3">
                        <a class="logo" href="index.html">
                            <img src="/public/images/logo-invert.png" alt="Image Alternative text" title="Image Title" />
                        </a>
                        <p class="mb20">Booking, reviews and advices on hotels, resorts, flights, vacation rentals, travel packages, and lots more!</p>
                        <ul class="list list-horizontal list-space">
                            <li>
                                <a class="fa fa-facebook box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                            </li>
                            <li>
                                <a class="fa fa-twitter box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                            </li>
                            <li>
                                <a class="fa fa-google-plus box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                            </li>
                            <li>
                                <a class="fa fa-linkedin box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                            </li>
                            <li>
                                <a class="fa fa-pinterest box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-3">
                        <h4>Newsletter</h4>
                        <form>
							<p class="mt5"><small>Keep up with our latest news and events!</small></p>
                            <label>Enter your E-mail And subcribe to our newsletter.</label>
                            <input type="text" class="form-control">
							<br/>
                            <input type="submit" class="btn btn-primary" value="Subscribe">
                        </form>
                    </div>
                    <div class="col-md-2">
                        <ul class="list list-footer">
                            <li><a href="/content/about">About US</a></li>
							<li><a href="/content/team">Our Team</a></li>
                            <li><a href="/content/privacy">Privacy Policy</a></li>
                            <li><a href="/content/terms">Terms of Use</a></li>
							<li><a href="/content/contact">Help Center</a></li>
                            <li><a href="/content/feedback">Feedback</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h4>Have Questions?</h4>
                        <h4 class="text-color"><?php echo CONTACT_US_PHONE; ?></h4>
                        <h4><a href="#" class="text-color"><?php echo CONTACT_US_EMAIL; ?></a></h4>
                        <p>24/7 Dedicated Customer Support</p>
                    </div>

                </div>
            </div>
        </footer>
		<?php } ?>
        <script src="/public/js/jquery.js"></script>
        <script src="/public/js/bootstrap.js"></script>
        <script src="/public/js/slimmenu.js"></script>
        <script src="/public/js/bootstrap-datepicker.js"></script>
        <script src="/public/js/bootstrap-timepicker.js"></script>
        <script src="/public/js/nicescroll.js"></script>
        <script src="/public/js/dropit.js"></script>
        <script src="/public/js/ionrangeslider.js"></script>
        <script src="/public/js/icheck.js"></script>
        <script src="/public/js/fotorama.js"></script>
        <script src="/public/js/typeahead.js"></script>
        <script src="/public/js/card-payment.js"></script>
        <script src="/public/js/magnific.js"></script>
        <script src="/public/js/owl-carousel.js"></script>
        <script src="/public/js/fitvids.js"></script>
        <script src="/public/js/tweet.js"></script>
        <script src="/public/js/countdown.js"></script>
        <script src="/public/js/gridrotator.js"></script>
        <script src="/public/js/custom.js"></script>
        <script src="/public/js/switcher.js"></script>
		
		<script src="/public/js/checkoutHelper.js"></script>
		<script src="/public/js/logonHelper.js"></script>
		<script src="/public/js/addressHelper.js"></script>
		<script src="/public/js/errorHelper.js"></script>
		<script src="/public/js/loadingHelper.js"></script>
		<script src="/public/js/validationHelper.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    </div>
	<div id="loadingIcon" class="loading-icon" ><img src="/public/images/loading_rwd.gif"></div>
</body>

</html>