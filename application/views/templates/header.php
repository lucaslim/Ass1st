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
        <script src="<?php echo base_url(); ?>script/vendor/modernizr-2.6.2.min.js"></script>

        <!-- jQuery (needed?) Needed for inline jQuery. -->
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

        <div id="headerWrapper" class="navbar navbar-inverse">
          <div class="navbar-inner">
            <div class="container">
              <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logos/wreckit_logo_header.png" /></a>
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
    		            </ul>
    		        </div>
    		   
    		        <div class="cell email-signin">
    		            
    		            <div class="sectionTitle">Sign in with your email...</div>
    		            
    		            <span class="or">or</span>

    		            <?php echo form_open('login/login_verify'); ?>                
    		                <ul>
    		                    <li><input id="user_login" name="email" placeholder="Email" type="text" /></li>
    		                    <li><input id="user_password" name="password" placeholder="Password" type="password" /></li>
    		                </ul>
    		                <input type="hidden" id="return_url" name="return_url" value="<?php echo base_url() . $this -> uri -> uri_string() ?>" />
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
                <div style="background: black;">
                <div class="container">
                    <div class="row">
                        <div class="span12" style="margin-top: 15px; margin-bottom: 15px;">
                            <?php if($livescores != FALSE) : ?>
                                <div id="arrowL">
                                    <i class="icon-caret-left icon-large"></i>
                                </div>
                                <div id="arrowR">
                                    <i class="icon-caret-right icon-large"></i>
                                </div>
                                <div id="liveScoresHeader">
                                    <div class="liveScores">
                                        <?php foreach($livescores as $score) : ?>
                                            <div class="liveScoreItem">
                                                <?php if($score['Progress'] != 'false') : ?>
                                                    <div class="boxScoreLink"><a href="<?php echo base_url(); ?>pages/boxscore/<?php echo $score['GameId']; ?>">View Boxscore</a></div>
                                                <?php endif; ?>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th colspan="2" style="text-align: left;">
                                                                <small style="font-weight: 200;"><?php echo date('l m/d', strtotime($score['Date'])); ?></small>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 90%; text-align: left;">
                                                                <?php echo strtoupper(substr($score['HomeTeamName'], 0, 3)); ?>
                                                            </th>
                                                            <th>
                                                                <?php echo $score['HomeTeamScore']; ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 90%; text-align: left;">
                                                                <?php echo strtoupper(substr($score['AwayTeamName'], 0, 3)); ?>
                                                            </th>
                                                            <th>
                                                                <?php echo $score['AwayTeamScore']; ?>
                                                            </th>   
                                                        </tr>
                                                        <tr>
                                                            <th colspan="2" style="text-align: left;">
                                                                <?php if($score['Progress'] == 'false') : ?>
                                                                    <small style="font-weight: 200;"><?php echo date('g:i A', strtotime($score['Time'])); ?></small>
                                                                <?php else : ?>
                                                                    <small style="font-weight: 200;"><?php echo $score['Progress']; ?></small>
                                                                <?php endif; ?>
                                                            </th>
                                                        </tr>                                                
                                                    </tbody>
                                                </table>                                                
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>                                
                            <?php else : ?>
                                <p>There are no games scheduled today.</p>
                            <?php endif; ?>   
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <!-- Begin Horizontal Scroll Script
                    Adapted from: http://jsfiddle.net/mattblancarte/stfzy/21/ -->

            <script type="text/javascript">
                $(document).ready(function() {
                    
                    var $item = $('div.liveScoreItem'), //Cache your DOM selector
                        visible = 2, //Set the number of items that will be visible
                        index = 0, //Starting index
                        endIndex = ( $item.length / visible ) - 1; //End index
                    
                    $('div#arrowR').click(function(){
                        if(index < endIndex ){
                          index++;
                          $item.animate({'left':'-=300px'});
                        }
                    });
                    
                    $('div#arrowL').click(function(){
                        if(index > 0){
                          index--;            
                          $item.animate({'left':'+=300px'});
                        }
                    });
                    
                });
            </script>

            <!-- End Horizontal Scroll Script -->


            <div class="navi-menu hidden-phone">
                <div class="container">
                    <div class="row">
                        <div class="span8">
                            <ul>
                                <li>
                                    <a class="menuLink" href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                <li>
                                    <a class="menuLink" href="<?php echo base_url(); ?>pages/schedule/">Schedule</a>
                                </li>
                                <li>
                                    <a class="menuLink" href="<?php echo base_url(); ?>pages/scores/">Scores</a>
                                </li>
                                <li>
                                    <a class="menuLink" href="<?php echo base_url(); ?>pages/standings/">Standings</a>
                                </li>
                                <li>
                                    <a class="menuLink" href="<?php echo base_url(); ?>pages/news/">News</a>
                                </li>
                                <li>
                                    <a class="menuLink" href="<?php echo base_url(); ?>pages/index/about/">About</a>
                                </li>
                            </ul>                                                  
                        </div>   
                        <div class="span4" style="position: relative;">
                            <form class="form-search" method="post" action="<?php echo base_url(); ?>search">
                              
                               <input type="text" id="search_box" data-provide="typeahead" autocomplete="off" placeholder="search" class="span3 search-query">
                        
                            </form>                             
                        </div>                     
                    </div>
                </div>
            </div>
            
        <div class="contentWrapper">

