<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

	<!-- New Row
	====================================================================== -->
	<div class="row-fluid">

		<!-- Place Main Content Here -->
		<div class="span8">
				<legend><?php echo $team -> Name; ?></legend>
				<p>Founded: <?php echo $team -> Founded; ?></p>
				
				<!-- this is not dynamic -->
				<p>Overall Record: <?php echo $standings -> Win . ' - ' . $standings -> Lost . ' - ' . $standings -> OvertimeLoss; ?>

				<p>
					<?php if($team -> Picture !='') : ?>
						<img style="max-width: 200px;" src="<?php echo base_url(); ?>uploads/teamlogos/<?php echo $team -> Picture; ?>" />	
					<?php else : ?>
						<img style="max-width: 200px;" src="<?php echo base_url(); ?>uploads/teamlogos/blank_avatar.png" />	
					<?php endif; ?>					
				</p>

				<p><a href="<?php echo base_url(); ?>pages/standings/"><?php echo $team -> DivisionName; ?> Division</a></p>

					<table class="table table-hover">
						<thead>
							<tr>
								<th><?php echo $team -> Name; ?> Roster</th>
								<th>Jersey #</th>
							</tr>
						</thead>
						<tbody>
						<?php if($roster != FALSE) : ?>
							<?php foreach($roster as $player): ?>
									<tr>
										<td><?php echo $player -> FullName ?></td>
										<td><?php echo $player -> JerseyNo ?></td>
									</tr>
							<?php endforeach ?>
						<?php else : ?>
							<tr>
								<td>
									No Roster Data Found
								</td>
							</tr>
						<?php endif; ?>
						</tbody>
					</table>						
		</div>

		<!-- Place Sidebar Content Here -->
		<div class="span4">
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
		</div><!-- /end news list-->
		
		</div>

	</div>
</div>