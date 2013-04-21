<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

	<!-- New Row 
	====================================================================== -->
	<div class="row-fluid">
		
		<div class="span12">
<!-- 			<div id="ppp_teamBanner" >
				<div id="ppp_tb_holder">
					<img class="ppp_tb_background" src="../../assets/images/banner/ice.jpg" />
					<div id="ppp_tb_team_color_bar_one" style="background-color:#17854b;" ></div>
					<div id="ppp_tb_team_color_bar_two" style="background-color:#152a51;" ></div>
					<div id="ppp_tb_team_color_bar_three" style="background-color:#17854b;" ></div>
					<img class="ppp_tb_bg_overlay" src="../../assets/images/banner/ice_overlay.jpg" />
					<div id="ppp_tb_team_name_color" style="color: #fff;">
						<?php echo $full_name; ?>
					</div>
				</div>
			</div> -->
			
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
						<span style="color: rgb(<?php echo $team -> TTerR; ?>, <?php echo $team -> TTerG; ?>, <?php echo $team -> TTerB; ?>)"> 
							<!-- Team Name - Import -->
							<?php echo $team -> tname; ?>
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
					<img class="team-logo" src="<?php echo base_url(); ?>/assets/images/team-logos/<?php echo $team -> tpicture; ?>" />
				</li>
				<li>
					<h3><?php echo $full_name; ?></h3>
				</li>
				<li><hr /></li>
				<li>
					<strong> <?php echo $team -> tname; ?> </strong>
				</li>
				<li>
					<strong>Rams</strong>
				</li>
				<!-- <li>Profile</li> //have profile link to the players name?-->
				<li><a href="#schedule">Schedule</a></li>
				<li><a href="#standings">Standings</a></li>
				<li><a href="#stats">Stats</a></li>
				<li><a href="#news">News</a></li>
				<li>Previous Team</li>
				<li>
					<a href="<?php echo base_url(); ?>logout">Log Out</a>
				</li>
			</ul>
		</div>

		<div id="ppp_content_container" class="span9">
			<section id="schedule">
				<h4>Schedule</h4>
				<p>
					Maecenas ut varius sapien. Phasellus eu placerat neque. Integer sollicitudin urna sit amet felis dignissim sagittis. Vivamus bibendum interdum neque accumsan cursus. Quisque non est et ipsum consequat sollicitudin. Donec non augue non tortor accumsan molestie. Cras aliquam magna nec leo lacinia elementum. Cras elementum pretium nulla vel sollicitudin. In hac habitasse platea dictumst.
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec massa vel lectus placerat scelerisque at ut mi. Sed vulputate viverra odio, eget malesuada arcu vestibulum ut. Suspendisse hendrerit euismod bibendum. Nulla fermentum fringilla enim id interdum. Curabitur eu elit sit amet neque suscipit fringilla vitae eget purus. Morbi et congue tellus. Donec facilisis nunc at nunc ultrices ac consequat mi vestibulum. Phasellus vel massa sit amet diam tristique convallis ac vitae nisl. Nulla euismod sem et leo feugiat placerat accumsan tellus rhoncus. Cras augue enim, sodales et eleifend id, lacinia non justo. Duis faucibus tortor id nisl pulvinar tincidunt.
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec massa vel lectus placerat scelerisque at ut mi. Sed vulputate viverra odio, eget malesuada arcu vestibulum ut. Suspendisse hendrerit euismod bibendum. Nulla fermentum fringilla enim id interdum. Curabitur eu elit sit amet neque suscipit fringilla vitae eget purus. Morbi et congue tellus. Donec facilisis nunc at nunc ultrices ac consequat mi vestibulum. Phasellus vel massa sit amet diam tristique convallis ac vitae nisl. Nulla euismod sem et leo feugiat placerat accumsan tellus rhoncus. Cras augue enim, sodales et eleifend id, lacinia non justo. Duis faucibus tortor id nisl pulvinar tincidunt.
				</p>
			</section>

			<section id="standings">
				<h4>Standings</h4>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec massa vel lectus placerat scelerisque at ut mi. Sed vulputate viverra odio, eget malesuada arcu vestibulum ut. Suspendisse hendrerit euismod bibendum. Nulla fermentum fringilla enim id interdum. Curabitur eu elit sit amet neque suscipit fringilla vitae eget purus. Morbi et congue tellus. Donec facilisis nunc at nunc ultrices ac consequat mi vestibulum. Phasellus vel massa sit amet diam tristique convallis ac vitae nisl. Nulla euismod sem et leo feugiat placerat accumsan tellus rhoncus. Cras augue enim, sodales et eleifend id, lacinia non justo. Duis faucibus tortor id nisl pulvinar tincidunt.
				</p>
