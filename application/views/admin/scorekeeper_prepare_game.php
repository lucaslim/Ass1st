<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1>Create Game Lineups <small>(Game ID: <?php echo $game -> Id; ?>)</small></h1>
			
			<?php if(!empty($_SESSION['message'])) : ?>
				<div class="alert alert-success">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong><?php echo $_SESSION['message']; ?></strong> 
				</div>
			<? endif;?>
		</div>
	</div>

	<!-- Home Team Data -->	
	<div class="row-fluid">
		<div class="span6">
			<h3>Home Team <small><?php echo $game -> HomeTeamName; ?> (<?php echo $game -> HomeTeamId; ?>)</small></h3>
			<?php if($game -> HomeRoster == 0) : ?>
				<?php echo form_open('admin/scorekeeper/submit_lineup/' . $game -> Id . '/' . $game -> HomeTeamId . '/home'); ?>
					
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Player ID</th>
								<th>Jersey #</th>
								<th>Player Name</th>
								<th>Games Played</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($hometeam as $player) : ?>
								<tr>
									<td><?php echo $player -> UserId; ?> <?php if($player -> Captain == 'Yes') { echo "<strong>(C)</strong>"; }; ?></td>
									<td><?php echo $player -> JerseyNo; ?></td>
									<td><?php echo $player -> FullName; ?></td>
									<td><?php echo $player -> GP; ?></td>
									<td><input type="checkbox" name="players[]" value="<?php echo $player -> UserId; ?>" /></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
						<tfoot>
							<tr>
								<th colspan="5">
									<span class="pull-right">
										<button type="submit" class="btn btn-success">Submit Lineup</button>
									</span>
								</th>
							</tr>
						</tfoot>					
					</table>			
				</form>
			<?php else : ?>
				<p>Home Team Lineup Submitted</p>
			<?php endif; ?>
		</div>

	<!-- Away Team Data -->	
		<div class="span6">
			<h3>Away Team <small><?php echo $game -> AwayTeamName; ?> (<?php echo $game -> AwayTeamId; ?>)</small></h3>
			<?php if($game -> AwayRoster == 0) : ?>
				<?php echo form_open('admin/scorekeeper/submit_lineup/' . $game -> Id . '/' . $game -> AwayTeamId . '/away'); ?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Player ID</th>
								<th>Jersey #</th>
								<th>Player Name</th>
								<th>Games Played</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($awayteam as $player) : ?>
								<tr>
									<td><?php echo $player -> UserId; ?> <?php if($player -> Captain == 'Yes') { echo "<strong>(C)</strong>"; }; ?></td>
									<td><?php echo $player -> JerseyNo; ?></td>
									<td><?php echo $player -> FullName; ?></td>
									<td><?php echo $player -> GP; ?></td>
									<td><input type="checkbox" name="players[]" value="<?php echo $player -> UserId; ?>" /></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
						<tfoot>
							<tr>
								<th colspan="5">
									<span class="pull-right">
										<button type="submit" class="btn btn-success">Submit Lineup</button>
									</span>
								</th>
							</tr>
						</tfoot>
					</table>			
				</form>
			<?php else : ?>
				<p>Away Team Lineup Submitted</p>
			<?php endif; ?>
		</div>

		<!-- Start Game Button -->
		<div class="row-fluid">
			<div class="span12">
				<?php if($game -> AwayRoster == 1 && $game -> HomeRoster == 1) : ?>
					<a class="btn btn-primary btn-large" href="<?php echo base_url(); ?>admin/scorekeeper/start_game/<?php echo $game -> Id; ?>">Begin Scorekeeper</a>
				<? endif; ?>
			</div>			
		</div>

	</div>
</div>