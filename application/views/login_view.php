<h4>Login</h4>

<?php if($this -> session -> flashdata('message')) : ?>
	<div style="border: 1px solid red;"><?= $this -> session -> flashdata('message') ?></div style="border: 1px solid red;">
<?php endif; ?>

<?php echo form_open('login/login_verify', array('id' => 'login_form')); ?>
<table>
	<tr>
		<td>
			Email: 
		</td>
		<td>
			<input type="text" name="email" id="email" class="" />
		</td>
	</tr>
	<tr>
		<td>
			Passwords:
		</td>
		<td>
			<input type="password" name="password" id="password" class="long"  />
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td>
			<label class="checkbox">
				<input type="checkbox" name="remember_me" id="remember_me">	Remember Me 
			</label>
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td>
			<input type="submit" class="btn" value="Login"/>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<a href='<?php echo $facebook_url; ?>'><img src="<?php echo base_url(); ?>assets/images/icons/facebook_login.png"></a>
		</td>
	</tr>
</table>
</form>
<div id="error_box" title="Incorrect Login">
	<div id="error_message"></div>
</div>