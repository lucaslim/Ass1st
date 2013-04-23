
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
							<td><?php echo $player['PIM']; ?></td>
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
		</div>

		<!-- Away Team Data -->
		<div class="span6">





