<div id="mainContent">
	<div id="leftContent" class="teamProfile">
			<h1><?php echo $team -> tname; ?></h1>
			<p><?php echo $team -> tfounded; ?></p>
			
			<!-- this is not dynamic -->
			<p>Overall Record: 221 - 43 - 13</p>

			<p><?php echo $team -> tpicture; ?></p>

			<p><a href="<?php echo site_url(); ?>/pages/division/"><?php echo $team -> dname; ?> Division</a></p>


	</div>
</div>