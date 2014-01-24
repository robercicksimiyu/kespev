<script type="text/javascript" src="<?php echo $js;?>jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo $js;?>jquery.validate.password.js"></script>

<body>

		
<div class="clear"></div><!-- clear float -->
</br></br></br>
<!-- end #top-navigation -->
<div id="main">

		<ul  class="three_four_column">
			<li></li>
				   <li>
				    <h1 class="titlecolor"><span id="comp-sup">Kespev Accounts</span></h1>
					
			 </li>
		</ul>
		<div  id="signup-comp">
			<?php if(isset($message)and $message!=""):?>
			<div id='message' class="ui-state-error ui-corner-all">
				<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
					<strong>Sorry:</strong><p><?php echo $message;?></p>
			</div>
			<?php endif;?>
		<?php echo form_open('main/authenticate',array('id'=>"signupf"));?>
				<h1>Sign In</h1>		
				<strong for="email">Email</strong>
				<input type="text" class="inputbox" id="username" name="l_email" value="<?php if(isset($lin_email)){echo $lin_email;}  ?>" onblur="" onfocus=""/>
				</br>
				<strong for="email">Password</strong>
				<input type="password" class="inputbox" id="password" name="l_password" value="<?php if(isset($password)){echo $password;}  ?>" onblur="" onfocus=""/>
				
				<input type="submit" id="sup" class="button" value="Sign in" onblur="" onfocus=""/>

		</form>
		</div>
				
	<div class="clear"></div><!-- clear float -->
</div><!-- end #main -->

				<script>

					$(function(){
						//Disable the button when the data is not yet right
						$("#top").sticky({topSpacing: 0,centre:true,className:"m-logo social"});
						//disbling the submit button when the fields are empty
						$('input[type=submit]').attr('disabled',true)
													.css({opacity:0.5});

						//on hover and on blur of the text boxes
						$('input[type=text],input[type=password]').focus(function(){
							$(this).css({'border':'1px solid #f48b38','color':'#535353'});
						}).blur(function(){
							$(this).css({'border':'1px solid #e0e0e0'});
						});

						//checking the input field
						function checking(){
							$('input').keyup(function(){
								
							
							if($("input[type=text]#name").val()!='' && $("input[type=text]#username").val()!='' 
												&& $("input[type=password]#password").val()!='' && $("input[type=password]#c_password").val()!=''
												&& $("input[type=text]#phone").val()!='')
							{
								$('input[type=submit]#sup').attr('disabled',false)
																		.css({opacity:1},5000);
							}else{
								$('input[type=submit]').attr('disabled',true)
										.css({opacity:0.5});
							}
							});
						}
						

						checking();

						$("input[type=password]#c_password").keyup(function(){
							if($(this).val()!=$("input[type=text]#password").val()){
								$(this).css({'border':'1px solid #38ff45'});
							}

							
							
						});


						$("#signupform input[type=text]#sup_mail").blur(function(){
									if(IsEmail($("input[type=text]#email").val())!=false){
										$('#message').hide(100);
										$('div#checker').html("Click create to comlete the process");
									}else{
										
										$('div#checker').html("The email is not valid");
										$('#signupform input[type=submit]').attr('disabled',true)
												.css({opacity:0.5});
										
									}
									
								});
						
					});
				</script>
