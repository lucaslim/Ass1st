<script type="text/javascript">
</script>
<div id="player_login_form_div">
	<?php echo form_open('login/login_verify', array('id' => 'login_header_form')); ?>

	<fieldset>
		<ul>
			<li>
				<div>
					<input type="submit" class="btn" value="Log In"/>
				</div>
			</li>
			<li>
				<div>
					<input type="password" placeholder="Password" id="password" name="password"/>
				</div>
				<div class="forgot_remember">
					<a href="#">Forgot your password?</a>
				</div>
			</li>
			<li>
				<div>
					<input type="text" placeholder="Email" id="email" name="email" />
				</div>
				<div class="forgot_remember">
					<label class="checkbox">
						<input type="checkbox">	Remember Me 
					</label>
				</div>
			</li>
			<div id="error_header_box" title="Incorrect Login">
				<div id="error_header_message"></div>
			</div>
		</ul>
	</fieldset>

</form>
</div>
