 
<div id="div_login" class="clearfix">
	<div id="title_info">
		<h4>Login to your account -- No Account Yet?</h4>
		<?php if($this -> session -> flashdata('message')) : ?>
			<div style="border: 1px solid red;"><?= $this -> session -> flashdata('message') ?></div style="border: 1px solid red;">
		<?php endif; ?>
	</div>


	<div id="login_accounts" class="clearfix">
		<div id="LA_socialnet"> 
			<ul>
				<li>
					<label>Sign in with a social network</label>
				</li>
				<!-- <a href='<?php echo $facebook_url; ?>'><img src="<?php echo base_url(); ?>assets/images/icons/facebook_login.png"></a> -->
				<li>
					<a href='<?php echo site_url('login_fb') ?>'><input type="submit" value="X&nbsp;&nbsp;Sign in with Facebook" id="submit_facebook" name="submit facebook" /></a>
				</li>
				<li>
					<a href='<?php echo site_url('login_twitter') ?>'><input type="submit" value="X&nbsp;&nbsp;Sign in with Twitter" id="submit_twitter" name="submit twitter"/></a>
				</li>
			</ul>
				<div id="LA_or">OR</div>
		</div>
		<div id="LA_usremail">
			<ul>
				<li>
					<label>Sign in with your email</label>
				</li>
				<?php echo form_open('login/login_verify', array('id' => 'login_form')); ?>
					<table>
						<tr>
							<td>
								<input type="text" name="email" id="email" class="" />
							</td>
						</tr>
						<tr>
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
								<!-- <a href='<?php echo $facebook_url; ?>'><img src="<?php echo base_url(); ?>assets/images/icons/facebook_login.png"></a> -->
							</td>
						</tr>
					</table>
				</form>
			</ul>
		</div>
		<div id="error_box" title="Incorrect Login">
			<div id="error_message"></div>
		</div>
	</div>
</div>