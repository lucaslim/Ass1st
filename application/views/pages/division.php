<div id="mainContent">
	<div id="leftContent">
		<div class="divisionProfile bootStrap">
			<h1>League Standings</h1>

			<h4></h4>
			<?php $conference_name = ''; $division_name = '';?>

		<?php foreach($teams as $team): ?>
			<?php if($conference_name != $team -> ConferenceName): $conference_name = $team -> ConferenceName;  // check if division name exists already?>
				<h4><?php echo $team -> ConferenceName; // echo division name ?> Conference</h4>
			<?php endif; ?>

			<?php if($division_name != $team -> DivisionName): $division_name = $team -> DivisionName;  // check if division name exists already?>
				<table class="table table-hover">
					<thead>
						<tr>
							<th><?php echo $team -> DivisionName; // echo division name ?> Division</th>
							<th>GP</th>
							<th>W</th>
							<th>L</th>
							<th>T</th>
							<th>GF</th>
							<th>GA</th>
							<th>DIFF</th>
						</tr>
					</thead>
					<tbody>
			<?php endif; ?>	
						<tr>
							<td class="team"><a href="<?php echo base_url(); ?>pages/team/<?php echo $team -> Id; ?>"><?php echo $team -> Name; ?></a></td>
							<td>14</td>
							<td>12</td>
							<td>1</td>
							<td>1</td>
							<td>23</td>
							<td>18</td>
							<th>+5</th>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>			
		</div>
	</div>
	<div id="rightContent">
		<p>Empty</p>
	</div>
</div>
