<link rel="stylesheet" href="<?php echo base_url(); ?>style/jqueryui/jqueryui.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>style/maps/store-locator.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>script/jquery.js"></script>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>script/maps/store-locator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>script/stadium.js"></script>
<script type="text/javascript">
	$(window).load(function() {
		LoadStadium();
	}); 
</script>
<style type="text/css">
	#canvas, #info {
		height: 500px;
	}
	#info {
		float: left;
		margin-right: 10px;
		width: 300px;
	}
	#info .feature-filter label {
		width: 130px;
	}
	a:hover, #head-nav li a:hover, #menu-nav li a:hover {
		text-decoration: underline;
	}
	#head-nav li, #menu-nav li {
		display: inline;
		padding-right: 15px;
		text-transform: uppercase;
	}
	#head-nav li a, #menu-nav li a {
		color: #FFF;
		text-decoration: none;
	}
	.locator-title {
		font-family: CaviarDreamsRegular;
		font-weight: bold;
		color: #000;
	}
	.locator-address {
		font-size: 12px;
		color: #000;
	}
	.locator-hours {
		font-style: italic;
		font-size: 12px;
		color: #000;
	}
	.locator-number {
		font-size: 12px;
		font-weight: bold;
		color: #000;
	}
</style>
<div id="content">
	<div id="page_header">
		Find Stadium
	</div>
	<div id="locator">
		<div id="info"></div>
		<div id="canvas"></div>
	</div>
</div>