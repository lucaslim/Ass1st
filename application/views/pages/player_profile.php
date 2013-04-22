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
					<img class="team-logo" src="<?php echo base_url(); ?>/assets/images/team-logos/<?php echo $team -> Picture; ?>" />
				</li>
				<li>
					<h3><?php echo $full_name; ?></h3>
				</li>
				<li><hr /></li>
				<li>
					<strong> <?php echo $team -> Name; ?> </strong>
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
						#redP, #greenP, #blueP, #redS, #greenS, #blueS, #redT, #greenT, #blueT {
				            width: 100%;
				            margin: 15px 5px;
				        }
				        .swatch {
				            width: 100%;
				            height: 100px;
				            margin: 5px;
				            background-image: none;
				        }
				        #redP .ui-slider-range { background: #ef2929; }
				        #redP .ui-slider-handle { border-color: #ef2929; }
				        #greenP .ui-slider-range { background: #8ae234; }
				        #greenP .ui-slider-handle { border-color: #8ae234; }
				        #blueP .ui-slider-range { background: #729fcf; }
				        #blueP .ui-slider-handle { border-color: #729fcf; }

				        #redS .ui-slider-range { background: #ef2929; }
				        #redS .ui-slider-handle { border-color: #ef2929; }
				        #greenS .ui-slider-range { background: #8ae234; }
				        #greenS .ui-slider-handle { border-color: #8ae234; }
				        #blueS .ui-slider-range { background: #729fcf; }
				        #blueS .ui-slider-handle { border-color: #729fcf; }

				        #redT .ui-slider-range { background: #ef2929; }
				        #redT .ui-slider-handle { border-color: #ef2929; }
				        #greenT .ui-slider-range { background: #8ae234; }
				        #greenT .ui-slider-handle { border-color: #8ae234; }
				        #blueT .ui-slider-range { background: #729fcf; }
				        #blueT .ui-slider-handle { border-color: #729fcf; }
					</style>

			<!-- ///////////////////// Script //////////////   -->
					<script type="text/javascript">
						function RGB(r, g, b) {
				            var rgbValue = [
				                r.toString( 16 ),
				                g.toString( 16 ),
				                b.toString( 16 )
				            ];
				            // $.each( hex, function( nr, val ) {
				            //     if ( val.length === 1 ) {
				            //         hex[ nr ] = "0" + val;
				            //     }
				            // });
				            // return hex.join( "" ).toUpperCase();
				        }
				        function refreshSwatch(evt, ui) {
				          
				            var redP = $( "#redP" ).slider( "value" );
				            var greenP = $( "#greenP" ).slider( "value" );
				            var blueP = $( "#blueP" ).slider( "value" );	

				            $("#swatchP").css( "background-color", "rgb(" + redP + "," + greenP + "," + blueP + ")"  );
				            $("#RGBcolorP").val( "rgb(" + redP + ", " + greenP + ", " +  blueP + ")");
				            // $("#hexColor").val("#" + hex);
				            $("#primColorR").val( redP );
				            $("#primColorG").val( greenP );
				            $("#primColorB").val( blueP );


				            var redS = $( "#redS" ).slider( "value" );
				            var greenS = $( "#greenS" ).slider( "value" );
				            var blueS = $( "#blueS" ).slider( "value" );				            

				            $("#swatchS").css( "background-color", "rgb(" + redS+ "," + greenS + "," + blueS + ")"  );
				            $("#RGBcolorS").val( "rgb(" + redS + ", " + greenS + ", " +  blueS + ")");
				            $("#secColorR").val( redS );
				            $("#secColorG").val( greenS );
				            $("#secColorB").val( blueS );


				            var redT = $( "#redT" ).slider( "value" );
				            var greenT = $( "#greenT" ).slider( "value" );
				            var blueT = $( "#blueT" ).slider( "value" );

				            $("#swatchT").css( "background-color", "rgb(" + redT + "," + greenT + "," + blueT + ")"  );
				            $("#RGBcolorT").val( "rgb(" + redT + ", " + greenT + ", " +  blueT + ")");
				            $("#terColorR").val( redT );
				            $("#terColorG").val( greenT );
				            $("#terColorB").val( blueT );
				        }
				        


				        // Slider 
				        $(function() {
				            $( "#redP, #greenP, #blueP, #redS, #greenS, #blueS, #redT, #greenT, #blueT" ).slider({
				                orientation: "horizontal",
				                range: "min",
				                max: 255,
				                slide: refreshSwatch,
				                change: refreshSwatch
				            });
							// Slider Colors -- from database
				            // Primary 
				            $( "#redP" ).slider( "value", <?php echo $team -> TPrimR; ?> );
				            $( "#greenP" ).slider( "value", <?php echo $team -> TPrimG; ?>  );
				            $( "#blueP" ).slider( "value", <?php echo $team -> TPrimB; ?>  );
				           	
				            // Secondary 
				            $( "#redS" ).slider( "value", <?php echo $team -> TSecR; ?> );
				            $( "#greenS" ).slider( "value", <?php echo $team -> TSecG; ?>  );
				            $( "#blueS" ).slider( "value", <?php echo $team -> TSecB; ?>  );

				            // Tertiary 
				            $( "#redT" ).slider( "value", <?php echo $team -> TTerR; ?> );
				            $( "#greenT" ).slider( "value", <?php echo $team -> TTerG; ?>  );
				            $( "#blueT" ).slider( "value", <?php echo $team -> TTerB; ?>  );
				        });

						function resetSliderP() {
							var $sliderRP = $("#redP");
							$sliderRP.slider("value", <?php echo $team -> TPrimR; ?> );
							var $sliderGP = $("#greenP");
							$sliderGP.slider("value", <?php echo $team -> TPrimG; ?> );
							var $sliderBP = $("#blueP");
							$sliderBP.slider("value", <?php echo $team -> TPrimB; ?> );
						}

						function resetSliderS() {
							var $sliderRS = $("#redS");
							$sliderRS.slider("value", <?php echo $team -> TSecR; ?> );
							var $sliderGS = $("#greenS");
							$sliderGS.slider("value", <?php echo $team -> TSecG; ?> );
							var $sliderBS = $("#blueS");
							$sliderBS.slider("value", <?php echo $team -> TSecB; ?> );
						}

						function resetSliderT() {
							var $sliderRT = $("#redT");
							$sliderRT.slider("value", <?php echo $team -> TTerR; ?> );
							var $sliderGT = $("#greenT");
							$sliderGT.slider("value", <?php echo $team -> TTerG; ?> );
							var $sliderBT = $("#blueT");
							$sliderBT.slider("value", <?php echo $team -> TTerB; ?> );
						}

					</script>
			<!-- /////////////////////  HTML  //////////////   -->

			<div class="row-fluid">
		
				<div class="span4">
					<div id="swatchP" class="swatch" style="border: solid black 1px;" ></div>
					<div id="redP"></div>
					<div id="greenP"></div>
					<div id="blueP"></div>
					<input type="text" id="RGBcolorP">
					<!-- <input type="text" id="hexColor"> -->
					<br />
					<form method="POST" action="">
						<input type="text" id="primColorR">
						<input type="text" id="primColorG">
						<input type="text" id="primColorB">
						<br />
						<button type="button" onclick='resetSliderP();'>Reset</button> 
					</form>
				</div>

				<div class="span4">
					<div id="swatchS" class="swatch" style="border: solid black 1px;" ></div>
					<div id="redS"></div>
					<div id="greenS"></div>
					<div id="blueS"></div>
					<input type="text" id="RGBcolorS">
					<!-- <input type="text" id="hexColor"> -->
					<br />
					<form method="POST" action="">
						<input type="text" id="secColorR">
						<input type="text" id="secColorG">
						<input type="text" id="secColorB">
						<br />
						<button type="button" onclick='resetSliderS();'>Reset</button> 
					</form>
				</div>

				<div class="span4">
					<div id="swatchT" class="swatch" style="border: solid black 1px;" ></div>
					<div id="redT"></div>
					<div id="greenT"></div>
					<div id="blueT"></div>
					<input type="text" id="RGBcolorT">
					<!-- <input type="text" id="hexColor"> -->
					<br />
					<form method="POST" action="">
						<input type="text" id="terColorR">
						<input type="text" id="terColorG">
						<input type="text" id="terColorB">
						<br />
						<button type="button" onclick='resetSliderT();'>Reset</button> 
					</form>
				</div>

			</div>
				
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