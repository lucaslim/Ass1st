<div class="container-fluid">
	<div class="span12">
		<h1>Edit Game (<?php echo $game -> Id; ?>) <small>Update the information for selected game</small></h1>
		
		<?php echo validation_errors(); ?>

		<?php //var_dump($game); // for testing purposes ?>

		<?php echo form_open('admin/scorekeeper/edit_game/' . $game -> Id); ?>

			<label>Game ID: <p><?php echo $game -> Id; ?></p></label>

			<label>Home Team: <p><?php echo $game -> HomeTeamName; ?></p></label>

			<label>Away Team: <p><?php echo $game -> AwayTeamName; ?></p></label>

			<label>Home Score: </label>
			<input type="text" name="scorehome" class="input-mini" value="<?php echo $game -> HomeScore; ?>" required>

			<label>Away Score: </label>
			<input type="text" name="scoreaway" class="input-mini" value="<?php echo $game -> AwayScore; ?>" required>

			<label>Date of the Game: </label>		
			<input type="text" name="date" id="datepicker" value="<?php echo $game -> Date; ?>" required />

			<label>Time of the Game: </label>
			<input type="text" name="time" id="time" value="<?php echo $game -> Time; ?>" required />
			
			<p>
				<input type="submit" class="btn btn-primary" value="Submit" />
				<a class="btn btn-danger" href="<?php echo base_url(); ?>admin/scorekeeper/view_games/">Cancel</a>
			</p>
			
		</form>
	</div>
</div>
