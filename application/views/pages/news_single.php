<div id="leftContent">
	<div id="top" class="newsDisplay">
		<h1><?php echo $news -> Title; ?></h1>
		<p class="subtitle">
			Posted By: <?php echo $news -> Author; ?> | Date Posted: <?php echo $news -> PostDate; ?>
		</p>
		<p>
			<div class="fb-like" data-href="<?php echo current_url(); ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>
		</p>
		<?php echo $news -> Content; ?>
		<p>
			<!-- <fb:comments href="http://www.codeopolis.com"></fb:comments> -->
			<!-- <fb:comments href="<?php echo current_url(); ?>"></fb:comments> -->
		</p>
		<p>
			<a href="#top">Back to the Top</a>
		</p>
	</div>
</div>

<div id="rightContent" class="newsSidebar">
	<h2>Latest Headlines</h2>
			<ul>
				<?php foreach($headlines as $news_item): ?>

				    <li>
				    	<a href="<?php echo base_url(); ?>index.php/pages/news/<?php echo $news_item -> Id ?>"><?php echo $news_item -> Title ?></a>
				    </li>

				<?php endforeach ?>
			</ul>
</div>