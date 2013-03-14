<div id="mainContent">
	<div id="leftContent" class="teamProfile bootStrap">
			<h1><?php echo $team -> tname; ?></h1>
			<p>Founded: <?php echo $team -> tfounded; ?></p>
			
			<!-- this is not dynamic -->
			<p>Overall Record: 221 - 43 - 13</p>

			<p><?php echo $team -> tpicture; ?></p>

			<p><a href="<?php echo site_url(); ?>/pages/division/"><?php echo $team -> dname; ?> Division</a></p>

			<table class="table table-hover">
				<thead>
					<tr>
						<th><?php echo $team -> tname; ?> Roster</th>
						<th>Jersey #</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($roster as $player): ?>
					<tr>
						<td><?php echo $player -> FullName ?></td>
						<td><?php echo $player -> JerseyNo ?></td>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
	</div>
</div>