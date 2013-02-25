<!DOCTYPE html>
<html>
	<head>
		<title>Sign Up</title>
	</head>
	<body>
		<h1>Sign Up</h1>
		<?php echo form_open('admin/user/new_user'); ?>

		<table>
			<tr>
				<td>First Name:</td>
				<td>
				<input type="text" size="20" id="first_name" name="first_name"/>
				</td>
			</tr>
			<tr>
				<td>Last Name:</td>
				<td>
				<input type="text" size="20" id="last_name" name="last_name"/>
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>
				<input type="text" size="20" id="email" name="email"/>
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
				<input type="password" size="20" id="password" name="password"/>
				</td>
			</tr>
			<tr>
				<td>Height:</td>
				<td>
				<input type="text" size="3" id="height" name="height"/>
				</td>
			</tr>
			<tr>
				<td>Weight:</td>
				<td>
				<input type="text" size="3" id="weight" name="weight"/>
				lbs </td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td>
				<input type="radio" name="gender" value="Male">Male
				<input type="radio" name="gender" value="Female">Female
				</td>
			</tr>
			<tr>
				<td>Date Of Birth:</td>
				<td>
				<select name="dob_year">
					<option value="-1">----</option>
					<?php foreach($dob_year as $item => $value):?>
					<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
					<?php endforeach; ?>
				</select> &nbsp;
				<select name="dob_month">
					<option value="-1">---------</option>
					<?php foreach($dob_month as $item => $value):?>
					<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
					<?php endforeach; ?>
				</select> &nbsp;
				<select name="dob_day">
					<option value="-1">--</option>
					<?php foreach($dob_day as $item => $value):?>
					<option value="<?php echo $value; ?>"><?php echo $item; ?></option>
					<?php endforeach; ?>
				</select></td>
			</tr>
			<tr>
				<td>Address:</td>
				<td><textarea id="address" name="address"></textarea></td>
			</tr>
			<tr>
				<td>City:</td>
				<td>
				<input type="text" size="20" id="city" name="city"/>
				</td>
			</tr>
			<tr>
				<td>Province:</td>
				<td>
				<input type="text" size="20" id="province" name="province"/>
				</td>
			</tr>
			<tr>
				<td>Country:</td>
				<td>
				<select name="country" id="country">
					<option value="-1">------------------------------------------</option>
					<?php foreach($country as $item):?>
					<option value="<?php echo $item['Id'] ?>"><?php echo $item['Name'] ?></option>
					<?php endforeach; ?>
				</select>
				</td>
			</tr>
			<tr>
				<td>Postal Code:</td>
				<td>
				<input type="text" size="20" id="postal_code" name="postal_code"/>
				</td>
			</tr>
			<tr>
				<td>Contact Number:</td>
				<td>
				<input type="text" size="20" id="contact_number" name="contact_number"/>
				</td>
			</tr>
			<tr>
				<td>Other Number:</td>
				<td>
				<input type="text" size="20" id="other_number" name="other_number"/>
				</td>
			</tr>
			<tr>
				<td>Roles:</td>
				<td>
				<select id="user_role" name="user_role">
					<option value="-1">------------------</option>
					<?php foreach($user_roles as $item):?>
					<option value="<?php echo $item['Id'] ?>"><?php echo $item['Name'] ?></option>
					<?php endforeach; ?>	
				</select>
				</td>
			</tr>
		</table>
		<input type="submit" value="Add"/>
		</form>
	</body>
</html>
