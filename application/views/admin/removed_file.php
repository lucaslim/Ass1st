
				
			<?php echo form_open('admin/scorekeeper/save_score/' . $game -> Id . '/home'); ?>
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
								<td><?php echo $player -> JerseyNo ?></td>
								<td><?php echo $player -> FullName ?> <?php if($player -> Captain == 'Yes') { echo "<strong>(C)</strong>"; }; ?></td>
								<td><?php echo $player -> GP; ?></td>
								<td><?php echo $player -> Goals; ?></td>
								<td><?php echo $player -> Assists; ?></td>
								<td><?php echo $player -> PIM; ?></td>
								<td><input class="add-goal" name="goal" type="radio" value="<?php echo $player -> UserId; ?>" /></td>
								<td><input class="add-p_assist" name="p_assist" type="radio" value="<?php echo $player -> UserId; ?>" /></td>
								<td><input class="add-s_assist" name="s_assist" type="radio" value="<?php echo $player -> UserId; ?>" /></td>
							</tr>
						<?php endforeach; ?>
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
		<div class="span6" style="display: none;">
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
									<td><?php echo $player -> JerseyNo ?></td>
									<td><?php echo $player -> FullName ?> <?php if($player -> Captain == 'Yes') { echo "<strong>(C)</strong>"; }; ?></td>
									<td><?php echo $player -> GP; ?></td>
									<td><?php echo $player -> Goals; ?></td>
									<td><?php echo $player -> Assists; ?></td>
									<td><?php echo $player -> PIM; ?></td>
									<td><input class="add-goal" name="goal" type="radio" value="<?php echo $player -> UserId; ?>" /></td>
									<td><input class="add-p_assist" name="p_assist" type="radio" value="<?php echo $player -> UserId; ?>" /></td>
									<td><input class="add-s_assist" name="s_assist" type="radio" value="<?php echo $player -> UserId; ?>" /></td>
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