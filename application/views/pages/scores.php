<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

	<!-- New Row
	====================================================================== -->
	<div class="row-fluid">

		<!-- Place Main Content Here -->
		<div id="leftContent" class="span7">
			<h1 style="margin-bottom: 35px;">Scores for <?php echo date('F d, Y'); ?></h1>

			<?php if($games != FALSE) : ?>
				<?php foreach($games as $game) : ?>
					<div class="gameInfo" style="width: 47.5%; float: left; padding-right: 2.5%;">
						<table class="table">
							<thead>
								<tr>
									<th>
									<?php if($game -> Progress != 'false') : ?>
										<?php echo $game -> Progress; ?>
									<?php else : ?>
										<?php echo $game -> Time; ?>
									<?php endif; ?>
									</th>
									<th>1st</th>
									<th>2nd</th>
									<th>3rd</th>
									<?php if($game -> Progress == '4') : ?>
										<th>OT</th>
									<?php endif; ?>
									<th>T</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<?php echo $game -> HomeTeamName; ?>
									</td>
									<td>
										0
									</td>
									<td>
										0
									</td>
									<td>
										0
									</td>
									<td>
										0
									</td>
								</tr>
								<tr>
									<td>
										<?php echo $game -> AwayTeamName; ?>
									</td>
									<td>
										0
									</td>
									<td>
										0
									</td>
									<td>
										0
									</td>
									<td>
										0
									</td>									
								</tr>																								
							</tbody>
						</table>
						<?php if($game -> Progress != 'false') : ?>
							<p>View Box Score</p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<h3>No games scheduled today</h3>
			<?php endif; ?>	
		</div>


		<!-- Place Sidebar Content Here -->
		<div id="rightContent" class="span5">
			<p>Empty</p>
		</div>
		
	</div>
</div>