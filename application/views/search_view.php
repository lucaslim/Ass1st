<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

	<!-- New Row
	====================================================================== -->
	<div class="row-fluid">

	<div id="leftContent" class="span7">
		<?php foreach($query as $item):?>

		<!--retrieving the title-->
		<h4><?= $item->Title ?></h4>

		<!--retrieving the description-->
		<p><?= $item->Description ?></p>

		<!--retrieving the link-->
		<a href="http://localhost/Ass1st/Pages/News/<?= $item->Id ?>">View Page</a>


		<?php endforeach; ?>
	</div>
</div>
</div>
