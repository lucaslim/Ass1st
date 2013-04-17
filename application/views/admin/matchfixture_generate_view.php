<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1><?php echo $title ?></h1>
			<h2><small><?php echo $result -> LeagueName ?> (<?php echo $result -> SeasonYear; ?>)</small></h2>
			<?php echo form_open( 'admin/matchfixture/generate' ); ?>
			<label>Start Date of the Season: </label>
			<input type="text" name="date" id="datepicker" required />
			<label>Total Regular Games: </label>
			<select name="total_regular_games" required >
				<?php for ( $i=10; $i <=  100; $i++ ): ?>
				<option value="<?php echo $i; ?>" <?php echo $i == 82 ? 'selected="selected"' : '' ?>><?php echo $i; ?></option>
			<?php endfor; ?>
			</select>
			<label>Games Per Week: </label>
			<select name="games_per_week" required >
				<?php for ( $i=1; $i <= 10; $i++ ): ?>
				<option value="<?php echo $i; ?>" <?php echo $i == 8 ? 'selected="selected"' : '' ?>><?php echo $i; ?></option>
			<?php endfor; ?>
			</select>
			<label>Days to Play: </label>
			<?php 
			$day = strtotime('next Monday');
			for ( $i = 0; $i < 7 ; $i++ ): ?>
				<div><input type="checkbox" name="day[]" value="<?php echo strftime('%A', $day); ?>"> <?php echo strftime('%A', $day); ?></div>
				<?php $day = strtotime('+1 day', $day); ?>
			<?php endfor; ?>
			<br />
			<p>
				<input type="submit" class="btn btn-primary" value="Submit" onclick="return confirm('Are you sure you want to generate a new schedule for <?php echo $result -> LeagueName . ' (' . $result -> SeasonYear . ')' ?>?')" />
			</p>
			<input type="hidden" id="season_id" name="season_id" value="<?php echo $result -> SeasonId ?>" />
			<input type="hidden" id="league_id" name="league_id" value="<?php echo $result -> LeagueId ?>" />
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
