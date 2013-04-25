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
				<?php else : ?>
					<tr>
						<td colspan="6">
							No Roster Data Found
						</td>
					</tr>
				<?php endif; ?>
				</tbody>
			</table>						
		</div>

		<!-- Place Sidebar Content Here -->
		<div class="span4">
			<p>
				<?php if($team -> Picture !='') : ?>
					<img style="max-width: 100%; max-height: 100%" class="img-polaroid" src="<?php echo base_url(); ?>uploads/teamlogos/<?php echo $team -> Picture; ?>" />	
				<?php else : ?>
					<img style="max-width: 100%; max-height: 100%" class="img-polaroid" src="<?php echo base_url(); ?>uploads/teamlogos/blank_avatar.png" />	
				<?php endif; ?>					
			</p>			
			<legend>Team Info</legend>
			<blockquote>
				<p><a href="<?php echo base_url(); ?>pages/standings/"><?php echo $team -> DivisionName; ?> Division</a></p>
				<p>Founded: <?php echo $team -> Founded; ?></p>
				<p>Overall Record: <?php echo $standings -> Win . ' - ' . $standings -> Lost . ' - ' . $standings -> OvertimeLoss; ?>
			</blockquote>
		</div><!-- /end news list-->
		<?php else : ?>
			<p class="lead">No team data found</p>
		<?php endif; ?>
		

	</div></div>
</div>