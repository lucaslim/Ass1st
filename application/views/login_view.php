<h3>Login</h3>

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
			Password:
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
</table>
</form>
<div id="error_box" title="Incorrect Login">
	<div id="error_message"></div>
</div>