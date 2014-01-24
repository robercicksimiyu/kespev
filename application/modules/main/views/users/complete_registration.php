
<?php $images=base_url()."kespev_assets/images/";?>
<?php $js=base_url()."kespev_assets/js/";?>
<div class="clear"></div><!-- clear float -->
</br>
<!-- end #top-navigation -->


<div class="container">
	<div class="row">

		<div class="span12 alert alert-info">
			<h1>Final Step</h1>
			
		</div>
		<div class="clear"></div><!-- clear float -->

		<?php echo form_open('main/complete_registration');?>
						
				<div class="span3">
				  <strong>Your favourite sport</strong> 			 
				  <input type="text" class="inputbox" id="sport_name" name="sport_name" value="" onblur="" onfocus=""/>
				</div>

				
				<div  class="span4">
				<label for="email"><strong>Residence</strong></label>
				<input type="text" class="input-xlarge" id="location" name="location" value="" onblur="" onfocus=""/>
				<input type="hidden" name="username" value="<?php echo (isset($username))? $username:"";?>">
				</br>
				<label><strong for="email">Account type</strong></label>
				</br>
					<select name="option" class="input-xlarge" id="option">
						<option id="opt_0" value="Participant">Please Choose</option>
						<option id="opt_1" value="Organizer">Events Organizer</option>
						<option id="opt_2" value="Participant">Events Participant</option>
					</select>
				
				</div>
				<div  class="span4">
				<h1>Thank you.</h1>
				<h4>Click finish to complete registration. You can also skip.</h4>
				<a href="<?php echo site_url('main/authenticate');?>"><button class="button">Skip</button></a>
				<input type="submit" id="sup" class="button pull-right" value="Finish" onblur="" onfocus=""/>
				
		</form>
		
			</div>
		
			<div class="clear" style="margin-bottom:60px;"></div>
				
	<div class="clear"></div><!-- clear float -->
</div>
</div><!-- end container -->

			
