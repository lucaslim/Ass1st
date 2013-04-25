<ul class="nav pull-right player-controls">
    <li>
		<!-- player logo -->
        <?php $string = 'https://fbcdn-profile';
            $imgpath = $picture; ?>
        
        <?php if (strpos($imgpath, $string) === false ) : ?>
    		<img class="img-player" id="img" src="<?php echo base_url();?>uploads/playerlogo/<?php echo $picture; ?>" alt="your image" />
        <?php else : ?>
            <img class="img-player" id="img" src="<?php echo $picture ?>" alt="your image" />
        <?php endif; ?>
    </li>
    <li>
    	<!-- player controls -->
		<div class="dropdown pull-right">
			<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
				<?php echo $full_name; ?> <b class="caret white-caret"></b>
			</a>
			<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
				<?php if($team) : ?>
					<li><a href="<?php echo base_url(); ?>pages/user_profile"><?php echo $team[1]; ?></a></li>
				<?php endif; ?>				
				<li><a href="<?php echo base_url(); ?>edit_profile">Edit My Info</a></li>
				<?php if($captain == 1) : ?>
						<li class="divider"></li>
					<li><a href="<?php echo base_url(); ?>edit_team_profile">Edit Team Profile</a></li>
					<li><a href="<?php echo base_url(); ?>pages/invite_users">Invite Players</a></li>
				<?php endif; ?>				
				<li class="divider"></li>
				<li><a href="<?php echo base_url(); ?>logout">Log Out</a></li>
			</ul>
		</div>    	
    </li>
</ul>