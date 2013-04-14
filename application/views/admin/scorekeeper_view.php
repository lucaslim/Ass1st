<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1>Scorekeeper <small>(Game ID: <?php echo $game -> Id; ?>)</small></h1>
			<span class="lead">Current Period: </span>
			<div class="btn-group" data-toggle="buttons-radio">
				<?php if($game -> Progress == 1) : ?>
					<a class="btn btn-inverse btn-small active" disabled>1</a>
					<a class="btn btn-inverse btn-small" href="<?php echo base_url(); ?>admin/scorekeeper/change_period/<?php echo $game -> Id; ?>/2">2</a>
					<a class="btn btn-inverse btn-small">3</a>
				<?php endif; ?>
				
				<?php if($game -> Progress == 2) : ?>
					<a class="btn btn-inverse btn-small" disabled>1</a>
					<a class="btn btn-inverse btn-small active" disabled>2</a>
					<a class="btn btn-inverse btn-small" href="<?php echo base_url(); ?>admin/scorekeeper/change_period/<?php echo $game -> Id; ?>/3">3</a>
				<?php endif; ?>	

				<?php if($game -> Progress == 3) : ?>
					<a class="btn btn-inverse btn-small" disabled>1</a>
					<a class="btn btn-inverse btn-small" disabled>2</a>
					<a class="btn btn-inverse btn-small active" disabled>3</a>
				<?php endif; ?>									
			</div>
			<?php if($game -> Progress == 3) : ?>
				<a class="btn btn-primary btn-small"  href="<?php echo base_url(); ?>admin/scorekeeper/finish_game/<?php echo $game -> Id; ?>">Finish Game</a>
			<?php endif; ?>			
		</div>			
	</div>

	<div class="row-fluid">
		<div class="span12">
			<?php if(!empty($_SESSION['message'])) : ?>
				<div class="alert alert-success" style="margin: 10px 0;">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong><?php echo $_SESSION['message']; ?></strong> 
				</div>
			<? endif;?>
		</div>
	</div>	

	<div class="row-fluid">

		<!-- Home Team Data -->
		<div class="span6">
			<table class="table table-hover">
				<legend>
					<h3><?php echo $game -> HomeTeamName; ?> <small>Team ID: <?php echo $game -> HomeTeamId; ?> - Home Team</small> <span class="pull-right"><?php echo $homeScore; ?></span></h3>
				</legend>
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>GP</th>
						<th>G</th>
						<th>A</th>
						<th>PIM</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($hometeam as $player) : ?>
						<tr>
							<td><?php echo $player['JerseyNo']; ?></td>
							<td><?php echo $player['FullName']; ?> <?php if($player['Captain'] == 'Yes') { echo "<strong>(C)</strong>"; }; ?></td>
							<td><?php echo $player['GP']; ?></td>
							<td><?php echo $player['Goals']; ?></td>
							<td><?php echo $player['Assists']; ?></td>
							<td><?php if($player['PIM'] != FALSE) { echo $player['PIM']; } else { echo "0"; } ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<form id="homeScore" action="<?php echo base_url();?>admin/scorekeeper/save_score/<?php echo $game -> Id; ?>" method="post">
				<input type="hidden" name="teamside" value="home" />
				<input type="hidden" name="teamid" value="<?php echo $game -> HomeTeamId; ?>" />				
				<table class="table">
					<legend>
						Insert Home Team Scoring Play
					</legend>
					<thead>
						<tr>
							<th>Goal</th>
							<th>Assist</th>
							<th>Assist</th>
							<th>Time of Goal</th>
							<th>Strength</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<select id="homeGoal" class="input-mini" name="goal">
									<option value="">N/A</option>
									<?php foreach($hometeam as $player) : ?>
										<option value="<?php echo $player['PlayerId']; ?>"><?php echo $player['JerseyNo']; ?></option>
									<?php endforeach; ?>
								</select>								
							</td>
							<td>
								<select id="homePAssist" class="input-mini" name="p_assist">
									<option value="">N/A</option>
									<?php foreach($hometeam as $player) : ?>
										<option value="<?php echo $player['PlayerId']; ?>"><?php echo $player['JerseyNo']; ?></option>
									<?php endforeach; ?>
								</select>
							</td>
							<td>
								<select id="homeSAssist" class="input-mini" name="s_assist">
									<option value="">N/A</option>
									<?php foreach($hometeam as $player) : ?>
										<option value="<?php echo $player['PlayerId']; ?>"><?php echo $player['JerseyNo']; ?></option>
									<?php endforeach; ?>
								</select>
							</td>															
							<td>
								<select id="homeGMinute" class="input-mini" name="minute">
									<?php foreach($twentyminutes as $minute) : ?>
										<?php echo "<option value='$minute'>$minute</option>" ?>
									<?php endforeach; ?>
								</select>
								:
								<select id="homeGSeconds" class="input-mini" name="seconds">
									<?php foreach($sixtyseconds as $seconds) : ?>
										<?php echo "<option value='$seconds'>$seconds</option>" ?>
									<?php endforeach; ?>
								</select>						
							</td>							
							<td>
								<select class="input-medium" name="strength">
									<option value="EV">Even Strength</option>
									<option value="SHG">Short Handed</option>
									<option value="PPG">Power Play</option>
									<option value="4on4">4 on 4</option>
									<option value="3on3">3 on 3</option>
									<option value="PS">Penalty Shot</option>
								</select>
							</td>							
							<td>
								<div class="pull-right">
									<input type="submit" class="btn btn-primary" id="submitHomeScore" value="Save" /> 
								</div>
							</td>
						</tr>							
					</tbody>
				</table>
			</form>
			
			<?php echo form_open('admin/scorekeeper/save_penalty/' . $game -> Id . '/' . $game -> HomeTeamId); ?>
				<legend>
					Insert Home Penalty
				</legend>				
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Player</th>
							<th>Type</th>
							<th>Time of Penalty</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<select class="homePenalty input-mini" name="player">
									<option value="">N/A</option>
									<?php foreach($hometeam as $player) : ?>
										<option value="<?php echo $player['PlayerId']; ?>"><?php echo $player['JerseyNo']; ?></option>
									<?php endforeach; ?>
								</select>								
							</td>
							<td>									
								<select class="input-xlarge" name="penalty">
									<?php foreach ($penalty_types as $key => $value) : ?>
										<option value="<?php echo $value; ?>:<?php echo $key; ?>"><?php echo $key; ?></option>
									<?php endforeach; ?>
								</select>
							</td>															
							<td>
								<select class="input-mini" name="minpim">
									<?php foreach($twentyminutes as $minute) : ?>
										<option value="<?php echo $minute ; ?>"><?php echo $minute ; ?></option> ?>
									<?php endforeach; ?>
								</select>
								:
								<select class="input-mini" name="secpim">
									<?php foreach($sixtyseconds as $seconds) : ?>
										<?php echo "<option value='$seconds'>$seconds</option>" ?>
									<?php endforeach; ?>
								</select>						
							</td>														
							<td>
								<div class="pull-right">
									<input type="submit" class="btn btn-primary submitPenalty" value="Save" /> 
								</div>
							</td>
						</tr>						
					</tbody>
				</table>
			</form> 

			<table class="table table-hover">
				<legend>
					Scoring Summary
				</legend>
				<thead>
					<tr>
						<th>Period</th>
						<th>Team</th>
						<th>Time</th>
						<th>Goal</th>
						<th>Assist</th>
						<th>Assist</th>
						<th>Strength</th>
					</tr>
				</thead>
				<tbody>
					<?php if($scoring != FALSE) : ?>
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
							<td colspan="6">No scoring</td>
						</tr>
					<? endif; ?>
				</tbody>
			</table>

		</div>

		<!-- Away Team Data -->
		<div class="span6">
			<table class="table table-hover">
				<legend>
					<h3><?php echo $game -> AwayTeamName; ?> <small>Team ID: <?php echo $game -> AwayTeamId; ?> - Away Team</small> <span class="pull-right"><?php echo $awayScore; ?></span></h3>
				</legend>				
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>GP</th>
						<th>G</th>
						<th>A</th>
						<th>PIM</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($awayteam as $player) : ?>
						<tr>
							<td><?php echo $player['JerseyNo']; ?></td>
							<td><?php echo $player['FullName']; ?> <?php if($player['Captain'] == 'Yes') { echo "<strong>(C)</strong>"; }; ?></td>
							<td><?php echo $player['GP']; ?></td>
							<td><?php echo $player['Goals']; ?></td>
							<td><?php echo $player['Assists']; ?></td>
							<td><?php if($player['PIM'] != FALSE) { echo $player['PIM']; } else { echo "0"; } ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<form id="awayScore" action="<?php echo base_url();?>admin/scorekeeper/save_score/<?php echo $game -> Id; ?>" method="post">
				<input type="hidden" name="teamside" value="away" />			
				<input type="hidden" name="teamid" value="<?php echo $game -> AwayTeamId; ?>" />
				<table class="table">
					<legend>
						Insert Away Team Scoring Play
					</legend>					
					<thead>
						<tr>
							<th>Goal</th>
							<th>Assist</th>
							<th>Assist</th>
							<th>Time of Goal</th>
							<th>Strength</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<select id="awayGoal" class="input-mini" name="goal">
									<option value="">N/A</option>
									<?php foreach($awayteam as $player) : ?>
										<option value="<?php echo $player['PlayerId']; ?>"><?php echo $player['JerseyNo']; ?></option>
									<?php endforeach; ?>
								</select>								
							</td>
							<td>
								<select id="awayPAssist" class="input-mini" name="p_assist">
									<option value="">N/A</option>
									<?php foreach($awayteam as $player) : ?>
										<option value="<?php echo $player['PlayerId']; ?>"><?php echo $player['JerseyNo']; ?></option>
									<?php endforeach; ?>
								</select>
							</td>
							<td>
								<select id="awaySAssist" class="input-mini" name="s_assist">
									<option value="">N/A</option>
									<?php foreach($awayteam as $player) : ?>
										<option value="<?php echo $player['PlayerId']; ?>"><?php echo $player['JerseyNo']; ?></option>
									<?php endforeach; ?>
								</select>
							</td>															
							<td>
								<select id="awayGMinute" class="input-mini" name="minute">
									<?php foreach($twentyminutes as $minute) : ?>
										<?php echo "<option value='$minute'>$minute</option>" ?>
									<?php endforeach; ?>
								</select>
								:
								<select id="awayGSeconds" class="input-mini" name="seconds">
									<?php foreach($sixtyseconds as $seconds) : ?>
										<?php echo "<option value='$seconds'>$seconds</option>" ?>
									<?php endforeach; ?>
								</select>						
							</td>							
							<td>
								<select class="input-medium" name="strength">
									<option value="EV">Even Strength</option>
									<option value="SHG">Short Handed</option>
									<option value="PPG">Power Play</option>
									<option value="4on4">4 on 4</option>
									<option value="3on3">3 on 3</option>
									<option value="PS">Penalty Shot</option>
								</select>
							</td>							
							<td>
								<div class="pull-right">
									<input type="submit" class="btn btn-primary" id="submitAwayScore" value="Save" /> 
								</div>
							</td>
						</tr>						
					</tbody>
				</table>
			</form>

			<?php echo form_open('admin/scorekeeper/save_penalty/' . $game -> Id . '/' . $game -> AwayTeamId); ?>
				<legend>
					Insert Away Penalty
				</legend>				
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Player</th>
							<th>Type</th>
							<th>Time of Penalty</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<select class="awayPenalty input-mini" name="player">
									<option value="">N/A</option>
									<?php foreach($awayteam as $player) : ?>
										<option value="<?php echo $player['PlayerId']; ?>"><?php echo $player['JerseyNo']; ?></option>
									<?php endforeach; ?>
								</select>								
							</td>
							<td>									
								<select class="input-xlarge" name="penalty">
									<?php foreach ($penalty_types as $key => $value) : ?>
										<option value="<?php echo $value; ?>:<?php echo $key; ?>"><?php echo $key; ?></option>
									<?php endforeach; ?>
								</select>
							</td>															
							<td>
								<select class="input-mini" name="minpim">
									<?php foreach($twentyminutes as $minute) : ?>
										<option value="<?php echo $minute ; ?>"><?php echo $minute ; ?></option> ?>
									<?php endforeach; ?>
								</select>
								:
								<select class="input-mini" name="secpim">
									<?php foreach($sixtyseconds as $seconds) : ?>
										<?php echo "<option value='$seconds'>$seconds</option>" ?>
									<?php endforeach; ?>
								</select>						
							</td>														
							<td>
								<div class="pull-right">
									<input type="submit" class="btn btn-primary submitPenalty" value="Save" /> 
								</div>
							</td>
						</tr>						
					</tbody>
				</table>
			</form> 

			<table class="table table-hover">
				<legend>
					Penalty Summary
				</legend>
				<thead>
					<tr>
						<th>Period</th>
						<th>Team</th>
						<th>Time</th>
						<th>Player</th>
						<th>Penalty</th>
						<th>Min</th>
					</tr>
				</thead>
				<tbody>
					<?php if($penalty != FALSE) : ?>
						<?php foreach($penalty as $penalty_data) : ?>
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
					<? endif; ?>
				</tbody>
			</table>
		
		</div>
	</div>
</div>

<script>
// Bootstrap tabs
$('#tabFunction a').click(function (e) {
	e.preventDefault();
	$(this).tab('show');
});
</script>