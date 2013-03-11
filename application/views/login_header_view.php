<script type="text/javascript">
$(document).ready(function() {
		//Form
		$('#login_form').submit(function(e) {
			e.preventDefault();

			dataString = $(this).serialize();

			$.ajax({
				type : $(this).attr("method"),
				url : $(this).attr("action"),
				data : dataString,
				dataType : "json",
				success : function(data) {
					if(!data.success)
					{
						$('#error_message').html(data.message);
						$('#error_box').dialog("open");
					}
					else{
						window.location.reload();
					}
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