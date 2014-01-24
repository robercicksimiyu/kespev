
<?php $images=base_url()."kespev_assets/images/";?>
<?php $js=base_url()."kespev_assets/js/";?>

<script type="text/javascript" src="<?php echo $js;?>jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo $js;?>jquery.validate.password.js"></script>
<style>
div.separate{
	margin-top: 10px;

}
.err{
	margin-bottom: 15px;
	color: #000;
}
</style>


	<div class="clear" style="margin-top:50px;"></div><!-- clear float -->
	<div class="container">

		<div class="row">
			<div class="span6 alert alert-info">

				<h2>1. Create Account</h2><h3>Be the first to know what’s happening now, tommorow and in the future. Join our interactive platform. This is for you lovers of sports. </h3>
				<h2>2. Interact</h2><h3>Get an oppotunity to interact with people who share the same passion in sporting. Socializing with those you admire and being an mentor to those who admire you.</h3>
				
			</div>
			<div class="span5">
				<?php if(isset($message)){
					echo "<div class='alert alert-error'> <span class='err'><image src='{$images}ico1/16x16/warning.png'> Sorry ! Please consider </span>  {$message}</div>";
				}

				?>
			<?php echo form_open('main/create_user',array('class'=>"form-horizontal"));?>
				<div class="input-prepend">
					<label for="name"><strong>Name *</strong></label>
					<input class="span2" name="fName" id="prependedInput" type="text" value="<?php if(isset($fname)){echo $fname;}?>"placeholder="First Name">
					<input class="span2" name="lName"id="prependedInput" type="text" value="<?php if(isset($lname)){echo $lname;}?>"placeholder="Last Name">
				</div>
				<div class="separate"></div>
				<div class="input-prepend">
					<label for="name"><strong>Your desired username *</strong></label>
					<span class="add-on"><img src="<?php echo $images?>ico1/16x16/user.png"> </span>
					<input class="input-xlarge" id="prependedInput" type="text" name="username" value="<?php if(isset($username)){echo $username;}?>"placeholder="Username">
				</div>
				<div class="separate"></div>
				<div class="input-prepend">
					<label for="name"><strong>Email *</strong></label>
					<span class="add-on"><img src="<?php echo $images?>ico1/16x16/email.png"> </span>
					<input class="input-xlarge" id="prependedInput" name="email" type="email" value="<?php if(isset($email)){echo $email;}?>"placeholder="Email">
				</div>
				<div class="separate"></div>
				<div class="input-prepend">
					<label for="name"><strong>Create your password *</strong></label>
					<span class="add-on"><img src="<?php echo $images?>ico1/16x16/key.png"> </span>
					<input class="input-xlarge" id="prependedInput" name="password" type="password" placeholder="Create password">
				</div>
				<div class="separate"></div>
				<div class="input-prepend">
					<label for="name"><strong>Confirm password *</strong></label>
					<span class="add-on"><img src="<?php echo $images?>ico1/16x16/key.png"> </span>
					<input class="input-xlarge" name="c_password" id="prependedInput" type="password" placeholder="Confirm password">
				</div>
				
				<div class="input-prepend">
					<label for="name"><strong>Your phone number *</strong></label>
					<span class="add-on"><img src="<?php echo $images?>ico1/16x16/mobile_phone.png"> </span>
					<input class="input-xlarge" id="prependedInput" name="phone" value="<?php if(!empty($phone)){echo $phone;}else{echo "+254";}?>" type="text" >
				</div>
				<div class="separate"></div>
				<input type="submit" class="btn btn-medium btn-primary pull-right" value="Create Account">

			</form>
			</div>
		</div>
		<div class="clear" style="margin-top:70px;"></div><!-- clear float -->
	
	</div>
		

