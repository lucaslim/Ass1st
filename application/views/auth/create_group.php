<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1>Create Group <small>Enter group information below</small></h1>

			<div id="infoMessage"><?php echo $message;?></div>

			<?php echo form_open("auth/create_group");?>

			<p>
				<?php echo lang('create_group_name_label', 'group_name');?> <br />
				<?php echo form_input($group_name);?>
			</p>

			<p>
				<?php echo lang('create_group_desc_label', 'description');?> <br />
				<?php echo form_input($description);?>
			</p>

			<p><?php echo form_submit('submit', lang('create_group_submit_btn'));?></p>

			<?php echo form_close();?>
		</div>
	</div>
</div>