<!-- ////////////////////////////////////////////////////////////////////////////////////// ///////////////////////////////////////////   -->
			<!-- //////////////// STYLE //////////////   -->
					<style type="text/css">
						#red, #green, #blue {
				            width: 300px;
				            margin: 15px;
			        }
			        #swatch {
			            width: 320px;
			            height: 100px;
			            margin: 5px;
			            background-image: none;
			        }
			        #red .ui-slider-range { background: #ef2929; }
			        #red .ui-slider-handle { border-color: #ef2929; }
			        #green .ui-slider-range { background: #8ae234; }
			        #green .ui-slider-handle { border-color: #8ae234; }
			        #blue .ui-slider-range { background: #729fcf; }
			        #blue .ui-slider-handle { border-color: #729fcf; }
					</style>
			<!-- ///////////////////// Script //////////////   -->
					<script type="text/javascript">
						function hexFromRGB(r, g, b) {
				            var hex = [
				                r.toString( 16 ),
				                g.toString( 16 ),
				                b.toString( 16 )
				            ];
				            $.each( hex, function( nr, val ) {
				                if ( val.length === 1 ) {
				                    hex[ nr ] = "0" + val;
				                }
				            });
				            return hex.join( "" ).toUpperCase();
				        }
				        function refreshSwatch(evt, ui) {
				          
				            var red = $( "#red" ).slider( "value" ),
				                    green = $( "#green" ).slider( "option", "value" ),
				                    blue = $( "#blue" ).slider( "value" ),
				                    hex = hexFromRGB( red, green, blue );

				            $( "#swatch" ).css( "background-color", "#" + hex );
				            $("#RGBcolor").val( "rgb(" + red + ", " + green + ", " +  blue + ")");
				             $("#hexColor").val("#" + hex);
				            $("#primaryColorR").val( red );
				            $("#primaryColorG").val( green );
				            $("#primaryColorB").val( blue );
				        }
				        $(function() {
				            $( "#red, #green, #blue" ).slider({
				                orientation: "horizontal",
				                range: "min",
				                max: 255,
				                value: 127,
				                slide: refreshSwatch,
				                change: refreshSwatch
				            });
				            $( "#red" ).slider( "value", <?php echo $team -> TPrimR; ?> );
				            $( "#green" ).slider( "value", <?php echo $team -> TPrimG; ?>  );
				            $( "#blue" ).slider( "value", <?php echo $team -> TPrimB; ?>  );
				        });

					</script>
			<!-- /////////////////////HTML  //////////////   -->

					<div id="swatch" style="border: solid black 1px;" ></div>
					<div id="red"></div>
					<div id="green"></div>
					<div id="blue"></div>
					<input type="text" id="RGBcolor">
					<input type="text" id="hexColor">
					<br />
					<form method="POST" action="">
						<input type="text" id="primaryColorR">
						<input type="text" id="primaryColorG">
						<input type="text" id="primaryColorB">
						<br />
						<input type="submit" name="primaryUpdate" value="Primary Color" />
					</form>
				
<!-- ////////////////////////////////////////////////////////////////////////////////////// ///////////////////////////////////////////   -->

				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec massa vel lectus placerat scelerisque at ut mi. Sed vulputate viverra odio, eget malesuada arcu vestibulum ut. Suspendisse hendrerit euismod bibendum. Nulla fermentum fringilla enim id interdum. Curabitur eu elit sit amet neque suscipit fringilla vitae eget purus. Morbi et congue tellus. Donec facilisis nunc at nunc ultrices ac consequat mi vestibulum. Phasellus vel massa sit amet diam tristique convallis ac vitae nisl. Nulla euismod sem et leo feugiat placerat accumsan tellus rhoncus. Cras augue enim, sodales et eleifend id, lacinia non justo. Duis faucibus tortor id nisl pulvinar tincidunt.
				</p>
				<p>
					Maecenas ut varius sapien. Phasellus eu placerat neque. Integer sollicitudin urna sit amet felis dignissim sagittis. Vivamus bibendum interdum neque accumsan cursus. Quisque non est et ipsum consequat sollicitudin. Donec non augue non tortor accumsan molestie. Cras aliquam magna nec leo lacinia elementum. Cras elementum pretium nulla vel sollicitudin. In hac habitasse platea dictumst.
				</p>
			</section>

			<section id="stats">
				<h4>Stats</h4>

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
				<h4>News</h4>

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