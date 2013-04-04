<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Team Assist - <?php echo $title ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Include Style Sheets -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>

        <!-- jQuery UI -->
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />

		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>style/fontAwesome/font-awesome.min.css" />
        
        <!-- Nivo Slider -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>style/slider/nivo-slider.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>style/slider/dark/dark.css" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />

		<!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>style/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>style/bootstrap/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>style/bootstrap/css/main.css">

        <!-- Modernizr -->
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

		<!-- jQuery (needed?) -->
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>       
    </head>
    <body>
		<div id="fb-root"></div>

        <!-- Anchor for back to top -->
        <div id="top"></div>

		<script>
		  // Load the Facebook SDK Asynchronously
		  (function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));

		  // Load the Twitter SDK
		  ! function (d, s, id) {
			    var js, fjs = d.getElementsByTagName(s)[0];
			    if (!d.getElementById(id)) {
			        js = d.createElement(s);
			        js.id = id;
			        js.src = "https://platform.twitter.com/widgets.js";
			        fjs.parentNode.insertBefore(js, fjs);
			    }
			}(document, "script", "twitter-wjs");
		</script> 

        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Header
        ====================================================================== -->

<<<<<<< HEAD
        <div id="headerWrapper" class="navbar navbar-inverse">
=======
        <div id="headerWrapper" class="navbar navbar-inverse ">
>>>>>>> 87063506b2758f026dd3f6cc65277b33a387eb4a
          <div class="navbar-inner">
            <div class="container">
              <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
<<<<<<< HEAD
              <a class="brand" href="<? echo base_url(); ?>"><img src="<? echo base_url(); ?>assets/images/logos/wreckit_logo_header.png" /></a>
=======
              <a class="brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logos/wreckit_logo_header.png" /></a>
>>>>>>> 87063506b2758f026dd3f6cc65277b33a387eb4a
              <div class="nav-collapse collapse">
                <?php echo $login_header ?>
              </div><!--/.nav-collapse -->
            </div>
          </div>
        </div>

        <!-- Login Modal
        ====================================================================== -->
 
		<!-- Modal -->
		<div id="signIn" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		  <div class="modal-body">

    		<!-- Login Modal -->
    		<div id="signin_dialog" >

    			<div class="" id="user-session-form">
    		        <header>
    		        	<span>Sign into your Team Assist account.</span>
    		        </header>
    		        
    		        <div class="cell social-signin">
    		            <div class="sectionTitle">Sign in with a social network...</div>    
    		            <ul>
    		            	<li><button class="btn btn-inverse btn-primary" id="signup_facebook" onclick="window.location.href = '<?php echo site_url('login_fb') ?>'"><span><i class="icon-facebook"></i></span> | Sign in with Facebook</button></li>
    		                <li><button class="btn btn-inverse btn-primary" id="signup_twitter" onclick="window.location.href = '<?php echo site_url('login_twitter') ?>'"><span><i class="icon-twitter"></i></span> | Sign in with Twitter</button></li>
    		                <li><button class="btn btn-inverse btn-primary" id="signup_google"><span><i class="icon-google-plus"></i></span> | Sign in with Google+</button></li>
    		            </ul>
    		        </div>
    		   
    		        <div class="cell email-signin">
    		            
    		            <div class="sectionTitle">Sign in with your email...</div>
    		            
    		            <span class="or">or</span>

    		            <?php echo form_open('login/login_verify', array('id' => 'login_header_form')); ?>                
    		                <ul>
    		                    <li><input id="user_login" name="email" placeholder="Email" type="text" /></li>
    		                    <li><input id="user_password" name="password" placeholder="Password" type="password" /></li>
    		                </ul>
    		                
    		                <div class="forgot-password">
    		                    <a href="#">Forgot your password?</a>
                        	</div>
                        	<div class="create-account">
    		                    <p>No account yet? <a href="#">Sign Up</a></p>
                        	</div>

    			        </div>
    			        <div id="error_box" title="Incorrect Login">
    			            <div id="error_message"></div>
    			        </div>
    				</div>
    			</div>

			  </div>
			  <div class="modal-footer">
			    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			    <input class="btn btn-primary" name="commit" type="submit" value="Login" />
			  </div>
		  </form>
		</div>

        <!-- Content
        ====================================================================== -->
        <div id="bodyWrapper">
            <div class="contentWrapper">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <p>Live Scores</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="visible-phone">
                <p>phone only</p>
            </div>

            <div class="navi-menu hidden-phone">
                <div class="container">
                    <div class="row">
                        <div class="span8">
                            <ul>
                                <li>
                                    <a class="menuLink" href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                <li>
                                    <a class="menuLink" href="<?php echo base_url(); ?>pages/index/schedule/">Schedule</a>
                                </li>
                                <li>
                                    <a class="menuLink" href="<?php echo base_url(); ?>pages/index/scores/">Scores</a>
                                </li>
                                <li>
                                    <a class="menuLink" href="<?php echo base_url(); ?>pages/division/">Standings</a>
                                </li>
                                <li>
                                    <a class="menuLink" href="<?php echo base_url(); ?>pages/index/stats/">Stats</a>
                                </li>
                                <li>
                                    <a class="menuLink" href="<?php echo base_url(); ?>pages/news/">News</a>
                                </li>
                                <li>
                                    <a class="menuLink" href="<?php echo base_url(); ?>pages/index/about/">About</a>
                                </li>
                            </ul>                                                  
                        </div>   
                        <div class="span4">
                            <form class="form-search pull-right">
                              <div class="input-prepend">
                                <button type="submit" class="btn">Search</button>
                                <input type="text" class="span2 search-query">
                              </div>
                            </form>                             
                        </div>                     
                    </div>
                </div>
            </div>

        <div class="contentWrapper">

        <!-- Main Content
        ====================================================================== -->
        	<div class="container-fluid">
        		<div class="row-fluid">
        			<div id="mainContent">
