<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1>Deactivate Admin <small>Are you sure you wish to deactivate <strong>'<?php echo $user -> username; ?>'</strong></small></h1>

			<?php echo form_open("auth/deactivate/".$user->id);?>

			<p>
				<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
				<input type="radio" name="confirm" value="yes" checked="checked" />
				<?php echo lang('deactivate_confirm_n_label', 'confirm');?>
				<input type="radio" name="confirm" value="no" />
			</p>

			<?php echo form_hidden($csrf); ?>
			<?php echo form_hidden(array('id'=>$user->id)); ?>

			<p><?php echo form_submit('submit', lang('deactivate_submit_btn'));?></p>

			<?php echo form_close();?>
		</div>
	</div>
</div>