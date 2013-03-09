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
<h1>View2</h1>
<div>
	<table border="1" style="border-collapse: collapse; border: 1px solid #000;">
		<tr>
			<th><input type="checkbox" name="select_all" id="select_all" /></th>
			<th> No. </th>
			<th> Title </th>
			<th> Author </th>
			<th> Post Date </th>
		</tr>
		<?php $count=1; foreach ($results as $items):	?>
		<tr>
			<td>
				<input type="checkbox" name="select[]" />
			</td>
			<td>
				<!-- Set row number -->
				<?php echo($current_page + $count++); ?>
			</td>
			<td>
				<a href="/news/edit_post/<?php echo $items -> Id ?>"><?php echo $items -> Title ?></a>
				<input type="hidden" id="user_id" value="" />
			</td>
			<td>
				<a href="#<?php echo $items -> UserId ?>"><?php echo $items -> Author ?></a>
			</td>
			<td>
				<?php echo $items -> PostDate ?>
			</td>
		</tr>
		<? endforeach; ?>
	</table>
	<?php echo $page_links ?>
</div>