<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

    <!-- New Row 
    ====================================================================== -->
    <div class="row-fluid">
    	<div class="span12">
    		<legend>Edit Team Profile</legend>

			<?php if(!empty($userdata['message'])) : ?>
				<div class="alert alert-success" style="margin: 10px 0;">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong><?php echo $userdata['message']; ?></strong> 
				</div>
			<? endif;?>

			<label>Team Name:</label>
			<input class="input" disabled type="text" name="Name" value="<?php echo $team -> Name; ?>" />

			<label>Founded:</label>
			<input class="input" disabled type="text" name="Name" value="<?php echo $team -> Founded; ?>" />
			
			<?php echo form_open('edit_team_profile/update_roster'); ?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>Name</th>
						<th>Jersey Number</th>
						<th>Captain</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($roster as $key => $value) : ?>
						<tr>
							<input type="hidden" name="player[<?php echo $key; ?>][Id]" value="<?php echo $value -> UserId; ?>" />
							<input type="hidden" name="player[<?php echo $key; ?>][TeamId]" value="<?php echo $teamid; ?>" />
							<td><?php echo $key + 1; ?></td>
							<td><?php echo $value -> FullName; ?></td>
							<td><input class="input input-mini" type="number" min="1" max="99" name="player[<?php echo $key; ?>][JerseyNo]" value="<?php echo $value -> JerseyNo; ?>" /></td>

							<!-- If player is a captain, load the page with the radio button selected -->
							<td><?php echo '<input type="checkbox" name="player[' . $key . '][Captain]"' . (($value -> Captain == 'Yes') ? 'checked="checked"' : '') . ' />'; ?></td>
							<td><a class="btn btn-danger" href="<?php echo base_url(); ?>edit_team_profile/removeplayer/<?php echo $value -> UserId; ?>/<?php echo $teamid; ?>" onclick="return confirm('Delete?');">Delete</a></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
				<input type="submit" class="btn btn-primary" value="Save Changes" />
			<?php echo form_close(); ?>
     	</div>
    </div>  
</div>
    	