	<!-- Prepare Game Template -->	
		<div class="span6">
			<h3><?php echo $team; ?> Team <small><?php echo $name; ?> (<?php echo $teamid; ?>)</small></h3>
			<?php if($roster == 0) : ?>
				<?php echo form_open('admin/scorekeeper/submit_lineup/' . $gameid . '/' . $teamid . '/' . $team); ?>
					
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
							<?php foreach($data as $player) : ?>
								<tr>
									<td><?php echo $player -> UserId; ?> <?php if($player -> Captain == 'Yes') { echo "<strong>(C)</strong>"; }; ?></td>
									<td><?php echo $player -> JerseyNo; ?></td>
									<td><?php echo $player -> FullName; ?></td>
									<td><?php echo $player -> GP; ?></td>
									<td><input type="checkbox" checked="checked" name="players[]" value="<?php echo $player -> UserId; ?>" /></td>
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
				<p><?php echo $team; ?> Team Lineup Submitted</p>
			<?php endif; ?>
		</div>
