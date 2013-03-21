<div id="leftContent" class="span7">
	<div class="newsDisplay">
		<h1>Latest Headlines</h1>
		<div id="top" class="newsDisplay">
			<?php foreach($news as $news_item): ?>
				<h2><a href="<?php echo $news_item -> Id ?>"><?php echo $news_item -> Title ?></a></h2>
				<p class="subtitle">
					Posted By: <?php echo $news_item -> Author; ?> | Date Posted: <?php echo $news_item -> PostDate; ?>
				</p>
				<p><?php echo $news_item -> Description ?> <a href="<?php echo base_url(); ?>pages/news/<?php echo $news_item -> Id ?>">[ Full Story ]</a></p>
			<?php endforeach ?>
			<p>
				<a href="#top">Back to the Top</a>
			</p>	
		</div>
	</div>
</div>

<div id="rightContent" class="span5">
	<h3>Right Sidebar</h3>
</div>