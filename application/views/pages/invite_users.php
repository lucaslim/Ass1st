
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1>Invite Users <small><?php echo $page_links ?></small></h1>
			<h2><small><?php echo $team_data -> Name ?></small></h2>
			<?php echo form_open('pages/send_invite'); ?>
			<input type="hidden" name="team_id" id="team_id" value="<?php echo $team_data -> Id ?>"/>
			<input type="hidden" name="team_name" id="team_name" value="<?php echo $team_data -> Name ?>"/>
			<div>	
				<table class="table table-hover">
					<tr>
						<th style="width: 1%"><input type="checkbox" name="select_all" id="select_all" /></th>
						<th style="width: 1%"> No. </th>
						<th> FullName </th>
					</tr>
					<?php $count=1; foreach ($results as $items):	?>
						<tr>
							<td>
								<input type="checkbox" name="select[]" value='<?php echo $items -> UserId; ?>' />
							</td>
							<td>
								<!-- Set row number -->
								<?php echo($current_page + $count++); ?>
							</td>
							<td>
								<?php echo $items -> FullName ?>
								<input type="text" id="email" name="email" value="<?php echo $items -> Email ?>" />
							</td>
						</tr>
					<? endforeach; ?>
				</table>
				<span class="text-left">
					<input type="submit" id="send" class="btn btn-primary" name="send" value="Send Invite" onclick="return confirm('Are you sure you want to send invite to these user(s)?');" />
				</span>
			</div>
		</div>
	</div>
</div>