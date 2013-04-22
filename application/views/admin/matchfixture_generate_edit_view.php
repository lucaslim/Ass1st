<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1><?php echo $title ?></h1>
			<?php echo form_open( 'admin/matchfixture/update' ); ?>
			<label>Date: </label>
			<input type="text" name="date" id="datepicker" value="<?php echo $result -> Date?>" required />
			<label>Home Team: </label>
			<select name="home_team" required >
				<?php foreach ($teams as $value): ?>
					<option value="<?php echo $value -> Id; ?>" <?php echo $value -> Id == $result -> HomeTeamId ? 'selected="selected"' : '' ?>><?php echo $value -> Name; ?></option>				
				<?php endforeach; ?>
			</select>
			<label>Visiting team: </label>
			<select name="visiting_team" required >
				<?php foreach ($teams as $value): ?>
					<option value="<?php echo $value -> Id; ?>" <?php echo $value -> Id == $result -> AwayTeamId ? 'selected="selected"' : '' ?>><?php echo $value -> Name; ?></option>				
				<?php endforeach; ?>
			</select>
			<label>Time: </label>
			<select name="time" required >
				<?php $start_time = strtotime("00:00"); ?>
				<?php $end_time = strtotime("23:59"); ?>
				<?php for($i = $start_time; $i <= $end_time; $i += 1800 ): ?>
					<option value="<?php echo date("H:i",$i); ?>" <?php echo date("H:i",$i) == date("H:i",strtotime($result -> Time)) ? 'selected="selected"' : '' ?>><?php echo date("H:i",$i); ?></option>				
				<?php endfor; ?>
			</select>
			<br />
			<p>
				<input type="submit" class="btn btn-primary" value="Update" />
			</p>
			<input type="hidden" id="season_id" name="season_id" value="<?php echo $result -> SeasonId ?>" />
			<input type="hidden" id="league_id" name="league_id" value="<?php echo $result -> LeagueId ?>" />
			<input type="hidden" id="fixture_id" name="fixture_id" value="<?php echo $result -> Id ?>" />
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
