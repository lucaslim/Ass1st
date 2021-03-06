
        <!-- Footer
        ====================================================================== -->

        <footer id="footerWrapper">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <span class="branding pull-left">
                            <a id="assistlogo_small_href" href="https://www.facebook.com/pages/Team-Assist/522491314469799?ref=notif&notif_t=fbpage_presence">
                                <img src="<?php echo base_url(); ?>assets/images/logos/AssistLogo_small.png" />
                            </a> TEAM ASSIST &trade; - &copy; 2013</span>
                        <div id="footerLinks" class="pull-right">
                            <ul>
                                <li style="cursor:default;">Follow Team Assist on:</li>
                                <li>
                                    <!-- facebook -->
                                    <a href="https://www.facebook.com/pages/Team-Assist/522491314469799?ref=notif&amp;notif_t=fbpage_presence"  target="_blank">
                                        <i class="icon-facebook-sign icon-large" target="_blank"></i>
                                    </a>
                                </li>
                                <li style="margin-left:15px; cursor:default;">•</li>
                                <li>
                                    <!-- twitter -->
                                    <a href="https://twitter.com/teamassist_" class="twitter-sign" target="_blank">
                                        <i class="icon-twitter icon-large"></i>
                                    </a>
                                </li>
                                <li style="margin-left:15px; cursor:default;">•</li>
                                <!-- <li> -->
                                <!-- Google + -->
                                <!-- <a href="#" target="_blank"><i class="icon-google-plus-sign icon-large"></i></a> -->
                                <!-- </li> -->
                                <!-- <li style="margin-left:15px;">•</li> -->
                                <li>
                                    <!-- RSS -->
                                    <a href="#" target="_blank">
                                        <i class="icon-rss icon-large"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>                            
                    </div>
                </div>
            </div>
        </footer>


        <!-- Insert Scripts
        ====================================================================== -->

        <!-- in production use cdn
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script> -->

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>/style/bootstrap/js/vendor/jquery-1.9.1.min.js"></script>        

        <script src="<?php echo base_url(); ?>/style/bootstrap/js/vendor/bootstrap.min.js"></script>

        <script src="<?php echo base_url(); ?>/script/vendor/jquery.nivo.slider.js"></script>

		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

		<script src="<?php echo base_url(); ?>script/main.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>script/myurl.js"></script>

        <!-- google analytics
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
        -->

	    <script type="text/javascript">
	        // this script applies active class to the active page link in the navigation
	        $(document).ready(function () {
	            var loc = window.location.href;
	            $("a.menuLink").each(function () {
	                if (this.href == loc) {
	                    $(this).addClass('active');
	                }
	            });
	        });
	    </script>

    </body>
</html>
