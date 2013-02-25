<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<h1>Login Panel</h1>
		<?php echo validation_errors(); ?>
		<?php echo form_open('login/login_verify'); ?>
		<label for="username">Email:</label>
		<input type="text" size="20" id="email" name="email"/>
		<br/>
		<label for="password">Password:</label>
		<input type="password" size="20" id="password" name="password"/>
		<br/>
		<input type="submit" value="Login"/>
		</form>
	</body>
</html>