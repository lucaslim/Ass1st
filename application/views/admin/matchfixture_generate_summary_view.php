<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1><?php echo $title ?><small><?php echo $page_links ?></small></h1>
			<table class="table table-hover">
				<tr>
					<th> No. </th>
					<th> Season </th>
					<th> League </th>
					<th> Schedule Generated? </th>
					<th></th>
				</tr>
				<?php $count = 1; foreach ( $results as $items ): ?>
				<tr>
					<td>
						<!-- Set row number -->
						<?php echo $current_page + $count++; ?>
					</td>
					<td>
						<?php echo $items -> SeasonYear ?>
					</td>
					<td>
						<?php echo $items -> LeagueName ?>
					</td>
					<td>
						<?php echo $items -> IsGenerated ? 'Yes' : 'No'  ?>
					</td>
					<td>
						<?php if ( $items -> IsGenerated ): ?>
						<?php echo form_open( 'admin/matchfixture/edit' ); ?>
						<input type="hidden" id="season_id" name="season_id" value="<?php echo $items -> SeasonId ?>" />
						<input type="hidden" id="league_id" name="league_id" value="<?php echo $items -> LeagueId ?>" />
						<input type="submit" class="btn btn-danger" id="edit" name="edit" value="Edit" />
						<?php echo form_close(); ?>
						<?php else: ?>
						<?php echo form_open( 'admin/matchfixture/generate_new' ); ?>
						<input type="hidden" id="season_id" name="season_id" value="<?php echo $items -> SeasonId ?>" />
						<input type="hidden" id="league_id" name="league_id" value="<?php echo $items -> LeagueId ?>" />
						<input type="submit" class="btn btn-primary" id="generate" name="generate" value="Generate" />
						<?php echo form_close(); ?>
						<?php endif; ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>
