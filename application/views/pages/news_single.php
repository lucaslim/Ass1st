<!-- Main Content
====================================================================== -->
<div class="container-fluid">

	<!-- New Row
	====================================================================== -->
	<div class="row-fluid">

		<div id="leftContent" class="span7">
			<div id="top" class="newsDisplay">
				<h1><?php echo $news -> Title; ?></h1>
				<p class="subtitle">
					Posted By: <?php echo $news -> Author; ?> | Date Posted: <?php echo $news -> PostDate; ?>
				</p>
				<p>
					<!-- Social Media Buttons -->
					<div class="fb-like" data-href="<?php echo current_url(); ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>
					&nbsp;
					<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo current_url(); ?>" data-via="teamassist_" data-count="noneπ" data-lang="en">Tweet</a>
				</p>
				<?php echo $news -> Content; ?>
				<p>
					<!-- <fb:comments href="http://www.codeopolis.com"></fb:comments> -->
					<!-- Facebook comment plugin -->
					<fb:comments href="<?php echo current_url(); ?>"></fb:comments>
				</p>
				<p>
					<a href="#top">Back to the Top</a>
				</p>
			</div>
		</div>

		<div id="rightContent" class="newsSidebar span5">
			<h2>Latest Headlines</h2>
			<ul>
				<?php foreach($headlines as $news_item): ?>

				    <li>
				    	<a href="<?php echo site_url(); ?>/pages/news/<?php echo $news_item -> Id ?>"><?php echo $news_item -> Title ?></a>
				    </li>

				<?php endforeach ?>
			</ul>
		</div>

	</div>
</div>
