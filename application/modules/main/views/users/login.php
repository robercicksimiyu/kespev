
<?php $images=base_url()."kespev_assets/images/";?>
<?php $js=base_url()."kespev_assets/js/";?>
<div class="clear" style="margin-top:80px;"></div>
<div class="container">
	<?php if(isset($message)){
					echo "<div class='alert alert-error'> <span class='err'><image src='{$images}ico1/16x16/warning.png'> Sorry </span>  {$message}</div>";
				}?>

	<?php echo form_open('main/authenticate',array('class'=>'form-horizontal'));?>
	
	  <div class="control-group">
	    <label class="control-label" for="inputEmail">Email</label>
	    <div class="controls">
	      <input type="email" class="span3" id="inputEmail" name="l_email" value="<?php if(isset($lin_email)){echo $lin_email;}?>" placeholder="Email">
	    </div>
	  </div>
	  <div class="control-group">
	    <label class="control-label" for="inputPassword">Password</label>
	    <div class="controls">
	      <input type="password" class="span3" id="inputPassword" name="l_password" placeholder="Password" required>
	    </div>
	  </div>
	  <div class="control-group">
	    <div class="controls">
	      <label class="checkbox">
	        <input type="checkbox"> Remember me
	      </label>
	      <button type="submit" class="btn btn-medium btn-primary" required>Sign in</button>
	    </div>
	  </div>
	</form>

	<div class="alert alert-block">
		<strong>You don't have an account?</strong> It is easy click <a href="<?php echo site_url('main/signup');?>"><button class="btn btn-inverse">Sign up</button></a> and you will now join our community of over 200,000 people.
	</div>
</div>

<div class="clear" style="margin-bottom:38px;"></div>