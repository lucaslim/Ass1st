<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

	<!-- New Row
	====================================================================== -->
	<div class="row-fluid">

		<!-- Place Main Content Here -->
		<div id="leftContent" class="span8">
			<legend>Scores for <?php echo date('F d, Y'); ?></legend>

			<?php if($games != FALSE) : ?>
				<?php foreach($games as $game) : ?>
					<div class="gameInfo" style="width: 47.5%; float: left; padding-right: 2.5%;">
						<table class="table">
							<thead>
								<tr>
									<th>
									<?php if($game['Progress'] != 'false') : ?>
										<?php echo $game['Progress']; ?>
									<?php else : ?>
										<?php echo $game['Time']; ?>
									<?php endif; ?>
									</th>
									<th>1st</th>
									<th>2nd</th>
									<th>3rd</th>
									<?php if($game['Progress'] == 'Overtime') : ?>
										<th>OT</th>
									<?php endif; ?>
									<th>T</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<?php echo $game['HomeTeamName']; ?>
									</td>
									<td>
										<?php echo $game['HomeTeamScore'][1]; ?>
									</td>
									<td>
										<?php echo $game['HomeTeamScore'][2]; ?>
									</td>
									<td>
										<?php echo $game['HomeTeamScore'][3]; ?>
									</td>
									<?php if($game['Progress'] == 'Overtime') : ?>
										<td>
											<?php echo $game['HomeTeamScore'][4]; ?>
										</td>
									<?php endif; ?>
									<td>
										<?php echo ($game['HomeTeamScore'][1] + $game['HomeTeamScore'][2] + $game['HomeTeamScore'][3] + $game['HomeTeamScore'][4]); ?>
									</td>
								</tr>
								<tr>
									<td>
										<?php echo $game['AwayTeamName']; ?>
									</td>
									<td>
										<?php echo $game['AwayTeamScore'][1]; ?>
									</td>
									<td>
										<?php echo $game['AwayTeamScore'][2]; ?>
									</td>
									<td>
										<?php echo $game['AwayTeamScore'][3]; ?>
									</td>
									<?php if($game['Progress'] == 'Overtime') : ?>
										<td>
											<?php echo $game['AwayTeamScore'][4]; ?>
										</td>
									<?php endif; ?>	
									<td>
										<?php echo ($game['AwayTeamScore'][1] + $game['AwayTeamScore'][2] + $game['AwayTeamScore'][3] + $game['AwayTeamScore'][4]); ?>
									</td>																	
								</tr>																								
							</tbody>
						</table>
						<?php if($game['Progress'] != 'false') : ?>
							<p><a href="<?php echo base_url(); ?>pages/boxscore/<?php echo $game['GameId']; ?>">View Box Score</a></p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<h3>No games scheduled today</h3>
			<?php endif; ?>	
		</div>


		<!-- Place Sidebar Content Here -->
		<div id="rightContent" class="newsSidebar span4">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Latest Headlines</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($headlines as $news_item): ?>
				    <tr>
				    	<td style="font-weight: 200;">
				    		<a href="<?php echo site_url(); ?>pages/news/<?php echo $news_item -> Id ?>"><?php echo $news_item -> Title ?></a><br />
				    		<small style="font-size: .8em;">Posted: <?php echo $news_item -> PostDate; ?></small>
				    	</td>
				    </tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>
		
	</div>
</div>