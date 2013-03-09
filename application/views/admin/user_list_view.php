<link rel="stylesheet" href="<?php echo base_url(); ?>style/jqgrid/ui.jqgrid.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>style/jqueryui/jqueryui.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>script/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>script/jqueryui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>script/jqgrid/jqgrid.locale-en.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>script/jqgrid/jqgrid.js"></script>

<h1>View</h1>
<div>
	<table id="grid"></table>
	<div id="toolbar"></div>
	<div id="pager"></div>
	<?php echo $data_grid; ?>
</div>
