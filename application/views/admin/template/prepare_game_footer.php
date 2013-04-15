		</div>
		<!-- Start Game Button -->
		<div class="row-fluid">
			<div class="span12">
				<?php if($game -> AwayRoster == 1 && $game -> HomeRoster == 1) : ?>
					<a class="btn btn-primary btn-large" href="<?php echo base_url(); ?>admin/scorekeeper/start_game/<?php echo $game -> Id; ?>">Begin Scorekeeper</a>
				<? endif; ?>
			</div>			
		</div>
    </div>