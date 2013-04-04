<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1>Current News <small><?php echo $page_links ?></small></h1>
			<?php echo form_open('admin/news/delete_news'); ?>
			<div>
				<table class="table table-hover">
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
								<input type="checkbox" name="select[]" value='<?php echo $items -> Id; ?>' />
							</td>
							<td>
								<!-- Set row number -->
								<?php echo($current_page + $count++); ?>
							</td>
							<td>
								<a href="<?php echo base_url(); ?>admin/news/edit_post/<?php echo $items -> Id ?>"><?php echo $items -> Title ?></a>
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
				<span class="text-left">
					<input type="submit" id="delete" class="btn btn-danger" name="delete" value="Move Selected to Trash" onclick="return confirm('Are you sure you want to remove this news?');" />
				</span>
			</div>
		</div>
	</div>
</div>