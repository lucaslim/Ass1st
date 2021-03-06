<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

	<!-- New Row
	====================================================================== -->
	<div class="row-fluid">

		<div id="leftContent" class="span12">
			<div class="divisionProfile bootStrap">
				<legend>Division Standings</legend>

				<h4></h4>
				<?php $conference_name = ''; $division_name = '';?>

			<?php foreach($teams as $team): ?>
				<?php if($conference_name != $team -> ConferenceName): $conference_name = $team -> ConferenceName;  // check if division name exists already?>
					<p class="lead"><?php echo $team -> ConferenceName; // echo division name ?> Conference</p>
				<?php endif; ?>

				<?php if($division_name != $team -> DivisionName): $division_name = $team -> DivisionName;  // check if division name exists already?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th style="width: 40%;"><?php echo $team -> DivisionName; ?> Division</th>
								<th>GP</th>
								<th>W</th>
								<th>L</th>
								<th>OT</th>
								<th>P</th>
								<th>GF</th>
								<th>GA</th>
								<th>DIFF</th>
							</tr>
						</thead>
						<tbody>
				<?php endif; ?>	
							<tr>
								<td style="width: 40%;"><a href="<?php echo base_url(); ?>pages/team/<?php echo $team -> Id; ?>"><?php echo $team -> Name; ?></a></td>
								<td><?php echo $team -> GP; ?></td>
								<td><?php echo $team -> Win; ?></td>
								<td><?php echo $team -> Lost; ?></td>
								<td><?php echo $team -> OvertimeLoss; ?></td>
								<td><?php echo $team -> P; ?></td>
								<td><?php echo $team -> GF; ?></td>
								<td><?php echo $team -> GA; ?></td>
								<td><?php echo $team -> DIFF; ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>			
			</div>
		</div>
	
	</div>
</div>