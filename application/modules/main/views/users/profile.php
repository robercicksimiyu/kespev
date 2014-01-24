<?php $images=base_url()."kespev_assets/images/";?>
<style>
	p{font-size: 1.2em;}
</style>

<div class="container">
	<?php foreach($profile_data as $profile):?>
		<div class"row">
			<h1 class="alert alert-info" style="background: #fa872a; color:#000;margin-top:-8px;"> <?php echo $profile->username;?>'s profile</h1>
		
		<div class="span7">
		
			
				
				<img id="prof_pic" src="<?php echo $images?>avatar-default.gif">

				<div id="clear"></div>

				<div class="alert alert-info">
					<p><strong>Name:  </strong>
					<?php echo $profile->first_name;?> <?php echo $profile->last_name;?></p>
				</div>
				

				<div class="alert alert-info">
					<p><strong>Username: </strong>
					<?php echo $profile->username;?></p>
				</div>

				

				<div class="alert alert-info">
					<p><strong>Email Address: </strong>
					<?php echo $profile->email;?></p>
				</div>

				

				<div class="alert alert-info">
					<p><strong>Mobile Number: </strong>
					<?php echo $profile->phone;?></p>
				</div>

				

				<div class="alert alert-info">
					<p><strong>Title: </strong>
					<?php echo $profile->option;?></p>
				</div>

				

				<div class="alert alert-info">
					<p><strong>Favourite Sport: </strong>
					<?php echo $profile->fav_sport;?></p>
				</div>

				<div class="alert alert-info">
					<p><strong>Residence: </strong></tt>
					<?php echo $profile->location;?></p>
				</div>

				
				

		</div>

		<div class="span4">

				
				<h2>Conversation</h2>
				<?php $msgs=$this->msg_model->conversation($this->session->userdata('username'),$profile->username)?>
				<div id="coversation">
					<?php if(!empty($msgs)):?>
					<?php foreach($msgs as $msg):?>
						From    : <?php if($msg->msg_from==$this->session->userdata('username')){echo 'me';}else{echo $msg->msg_from;}?></br>
						To      : <?php if($msg->msg_to==$this->session->userdata('username')){echo 'me';}else{echo $msg->msg_to;}?></br>
						Message : <?php echo $msg->msg_content;?></br>
						<div class="separator"></div>
					<?php endforeach;?>
					<?php else:?>
						<p>No conversation</p>
					<?php endif;?>
				</div>
				<h4 class="message"><a href="#"><img src="<?php echo $images?>ico1/24x24/mail.png" style="margin-bottom:-8px;">  Send him a message </a></h4>
				<?php echo form_open('message/send_message',array('id'=>'message'));?>
					To: <input type="text" id="msg_to"  name="msg_to" class="inputbox"  value="<?php echo $profile->username;?>">
					<textarea cols="35" rows="5" name="msg_content"></textarea>
					<input type="hidden" name="msg_from" value="<?php echo $this->session->userdata('username');?>">
					<input type="submit" class="button" value="Send"/>
				</form>
			
		</div>
		<div class="span12">
			
			<div id="sep"></div><div class="clear"></div>
			<p class="alert alert-success"><strong>Latest events updated by </strong><?php echo $profile->username;?></p>
			
			

			<?php foreach($owner_posts as $row):?>
			<div class="post alert alert-block">
				
				<h2 class="posttitle"><a href="<?php echo site_url('site/this_event/'.$row->evt_name.'/'.$row->id);?>"><?php echo $row->evt_name;?></a> </h2>
				
				<div class="entry-utility">
				by <a href="#"><?php if($row->owner!=$this->session->userdata('username')){echo $row->owner;}else{echo "me";}?></a>, posted in <a href="#"><?php echo $row->sports;?></a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="#"><?php echo $this->comment->count_comment($row->id);?></a> <?php if($this->comment->count_comment($row->id)<2){echo " comment";}else{echo " comments";}?>
				</div>

				<div class="entry-utility-date"><span class="cd"><strong>Where? </strong> <?php echo $row->venue;?>  | </span><span class="cd"><strong>When? </strong>From <?php echo $row->from;?></span> to <span class="cm"><?php echo $row->to;?></span></div>
				<div class="entry">
				<strong>What is  <?php echo $row->evt_name;?> ?</strong>	
				<p><?php echo $row->description;?></p>
				<!-- <a href="./single.html" class="more">Continue Reading</a> -->
				
				<div class="clear"></div>
				<strong>comment</strong>
				<?php echo form_open('site/comment');?>
					<input type="text" name="comment" size="108" rows="10" class="span11" placeholder="Press enter to submit comment" required="required">
					<input type="hidden" name="event_id" value="<?php echo $row->id;?>">
					<input type="hidden" name="username" value="<?php echo $this->session->userdata('username');?>">
				</form>
				</div>
				<img src="<?php echo $images;?>hide-1.png" alt="delete" class="delete" />
			</div><!-- end .post -->
			<?php endforeach;?>
		</div>
	</div><!-- end #sideright -->
</div>
	
	<div class="clear" style="margin-bottom:65px;"></div>
	<div class="clear"></div><!-- clear float -->

<?endforeach;?>


<script language="javascript">

	$('#message').hide();
	$('h4.message a').click(function(){
					$('#message').show(250);
					console.log("clicked");
					$('h4.message a').hide(1000);
					$('input[text]#msg_to').css({opacity:.5}).attr('disabled',true);
				});
</script>



