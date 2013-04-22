<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

	<!-- New Row
	====================================================================== -->
	<div class="row-fluid">

		<!-- Place Main Content Here -->
		<div id="leftContent" class="span12">

			<legend>Upcoming Schedule <small><?php echo $links; ?></small></legend>
			<?php if($games != FALSE) : ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Type</th>
							<th>Season</th>
							<th>Home</th>
							<th>Away</th>
							<th>Location</th>
							<th>Date</th>
							<th>Time</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($games as $game): ?>
							<tr>
								<td><?php echo $game -> Id; ?></td>
								<td><?php echo $game -> MatchTypeName; ?></td>
								<td><?php echo $game -> SeasonYear; ?></td>
								<td><a href="<?php echo base_url(); ?>pages/team/<?php echo $game -> HomeTeamId; ?>"><?php echo $game -> HomeTeamName; ?></a></td>
								<td><a href="<?php echo base_url(); ?>pages/team/<?php echo $game -> AwayTeamId; ?>"><?php echo $game -> AwayTeamName; ?></a></td>
								<td><?php echo $game -> ArenaName; ?></td>
								<td><?php echo $game -> Date; ?></td>
								<td><?php echo $game -> Time; ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="7"><?php echo $links; ?></td>
						</tr>
					</tfoot>
				</table>
				<p>Total Scheduled Games: <?php echo $totalrow; ?></p>
			<?php else : ?>
				<h3>No games found</h3>
				<p><a href="<?php echo base_url(); ?>admin/scorekeeper/add_game">Schedule a Game</a></p>
			<?php endif; ?>

		</div>
	</div>
</div>