<script type="text/javascript">
$(document).ready(function (){
	login_user($('#login_header_form'), $('#error_header_box'), $('#error_header_message'),);
});
</script>
<<<<<<< HEAD
<div id="player_login_form_div">
	<?php echo form_open('login/login_verify', array('id' => 'login_form')); ?>
		
			<fieldset>
				<div class="input_email_pass">
					<input type="text" placeholder="Email" id="email" name="email" />
					<input type="password" placeholder="Password" id="password" name="password"/>
					<input type="submit" class="btn" value="Log In"/>
				</div>
				<div id="div_remember_forgot">
					<div class="ckb_remember">
						<label class="checkbox">
							<input type="checkbox">	Remember Me 
						</label>
					</div>
					<div class="ckb_remember" id="forgot_pass">
						<a href="#">Forgot your password?</a>
					</div>
				</div>
				<div id="error_box" title="Incorrect Login">
					<div id="error_message"></div>
				</div>
			</fieldset>

	</form>
</div>
=======
<?php echo form_open('login/login_verify', array('id' => 'login_header_form')); ?>
<fieldset>
	<input type="text" placeholder="Email" id="email" name="email"/>
	<input type="password" placeholder="Password" id="password" name="password"/>
	<input type="submit" class="btn" value="Login"/>
	<label class="checkbox">
		<input type="checkbox" name="remember_me" id="remember_me">	Remember Me 
	</label>
	<div id="error_header_box" title="Incorrect Login">
		<div id="error_header_message"></div>
	</div>
</fieldset>
</form>
>>>>>>> Added Login Page
