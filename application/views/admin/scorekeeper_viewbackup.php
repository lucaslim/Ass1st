<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1>Scorekeeper <small>(Game ID: <?php echo $game -> Id; ?>)</small></h1>
			<span class="lead">Current Period: </span>
			<div class="btn-group" data-toggle="buttons-radio">
				<?php if($game -> Progress == 1) : ?>
					<button type="button" class="btn btn-inverse btn-small active">1</button>
				<?php else : ?>
					<button type="button" class="btn btn-inverse btn-small">1</button>
				<?php endif; ?>
				<?php if($game -> Progress == 2) : ?>
					<button type="button" class="btn btn-inverse btn-small active">2</button>
				<?php else : ?>
					<button type="button" class="btn btn-inverse btn-small">2</button>
				<?php endif; ?>
				<?php if($game -> Progress == 3) : ?>
					<button type="button" class="btn btn-inverse btn-small active">3</button>
				<?php else : ?>
					<button type="button" class="btn btn-inverse btn-small">3</button>
				<?php endif; ?>
			</div>			
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
			<h1><?php echo $game -> HomeTeamName; ?> <small>Home Team</small> <span class="pull-right"><?php echo $game -> HomeScore; ?></span></h1>
				
			<?php echo form_open('admin/scorekeeper/save_score/' . $game -> Id . '/' . $game -> HomeTeamId); ?>
				<input type="hidden" name="teamside" value="home" />

				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>GP</th>
							<th>G</th>
							<th>A</th>
							<th>PIM</th>
							<th>Goal</th>
							<th>Assist</th>
							<th>Assist</th>
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
								<td><?php echo $player['PIM'] -> PenaltyMin; ?></td>
								<td><input class="add-goal" name="goal" type="radio" value="<?php echo $player['PlayerId']; ?>" /></td>
								<td><input class="add-p_assist" name="p_assist" type="radio" value="<?php echo $player['PlayerId']; ?>" /></td>
								<td><input class="add-s_assist" name="s_assist" type="radio" value="<?php echo $player['PlayerId']; ?>" /></td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<td colspan="9">
								<div class="pull-right">
									Time of Scoring Play:
									<select class="input-mini" name="minute">
										<?php foreach($twentyminutes as $minute) : ?>
											<?php echo "<option value='$minute'>$minute</option>" ?>
										<?php endforeach; ?>
									</select>

									<select class="input-mini" name="seconds">
										<?php foreach($sixtyseconds as $seconds) : ?>
											<?php echo "<option value='$seconds'>$seconds</option>" ?>
										<?php endforeach; ?>
									</select>						
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="9">
								<div class="pull-right">
									Strength:
									<select class="input-medium" name="strength">
										<option value="EV">Even Strength</option>
										<option value="SHG">Short Handed</option>
										<option value="PPG">Power Play</option>
										<option value="4on4">4 on 4</option>
										<option value="3on3">3 on 3</option>
										<option value="PS">Penalty Shot</option>
									</select>
								</div>	
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="9">
								<div class="pull-right">
									<input type="submit" class="btn btn-primary submitScore" value="Save Scoring Play" /> 
									<button type="button" class="btn btn-danger" name="cancelAll">Cancel</button>
								</div>
							</td>
						</tr>						
					</tfoot>
				</table>
			</form>							
		</div>

		<!-- Away Team Data -->
		<div class="span6">
			<h1><?php echo $game -> AwayTeamName; ?> <small>Home Team</small> <span class="pull-right"><?php echo $game -> AwayScore; ?></span></h1>

			<?php echo form_open('admin/scorekeeper/save_score/' . $game -> Id . '/away'); ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>GP</th>
							<th>G</th>
							<th>A</th>
							<th>PIM</th>
							<th>Goal</th>
							<th>Assist</th>
							<th>Assist</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($awayteam as $player) : ?>
							<tr>
								<tr>
								<td><?php echo $player['JerseyNo']; ?></td>
								<td><?php echo $player['FullName']; ?> <?php if($player['Captain'] == 'Yes') { echo "<strong>(C)</strong>"; }; ?></td>
								<td><?php echo $player['GP']; ?></td>
								<td><?php echo $player['Goals']; ?></td>
								<td><?php echo $player['Assists']; ?></td>
								<td><?php if($player['PIM'] != FALSE) { echo $player['PIM'] -> PenaltyMin; } else { echo "0"; } ?></td>
								<td><input class="add-goal" name="goal" type="radio" value="<?php echo $player['PlayerId']; ?>" /></td>
								<td><input class="add-p_assist" name="p_assist" type="radio" value="<?php echo $player['PlayerId']; ?>" /></td>
								<td><input class="add-s_assist" name="s_assist" type="radio" value="<?php echo $player['PlayerId']; ?>" /></td>
								</tr>
						<?php endforeach; ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="9">
								<div class="pull-right">
									<input type="submit" class="btn btn-primary submitScore" value="Save Scoring Play" /> 
									<button class="btn btn-danger" name="cancelAll">Cancel</button>
								</div>
							</td>
						</tr>
					</tfoot>
				</table>
			</form>
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