<html>
<head></head>
<body>

	<form>
	<?php foreach($query as $item):?>

		<!--retrieving the title-->
		<h4><?= $item->Image ?></h4>

		<!--retrieving the description-->
		<p><?= $item->Description ?></p>

		


		<?php endforeach; ?>
</form>
</body>
</html>