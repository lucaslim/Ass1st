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
			<ul id="navbar" data-spy="affix" data-offset-top="225">
				<li class="text-right">
					<img class="team-logo" src="<?php echo base_url(); ?>/uploads/teamlogos/<?php echo $team -> Picture; ?>" />
				</li>
				<li style="margin-top: 50px;">
					<legend>
						<?php echo $full_name; ?>
				        <?php $string = 'https://fbcdn-profile';
				            $imgpath = $picture; ?>
				        
				        <?php if (strpos($imgpath, $string) === false ) : ?>
				    		<img class="img-player" id="img" src="<?php echo base_url();?>uploads/playerlogo/<?php echo $picture; ?>" alt="your image" />
				        <?php else : ?>
				            <img class="img-player" id="img" src="<?php echo $picture ?>" alt="your image" />
				        <?php endif; ?>
					</legend>
				</li>
				<li>
					<a href="#"><strong><?php echo $team -> Name; ?> </strong> <img class="img-team" src="<?php echo base_url(); ?>uploads/teamlogos/<?php echo $team -> Picture; ?>" /></a>
				</li>
				<li><a href="#chat">Team Messages</a></li>
				<li><a href="#schedule">Schedule</a></li>
				<li><a href="#standings">Standings</a></li>
				<li><a href="#stats">Stats</a></li>
				<li><a href="#news">News</a></li>
				<li>
					<a href="<?php echo base_url(); ?>logout">Log Out</a>
				</li>
			</ul>
		</div>

		<div class="span9" id="ppp_content_container">

			<script type="text/javascript">
				var base_url = "<?php echo base_url();?>";
				var chat_id;
				var user_id;
			</script>

			<section id="chat">
				<legend>Team Messages</legend>
				<?php $this->load->view('view_chat'); ?>
			</section>

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
									<td>
										<?php if($game -> MatchAttendance == 'Yes') : ?>
								            <input type="radio" id="attendance_yes" name="<?php echo $game -> Id; ?>" checked value="Yes" onclick="rsvp_attendance('<?php echo $game -> Id; ?>', this);"> Yes
								            <input type="radio" id="attendance_no" name="<?php echo $game -> Id; ?>" value="No" onclick="rsvp_attendance('<?php echo $game -> Id; ?>', this);"> No										
										<?php else : ?>
								            <input type="radio" id="attendance_yes" name="<?php echo $game -> Id; ?>" value="Yes" onclick="rsvp_attendance('<?php echo $game -> Id; ?>', this);"> Yes
								            <input type="radio" id="attendance_no" name="<?php echo $game -> Id; ?>" checked value="No" onclick="rsvp_attendance('<?php echo $game -> Id; ?>', this);"> No										
										<?php endif; ?>
							        	<!-- Set Match Fixture Id Dynamically -->
									</td>
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
				<table class="table table-hover">
					<thead>
						<th><?php echo $team -> DivisionName; ?> Division</th>
						<th>GP</th>
						<th>W</th>
						<th>L</th>
						<th>OT</th>
						<th>P</th>
						<th>GF</th>
						<th>GA</th>
						<th>DIFF</th>
					</thead>
					<tbody>
					<?php if($standings != FALSE) : ?>	
						<?php foreach($standings as $team) : ?>
						<tr>
							<td><a href="<?php echo base_url(); ?>pages/team/<?php echo $team -> Id; ?>"><?php echo $team -> Name; ?></a></td>
							<td><?php echo $team -> GP; ?></td>
							<td><?php echo $team -> Win; ?></td>
							<td><?php echo $team -> Lost; ?></td>
							<td><?php echo $team -> OvertimeLoss; ?></td>
							<td><?php echo $team -> P; ?></td>
							<td><?php echo $team -> GF; ?></td>
							<td><?php echo $team -> GA; ?></td>
							<td><?php echo $team -> DIFF; ?></td>
						</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td colspan="9">No data available</td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
			</section>

			<section id="stats">
				<legend>My Player Statistics</legend>
				<table class="table">
					<thead>
						<th>Games Played</th>
						<th>Goals</th>
						<th>Assists</th>
						<th>Points</th>
						<th>Penalties</th>
					</thead>
					<tbody>
					<?php if($statistics != FALSE) : ?>	
						<tr>
							<td><?php echo $statistics['GP']; ?></td>
							<td><?php echo $statistics['Goals']; ?></td>
							<td><?php echo $statistics['Assists']; ?></td>
							<td><?php echo $statistics['Goals'] + $statistics['Assists']; ?></td>
							<td><?php echo $statistics['PIM']; ?></td>
						</tr>
					<?php else : ?>
						<tr>
							<td colspan="9">No data available</td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
			</section>

			<section id="news">
				<legend>League News</legend>
				<dl>
					<?php foreach($headlines as $news_item): ?>
					    <dd>
					    	<a href="<?php echo base_url(); ?>pages/news/<?php echo $news_item -> Id ?>"><?php echo $news_item -> Title ?></a><br />
				    	</dd>
				    	<dd style="margin-bottom: 15px;">
				    		<small style="font-size: .8em;">Posted: <?php echo $news_item -> PostDate; ?></small>
					    </dd>
					<?php endforeach ?>
				</dl>
			</section>
		</div>
	</div>
</div>	