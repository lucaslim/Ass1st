<!DOCTYPE html>
<html>
	<head>
		<title>Sign Up</title>
		<link rel="stylesheet" href="<?php echo base_url();?>style/jqgrid/ui.jqgrid.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>style/jqueryui.css" />
		<script type="text/javascript" src="<?php echo base_url();?>script/jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>script/jqueryui.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>script/jqgrid/jqgrid.locale-en.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>script/jqgrid/jqgrid.js"></script>
	</head>
	<body>
		<h1>View</h1>
		<div>
			<table id="grid"></table>
			<div id="pager"></div>
			<?php echo $data_grid; ?>
		</div>
	</body>
</html>
