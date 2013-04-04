<div class="container">
  <form class="form-signin" action="<?php echo base_url(); ?>auth/login/" method="post">
    <h2 class="form-signin-heading">Admin Login</h2>
    <input type="text" class="input-block-level" placeholder="Email address" name="identity" id="identity" />
    <input type="password" class="input-block-level" placeholder="Password" name="password" id="password" />
    <label class="checkbox">
      <input type="checkbox" name="remember" id="remember" value="1"> Remember me
    </label>
    <input class="btn btn-large btn-primary" type="submit" value="Sign In" />
  </form>
</div> <!-- /container -->
