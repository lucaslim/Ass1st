<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

	<!-- New Row
	====================================================================== -->
	<div class="row-fluid">

		<!-- Place Main Content Here -->
		<?php if(!empty($playerinfo) && !empty($playerscoring)) : ?>
			
		<div class="row-fluid">
			<div class="span8">
				<legend>Player Profile: <?= $playerinfo -> FullName; ?></legend>
				<table class="table">
					<thead>
						<tr>
							<th>Team</th>
							<th>Games Played</th>
							<th>Goals</th>
							<th>Assists</th>
							<th>Points</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><a href="<?php echo base_url(); ?>pages/team/<?= $teaminfo[0] -> TeamId; ?>"><?= $teaminfo[0] -> Name; ?></a></td>
							<td><?= $playerscoring['GP']; ?></td>
							<td><?= $playerscoring['Goals']; ?></td>
							<td><?= $playerscoring['Assists']; ?></td>
							<td><?= $playerscoring['PIM']; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="span4">
				<!-- player logo -->
		        <?php $string = 'https://fbcdn-profile';
		            $imgpath = $playerinfo -> Picture; ?>				
		        <?php if (strpos($imgpath, $string) === false ) : ?>
		    		<p><img class="img-polaroid" style="max-width: 100%; max-height: 100%;" id="img" src="<?php echo base_url();?>uploads/playerlogo/<?php echo $playerinfo -> Picture; ?>" alt="your image" /></p>
		        <?php else : ?>
		            <p><img class="img-polaroid" style="max-width: 100%; max-height: 100%;" id="img" src="<?php echo $playerinfo -> Picture; ?>" alt="your image" /></p>
		        <?php endif; ?>
		        <legend>Player Info</legend>
		        <blockquote>
		        	<p>Gender: <?= $playerinfo -> Gender; ?></p>
		        	<p>Date of Birth: <?= $playerinfo -> DateOfBirth; ?></p>
		        	<p>Weight: <?= $playerinfo -> Weight; ?></p>
		        	<p>Height: <?= $playerinfo -> Height; ?></p>
		        	<p>Country: <?= $playerinfo -> CountryName; ?></p>
		        	<p>City: <?= $playerinfo -> City; ?></p>
		        </blockquote>
			</div>					
		</div>
	<?php else : ?>
	<div class="span12">
		<p class="lead">Player not found</p>
	</div>
	<?php endif;?>
	</div>
</div>