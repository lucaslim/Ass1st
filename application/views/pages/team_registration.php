<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

	<!-- New Row
	====================================================================== -->
	<div class="row-fluid">

		<div style="width:100%; background-color:darkred; color:white;
		-webkit-border-top-left-radius: 15px;
		-webkit-border-top-right-radius: 15px;
		-moz-border-radius-topleft: 15px;
		-moz-border-radius-topright: 15px;
		border-top-left-radius: 15px;
		border-top-right-radius: 15px;">
			<div style="padding:0 5%;"><h2>Team Registration</h2></div>
		</div>

		<div style="width:60%; background-color:navy; color:white;
			-webkit-border-top-right-radius: 10px;
			-webkit-border-bottom-right-radius: 10px;
			-moz-border-radius-topright: 10px;
			-moz-border-radius-bottomright: 10px;
			border-top-right-radius: 10px;
			border-bottom-right-radius: 10px;">
				<div style="padding:0px 5%;"><h3>Team Representative Information</h3>
			</div>
		</div>
	</div>

		<!-- Place Main Content Here -->
		<div id="leftContent" class="span7">

		<p>Accurate e-mail addresses and mobile telephone numbers are CRITICAL in order for the league organizers to contact both the captains and other players on each team. A confirmation e-mail will be sent to all team members once your team registration is complete.</p>


			<div class="team-rep-info" style="width: 100%; float: left; padding-right: 2.5%;">
				<table class="table">
					<fieldset>
						<!-- First Name -->
						<div class="row-fluid">
				  			<div class="span3">
			                    First Name:				  				
				  			</div>
				  			<div class="span9">
			                    <input class="input-med" type="text" name="first_name" id="first_name" value="Lucas" disabled="disabled"/>				  				
				  			</div>
				  		</div>
				  		<!-- Last Name -->
						<div class="row-fluid">
				  			<div class="span3">
			                    Last Name:				  				
				  			</div>
				  			<div class="span9">
				  				<input class="input-med" type="text" name="last_name" id="last_name" value="Lucas" disabled="disabled"  />
				  			</div>
				  		</div>
				  		<!-- Gender -->
						<div class="row-fluid">
				  			<div class="span3">
			                    Gender:				  				
				  			</div>
							<div class="span9">
								
								<select class="input-full" name="ddl_gender">
									<option value="" disabled="disabled"></option>
									<?php foreach($gender as $item => $value):?>
									<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
									<?php endforeach; ?>
								</select>									
							</div>
						</div>
				  		<!-- Birthday -->
						<div class="row-fluid">
				  			<div class="span3">
			                    Birthday:				  				
				  			</div>
				  			<!-- Month -->
				  			<div class="span3">
			                    <select class="input-med" name="dob_month">
									<option value="" disabled="disabled"></option>
									<?php foreach($dob_month as $item => $value):?>
									<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<!-- Day -->
							<div class="span3">
								<select class="input-med" name="dob_day">
									<option value="" disabled="disabled"></option>
									<?php foreach($dob_day as $item => $value):?>
									<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
									<?php endforeach; ?>
								</select>									
							</div>
							<!-- Year -->
							<div class="span3">
								
								<select class="input-med" name="dob_year">
									<option value="" disabled="disabled"></option>
									<?php foreach($dob_year as $item => $value):?>
									<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
									<?php endforeach; ?>
								</select>									
							</div>
				  		</div>
	                	<!-- Email -->
				  		<div class="row-fluid">
				  			<div class="span3">
			                    Email:				  				
				  			</div>
				  			<div class="span9">
			                    <input class="input-med" type="text" name="email" id="email" class="long" value="Email" />
				  			</div>
				  		</div>
				  		<!-- Phone -->
				  		<div class="row-fluid">
				  			<div class="span3">
			                    Phone:				  				
				  			</div>
				  			<div class="span9">
								<input class="input-med" type="text" name="phone" id="phone" value="Phone"  />
				  			</div>
				  		</div>
				  		<!-- Address -->
				  		<div class="row-fluid">
				  			<div class="span3">
			                    Address:				  				
				  			</div>
				  			<div class="span9">
								<input class="input-med" type="text" name="address" id="address" value="Address"  />
				  			</div>
				  		</div>
				  		<!-- City -->
				  		<div class="row-fluid">
				  			<div class="span3">
			                    City:				  				
				  			</div>
				  			<div class="span9">
								<input class="input-med" type="text" name="city" id="city" value="City"  />
				  			</div>
				  		</div>
				  		<!-- Province -->
						<div class="row-fluid">
				  			<div class="span3">
			                    Province:				  				
				  			</div>
							<div class="span9">
								<select class="input-full" name="ddl_province">
									<option value="" disabled="disabled">Province</option>
								</select>									
							</div>
						</div>
						<!-- Postal Code -->
				  		<div class="row-fluid">
				  			<div class="span3">
			                    Postal Code:				  				
				  			</div>
				  			<div class="span9">
								<input class="input-med" type="text" name="postal" id="postal" value="Postal"  />
				  			</div>
				  		</div>
						<div class="row-fluid">
							<div class="span6 text-right">
			                    <input class="btn btn-info" type="submit" value="Next" id="submit" name="submit"/>
							</div>
							<div class="span6 text-left">
								<input class="btn" type="submit" value="Cancel" id="cancel" name="cancel"/>
							</div>
						</div>
		            </fieldset>
		        </table>
	        </diV>
		</div>
		<!-- Place Sidebar Content Here -->
		<div id="rightContent" class="span4">
			<p>Empty</p>
		</div>
	</div>
<!-- </div> -->

<div id="contentBegin" class="container-fluid">

	<!-- New Row
	====================================================================== -->
	<div class="row-fluid">

		<div style="width:100%; background-color:darkred; color:white;
		-webkit-border-top-left-radius: 15px;
		-webkit-border-top-right-radius: 15px;
		-moz-border-radius-topleft: 15px;
		-moz-border-radius-topright: 15px;
		border-top-left-radius: 15px;
		border-top-right-radius: 15px;">
			<div style="padding:0 5%;"><h2>Team Registration</h2></div>
		</div>

		<div style="width:60%; background-color:navy; color:white;
			-webkit-border-top-right-radius: 10px;
			-webkit-border-bottom-right-radius: 10px;
			-moz-border-radius-topright: 10px;
			-moz-border-radius-bottomright: 10px;
			border-top-right-radius: 10px;
			border-bottom-right-radius: 10px;">
				<div style="padding:0px 5%;"><h3></h3>
			</div>
		</div>


		<div class="row-fluid">
			
			<div class="span12">
				
				<div id="teamBanner" style="margin-left:-0.25%;">
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
		<!-- Place Sidebar Content Here -->
		<div id="rightContent" class="span4">
			<p>Empty</p>
		</div>
	</div>
</div>