<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

	<!-- New Row
	====================================================================== -->
	<div class="row-fluid">

		<div id="leftContent" class="span8">
			<div id="top" class="newsDisplay">
				<legend><?php echo $news -> Title; ?></legend>
				<p class="subtitle">
					Posted By: <?php echo $news -> Author; ?> | Date Posted: <?php echo $news -> PostDate; ?>
				</p>
				<p>
					<!-- Social Media Buttons -->
					<a style="top: -4px;" class="fb-like" data-href="<?php echo current_url(); ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></a>
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

		<div id="rightContent" class="newsSidebar span4">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Latest Headlines</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($headlines as $news_item): ?>
				    <tr>
				    	<td style="font-weight: 200;">
				    		<a href="<?php echo site_url(); ?>/pages/news/<?php echo $news_item -> Id ?>"><?php echo $news_item -> Title ?></a><br />
				    		<small style="font-size: .8em;">Posted: <?php echo $news_item -> PostDate; ?></small>
				    	</td>
				    </tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>

	</div>
</div>
