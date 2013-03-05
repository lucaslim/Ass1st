<link rel="stylesheet" href="<?php echo base_url(); ?>style/jqueryui/jqueryui.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>script/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>script/jqueryui.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		//Form
		$('#quick_register_form').submit(function(e) {
			e.preventDefault();

			dataString = $(this).serialize();

			$.ajax({
				type : $(this).attr("method"),
				url : $(this).attr("action"),
				data : dataString,
				dataType : "json",
				success : function(data) {
					$('#error_message').html(data.message);
					$('#error_box').dialog("open");
				}
			});
		});

		//Error Box
		$('#error_box').dialog({
			resizable : false,
			autoOpen : false,
			modal : true,
			buttons : {
				Cancel : function() {
					$(this).dialog("close");
				}
			}
		});
	});
 </script>
<?php echo form_open("quick_register/register_user", array('id' => 'quick_register_form')); ?>
<table border="1">
	<tr>
		<td>
		<input type="text" name="first_name" id="first_name" placeholder="First Name" />
		</td>
		<td>
		<input type="text" name="last_name" id="last_name" placeholder="Last Name"  />
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<input type="text" name="email" id="email" placeholder="Email"  />
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<input type="password" name="password" id="password" placeholder="Password"  />
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<input type="password" name="repassword" id="repassword" placeholder="Re-enter Password"  />
		</td>
	</tr>
	<tr>
		<td>
			<select name="dob_month">
				<option value="">MM</option>
				<?php foreach($dob_month as $item => $value):?>
				<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
				<?php endforeach; ?>
			</select>
			<select name="dob_day">
				<option value="">DD</option>
				<?php foreach($dob_day as $item => $value):?>
				<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
				<?php endforeach; ?>
			</select>
			<select name="dob_year">
				<option value="">YYYY</option>
				<?php foreach($dob_year as $item => $value):?>
				<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
				<?php endforeach; ?>
			</select>
		</td>
		<td>
			<input type="radio" name="gender" value="Male">Male
			<input type="radio" name="gender" value="Female">Female
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<div>
				<input type="checkbox" name="terms" id="terms">I agree to the <a href="terms.php">Terms</a> and have read the <a href="policy.php">Policy</a>.
				<input type="submit" value="Submit" id="submit" name="submit"/>				
			</div>
		</td>
	</tr>
</table>
<div id="error_box" title="Error">
 <div id="error_message"></div>
</div>