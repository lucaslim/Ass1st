<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

	<!-- New Row
	====================================================================== -->
	<div class="row-fluid">

	<div id="leftContent" class="span7">
		<div id="hpImageSlider" style="margin-bottom: 35px;">
			<div class="slider-wrapper theme-dark">
				<div id="slider" class="nivoSlider">
					<!--Image Size - 720 X 360-->
					<?php foreach($query as $item):?>
						<a href="<?php echo $item -> Urlmain ?>"><img src="<?php echo base_url(); ?>uploads/<?php echo $item -> Image ?>" data-thumb="<?php echo base_url(); ?>assets/images/skates.jpg" alt="" title="#htmlcaption<?php echo $item -> Id ?>" /></a>
					<?php endforeach ?>
				</div>
				<!-- Captions from Database -->
				<?php foreach($query as $item):?>
					<div id='htmlcaption<?php echo $item -> Id ?>' class="nivo-html-caption">
						<!--Captions Left Side-->
						<div class="htmlcaptionLeft">
							<!-- Title -->
							<h3><?php echo $item -> Title ?><a href="#"></h3>
							<!-- Description -->
							<p><?php echo $item -> Description ?></p>
						</div>
						<!-- Captions Right Side -->
						<div class="htmlcaptionRight">
							<p>
								<a href="<?php echo $item -> Link2 ?>">» <?php echo $item -> link2title ?></a>
							</p>
							<p>
								<a href="<?php echo $item -> Link3 ?>">» <?php echo $item -> Link3title ?></a>
							</p>
							<p>
								<a href="<?php echo $item -> Link4 ?>">» <?php echo $item -> Link4title ?></a>
							</p>
						</div>
					</div>
				<?php endforeach ?>
				
			</div><!--slider-wrapper-->
		</div><!--hpImageSlider-->

		<!-- Leading Goal Scorers -->
		<legend>Goal Scoring Leader</legend>
		<table class="table table-condensed table-hover">
			<thead>
				<tr>
					<th>&nbsp;</th>
					<th>Player</th>
					<th>Goals</th>
					<th>Team</th>
				</tr>
			</thead>
			<tbody>
				<?php if($leadingscorers != FALSE) : ?>
					<?php foreach($leadingscorers as $number => $player) : ?>
						<tr>
							<td>
								<?php echo $number + 1; ?>
							</td>
							<td>
								<a href="<?php echo base_url(); ?>pages/player/<?= $player -> PlayerId; ?>"><?php echo $player -> PlayerFirstName; ?> <?php echo $player -> PlayerLastName; ?></a>
							</td>
							<td>
								<?php echo $player -> Goals; ?>
							</td>
							<td>
								<a href="<?php echo base_url(); ?>pages/team/<?php echo $player -> TeamId; ?>"><?php echo strtoupper(substr($player -> TeamName, 0, 3)); ?></a>
							</td>										
						</tr>
					<?php endforeach; ?>
				<?php else : ?>
					<tr>
						<td>No data found</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
		<!-- /end Leading Goal Scorers -->

		<!-- Leading Assist -->
		<legend>Assists Leader</legend>
		<table class="table table-condensed table-hover">
			<thead>
				<tr>
					<th>&nbsp;</th>
					<th>Assist Leader</th>
					<th>Assists</th>
					<th>Team</th>
				</tr>
			</thead>
			<tbody>
				<?php if($leadingassists != FALSE) : ?>
					<?php foreach($leadingassists as $number => $player) : ?>
						<tr>
							<td>
								<?php echo $number + 1; ?>
							</td>
							<td>
								<a href="<?php echo base_url(); ?>pages/player/<?= $player -> PlayerId; ?>"><?php echo $player -> PlayerFirstName; ?> <?php echo $player -> PlayerLastName; ?></a>
							</td>
							<td>
								<?php echo $player -> Assists; ?>
							</td>
							<td>
								<a href="<?php echo base_url(); ?>pages/team/<?php echo $player -> TeamId; ?>"><?php echo strtoupper(substr($player -> TeamName, 0, 3)); ?></a>
							</td>										
						</tr>
					<?php endforeach; ?>
				<?php else : ?>
					<tr>
						<td>No data found</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
		<!-- /end Leading Goal Scorers -->

	</div><!-- /end left content -->

	<div id="rightContent" class="span5">

		<!-- /begin accordion-->
		<div id="accordion" >
			<?php if(!is_loggedin()): ?>
			<h3>New Player Registration</h3>
			<div class="player-register" >
				
				<div id="player_registration_form_div">
					<div class="prf_format">

					  	<!-- begin form -->
						<?php echo form_open( "quick_register/register_user", array( 'id' => 'quick_register_form' ) ); ?>
				            <fieldset>
								<div class="row-fluid">
						  			<div class="span6">
					                    <!-- First Name -->
					                    <input class="input-med" type="text" name="first_name" id="first_name" placeholder="First Name" />
						  			</div>
						  			<div class="span6">
						  				<!-- Last Name -->
						  				<input class="input-med" type="text" name="last_name" id="last_name" placeholder="Last Name"  />
						  			</div>
						  		</div>
						  		<div class="row-fluid">
						  			<div class="span12">
					                	<!-- Email -->
					                    <input class="input-full" type="text" name="email" id="email" class="long" placeholder="Email" />
						  			</div>
						  		</div>
						  		<div class="row-fluid">
						  			<div class="span12">
										<input class="input-full" type="password" name="password" id="password" placeholder="Password"  />
						  			</div>
						  		</div>
						  		<div class="row-fluid">
						  			<div class="span12">
										<input class="input-full" type="password" name="repassword" id="repassword" placeholder="Re-enter Password"  />
						  			</div>
						  		</div>
						  		<div class="row-fluid">
						  			<div class="span4 text-right">
					                    <!-- Month -->
					                    <select class="input-small" name="dob_month">
											<option value="">Month</option>
											<?php foreach ( $dob_month as $item => $value ):?>
											<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="span4 text-center">
										<!-- Day -->
										<select class="input-small" name="dob_day">
											<option value="">Day</option>
											<?php foreach ( $dob_day as $item => $value ):?>
											<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="span4 text-left">
										<!-- Year -->
										<select class="input-small" name="dob_year">
											<option value="">Year </option>
											<?php foreach ( $dob_year as $item => $value ):?>
											<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span3 offset3">
										<!-- Female -->
										<label class="radio"><input type="radio" name="gender" value="Female">Female</label>
									</div>
									<div class="span6">
				                		<!-- Male -->
				                		<label class="radio"><input type="radio" name="gender" value="Male">Male</label>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span9">
					                    <label class="checkbox"><input type="checkbox" name="terms" id="terms" /> I agree to the <a href="#theterms" data-toggle="modal">Terms</a> and <a href="#policy" data-toggle="modal">Policy</a>.</label>
									</div>
									<div class="span3 text-left">
										<input class="btn btn-info" type="submit" value="Sign Up" id="submit" name="submit"/>
									</div>
								</div>
				            </fieldset>
				        </form>

				        <!-- terms -->
						<div id="theterms" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-header">
						    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						    <h3 id="myModalLabel">Terms of Service</h3>
						  </div>
						  <div class="modal-body">
						    <h6>Don’t forget that you are legally obligated to the Terms of Service noted below as well as to any other agreements, terms and rules that we tell you apply to your use of our Sites.</h6>
						    <h6>Please don’t use our Sites if you don’t agree to these Terms of Service because once you are on our Sites, you have to follow the rules. Representatives and agents that assist in operating our Sites reserve the right to temporarily or permanently disable access to the Sites for anyone who violates these Terms of Service. Because of the importance of these Terms of Service, we will disable access to the Sites at our discretion and may do so without notice.</h6>
						    <h6>Because we reserve the right to change the Terms of Service at any time, we recommend visiting this page periodically to make sure that the rules have not changed since your last visit. By using these Sites, you agree to be bound by all of the current terms of service.</h6>
						  	
						  	<h3>Here are the Terms of Service we expect you to follow:</h3>
						  	<h5>1. ABILITY TO ACCEPT TERMS OF SERVICE</h5>
						  	<h6>These Terms of Service form a legally binding contract between you and us. By using our Sites, you affirm that you are at least 18 years of age, an emancipated minor or possess legal parental or guardian consent, and are fully able and competent to enter into the terms, conditions, obligations, representations and responsibilities set forth in these Terms of Service, and to abide and comply with these Terms of Service.</h6>

						  	<h5>2. ACCOUNT AND NON-ACCOUNT USERS</h5>
						  	<h6>You do not need to create an account with us in order to view the Sites. However, if you already have a facebook or twitter account or if you create one on our our website, you will have access to more of the features on our Sites. Note that if you do choose to create a Teamassist, you will need to agree to a separate Terms of Service and User Agreement ("ToSUA") and Privacy Policy that govern our website. When you login to your account while on one of our Site, the ToSUA and Privacy Policy applies to your activities on the Site. Except for any internet fees that you are responsible for, creating a Teamassist account is free, so we encourage you to do so.</h6>

						  	<h5>3. USE OF YOUR INFORMATION</h5>
						  	<h6>We respect your information and privacy and will not publicly disclose your personal information to non-affiliated third parties other than as stated in our Privacy Policy. By using our Sites, you acknowledge that we are not responsible for any personal information that you publicly disclose (intentionally or unintentionally) using the Sites’ services such as through discussion forums or message boards. You should avoid saying anything personally identifying in these areas of our Sites.</h6>
						  	<h6>If you use our Site you also agree that through your use of the Site, you may be provided with information about Teamassist’s or a third party’s products or services, including promotions, advertisements, product placements or marketing materials within the Sites. You acknowledge that Teamassist does not endorse any of the products or services advertised, promoted or marketed by third parties.</h6>

						  	<h6 style="text-align: center;">TEAM ASSIST &trade; - &copy; 2013</h6>
						  </div>
						  <div class="modal-footer">
						    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						  </div>
						</div>

						<!-- policy -->
						<div id="policy" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-header">
						    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						    <h3 id="myModalLabel">Privacy Policy</h3>
						  </div>
						  <div class="modal-body">
						    <h6>Teamassist is committed to respecting the privacy rights of all visitors to our websites. This privacy policy is intended to provide you with information on how we collect, use and store the information that you provide to us through our websites so that you can make appropriate choices for sharing information with us.</h6>

						    <h5>WHAT WE COLLECT:</h6>
						    <h6>We do not require that website visitors reveal any personally identifying information in order to gain general access to our website. However, visitors who do not wish to, or are not allowed by law to share personally identifying information, may not be able to access certain areas of our website, or participate in certain activities. Although personally identifying information may be required to participate in certain features offered through our website, participants provide this information on a voluntary basis only. Collection of personal information required to access certain website services may include the collection of date of birth, name, mailing address or email address.</h6>

						    <h5>HOW WE USE YOUR INFORMATION</h5>
						    <h6>Teamassist may use personally identifying information for marketing and demographic studies. These studies help us improve our websites, products and services to better meet our users’ needs.</h6>
						    <h6>We may use personally identifying information and records for defense of a lawsuit, investigation or other action if such personally identifying information, records or profiles are relevant to the lawsuit, investigation or action.</h6>

						    <h5>Policies for Children</h5>
						    <h6>Teamassist does not knowingly collect personally identifying information from children under 13 years of age via our websites.</h6>

						    <h5>Wreckit Website Message Boards</h5>
						    <h6>Our website message boards are a place where users can go to freely share their thoughts and ideas about the Teamassist brand. A twitter, facebook or Wreckit account is required to contribute to these message boards. We prohibit message board participants from disclosing their own personally identifying information other than their own Online IDs. We ask our users to respect the privacy of others. Disclosure of phone numbers, addresses, age or other personally identifying information that may violate someone else's privacy is prohibited. Encouraging or asking users to disclose publicly their personally identifying information is also prohibited.</h6>
						  </div>
						  <div class="modal-footer">
						    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						  </div>
						</div>
				  </div>
				</div>
			</div>
			<?php endif; ?>
		  	<!-- end group -->

		  	<!-- begin group -->
			<h3>New Team Registration</h3>
			<div class="team-register">
	            <!-- begin form -->
	            <?php echo form_open( "quick_team_register/register_team", array( 'id' => 'quick_team_register_form' ) ); ?>
	            <fieldset>
					<div class="row-fluid">
			  			<div class="span12">
		                    <!-- Team Name -->
		                    <input class="input-full" type="text" name="team_name" id="team_name" placeholder="Team Name"/>
		                </div>
			  		</div>
			  		<div class="row-fluid">
			  			<div class="span12 text-center">
		                    <!-- League -->
		                    <select class="input-full" name="ddl_league" id="ddl_league">
								<option value="">League</option>
								<?php foreach ( $league as $value ):?>
								<option value="<?php echo $value -> Id; ?>"><?php echo $value -> Name; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
			  		<div class="row-fluid">
			  				<!-- Day -->
			  				<div class="span6 text-center">
							<select class="input-med" name="ddl_gender" id="ddl_gender">
								<option value="">Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Coed">Coed</option>
							</select>
						</div>
						<div class="span6 text-center">
							<!-- Year -->
							<select class="input-med" name="ddl_division" id="ddl_division">
								<option value="">Division</option>
							</select>
						</div>
			  		</div>

					<div class="row-fluid">
						<div class="span9">
		                    <label class="checkbox"><input type="checkbox" name="team_terms" id="team_terms"/> I agree to the <a href="terms.php">Terms</a> and <a href="policy.php">Policy</a>.</label>
						</div>
						<div class="span3 text-left">
							<input class="btn btn-info" type="submit" value="Register" id="team_submit" name="team_submit" />
						</div>
					</div>
	            </fieldset>
	            <?php echo form_close(); ?>
	        </form>		      	
	  	</div>
	  	<!-- end group -->
	</div>
	<!-- /end accordion-->

		<!-- /begin news list-->
		<div class="newsDisplay" style="margin-top: 35px;">
			<legend><?php echo $archive; // display title ?></legend>
			<?php foreach ( $news as $news_item ): ?>
		    	<span class="lead">
		    		<a href="<?php echo base_url(); ?>pages/news/<?php echo $news_item -> Id ?>"><?php echo $news_item -> Title ?></a>
		    	</span>
	    		<p class="subtitle">
	    			<p class="subtitle"><small>Posted: <?php echo $news_item -> PostDate; ?></small></p>
	    			<?php echo $news_item -> Description ?>
	    		</p>

			<?php endforeach ?>
		</div>
		</div><!-- /end news list-->
	</div><!-- /end right content -->

	</div>
</div>