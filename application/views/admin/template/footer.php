

    <!-- Insert Scripts
    ====================================================================== -->

    <!-- in production use cdn
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script> -->

    <script src="<?php echo base_url(); ?>/style/bootstrap/js/vendor/bootstrap.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>script/vendor/jquery.nivo.slider.js"></script>

	<script src="<?php echo base_url(); ?>script/main.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>script/myurl.js"></script>

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
