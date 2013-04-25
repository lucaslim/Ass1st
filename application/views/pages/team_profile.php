<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

	<!-- New Row
	====================================================================== -->
	<div class="row-fluid">

		<!-- Place Main Content Here -->
		<div id="leftContent" class="teamProfile span8">
				<h1><?php echo $team -> Name; ?></h1>
				<p>Founded: <?php echo $team -> Founded; ?></p>
				
				<!-- this is not dynamic -->
				<p>Overall Record: 221 - 43 - 13</p>

				<p>
					<?php if($team -> Picture !='') : ?>
						<img src="<?php echo base_url(); ?>uploads/teamlogos/<?php echo $team -> Picture; ?>" />	
					<?php else : ?>
						<img src="<?php echo base_url(); ?>uploads/teamlogos/blank_avatar.png" />	
					<?php endif; ?>					
				</p>

				<p><a href="<?php echo base_url(); ?>pages/standings/"><?php echo $team -> DivisionName; ?> Division</a></p>


				<?php if($roster != FALSE) : ?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th><?php echo $team -> Name; ?> Roster</th>
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
				<?php else : ?>
					<h3>No Roster Data Found</h3>
				<?php endif; ?>
		</div>

		<!-- Place Sidebar Content Here -->
		<div id="rightContent" class="span4">
			<!-- /begin news list-->
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