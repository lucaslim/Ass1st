<div id="mainContent">
	<div id="leftContent">
		<h1>Division Profiles</h1>

		<?php $conference_name = ''; $division_name = '';?>

		<?php foreach($teams as $team): ?>
		<?php if($conference_name != $team -> ConferenceName): $conference_name = $team -> ConferenceName; // check if Conference has been printed yet ?>
			<h4><?php echo $team -> ConferenceName; ?> Conference</h4>
		<?php endif;?>

		<?php if($division_name != $team -> DivisionName): $division_name = $team -> DivisionName;  // check if division name exists already?>
			<h6><?php echo $team -> DivisionName; // echo division name ?> Division</h6>
		<?php endif; ?>

			<p><?php echo $team -> Name ?></p>

		<?php endforeach; ?>
	</div>
</div>
