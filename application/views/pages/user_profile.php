<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

	<!-- New Row 
	====================================================================== -->
	<div class="row-fluid">
		
		<div class="span12">

			<div id="teamBanner">
				<div class="color-none-top"></div>
				<!--Secondary Color - Import - 17854b -->
				<div class="color-secondary" style="background-color: rgb(<?php echo $team -> TSecR; ?>, <?php echo $team -> TSecG; ?>, <?php echo $team -> TSecB; ?>)"> 
					<img class="transparent-ice secondary-ice" src="<?php echo base_url(); ?>/assets/images/banner/ice_overlay.jpg" />
				</div>
				<!-- Primary Color - Import - 152a51 -->
				<div class="color-main" style="background-color: rgb(<?php echo $team -> TPrimR; ?>, <?php echo $team -> TPrimG; ?>, <?php echo $team -> TPrimB; ?>)"> 
					<img class="transparent-ice main-ice" src="<?php echo base_url(); ?>/assets/images/banner/ice_overlay.jpg" />
					<div id="team-name-banner">
						<!--Tertiary Color - Import - ffffff -->
						<span id="bannerT" style="color: rgb(<?php echo $team -> TTerR; ?>, <?php echo $team -> TTerG; ?>, <?php echo $team -> TTerB; ?>)"> 
							<!-- Team Name - Import -->
							<?php echo $team -> Name; ?>
						</span>
					</div>
				</div>
				<!--Secondary Color - Import - 17854b -->
				<div class="color-secondary" style="background-color: rgb(<?php echo $team -> TSecR; ?>, <?php echo $team -> TSecG; ?>, <?php echo $team -> TSecB; ?>)">
					<img class="transparent-ice secondary-ice" src="<?php echo base_url(); ?>/assets/images/banner/ice_overlay.jpg" />
				</div>
				<div class="color-none-bottom"></div>
			</div>
		</div>
	</div>

	<!-- New Row 
	====================================================================== -->
	<div class="row-fluid">

		<div id="ppp_menu_container" class="span3">
			<ul id="navbar" data-spy="affix" data-offset-top="160">
				<li class="text-right">
					<img class="team-logo" src="<?php echo base_url(); ?>/uploads/teamlogos/<?php echo $team -> Picture; ?>" />
				</li>
				<li style="margin-top: 25px;">
					<legend><?php echo $full_name; ?> <img class="img-player" src="<?php echo $picture; ?>"></legend>
				</li>
				<li>
					<a href="#"><strong><?php echo $team -> Name; ?> </strong> <img class="img-team" src="<?php echo base_url(); ?>uploads/teamlogos/<?php echo $team -> Picture; ?>" /></a>
				</li>
				<li><a href="#schedule">Schedule</a></li>
				<li><a href="#standings">Standings</a></li>
				<li><a href="#stats">Stats</a></li>
				<li><a href="#news">News</a></li>
				<li>
					<a href="<?php echo base_url(); ?>logout">Log Out</a>
				</li>
			</ul>
		</div>

				
