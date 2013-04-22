<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1>Scorekeeper <small>(Game ID: <?php echo $game -> Id; ?>)</small></h1>
			<span class="lead">Current Period: </span>
			<div class="btn-group" data-toggle="buttons-radio">
				<?php if($game -> Progress == 1) : ?>
					<a class="btn btn-primary btn-small active" disabled>1</a>
					<a class="btn btn-inverse btn-small" href="<?php echo base_url(); ?>admin/scorekeeper/change_period/<?php echo $game -> Id; ?>/2">2</a>
					<a class="btn btn-inverse btn-small" disabled>3</a>
					<a class="btn btn-inverse btn-small" disabled>OT</a>
				<?php endif; ?>
				
				<?php if($game -> Progress == 2) : ?>
					<a class="btn btn-inverse btn-small" disabled>1</a>
					<a class="btn btn-primary btn-small active" disabled>2</a>
					<a class="btn btn-inverse btn-small" href="<?php echo base_url(); ?>admin/scorekeeper/change_period/<?php echo $game -> Id; ?>/3">3</a>
					<a class="btn btn-inverse btn-small" disabled>OT</a>
				<?php endif; ?>	

				<?php if($game -> Progress == 3) : ?>
					<a class="btn btn-inverse btn-small" disabled>1</a>
					<a class="btn btn-inverse btn-small" disabled>2</a>
					<a class="btn btn-primary btn-small active" disabled>3</a>
					<a class="btn btn-inverse btn-small" onclick="return confirm('Are you sure you wish to enter overtime?');" href="<?php echo base_url(); ?>admin/scorekeeper/change_period/<?php echo $game -> Id; ?>/OT">OT</a>
				<?php endif; ?>									

				<?php if($game -> Progress == 'OT') : ?>
					<a class="btn btn-inverse btn-small" disabled>1</a>
					<a class="btn btn-inverse btn-small" disabled>2</a>
					<a class="btn btn-inverse btn-small" disabled>3</a>
					<a class="btn btn-primary btn-small active" disabled>OT</a>
				<?php endif; ?>
			</div>
			<?php if($game -> Progress == 3 || $game -> Progress == 'OT') : ?>
				<a class="btn btn-primary btn-small" onclick="return confirm('Are you sure you wish to finish the game?');" href="<?php echo base_url(); ?>admin/scorekeeper/finish_game/<?php echo $game -> Id; ?>">Finish Game</a>
			<?php endif; ?>			
		</div>			
	</div>

	<div class="row-fluid">
		<div class="span12">
			<?php if(!empty($_SESSION['message'])) : ?>
				<div class="alert alert-success" style="margin: 10px 0;">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong><?php echo $_SESSION['message']; ?></strong> 
				</div>
			<? endif;?>
		</div>
	</div>	

	<div class="row-fluid">