<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1><?php echo $title ?> - <small><?php echo $result -> LeagueName ?> (<?php echo $result -> SeasonYear; ?>)</small></h1>
			<table class="table table-hover">
				<tr>
					<th> No. </th>
					<th> Date </th>
					<th> Home Team </th>
					<th> Visiting Team </th>
					<th> Time </th>
					<th></th>
				</tr>
				<?php $count = 1; foreach ( $fixture as $items ): ?>
				<tr>
					<td>
						<!-- Set row number -->
						<?php echo $count++; ?>
					</td>
					<td>
						<?php echo date('D M d, Y', strtotime($items -> Date)) ?>
					</td>
					<td>
						<?php echo $items -> HomeTeamName ?>	
					</td>
					<td>
						<?php echo $items -> AwayTeamName  ?>
					</td>
					<td>
						<?php echo date('g:i A', strtotime($items -> Time)) . ' ET' ?>
					</td>
					<td>
						<!-- <?php echo form_open( 'admin/matchfixture/edit' ); ?>
						<input type="hidden" id="season_id" name="season_id" value="<?php echo $items -> SeasonId ?>" />
						<input type="hidden" id="league_id" name="league_id" value="<?php echo $items -> LeagueId ?>" /> -->
						<input type="submit" class="btn btn-danger" id="edit" name="edit" value="Edit" />
						<?php //echo form_close(); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>