<!-- ////////////////////////////////////////////////////////////////////////////////////// ///////////////////////////////////////////   -->
		<div class="span9" id="ppp_content_container">
			<section id="schedule">
				<legend>Schedule</legend>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Date</th>
							<th>Time</th>
							<th>Home</th>
							<th>Away</th>
							<th>Arena</th>
							<th>Type</th>
							<th>Attending</th>
						</tr>
					</thead>
					<tbody>
						<?php if($schedule != FALSE) : ?>
							<?php foreach ($schedule as $game) : ?>
								<tr>
									<td><?php echo $game -> Date; ?></td>
									<td><?php echo $game -> Time; ?></td>
									<td><a href="<?php echo base_url(); ?>pages/team/<?php echo $game -> HomeTeamId; ?>"><?php echo $game -> HomeTeamName; ?></a></td>
									<td><a href="<?php echo base_url(); ?>pages/team/<?php echo $game -> AwayTeamId; ?>"><?php echo $game -> AwayTeamName; ?></a></td>
									<td><?php echo $game -> ArenaName; ?></td>
									<td><?php echo $game -> MatchTypeName; ?></td>
									<td>Yes / No</td>
								</tr>
							<?php endforeach; ?>
						<?php else : ?>
							<tr>
								<td colspan="7">No upcoming games</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</section>

			<section id="standings">
				<legend>Standings</legend>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec massa vel lectus placerat scelerisque at ut mi. Sed vulputate viverra odio, eget malesuada arcu vestibulum ut. Suspendisse hendrerit euismod bibendum. Nulla fermentum fringilla enim id interdum. Curabitur eu elit sit amet neque suscipit fringilla vitae eget purus. Morbi et congue tellus. Donec facilisis nunc at nunc ultrices ac consequat mi vestibulum. Phasellus vel massa sit amet diam tristique convallis ac vitae nisl. Nulla euismod sem et leo feugiat placerat accumsan tellus rhoncus. Cras augue enim, sodales et eleifend id, lacinia non justo. Duis faucibus tortor id nisl pulvinar tincidunt.
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec massa vel lectus placerat scelerisque at ut mi. Sed vulputate viverra odio, eget malesuada arcu vestibulum ut. Suspendisse hendrerit euismod bibendum. Nulla fermentum fringilla enim id interdum. Curabitur eu elit sit amet neque suscipit fringilla vitae eget purus. Morbi et congue tellus. Donec facilisis nunc at nunc ultrices ac consequat mi vestibulum. Phasellus vel massa sit amet diam tristique convallis ac vitae nisl. Nulla euismod sem et leo feugiat placerat accumsan tellus rhoncus. Cras augue enim, sodales et eleifend id, lacinia non justo. Duis faucibus tortor id nisl pulvinar tincidunt.
				</p>
				<p>
					Maecenas ut varius sapien. Phasellus eu placerat neque. Integer sollicitudin urna sit amet felis dignissim sagittis. Vivamus bibendum interdum neque accumsan cursus. Quisque non est et ipsum consequat sollicitudin. Donec non augue non tortor accumsan molestie. Cras aliquam magna nec leo lacinia elementum. Cras elementum pretium nulla vel sollicitudin. In hac habitasse platea dictumst.
				</p>
			</section>

			<section id="stats">
				<legend>Stats</legend>

				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec massa vel lectus placerat scelerisque at ut mi. Sed vulputate viverra odio, eget malesuada arcu vestibulum ut. Suspendisse hendrerit euismod bibendum. Nulla fermentum fringilla enim id interdum. Curabitur eu elit sit amet neque suscipit fringilla vitae eget purus. Morbi et congue tellus. Donec facilisis nunc at nunc ultrices ac consequat mi vestibulum. Phasellus vel massa sit amet diam tristique convallis ac vitae nisl. Nulla euismod sem et leo feugiat placerat accumsan tellus rhoncus. Cras augue enim, sodales et eleifend id, lacinia non justo. Duis faucibus tortor id nisl pulvinar tincidunt.
				</p>
				<p>
					Maecenas ut varius sapien. Phasellus eu placerat neque. Integer sollicitudin urna sit amet felis dignissim sagittis. Vivamus bibendum interdum neque accumsan cursus. Quisque non est et ipsum consequat sollicitudin. Donec non augue non tortor accumsan molestie. Cras aliquam magna nec leo lacinia elementum. Cras elementum pretium nulla vel sollicitudin. In hac habitasse platea dictumst.
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec massa vel lectus placerat scelerisque at ut mi. Sed vulputate viverra odio, eget malesuada arcu vestibulum ut. Suspendisse hendrerit euismod bibendum. Nulla fermentum fringilla enim id interdum. Curabitur eu elit sit amet neque suscipit fringilla vitae eget purus. Morbi et congue tellus. Donec facilisis nunc at nunc ultrices ac consequat mi vestibulum. Phasellus vel massa sit amet diam tristique convallis ac vitae nisl. Nulla euismod sem et leo feugiat placerat accumsan tellus rhoncus. Cras augue enim, sodales et eleifend id, lacinia non justo. Duis faucibus tortor id nisl pulvinar tincidunt.
				</p>
			</section>

			<section id="news">
				<legend>News</legend>

				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec massa vel lectus placerat scelerisque at ut mi. Sed vulputate viverra odio, eget malesuada arcu vestibulum ut. Suspendisse hendrerit euismod bibendum. Nulla fermentum fringilla enim id interdum. Curabitur eu elit sit amet neque suscipit fringilla vitae eget purus. Morbi et congue tellus. Donec facilisis nunc at nunc ultrices ac consequat mi vestibulum. Phasellus vel massa sit amet diam tristique convallis ac vitae nisl. Nulla euismod sem et leo feugiat placerat accumsan tellus rhoncus. Cras augue enim, sodales et eleifend id, lacinia non justo. Duis faucibus tortor id nisl pulvinar tincidunt.
				</p>
				<p>
					Maecenas ut varius sapien. Phasellus eu placerat neque. Integer sollicitudin urna sit amet felis dignissim sagittis. Vivamus bibendum interdum neque accumsan cursus. Quisque non est et ipsum consequat sollicitudin. Donec non augue non tortor accumsan molestie. Cras aliquam magna nec leo lacinia elementum. Cras elementum pretium nulla vel sollicitudin. In hac habitasse platea dictumst.
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec massa vel lectus placerat scelerisque at ut mi. Sed vulputate viverra odio, eget malesuada arcu vestibulum ut. Suspendisse hendrerit euismod bibendum. Nulla fermentum fringilla enim id interdum. Curabitur eu elit sit amet neque suscipit fringilla vitae eget purus. Morbi et congue tellus. Donec facilisis nunc at nunc ultrices ac consequat mi vestibulum. Phasellus vel massa sit amet diam tristique convallis ac vitae nisl. Nulla euismod sem et leo feugiat placerat accumsan tellus rhoncus. Cras augue enim, sodales et eleifend id, lacinia non justo. Duis faucibus tortor id nisl pulvinar tincidunt.
				</p>
			</section>
		</div>
	</div>
</div>