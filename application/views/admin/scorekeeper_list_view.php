<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1>View Games <small><?php echo $links; ?></small></h1>
			
			<?php if($totalrow > 0) : ?>
				<?php echo form_open('admin/scorekeeper/delete_games'); ?>
					<?php if(!empty($_SESSION['message'])) : ?>
						<div class="alert alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><?php echo $_SESSION['message']; ?></strong> 
						</div>
					<? endif;?>

					<table class="table table-hover">
						<thead>
							<tr>
								<th>Game ID</th>
								<th>Game Type</th>
								<th>Season</th>
								<th>Home Team</th>
								<th>Away Team</th>
								<th>Home Score</th>
								<th>Away Score</th>
								<th>Date</th>
								<th>Start Time</th>
								<th>In Progress?</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($games as $game): ?>
								<tr>
									<td><?php echo $game -> Id; ?></td>
									<td><?php echo $game -> MatchTypeName; ?></td>
									<td><?php echo $game -> SeasonYear; ?></td>
									<td><?php echo $game -> HomeTeamName; ?></td>
									<td><?php echo $game -> AwayTeamName; ?></td>
									<td><?php echo $game -> HomeScore; ?></td>
									<td><?php echo $game -> AwayScore; ?></td>
									<td><?php echo $game -> Date; ?></td>
									<td><?php echo $game -> Time; ?></td>
									<td>
										<?php if($game -> Progress == 'false') : ?>
											<a class="btn btn-success" style="width: 50%;" href="<?php echo base_url(); ?>admin/scorekeeper/prepare_game/<?php echo $game -> Id; ?>">Start</a>
										<?php elseif ($game -> Progress == 1) : ?>
											<a class="btn btn-warning" style="width: 50%;" href="<?php echo base_url(); ?>admin/scorekeeper/play_game/<?php echo $game -> Id; ?>">1st</a>
										<?php elseif ($game -> Progress == 2) : ?>
											<a class="btn btn-warning" style="width: 50%;" href="<?php echo base_url(); ?>admin/scorekeeper/play_game/<?php echo $game -> Id; ?>">2nd</a>
										<?php elseif ($game -> Progress == 3) : ?>
											<a class="btn btn-warning" style="width: 50%;" href="<?php echo base_url(); ?>admin/scorekeeper/play_game/<?php echo $game -> Id; ?>">3rd</a>											
										<?php elseif ($game -> Progress == 4) : ?>
											<a class="btn btn-warning" style="width: 50%;" href="<?php echo base_url(); ?>admin/scorekeeper/play_game/<?php echo $game -> Id; ?>">Overtime</a>																					
										<?php elseif ($game -> Progress == 'complete') : ?>
											<span class="btn btn-inverse disabled" style="width: 50%;">Complete</span>
										<?php endif; ?>
									</td>
									<td>
										<?php if($game -> Progress == 'false') : ?>
											<input type="checkbox" name="delete[]" value="<?php echo $game -> Id; ?>" />
										<?php elseif ($game -> Progress == 1 || $game -> Progress == 2 || $game -> Progress == 3) : ?>
											<input type="checkbox" disabled />
										<?php elseif ($game -> Progress == 'complete') : ?>
											<input type="checkbox" name="delete[]" value="<?php echo $game -> Id; ?>" />
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="10">&nbsp;</td>
								<td><input type="submit" class="btn btn-danger"onclick="return confirm('Confirm Delete');" value="Delete" /></td>
							</tr>
						</tfoot>
					</table>
				</form>
				<p>Total Scheduled Games: <?php echo $totalrow; ?></p>
			<?php else : ?>
				<h3>No games scheduled</h3>
				<p><a href="<?php echo base_url(); ?>admin/scorekeeper/add_game">Schedule a Game</a></p>
			<?php endif; ?>
		</div>
	</div>
</div>