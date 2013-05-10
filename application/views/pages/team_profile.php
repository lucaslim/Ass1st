<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

	<!-- New Row
	====================================================================== -->
	<div class="row-fluid">

		<?php if(!empty($team)) : ?>
		<!-- Place Main Content Here -->
		<div class="span8">
			<legend>Team Profile: <?php echo $team -> Name; ?></legend>
			<table class="table table-hover">
				<thead>
					<tr>
						<th><?php echo $team -> Name; ?> Roster</th>
						<th>Jersey #</th>
						<th>Games Played</th>
						<th>Goals</th>
						<th>Assists</th>
						<th>Points</th>
					</tr>
				</thead>
				<tbody>
				<?php if($roster != FALSE) : ?>
					<?php foreach($scoring as $player): ?>
							<tr>
								<td><a href="<?= base_url(); ?>pages/player/<?= $player['PlayerId']; ?>"><?php echo $player['FullName']; ?></td>
								<td><?php echo $player['JerseyNo']; ?></td>
								<td><?php echo $player['GP']; ?></td>
								<td><?php echo $player['Goals']; ?></td>
								<td><?php echo $player['Assists']; ?></td>
								<td><?php echo $player['Goals'] + $player['Assists']; ?></td>
							</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<?php else : ?>
				<p class="lead">
					No Roster Data Found
				</p>
			<?php endif; ?>			

			<legend>Upcoming Games</legend>
			<?php if(isset($schedule)) : ?>
				<table class="table">
					<thead>
						<tr>
							<th>Date</th>
							<th>Time</th>
							<th>Home</th>
							<th>Away</th>
							<th>Arena</th>
							<th>Type</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($schedule as $game) : ?>
						<tr>
							<td><?php echo $game -> Date; ?></td>
							<td><?php echo $game -> Time; ?></td>
							<td><a href="<?php echo base_url(); ?>pages/team/<?php echo $game -> HomeTeamId; ?>"><?php echo $game -> HomeTeamName; ?></a></td>
							<td><a href="<?php echo base_url(); ?>pages/team/<?php echo $game -> AwayTeamId; ?>"><?php echo $game -> AwayTeamName; ?></a></td>
							<td><?php echo $game -> ArenaName; ?></td>
							<td><?php echo $game -> MatchTypeName; ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>	
				</table>
			<?php else : ?>
				<p class="lead">There are no games currently scheduled</p>
			<?php endif; ?>

			<legend>Past Game Results</legend>
			<?php if($game_results != FALSE) : ?>
				<table class="table">
					<thead>
						<tr>
							<th>Date</th>
							<th>Away</th>
							<th>&nbsp;</th>
							<th>Home</th>
							<th>Result</th>
							<th>Boxscore</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($game_results as $result) : ?>
						<tr>
							<td><?php echo $result -> Date; ?></td>
							<td><a href="<?php echo base_url(); ?>pages/team/<?php echo $result -> AwayTeamId; ?>"><?php echo $result -> AwayTeamName; ?></a></td>
							<td>vs.</td>
							<td><a href="<?php echo base_url(); ?>pages/team/<?php echo $result -> HomeTeamId; ?>"><?php echo $result -> HomeTeamName; ?></a></td>
							<td><?php echo $result -> AwayTeamScore . ' - ' . $result -> HomeTeamScore; ?></td>
							<td><a href="<?php echo base_url(); ?>pages/boxscore/<?php echo $result -> Id; ?>">View</a></td>
						</tr>
						<?php endforeach; ?>
					</tbody>	
				</table>
			<?php else : ?>
				<p class="lead">No past game results found</p>
			<?php endif; ?>
		</div>

		<!-- Place Sidebar Content Here -->
		<div class="span4">
			<p>
				<?php if($team -> Picture !='') : ?>
					<img style="max-width: 150px; max-height: 150px" class="img-polaroid" src="<?php echo base_url(); ?>uploads/teamlogos/<?php echo $team -> Picture; ?>" />	
				<?php else : ?>
					<img style="max-width: 100px; max-height: 100px" class="img-polaroid" src="<?php echo base_url(); ?>uploads/teamlogos/blank_avatar.png" />	
				<?php endif; ?>					
			</p>			
			<legend>Team Info</legend>
			<blockquote>
				<p><a href="<?php echo base_url(); ?>pages/standings/"><?php echo $team -> DivisionName; ?> Division</a></p>
				<p>Founded: <?php echo $team -> Founded; ?></p>
				<p>Overall Record: <?php echo $standings -> Win . ' - ' . $standings -> Lost . ' - ' . $standings -> OvertimeLoss; ?>
			</blockquote>
			<?php if(isset($schedule)) : ?>
				<legend>Next Game</legend>
				<blockquote>
					<p><?php echo $schedule[0] -> Date; ?> @ <?php echo $schedule[0] -> Time; ?></p>
					<p><?php echo $schedule[0] -> AwayTeamName; ?> vs. <?php echo $schedule[0] -> HomeTeamName; ?></p>
					<p><?php echo $schedule[0] -> ArenaName; ?></p>
				</blockquote>
			<?php endif; ?>
		</div><!-- /end news list-->
		<?php else : ?>
			<p class="lead">No team data found</p>
		<?php endif; ?>
		

	</div></div>
</div>