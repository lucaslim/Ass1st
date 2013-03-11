<div id="mainContent" class="clearfix">
	<div id="leftContent">
		<div id="hpImageSlider">
			<div class="slider-wrapper theme-dark">
				<div id="slider" class="nivoSlider">
					<!--Image Size -- 720 X 360-->
					<a href="#"><img src="<?php echo base_url(); ?>assets/images/championship.jpg" data-thumb="<?php echo base_url(); ?>assets/images/skates.jpg" alt="" title="#htmlcaption1" /></a>
					<a href="#"><img src="<?php echo base_url(); ?>assets/images/roadhockey.jpg" data-thumb="<?php echo base_url(); ?>assets/images/roadhockey.jpg" alt="" title="#htmlcaption2" /></a>
					<a href="#"><img src="<?php echo base_url(); ?>assets/images/skillscomp.jpg" data-thumb="<?php echo base_url(); ?>assets/images/skillscomp.jpg" alt="" title="#htmlcaption3" /></a>
					<a href="#"><img src="<?php echo base_url(); ?>assets/images/skates.jpg" data-thumb="<?php echo base_url(); ?>assets/images/championship.jpg" alt="" title="#htmlcaption4" data-transition="" /></a>
				</div>
				<!--htmlcaption1-->
				<div id="htmlcaption1" class="nivo-html-caption">
					<div class="htmlcaptionLeft">
						<h3><a href="#">TEAM THREE BECOMES NUMBER ONE</a></h3>
						<p>After two tough losses in the semi‘s against the top seeded Wolverines, Team 3 bounced back to win four straight in the Eastern Conference Championship.</p>
					</div>
					<div class="htmlcaptionRight">
						<p>
							<a href="#">» Finals Preview</a>
						</p>
						<p>
							<a href="#">» Game Recap</a>
						</p>
						<p>
							<a href="#">» Playoff Standings</a>
						</p>
					</div>
				</div><!--htmlcaption1-->
				<!--htmlcaption2-->
				<div id="htmlcaption2" class="nivo-html-caption">
					<div class="htmlcaptionLeft">
						<h3><a href="#">SCHOOLYARD PUCK</a></h3>
						<p>It's the 4th Annual Wreckit Stadium's Road Hockey Tournament.</p>
					</div>
					<div class="htmlcaptionRight">
						<p>
							<a href="#">» Register Now</a>
							
						</p>
						<p>
							<a href="#">» 2012 Champions</a>
							
						</p>
						<p>
							<a href="#">» Volunteer</a>
						</p>
					</div>
				</div><!--htmlcaption2-->
				<!--htmlcaption3-->
				<div id="htmlcaption3" class="nivo-html-caption">
					<div class="htmlcaptionLeft">
						<h3><a href="#">LaFLAMME GROWS BRIGHTER</a></h3>
						<p>Selected in the first round, 5th overall by Toronto, come meet our very own Jacques LaFlamme on July 23rd at 1pm, before he starts his professional career.</p>
					</div>
					<div class="htmlcaptionRight">
						<p>
							<a href="#">» Career Stats</a>
							
						</p>
						<p>
							<a href="#">» 2013 Draft Highlights</a>
							
						</p>
						<p>
							<a href="#">» Press Release</a>
						</p>
					</div>
				</div><!--htmlcaption3-->
				<!--htmlcaption4-->
				<div id="htmlcaption4" class="nivo-html-caption">
					<div class="htmlcaptionLeft">
						<h3><a href="#">DON'T BE DULL!</a></h3>
						<p>Be on the edge of your game. Every Wednesday Night, Wreckit Stadium offer's half price skate sharpenings for all league players.</p>
					</div>
					<div class="htmlcaptionRight">
						<p>
							<a href="#">» Visit the ProShop</a>
							
						</p>
						<p>
							<a href="#">» Store Hours</a>
							
						</p>
						<p>
							<a href="#">» Contact</a>
						</p>
					</div>
				</div><!--htmlcaption4-->
			</div><!--slider-wrapper-->
		</div><!--hpImageSlider-->
	</div><! -- /end left content -->

	<div id="rightContent" class="clearfix">
		<div id="accordion">
			<h3>New Player Registration</h3>
			<div>
				<div id="player_registration_form_div">
					<div class="prf_format">
						<?php echo form_open("quick_register/register_user", array('id' => 'quick_register_form')); ?>

						<form action="" class="register">

				            <fieldset>
				                <h3>Player Information</h3>
				                
				                <p>
				                    <!-- First Name -->
				                    <input type="text" name="first_name" id="first_name" placeholder="First Name" class="" />
				                    <!-- Last Name -->
									<input type="text" name="last_name" id="last_name" placeholder="Last Name"  />
				                </p>
				                <p>
				                	<!-- Email -->
				                    <input type="text" name="email" id="email" class="long" placeholder="Email" />
				                </p>
				                <p>
				                	<!-- Password -->
				                    <input type="password" name="password" id="password" placeholder="Password"  />
				                    <!-- Repeat Password -->
				                    <input type="password" name="repassword" id="repassword" placeholder="Confirm Password"  />
				                </p>

				                <p>
				                    <!-- City -->
				                    <input type="text" placeholder="City" class="short" />
									<!-- Province -->
				                    <select class="ddl_province">
				                        <option value=""> Province</option>

				                       	<option value="AB">Alberta</option>
										<option value="BC">British Columbia</option>
										<option value="MB">Manitoba</option>
										<option value="NB">New Brunswick</option>
										<option value="NL">Newfoundland</option>
										<option value="NS">Nova Scotia</option>
										<option value="ON">Ontario</option>
										<option value="PE">Prince Edward Island</option>
										<option value="QC">Quebec</option>
										<option value="SK">Saskatchewan</option>
										<option value="NT">Northwest Territories</option>
										<option value="NU">Nunavut</option>
										<option value="YT">Yukon</option>
				                    </select>
				                </p>

				                <p>
				                	<!-- Birthday -->
				                	<div id="ddls_birthday">
					                    <!-- Month -->
					                    <select name="dob_month">
											<option value="">Month</option>
											<?php foreach($dob_month as $item => $value):?>
											<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
											<?php endforeach; ?>
										</select>
										<!-- Day -->
										<select name="dob_day">
											<option value="">Day</option>
											<?php foreach($dob_day as $item => $value):?>
											<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
											<?php endforeach; ?>
										</select>
										<!-- Year -->
										<select name="dob_year">
											<option value="">Year</option>
											<?php foreach($dob_year as $item => $value):?>
											<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
											<?php endforeach; ?>
										</select>
									</div>

				                	<!-- Gender Radio Options -->
				                	<div id="rbs_gender">
				                		<!-- Male -->
					                	<div class="gender">
					                		<input type="radio" name="gender" value="Male">		
					                    	<label>Male</label>
					                    </div>
										<!-- Female -->
										<div class="gender">
											<input type="radio" name="gender" value="Female">
					                    	<label>Female</label>
					                    </div>
					              	</div>
				                </p>
				                <p>
				                	<div class="agreeForm">
					                	<div class="AF_ckb_desc_submit">
						                    <input type="checkbox" name="terms" id="terms" />
						                    <label class="AF_desc">I agree to the <a href="terms.php">Terms</a> and <a href="policy.php">Policy</a>.</label>
					            			<input type="submit" value="Sign Up" id="submit" name="submit"/>
					            		</div>
				            		</div>
				                </p>
				            </fieldset>
				        </form>

						<!-- Lucas Table  -->

						<!-- <table border="1">
							<tr>
								<td>
								<input type="text" name="first_name" id="first_name" placeholder="First Name" />
								</td>
								<td>
								<input type="text" name="last_name" id="last_name" placeholder="Last Name"  />
								</td>
							</tr>
							<tr>
								<td colspan="2">
								<input type="text" name="email" id="email" placeholder="Email"  />
								</td>
							</tr>
							<tr>
								<td colspan="2">
								<input type="password" name="password" id="password" placeholder="Password"  />
								</td>
							</tr>
							<tr>
								<td colspan="2">
								<input type="password" name="repassword" id="repassword" placeholder="Re-enter Password"  />
								</td>
							</tr>
							<tr>
								<td>
									<select name="dob_month">
										<option value="">MM</option>
										<?php foreach($dob_month as $item => $value):?>
										<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
										<?php endforeach; ?>
									</select>
									<select name="dob_day">
										<option value="">DD</option>
										<?php foreach($dob_day as $item => $value):?>
										<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
										<?php endforeach; ?>
									</select>
									<select name="dob_year">
										<option value="">YYYY</option>
										<?php foreach($dob_year as $item => $value):?>
										<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
										<?php endforeach; ?>
									</select>
								</td>
								<td>
									<input type="radio" name="gender" value="Male">Male
									<input type="radio" name="gender" value="Female">Female
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<div>
										<input type="checkbox" name="terms" id="terms">I agree to the <a href="terms.php">Terms</a> and have read the <a href="policy.php">Policy</a>.
										<input type="submit" value="Submit" id="submit" name="submit"/>				
									</div>
								</td>
							</tr>
						</table> -->

						<!-- End Lucas Table -->


						<div id="error_box" title="Error">
							<div id="error_message"></div>
						</div>
					</div>
				</div>
			</div>
			<h3>New Team Registration</h3>
			<div>
				<p>
					Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. 
				</p>
			</div>

			<h3>Upcoming Tournaments</h3>
			<div>
				<p>
					Blah. Blah Blah Blah.Sed ac felis. Sed commodo, magna quis lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
				</p>
				<ul>
					<li>
						List item one
					</li>
					<li>
						List item two
					</li>
					<li>
						List item three
					</li>
				</ul>
			</div>
		</div><! -- /end accordion -->
		<div class="newsDisplay">
			<h3><?php echo $archive; // display title ?></h3>
			<?php foreach($news as $news_item): ?>

			    <h4><a href="news/<?php echo $news_item -> Id ?>"><?php echo $news_item -> Title ?></a></h4>

			<?php endforeach ?>
		</div>
	</div><! -- /end right content -->
</div>