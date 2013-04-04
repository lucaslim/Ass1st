<div class="container-fluid">
	<div class="span12">
		<h1>Create a new game <small>Select the teams involved in the game</small></h1>

		<?php echo validation_errors(); ?>

		<?php echo form_open('admin/scorekeeper/add_game'); ?>

			<label>Select the Season ID: </label>
			<select name="seasonid">
				<?php foreach($seasons as $season) { echo '<option value=' . $season -> Id . '>' . $season -> YearFrom . " to " . $season -> YearTo . '</option>'; } ?>
			</select>

			<label>Select Home Team: </label>
			<select name="homeid">
				<?php foreach($teams as $team) { echo '<option value=' . $team -> Id . '>' . $team -> Name .'</option>'; } ?>
			</select>

			<label>Select Away Team: </label>
			<select name="awayid">
				<?php foreach($teams as $team) { echo '<option value=' . $team -> Id . '>' . $team -> Name .'</option>'; } ?>
			</select>

			<label>Date of the Game: </label>		
			<input type="text" name="date" id="datepicker" value="<?php echo set_value('date'); ?>" required />

			<label>Time of the Game: </label>
			<input type="text" name="time" id="time" value="<?php echo set_value('time'); ?>" required />

			<label>Select Arena: </label>
			<select name="arena">
				<?php foreach($arenas as $arena) { echo '<option value=' . $arena -> Id . '>' . $arena -> Name .'</option>'; } ?>
			</select>

			<label>Select Match Type: </label>
			<select name="matchtype">
				<?php foreach($matchtypes as $matchtype) { echo '<option value=' . $matchtype -> Id . '>' . $matchtype -> Name .'</option>'; } ?>
			</select>
			
			<p>
				<input type="submit" class="btn btn-primary" value="Submit" />
			</p>
			
		</form>
	</div>
</div>
