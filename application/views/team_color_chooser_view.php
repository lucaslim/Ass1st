<style type="text/css">
#redP, #greenP, #blueP, #redS, #greenS, #blueS, #redT, #greenT, #blueT {
			width: 100%;
			margin: 15px 0;
		}
		.swatch {
			width: 100%;
			height: 100px;
			border-radius: 0 80px 0 80px;
			-moz-border-radius: 0 80px 0 80px;
			-webkit-border-radius: 0 80px 0 80px;;
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
	<section id="colorSelector">
		<h4></h4>
		<!-- ////////////////////////////////////////////////////////////////////////////////////// ///////////////////////////////////////////   -->
		<!-- //////////////// STYLE //////////////   -->
		<!-- ///////////////////// Script //////////////   -->
		<script typevar TPrimG = '="text/javascript"'>

		// Primary
		var TPrimR = '<?php echo isset($team) ? $team -> TPrimR : 21; ?>';
		var TPrimG = '<?php echo isset($team) ? $team -> TPrimG : 42; ?>';
		var TPrimB = '<?php echo isset($team) ? $team -> TPrimB : 81; ?>';
		
		// Secondary 
		var TSecR = '<?php echo isset($team) ? $team -> TSecR : 23; ?>';
		var TSecG = '<?php echo isset($team) ? $team -> TSecG : 133; ?>';
		var TSecB = '<?php echo isset($team) ? $team -> TSecB : 75; ?>';

		// Tertiary 
		var TTerR = '<?php echo isset($team) ? $team -> TTerR : 255; ?>';
		var TTerG = '<?php echo isset($team) ? $team -> TTerG : 255; ?>';
		var TTerB = '<?php echo isset($team) ? $team -> TTerB : 255; ?>';


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

			$(".color-main").css( "background-color", "rgb(" + redP + "," + greenP + "," + blueP + ")"  );
			$("#swatchP").css( "background-color", "rgb(" + redP + "," + greenP + "," + blueP + ")"  );
			$("#RGBcolorP").val( "rgb(" + redP + ", " + greenP + ", " +  blueP + ")");
			// $("#hexColor").val("#" + hex);
			$("#primColorR").val( redP );
			$("#primColorG").val( greenP );
			$("#primColorB").val( blueP );


			var redS = $( "#redS" ).slider( "value" );
			var greenS = $( "#greenS" ).slider( "value" );
			var blueS = $( "#blueS" ).slider( "value" );                            

			$(".color-secondary").css( "background-color", "rgb(" + redS+ "," + greenS + "," + blueS + ")"  );
			$("#swatchS").css( "background-color", "rgb(" + redS+ "," + greenS + "," + blueS + ")"  );
			$("#RGBcolorS").val( "rgb(" + redS + ", " + greenS + ", " +  blueS + ")");
			$("#secColorR").val( redS );
			$("#secColorG").val( greenS );
			$("#secColorB").val( blueS );


			var redT = $( "#redT" ).slider( "value" );
			var greenT = $( "#greenT" ).slider( "value" );
			var blueT = $( "#blueT" ).slider( "value" );

			$("#bannerT").css( "color", "rgb(" + redT + "," + greenT + "," + blueT + ")"  );
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
			$( "#redP" ).slider( "value", TPrimR );
			$( "#greenP" ).slider( "value", TPrimG  );
			$( "#blueP" ).slider( "value", TPrimB  );
			
			// Secondary 
			$( "#redS" ).slider( "value", TSecR );
			$( "#greenS" ).slider( "value", TSecG  );
			$( "#blueS" ).slider( "value", TSecB  );

			// Tertiary 
			$( "#redT" ).slider( "value", TTerR );
			$( "#greenT" ).slider( "value", TTerG );
			$( "#blueT" ).slider( "value", TTerB  );
		});


		// Reset Slider
		// Primary
		function resetSliderP() {
			var $sliderRP = $("#redP");
			$sliderRP.slider("value", TPrimR );
			var $sliderGP = $("#greenP");
			$sliderGP.slider("value", TPrimG );
			var $sliderBP = $("#blueP");
			$sliderBP.slider("value", TPrimB );
		}
		//Secondary
		function resetSliderS() {
			var $sliderRS = $("#redS");
			$sliderRS.slider("value", TSecR );
			var $sliderGS = $("#greenS");
			$sliderGS.slider("value", TSecG );
			var $sliderBS = $("#blueS");
			$sliderBS.slider("value", TSecB );
		}
		// Tertiary
		function resetSliderT() {
			var $sliderRT = $("#redT");
			$sliderRT.slider("value", TTerR );
			var $sliderGT = $("#greenT");
			$sliderGT.slider("value", TTerG );
			var $sliderBT = $("#blueT");
			$sliderBT.slider("value", TTerB );
		}

		function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.displayImage').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

		</script> <!-- /////////////////////  HTML  //////////////   -->
		<div id="teamBanner">
			<div class="color-none-top"></div>
			<!--Secondary Color - Import - 17854b -->
			<div class="color-secondary" style="background-color: rgb(<?php echo isset($team) ? $team -> TSecR : 0; ?>, <?php echo isset($team) ? $team -> TSecG : 0; ?>, <?php echo isset($team) ? $team -> TSecB : 0; ?>)"> 
				<img class="transparent-ice secondary-ice" src="<?php echo base_url(); ?>/assets/images/banner/ice_overlay.jpg" />
			</div>
			<!-- Primary Color - Import - 152a51 -->
			<div class="color-main" style="background-color: rgb(<?php echo isset($team) ? $team -> TPrimR : 0; ?>, <?php echo isset($team) ? $team -> TPrimG : 0; ?>, <?php echo isset($team) ? $team -> TPrimB : 0; ?>)"> 
				<img class="transparent-ice main-ice" src="<?php echo base_url(); ?>/assets/images/banner/ice_overlay.jpg" />
				<div id="team-name-banner">
					<!--Tertiary Color - Import - ffffff -->
					<span id="bannerT" style="color: rgb(<?php echo isset($team) ? $team -> TTerR : 0; ?>, <?php echo isset($team) ? $team -> TTerG : 0; ?>, <?php echo isset($team) ? $team -> TTerB : 0; ?>)"> 
						<!-- Team Name - Import -->
						<?php echo isset($team) ? $team -> Name : (isset($default) ? $default["TeamName"] : ''); ?>
					</span>
				</div>
			</div>
			<!--Secondary Color - Import - 17854b -->
			<div class="color-secondary" style="background-color: rgb(<?php echo isset($team) ? $team -> TSecR : 0; ?>, <?php echo isset($team) ? $team -> TSecG : 0; ?>, <?php echo isset($team) ? $team -> TSecB : 0; ?>)">
				<img class="transparent-ice secondary-ice" src="<?php echo base_url(); ?>/assets/images/banner/ice_overlay.jpg" />
			</div>
			<div class="color-none-bottom"></div>
		</div>
		<h3>
			Select Team Colors
		</h3>
		<div class="row-fluid">
			<div class="span4 text-center">
				<h4>
					Primary Color
				</h4>
				<div id="swatchP" class="swatch" style="border: solid black 1px;"></div>
				<div id="redP"></div>
				<div id="greenP"></div>
				<div id="blueP"></div>
				<div>
					<button class="btn btn-info" type="button" onclick='resetSliderP();'>Reset</button>
				</div>
			</div>
			<div class="span4 text-center">
				<h4>
					Secondary Color
				</h4>
				<div id="swatchS" class="swatch" style="border: solid black 1px;"></div>
				<div id="redS"></div>
				<div id="greenS"></div>
				<div id="blueS"></div>
				<div>
					<button class="btn btn-info" type="button" onclick='resetSliderS();'>Reset</button>
				</div>
			</div>
			<div class="span4 text-center">
				<h4>
					Tertiary Color
				</h4>
				<div id="swatchT" class="swatch" style="border: solid black 1px;"></div>
				<div id="redT"></div>
				<div id="greenT"></div>
				<div id="blueT"></div>
				<div>
					<button class="btn btn-info" type="button" onclick='resetSliderT();'>Reset</button>
				</div>
			</div><!-- Hidden Form to hide values // Submits to Database -->
			<?php if($default["ShowUpdate"]): ?>
			<form action="../../Manage_Team/update_colors" method="post">
			<?php endif ?>
				<!-- Primary -->
				<!-- rgb(value) -->
				<input type="hidden" id="RGBcolorP"><br>
				<!-- individual RGB colors to be pulled for the database -->
				 <input type="hidden" id="primColorR" name="primColorR"> <input type="hidden" id="primColorG" name="primColorG"> <input type="hidden" id="primColorB" name="primColorB"><br>
				<!-- Secondary -->
				 <!-- rgb(value) -->
				 <input type="hidden" id="RGBcolorS"><br>
				<!-- individual RGB colors to be pulled for the database -->
				 <input type="hidden" id="secColorR" name="secColorR"> <input type="hidden" id="secColorG" name="secColorG"> <input type="hidden" id="secColorB" name="secColorB"> <!-- Tertiary -->
				 <!-- rgb(value) -->
				 <input type="hidden" id="RGBcolorT"><br>
				<!-- individual RGB colors to be pulled for the database -->
				 <input type="hidden" id="terColorR" name="terColorR"> <input type="hidden" id="terColorG" name="terColorG"> <input type="hidden" id="terColorB" name="terColorB"><br>
				<br>
				<!-- Id for team -->
				 <input type="hidden" id="team_id" name="team_id" value='<?php echo isset($team) ? $team -> Id : 0; ?>'> <!-- Submit new colors to database -->
				<?php if($default["ShowUpdate"]): ?>
				<div class="text-center">
					<input class="btn btn-info" type="submit" value="UPDATE TEAM COLORS">
				</div>	

			<?php endif ?>
			<?php if($default["ShowUpdate"]): ?>
			</form>
			<?php endif ?>
			
			<div style="margin-top:175px;"><h3>
				Upload Photo
			</h3></div>
		 	<div>
            	<input type="file" name="userfile" id="userfile" size="20" onchange="readURL(this);" />
        	</div>
			<div class="span4">
	           	<div class="visible-desktop hidden-phone visible-tablet" style="position:relative; top:-703px; z-index:1;">
	            	<img class="displayImage" src="" alt="Upload Your Team Logo" style="-webkit-filter: drop-shadow(-3px 3px 1px #2F2F2F);
																		            	min-height: 235px;
																					    min-width: 235px;
																					    max-height: 235px;
																					    max-width: 235px;
																					    margin: 6px 0;" />
	            </div>
	            <div class="visible-phone hidden-tablet hidden-desktop" style="position:relative; z-index:1;">
	            	<img class="displayImage" src="" alt="Upload Your Team Logo" style="-webkit-filter: drop-shadow(-3px 3px 1px #2F2F2F);
																		            	min-height: 235px;
																					    min-width: 235px;
																					    max-height: 235px;
																					    max-width: 235px;
																					    margin: 6px 0;" />
	            </div>
	        </div>
		</div>
	</section>
