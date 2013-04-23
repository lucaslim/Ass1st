<script>
	$(document).ready(function() {

		//Check if user is logged in
		$.ajax({
				type : "POST",
				url : $.myURL() + "login/is_logged_in",
				data : "",
				dataType : "json",
				success : function(data) {
					if(!data.success) {
						$('#signIn').modal({show: true});
					}
			}
		});
	});
</script>

<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

	<!-- New Row
	====================================================================== -->
	<?php if ( !$is_logged_in ): ?>
	<div class="row-fluid">
		<!-- if is not logged in -->

		<div style="width:100%; background-color:darkred; color:white;
		-webkit-border-top-left-radius: 15px;
		-webkit-border-top-right-radius: 15px;
		-moz-border-radius-topleft: 15px;
		-moz-border-radius-topright: 15px;
		border-top-left-radius: 15px;
		border-top-right-radius: 15px;">
			<div style="padding:0 5%;"><h2>Log In</h2>
			</div>
		</div>
		<div>
			You need to be signed in before continuing. Click <a href="#signIn" data-toggle="modal">here</a> to sign in.
		</div>
	</div>
	<?php else: ?>
	<?php echo form_open_multipart('quick_team_register/add_team'); ?>
	<div class="row-fluid">
		<!-- if logged in -->
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
		<div id="leftContent" class="span7">

		<p>Accurate e-mail addresses and mobile telephone numbers are CRITICAL in order for the league organizers to contact both the captains and other players on each team. A confirmation e-mail will be sent to all team members once your team registration is complete.</p>


			<div class="team-rep-info" style="width: 100%; float: left; padding-right: 2.5%;">
				<fieldset>
					<!-- First Name -->
					<div class="row-fluid">
			  			<div class="span3">
		                    First Name:
			  			</div>
			  			<div class="span9">
		                    <input class="input-med" type="text" name="first_name" id="first_name" value="<?php echo $user_data -> FirstName ?>" disabled="disabled"/>
			  			</div>
			  		</div>
			  		<!-- Last Name -->
					<div class="row-fluid">
			  			<div class="span3">
		                    Last Name:
			  			</div>
			  			<div class="span9">
			  				<input class="input-med" type="text" name="last_name" id="last_name" value="<?php echo $user_data -> LastName ?>" disabled="disabled"  />
			  			</div>
			  		</div>
			  		<!-- Gender -->
					<div class="row-fluid">
			  			<div class="span3">
		                    Gender:
			  			</div>
						<div class="span9">

							<select class="input-full" name="ddl_gender" disabled="disabled">
								<option value="<?php echo $user_data -> Gender ?>" selected><?php echo $user_data -> Gender ?></option>
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
		                    <select class="input-med" name="dob_month" disabled="disabled">
								<option value="<?php echo $dob_month ?>" ><?php echo $dob_month ?></option>
							</select>
						</div>
						<!-- Day -->
						<div class="span3">
							<select class="input-med" name="dob_day" disabled="disabled">
								<option value="<?php echo $dob_day ?>" ><?php echo $dob_day ?></option>
							</select>
						</div>
						<!-- Year -->
						<div class="span3">

							<select class="input-med" name="dob_year" disabled="disabled">
								<option value="<?php echo $dob_year ?>" ><?php echo $dob_year ?></option>
							</select>
						</div>
			  		</div>
                	<!-- Email -->
			  		<div class="row-fluid">
			  			<div class="span3">
		                    Email:
			  			</div>
			  			<div class="span9">
		                    <input class="input-med" type="text" name="email" id="email" class="long" value="<?php echo $user_data -> Email ?>" disabled="disabled" />
			  			</div>
			  		</div>
			  		<!-- Phone -->
			  		<div class="row-fluid">
			  			<div class="span3">
		                    Phone:
			  			</div>
			  			<div class="span9">
							<input class="input-med" type="text" name="phone" id="phone" value="<?php echo $user_data -> ContactNumber ?>"  />
			  			</div>
			  		</div>
			  		<!-- Address -->
			  		<div class="row-fluid">
			  			<div class="span3">
		                    Address:
			  			</div>
			  			<div class="span9">
							<input class="input-med" type="text" name="address" id="address" value="<?php echo $user_data -> Address ?>"  />
			  			</div>
			  		</div>
			  		<!-- City -->
			  		<div class="row-fluid">
			  			<div class="span3">
		                    City:
			  			</div>
			  			<div class="span9">
							<input class="input-med" type="text" name="city" id="city" value="<?php echo $user_data -> City ?>"  />
			  			</div>
			  		</div>
			  		<!-- Province -->
					<div class="row-fluid">
			  			<div class="span3">
		                    Province:
			  			</div>
						<div class="span9">
							<select class="input-full" name="ddl_province">
								<?php foreach ( $provinces as $value ): ?>
									<option value="<?php echo $value ?>" <?php echo $user_data -> Province == $value ? 'selected' : ''?>><?php echo $value ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<!-- Postal Code -->
			  		<div class="row-fluid">
			  			<div class="span3">
		                    Postal Code:
			  			</div>
			  			<div class="span9">
							<input class="input-med" type="text" name="postalcode" id="postalcode" value="<?php echo $user_data -> PostalCode ?>"  />
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
	        </diV>
		</div>
		<!-- Place Sidebar Content Here -->
		<div id="rightContent" class="span4">
			<p>Empty</p>
		</div>
	</div>
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
				<?php echo $color_chooser ?>
			</div>
		</div>
		<!-- Place Sidebar Content Here -->
		<div id="rightContent" class="span4">
			<p>Empty</p>
		</div>
	</div>
	<div class="row-fluid">
		<input type="submit" id="add_team" name="add_team" value="Submit" />
	</div>
	<?php echo form_close(); ?>
	<?php endif; ?>
