<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

	<!-- New Row
	====================================================================== -->
	<div class="row-fluid">

	<div id="leftContent" class="span7">
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
						<h3><a href="#">TEAM 3 BECOMES NUMBER 1</a></h3>
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
						<p>It's the 4th Annual Wreckit Stadium's Road Hockey Tournament. Check the tournament section for more details.</p>
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
						<p>Selected in the first round, 5th overall by Toronto, come meet our very own Jacques LaFlamme on July 23rd at 1pm, before he starts his career.</p>
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
	</div><!-- /end left content -->

	<div id="rightContent" class="span5">

		<!-- /begin accordion-->
		<div class="accordion" id="accordion1">

			<!-- begin group -->
			<div class="accordion-group">
				<div class="accordion-heading">
				  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
				    New Player Registration
				  </a>
				</div>
				<div id="collapseOne" class="accordion-body collapse in">
				  <div class="accordion-inner">
				  	<div class="container-fluid player-register">
				  	
				  	<!-- begin form -->	
					<?php echo form_open("quick_register/register_user", array('id' => 'quick_register_form')); ?>
			            <fieldset>
							<div class="row-fluid">
					  			<div class="span6">
				                    <!-- First Name -->
				                    <input class="input-med" type="text" name="first_name" id="first_name" placeholder="First Name" class="" />				  				
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
					  			<div class="span4 text-right">
				                    <!-- Month -->
				                    <select class="input-small" name="dob_month">
										<option value="">Month</option>
										<?php foreach($dob_month as $item => $value):?>
										<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="span4 text-center">
									<!-- Day -->
									<select class="input-small" name="dob_day">
										<option value="">Day</option>
										<?php foreach($dob_day as $item => $value):?>
										<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
										<?php endforeach; ?>
									</select>									
								</div>
								<div class="span4 text-left">
									<!-- Year -->
									<select class="input-small" name="dob_year">
										<option value="">Year</option>
										<?php foreach($dob_year as $item => $value):?>
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
				                    <label class="checkbox"><input type="checkbox" name="terms" id="terms" /> I agree to the <a href="terms.php">Terms</a> and <a href="policy.php">Policy</a>.</label>									
								</div>
								<div class="span3 text-left">
									<input class="btn btn-info" type="submit" value="Sign Up" id="submit" name="submit"/>
								</div>
							</div>
				            </fieldset>
				        </form>				    
				  </div>
				</div>
			</div>
		  	<!-- end group -->

		  	<!-- begin group -->
		  	<div class="accordion-group">
			    <div class="accordion-heading">
			      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo">
			        New Team Registration
			      </a>
			    </div>
			    <div id="collapseTwo" class="accordion-body collapse">
			      <div class="accordion-inner">
			      	<div class="container-fluid">
			      		<div class="row-fluid">
			      			<div class="span12">
			      				Anim pariatur cliche...
			      			</div>
			      		</div>
			      	</div>
			      </div>
			    </div>
		  	</div>
		  	<!-- end group -->

		  	<!-- begin group -->
  		  	<div class="accordion-group">
			    <div class="accordion-heading">
			      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree">
			        Upcoming Tournaments
			      </a>
			    </div>
			    <div id="collapseThree" class="accordion-body collapse">
			      <div class="accordion-inner">
			      	<div class="container-fluid">
			      		<div class="row-fluid">
			      			<div class="span12">
			      				Anim pariatur cliche...
			      			</div>
			      		</div>
			      	</div>

			      </div>
			    </div>
		  	</div>
		  	<!-- end group -->

		</div>
		<!-- /end accordion-->

		<!-- /begin news list-->
		<div class="newsDisplay">
			<h2><?php echo $archive; // display title ?></h2>
			<ul>
				<?php foreach($news as $news_item): ?>

				    <li>
				    	<a href="<?php echo base_url(); ?>pages/news/<?php echo $news_item -> Id ?>"><?php echo $news_item -> Title ?></a>
				    	<p><?php echo $news_item -> Description ?></p>
				    </li>

				<?php endforeach ?>
			</ul>
		</div>
		</div><!-- /end news list-->
	</div><!-- /end right content -->

	</div>
</div>