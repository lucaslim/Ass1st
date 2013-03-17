<div id="header_profile_view">
	<table>
		<tr>
			<td>
				<!-- team logo -->
				<img id="img_team" src="<?php echo base_url(); ?>assets/images/temp/wolverine_login.jpg"/>
			</td>
			<td>
				<!-- player logo -->
				<img id="img_player" src="<?php echo $picture; ?>">
			</td>
			<td>
				<div id="usr_name">
					<a href src="#"><?php echo $full_name; ?>&nbsp;<i class="icon-caret-down icon-large"></i></a>
				</div>
				<div id="usr_options">
					<a href="#<?php echo $id; ?>">Profile</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo base_url(); ?>logout">Log Out</a>
				</div>
			</td>
		</tr>
	</table>
</div>