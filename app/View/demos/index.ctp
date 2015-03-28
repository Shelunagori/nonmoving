<!-- BEGIN LOGO -->
  <div class="logo">
    <img src="as/hm/hm-logo.png" alt="logo" /> 
  </div>
  <!-- END LOGO -->
  <!-- BEGIN LOGIN -->
  <div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form id="contact-form" method="post" class="form-vertical login-form"  />
    <fieldset>
      <h3 class="form-title">Login to HousingMatters</h3>
      <div style="color:red;"><?php echo @$wrong; ?></div><br>
      <div class="control-group">
	  	<div class="controls">
        	<div class="input-icon left"><i class="icon-user"></i>
			<input type="text" id="l_uers"  class="m-wrap" name="username" style="font-size:16px;" value="<?php echo @$bgColor ; ?>"  placeholder="Your email ID*"onKeyUp="checked_cokies()" onMouseOver="checked_cokies()" >	<input type="hidden" id="login_user" value="<?php echo @$bgColor ; ?>" >
           
             </div>
		</div>
	  </div>
       <div class="control-group">
	  	<div class="controls">
        	<div class="input-icon left"><i class="icon-lock"></i>
			<input type="password" id="l_pass" onMouseOver="checked_cokies()"  class="m-wrap" placeholder="Password*" style="font-size:16px;" value="<?php echo @$txtColor; ?>" name="password" >
            <input type="hidden" id="login_pass" value="<?php echo @$txtColor ; ?>">
             </div>
		</div>
	  </div>  
      <div class="form-actions">
       <label class="checkbox">
        <div class="checker" id="uniform-undefined"><span><input type="checkbox" <?php if(!empty($bgColor)){?> checked="checked" <?php } ?> name="rememberme" value="1" style="opacity: 0;"></span></div> Remember me
        </label>
			<button type="submit" name="login" class="btn green  pull-right" style="font-size:16px; width:45%">Login  <i class="m-icon-swapright m-icon-white"></i></button>
      </div>
      <div class="forget-password">
        <h4>Forgot your password ?</h4>
        <p>
          no worries, click <a href="forget" class="" id="forget-password">here</a>
          to reset your password.
        </p>
      </div>
      <center>
      <a href="sign_up" class="btn blue " style="font-size:16px;" >New User Sign up</a> </center>
      </fieldset>
    </form>
    <!-- END LOGIN FORM -->        
 </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  <div class="copyright">
    HousingMatters.
  </div>
  <!-- END COPYRIGHT -->