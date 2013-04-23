<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

			<div class="row-fluid" id="boxscoreHeader">
				<div class="span2">
					<p class="text-center">
						<img class="teamLogo" src="<?php echo base_url(); ?>uploads/teamlogos/<?php echo $hometeaminfo -> Picture; ?>" />
					</p>
				</div>
				<div class="span3">
					<p class="lead text-left">
						<?php echo $hometeaminfo -> Name; ?>
						<br /><small><strong>VISITOR</strong></small>
						<h1 class="text-left"><?php echo $hometeamscore; ?></h1>
					</p>
				</div>
				<div class="span2">
					<p class="lead">
						<h1 class="text-center"><?php echo $progress; ?><br /><?php if($progress != 'Final') : ?><small>Period</small><?php endif; ?></h1>
					</p>
				</div>
				<div class="span3">
					<p class="lead text-right">
						<?php echo $awayteaminfo -> Name; ?>
						<br /><small><strong>HOME</strong></small>
						<h1 class="text-right"><?php echo $awayteamscore; ?></h1>
					</p>
				</div>
				<div class="span2">
					<p class="text-center">
						<img class="teamLogo" src="<?php echo base_url(); ?>uploads/teamlogos/<?php echo $awayteaminfo -> Picture; ?>" />
					</p>
				</div>								
			</div>	

	<!-- New Row
	====================================================================== -->
	<div id="boxScore" class="row-fluid">

		<!-- Place Main Content Here -->
		<div class="span8">		

			<legend>Scoring Summary</legend>
				<table class="table table-hover">
					<thead>
						<th>Period</th>
						<th>Team</th>
						<th>Time</th>
						<th>Goal</th>
						<th>Assist</th>
						<th>Assist</th>
						<th>Strength</th>
					</thead>
					<tbody>
						<?php if(isset($scoring)) : ?>
							<?php foreach($scoring as $score) : ?>
							<tr>
								<td><?php echo $score -> Period; ?></td>
								<td><?php echo $score -> TeamName; ?></td>
								<td><?php echo $score -> Time; ?></td>
								<td><?php echo $score -> GoalScorerName; ?></td>
								<td><?php echo $score -> PrimaryAssistName; ?></td>
								<td><?php echo $score -> SecondaryAssistName; ?></td>
								<td><?php echo $score -> Strength; ?></td>
							</tr>
							<?php endforeach; ?>
						<?php else : ?>
							<tr>
								<td colspan="7">No penalties</td>
							</tr>
						<?php endif; ?>							
					</tbody>
				</table>


			<legend>Penalty Summary</legend>
			
				<table class="table table-hover">
					<thead>
						<th>Period</th>
						<th>Team</th>
						<th>Time</th>
						<th>Player</th>
						<th>Penalty</th>
						<th>PIM</th>
					</thead>
					<tbody>
					<?php if($penalties != FALSE) : ?>
						<?php foreach($penalties as $penalty_data) : ?>
						<tr>
							<td><?php echo $penalty_data -> Period; ?></td>
							<td><?php echo $penalty_data -> TeamName; ?></td>
							<td><?php echo $penalty_data -> Time; ?></td>
							<td><?php echo $penalty_data -> PlayerName; ?></td>
							<td><?php echo $penalty_data -> PenaltyType; ?></td>
							<td><?php echo $penalty_data -> PenaltyMin; ?></td>
						</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td colspan="6">No penalties</td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>	

			<legend><?php echo $hometeaminfo -> Name; ?> Stats</legend>
			<?php if($gameinfo -> HomeRoster == 1) : ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>G</th>
							<th>A</th>
							<th>PTS</th>
							<th>PIM</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($hometeamstats as $stats) : ?>
							<tr>
								<td><?php echo $stats['JerseyNo']; ?></td>
								<td><?php echo $stats['FullName']; ?></td>
								<td><?php echo $stats['Goals']; ?></td>
								<td><?php echo $stats['Assists']; ?></td>
								<td><?php echo ($stats['Goals'] + $stats['Assists']); ?></td>
								<td><?php if($stats['PIM'] != FALSE) { echo $stats['PIM']; } else { echo "0"; } ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			<?php else : ?>
				<p class="lead">Lineup has not been submitted</p>
			<?php endif; ?>

			<legend><?php echo $awayteaminfo -> Name; ?> Stats</legend>
			<?php if($gameinfo -> HomeRoster == 1) : ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>G</th>
							<th>A</th>
							<th>PTS</th>
							<th>PIM</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($awayteamstats as $stats) : ?>
							<tr>
								<td><?php echo $stats['JerseyNo']; ?></td>
								<td><?php echo $stats['FullName']; ?></td>
								<td><?php echo $stats['Goals']; ?></td>
								<td><?php echo $stats['Assists']; ?></td>
								<td><?php echo ($stats['Goals'] + $stats['Assists']); ?></td>
								<td><?php if($stats['PIM'] != FALSE) { echo $stats['PIM']; } else { echo "0"; } ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			<?php else : ?>
				<p class="lead">Lineup has not been submitted</p>
			<?php endif; ?>		
		</div>


		<!-- Place Sidebar Content Here -->
		<div id="rightContent" class="span4">
			<legend>Scoring by Period</legend>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>1st</th>
						<th>2nd</th>
						<th>3rd</th>
						<?php if($gameinfo -> Progress == 'OT') : ?>
							<th>OT</th>
						<?php endif; ?>
						<th>T</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<?php echo $hometeaminfo -> Name; ?>
						</td>
						<td>
							<?php echo $hometeamboxscore[1]; ?>
						</td>
						<td>
							<?php echo $hometeamboxscore[2]; ?>
						</td>
						<td>
							<?php echo $hometeamboxscore[3]; ?>
						</td>
						<?php if($gameinfo -> Progress == 'OT') : ?>
							<td>
								<?php echo $hometeamboxscore[4]; ?>
							</td>
						<?php endif; ?>
						<td>
							<?php echo ($hometeamboxscore[1] + $hometeamboxscore[2] + $hometeamboxscore[3] + $hometeamboxscore[4]); ?>
						</td>
					</tr>
					<tr>
					<tr>
						<td>
							<?php echo $awayteaminfo -> Name; ?>
						</td>
						<td>
							<?php echo $awayteamboxscore[1]; ?>
						</td>
						<td>
							<?php echo $awayteamboxscore[2]; ?>
						</td>
						<td>
							<?php echo $awayteamboxscore[3]; ?>
						</td>
						<?php if($gameinfo -> Progress == 'OT') : ?>
							<td>
								<?php echo $awayteamboxscore[4]; ?>
							</td>
						<?php endif; ?>
						<td>
							<?php echo ($awayteamboxscore[1] + $awayteamboxscore[2] + $awayteamboxscore[3] + $awayteamboxscore[4]); ?>
						</td>
					</tr>																								
				</tbody>
			</table>

			<legend>Additional Game Facts</legend>
			<table class="table">
				<thead>
					<tr>
						<th>Time of Game:</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $time; ?></td>
					</tr>					
				</tbody>
			</table>
			<table class="table">
				<thead>
					<tr>
						<th>Match Type:</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $gameinfo -> MatchTypeName; ?></td>
					</tr>					
				</tbody>
			</table>
			<table class="table">
				<thead>
					<tr>
						<th>Arena:</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $gameinfo -> ArenaName; ?></td>
					</tr>					
				</tbody>
			</table>			
		</div>		
	</div>
</div>			