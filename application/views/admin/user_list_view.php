<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1>Users List <small><?php echo $page_links ?></small></h1>
			<?php //echo form_open('admin/news/delete_news'); ?>
				<table class="table table-hover">
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
							<a href="<?php echo base_url(); ?>admin/user/edit_user/<?php echo $items -> Id ?>"><?php echo $items -> FullName ?></a>
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
				<input type="submit" class="btn btn-danger" id="delete" name="delete" value="Move to Trash" onclick="return confirm('Are you sure you want to remove this news?');" />
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#select_all').click(function() {
			$('input[name="select[]"]').prop('checked', $(this).prop('checked'));
		});
	}); 
</script>
