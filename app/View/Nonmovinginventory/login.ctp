<div class="logo">
	<img src="<?php echo $this->webroot; ?>images/project_logo/non-moving-logo.png" width="250" alt="NON MOVING INVENTORY">
</div>
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form novalidate="novalidate" class="login-form"  method="post">
		<h3 class="form-title">Sign In</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any email and password. </span>
		</div>
        <?php
		if(!empty($wrong))
		{
		?>
        <div class="alert alert-danger">
			<button class="close" data-close="alert"></button>
			<span>
			<?php echo $wrong; ?> </span>
		</div>
        <?php
		}
		?>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<input class="form-control form-control-solid placeholder-no-fix" autocomplete="off" placeholder="Email" name="email_id" type="text">
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" autocomplete="off" placeholder="Password" name="password" type="password">
		</div>
		<div class="form-actions">
			<button type="submit" name="login_submit" class="btn btn-success uppercase">Login</button>
		
			<a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
		</div>
		
		<div class="create-account">
			<p>
				<a href="<?php echo $this->webroot; ?>Nonmovinginventory/register"  class="uppercase">Create an account</a>
			</p>
		</div>
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form novalidate="novalidate" class="forget-form"  method="post">
		<h3>Forget Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<input class="form-control placeholder-no-fix" autocomplete="off" placeholder="Email" name="email" type="text">
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn btn-default">Back</button>
			<button type="submit" name="reset_password" onclick="javascript:;window.close();" class="btn btn-success uppercase pull-right">Submit</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
	<!-- BEGIN REGISTRATION FORM -->
	
	<!-- END REGISTRATION FORM -->
</div>