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
			<h3>blah blah blah</h3>
			<div>
				<p>
					Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
				</p>
			</div>
			<h3>New Player Registration</h3>
			<div>
				<p>
					Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In suscipit faucibus urna.
				</p>
			</div>
			<h3>Upcoming Tournaments</h3>
			<div>
				<p>
					Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis. Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
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

			    <h4><a href="news/<?php echo $news_item['Id'] ?>"><?php echo $news_item['Title'] ?></a></h4>

			<?php endforeach ?>
		</div>
	</div><! -- /end right content -->
</div>