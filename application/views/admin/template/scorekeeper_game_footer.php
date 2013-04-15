</div>
<div class="row-fluid">
	<!-- Scoring Summary -->
	<div class="span6">
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

	<!-- Period Summary -->
	<div class="span6">
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