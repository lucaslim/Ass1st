<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1>Create Game Lineups <small>(Game ID: <?php echo $game -> Id; ?>)</small></h1>
			
			<?php if(!empty($_SESSION['message'])) : ?>
				<div class="alert alert-success">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong><?php echo $_SESSION['message']; ?></strong> 
				</div>
			<? endif;?>
		</div>
	</div>
	<div class="row-fluid">
