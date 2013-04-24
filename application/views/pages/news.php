<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

	<!-- New Row
	====================================================================== -->
	<div class="row-fluid">

		<div id="leftContent" class="span8">
			<div class="newsDisplay">
				<legend>Latest Headlines</legend>
				<div id="top" class="newsDisplay">
					<?php foreach($news as $news_item): ?>
						<legend><a href="<?php echo $news_item -> Id ?>"><?php echo $news_item -> Title ?></a></legend>
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
				    		<a href="<?php echo site_url(); ?>pages/news/<?php echo $news_item -> Id ?>"><?php echo $news_item -> Title ?></a><br />
				    		<small style="font-size: .8em;">Posted: <?php echo $news_item -> PostDate; ?></small>
				    	</td>
				    </tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>

	</div>
</div>