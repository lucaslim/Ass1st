<span id="thrs_sign_reg">
	<span><a href="#" id="sign_in">Sign In</a></span>
	<span>|</span>
	<span><a href="#">Register</a></span>
</span>

<!-- Background Fader -->
<div id="bg_fade"></div>

<!-- Login Modal -->
<div id="signin_dialog" >

	<div id="user-session-form">
        <header>
        	<span>Sign into your Team Assist account.</span>
        </header>
        
        <div class="cell social-signin">
            <div class="sectionTitle">Sign in with a social network...</div>    
            <ul>
            	<li><button class="btn_social_signup" id="signup_facebook" onclick="window.location.href = '<?php echo site_url('login_fb') ?>'"><span><i class="icon-facebook"></i></span>&nbsp;| &nbsp;&nbsp;Sign in with Facebook</button></li>
                <li><button class="btn_social_signup" id="signup_twitter" onclick="window.location.href = '<?php echo site_url('login_twitter') ?>'"><span><i class="icon-twitter"></i></span>&nbsp;| &nbsp;&nbsp;Sign in with Twitter</button></li>
                <li><button class="btn_social_signup" id="signup_google"><span><i class="icon-google-plus"></i></span>&nbsp;| &nbsp;&nbsp;Sign in with Google+</button></li>
            </ul>
        </div>
   
        <div class="cell email-signin">
            
            <div class="sectionTitle">Sign in with your email...</div>
            
            <span class="or">or</span>

            <div id="signin_exit" class="exit"><i class="icon-minus icon-large"></i></div>

            <?php echo form_open('login/login_verify', array('id' => 'login_header_form')); ?>                
                <ul>
                    <li><input id="user_login" name="email" placeholder="Email" type="text" /></li>
                    <li><input id="user_password" name="password" placeholder="Password" type="password" /></li>
                </ul>
                
                <div>
                    <input class="sign-in-button" name="commit" type="submit" value="Login" />
                    <a href="#" class="forgot_pass">Forgot your password?</a>
                </div>
                	<br />
                <div class="create_account">
                    <span>No account yet?&nbsp;&nbsp;&nbsp;</span><a href="#" class="">Sign Up</a>
                </div>
                
            </form>
        </div>
        <div id="error_box" title="Incorrect Login">
            <div id="error_message"></div>
        </div>
	</div>
</div>