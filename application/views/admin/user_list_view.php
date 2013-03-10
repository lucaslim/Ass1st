<link rel="stylesheet" href="<?php echo base_url(); ?>style/jqgrid/ui.jqgrid.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>style/jqueryui/jqueryui.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>script/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>script/jqueryui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>script/jqgrid/jqgrid.locale-en.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>script/jqgrid/jqgrid.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#select_all').click(function() {
			$('input[name="select[]"]').prop('checked', $(this).prop('checked'));
		});
	}); 
</script>
<h1>View</h1>
<?php //echo form_open('admin/news/delete_news'); ?>
<div>
	<table border="1" style="border-collapse: collapse; border: 1px solid #000;">
		<tr>
			<th><input type="checkbox" name="select_all" id="select_all" /></th>
			<th> No. </th>
			<th> Name </th>
			<th> Email </th>
			<th> Country </th>
		</tr>
		<?php $count=1; foreach ($results as $items):	?>
		<tr>
			<td>
				<input type="checkbox" name="select[]" value='<?php echo $items -> Id; ?>' />
			</td>
			<td>
				<!-- Set row number -->
				<?php echo($current_page + $count++); ?>
			</td>
			<td>
				<a href="/user/edit_user/<?php echo $items -> Id ?>"><?php echo $items -> FullName ?></a>
				<input type="hidden" id="user_id" value="" />
			</td>
			<td>
				<a href="mailto:<?php echo $items -> Email ?>"><?php echo $items -> Email ?></a>
			</td>
			<td>
				<?php echo $items -> CountryName ?>
			</td>
		</tr>
		<? endforeach; ?>
	</table>
	<?php echo $page_links ?><input type="submit" id="delete" name="delete" value="Move to Trash" onclick="return confirm('Are you sure you want to remove this news?');" />
</div>