<style>
	.span5{
		font-size:16px;
	}
</style>
<div class="clear" style="margin-bottom:-18px;"></div>
<div class="container">
	<div class="row">
		<div class="span12">
			<h1 class="alert alert-info" style="background: #fa872a; color:#000;">Post your Event</h1>
		</div>
		<div class="clear" style="margin-bottom:-28px;"></div>
		<div class="span5">
			<img src="<?php echo base_url();?>kespev_assets/images/sports.png" class="span4">
		</div>

		<div class="span6">
				<?php if(isset($message)and $message!=""):?>
			  	<div class="alert alert-error">
			  		<span class="ui-icon ui-icon-alert " style="float: left; margin-right: .3em;"></span>
			  			<strong>Sorry:</strong><p><?php echo $message;?></p>
			  	</div>
			  	<?php endif;?>
			  	<?php echo form_open('site/submit_event',array('class'=>'span5 alert alert-info','style'=>"background:#efefef;"));?>
				  <label for="name" id="name_label">Events Name</label>
				  <input type="text" name="name"  id="name"  value="" class="span5" />
				  <div class="clear"></div>
				  From: <input type="text" style="width:185px;" name="from" id="datef"  value="" class="input-medium" />
				  to <input type="text" name="to" id="dateto"  value="" class="input-medium" />
				 
				 <label for="msg" id="decr_label">Description</label>
				 <textarea cols="52" rows="5" name="description" id="msg" class="span5"></textarea><br />

				 <label for="name" id="venue_label">Events Venue</label>
				  <input type="text" name="venue"  id="name" value="" class="span5" />
				  
				  <label for="name" id="participation_label">Sports participating</label>
				  <input type="text" name="partc"  id="sport_prtc" value="" class="span5" />
				  
				  <label for="name" id="sponsors_label">Sponsors</label>
				  <input type="text" name="sponsors"  id="sponsors" value="" class="span5" />
				  <div class="clear"></div>
				  <input type="hidden" value="<?php echo $this->session->userdata('username');?>" name="username">
				  <input type="submit" id="submit" name="submit" class="btn btn-primary pull-right" id="submit_btn" value="Post Event"/>
				
			
			  </form>
			
		</div>

	</div>
</div>
<div class="clear" style="margin-bottom:39px;"></div>
<script>
	$('#datef,#dateto').datepicker({minDate:-0});
	$('#datef,#dateto').datepicker("option","dateFormat","yy-mm-dd");
	$('#submit').click(function(e){
		var name=$('input#name').val();
		$.ajax({
			type:'POST',
			data:name,
			url: "<?php echo site_url('site/submit_event');?>",
			success: function(data){
				$('body').html(data);
				$('#container').html('success');
			}
		});
		e.preventDefault();
	});
</script>