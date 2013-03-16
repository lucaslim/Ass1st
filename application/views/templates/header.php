<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<html class="no-js">
	<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Team Assist - <?php echo $title ?></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url(); ?>style/main/normalize.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>style/slider/nivo-slider.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>style/slider/dark/dark.css" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>style/main/main.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>style/main/neil.css" /> <!-- merge later on -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>style/fontAwesome/font-awesome.min.css" />
		<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>style/main/normalize.css" /> -->
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="<?php echo base_url(); ?>script/vendor/modernizr-2.6.2.min.js"></script>
	</head>
	<body>
		<div id="fb-root"></div>
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
		<div id="headerWrapper" class="clearfix">
			<div id="topHeader">
				<div id="brand_logo">
					<a id="wreckit_logo_href" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logos/wreckit_logo_header.png" /></a>
				</div>
				<div id="th_search">
					<div id="search-box">
	  					<form action="/search" id="search-form" method="get" target="_top">
	    					<input id="search-text" name="q" placeholder="Search for players, teams or tournaments" type="text"/>
	    					<button id="search-button" type="submit">
	    						<span ><i class="icon-search"></i></span>
	    					</button>
	  					</form>
					</div>
				</div>

				<div id="th_rightside">
					<span id="thrs_social_networks">
						<a href id="icon-facebook-sign" src="#"><i class="icon-facebook-sign icon-large"></i></a>
						<a href id="icon-twitter" src="#"><i class="icon-twitter icon-large"></i></a>
						<a href id="icon-google-plus-sign" src="#"><i class="icon-google-plus-sign icon-large"></i></a>
						<a href id="icon-rss" src="#"><i class="icon-rss icon-large"></i><a/>
					</span>
					<span id="thrs_sign_reg">
						<span><a id="sign_in" href src="#">Sign In<a/></span>
						<span>|</span>
						<span><a href src="#">Register<a/></span>
					</span>
				</div>
			</div>
			
			<!-- Login Modal -->
			<div id="signin_dialog" >

				<div class="" id="user-session-form">
			        <header>
			        	<span>Sign into your Team Assist account.</span>
			        </header>
			        
			        <div class="cell social-signin">
			            <div class="sectionTitle">Sign in with a social network...</div>    
			            <ul>
			            	<li><button class="btn_social_signup" id="signup_facebook" type="submit"><span><i class="icon-facebook"></i></span>&nbsp;| &nbsp;&nbsp;Sign in with Facebook</button></li>
			                <li><button class="btn_social_signup" id="signup_twitter" type="submit"><span><i class="icon-twitter"></i></span>&nbsp;| &nbsp;&nbsp;Sign in with Twitter</button></li>
			                <li><button class="btn_social_signup" id="signup_google" type="submit"><span><i class="icon-google-plus"></i></span>&nbsp;| &nbsp;&nbsp;Sign in with Google+</button></li>
			            </ul>
			        </div>
			   
			        <div class="cell email-signin">
			            
			            <div class="sectionTitle">Sign in with your email...</div>
			            
			            <span class="or">or</span>
			            <a href src="#" class="exit">X</a>
			            
			            <form action="" class="" id="" method="">
			                
			                <ul>
			                    <li><input id="user_login" name="email" placeholder="Email" type="text" /></li>
			                    <li><input id="user_password" name="password" placeholder="Password" type="password" /></li>
			                </ul>
			                
			                <div>
			                    <input class="sign-in-button" name="commit" type="submit" value="Login" />
			                    <a href="#" class="forgot_pass">Forgot your password?</a>
			                </div>
			                	<br />
			                <div class="create_account">
			                    <span>No account yet?&nbsp;&nbsp;&nbsp;</span><a href="#" class="">Sign Up</a>
			                </div>
			                
			            </form>
			        </div>
				</div>
			</div>


		</div>
		<div id="bodyWrapper" class="clearfix">
			<div id="bodyContent" class="clearfix">
				<div id="scoreBoardWrapper">
					<div id="prevScore">
						<p>
							&lt;
						</p>
					</div>
					<div id="scores">
						<div class="scoreBoard">
							<table>
								<thead>
									<th> Monday 1/20 </th>
								</thead>
								<tr>
									<td>Wolverines</td>
									<td>4</td>
								</tr>
								<tr>
									<td>Team 2</td>
									<td>6</td>
								</tr>
								<tr>
									<td>Final</td>
								</tr>
							</table>
						</div>
						<div class="scoreBoard">
							<table>
								<thead>
									<th> Monday 1/20 </th>
								</thead>
								<tr>
									<td>Wolverines</td>
									<td>4</td>
								</tr>
								<tr>
									<td>Team 2</td>
									<td>6</td>
								</tr>
								<tr>
									<td>Final</td>
								</tr>
							</table>
						</div>
						<div class="scoreBoard">
							<table>
								<thead>
									<th> Monday 1/20 </th>
								</thead>
								<tr>
									<td>Wolverines</td>
									<td>4</td>
								</tr>
								<tr>
									<td>Team 2</td>
									<td>6</td>
								</tr>
								<tr>
									<td>Final</td>
								</tr>
							</table>
						</div>
						<div class="scoreBoard">
							<table>
								<thead>
									<th> Monday 1/20 </th>
								</thead>
								<tr>
									<td>Wolverines</td>
									<td>4</td>
								</tr>
								<tr>
									<td>Team 2</td>
									<td>6</td>
								</tr>
								<tr>
									<td>Final</td>
								</tr>
							</table>
						</div>
						<div class="scoreBoard">
							<table>
								<thead>
									<th> Monday 1/20 </th>
								</thead>
								<tr>
									<td>Wolverines</td>
									<td>4</td>
								</tr>
								<tr>
									<td>Team 2</td>
									<td>6</td>
								</tr>
								<tr>
									<td>Final</td>
								</tr>
							</table>
						</div>
						<div id="nextScore">
							<p>
								&gt;
							</p>
						</div>
					</div>
				</div>
				<div id="menu">
					<ul>
						<li>
							<a href="<?php echo base_url(); ?>">Schedule</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>">Scores</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>/pages/division/">Standings</a></a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>">Stats</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>/pages/news/">News</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>">About</a>
						</li>
					</ul>
				</div>
