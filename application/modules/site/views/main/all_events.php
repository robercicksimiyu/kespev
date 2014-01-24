<?php $image=base_url()."kespev_assets/images";?>
<div id="main">

	<div id="content">

	
	 <h1 class='pagetitle'>Events that match your profile</h1>
	
	
	<?php foreach($content as $row):?>
	<div class="post">
		
		<div class="post">
			
			<h2 class="posttitle"><a href="<?php echo site_url('site/this_event/'.$row->evt_name.'/'.$row->id);?>"><?php echo $row->evt_name;?></a> </h2>
			<?php $username=$row->owner;?>
			<div class="entry-utility">
			by <a href="<?php echo site_url('main/profile/'.$username);?>"><?php if($row->owner!=$this->session->userdata('username')){echo $row->owner;}else{echo "me";}?></a>, posted in <a href="#"><?php echo $row->sports;?></a> 
			</div>

			<div class="entry-utility-date"><span class="cd"><strong>Where? </strong> <?php echo $row->venue;?>  | </span><strong>When? </strong>From <?php echo $row->from;?></span> to <span class="cm"><?php echo $row->to;?></span></div>
			<div class="entry">
			<strong>What is  <?php echo $row->evt_name;?> ?</strong>
			<p><?php echo $row->description;?></p>
			<!-- <a href="./single.html" class="more">Continue Reading</a> -->
			<div class="clear"></div>
			</div>
			<img src="<?php echo $image;?>/hide-1.png" alt="delete" class="delete" />
			<strong><a href="<?php echo site_url('site/this_event/'.$row->evt_name.'/'.$row->id);?>"><?php echo $this->comment->count_comment($row->id);?></a><?php if($this->comment->count_comment($row->id)<2){echo " comment <span id='comment'>xcd</span>";}else{echo " comments <span id='comment'>xcd</span>";};?></strong>
			<?php if($this->comment->count_comment($row->id)>0):?>
			<?php foreach($this->comment->display($row->id) as $comnt):?>
				<p class="comment"><a href="<?php echo site_url('main/profile/'.$comnt->posted_by);?>"><?php echo $comnt->posted_by;?></a> <?php echo $comnt->comment;?>  <?php $time=explode(" ", $comnt->time_commented); $date=array_shift($time); $date=explode("-",$date);echo "<span class='datecircle'>".$date[2]."</span>"." ".$this->comment->months($date[1])." | ".$time[0]; ?></p>
				<?php echo $comnt->time_commented;?>>
			<?php endforeach;?>
			<?php else:?>
				<p class="comment">No comments</p>
			<?php endif;?>		
			

				
			
			<?php echo form_open('site/comment');?>
				<input type="text" name="comment" size="108" rows="10" placeholder="Press enter to submit comment" required="required">
				<input type="hidden" name="event_id" value="<?php echo $row->id;?>">
				<input type="hidden" name="username" value="<?php echo $this->session->userdata('username');?>">
			</form>
			<div class="clear"></div>
			<div class="separator"></div>
		</div><!-- end .post -->
	</div><!-- end .post -->

	<?php endforeach;?>
	
	
	 <div class="wp-pagenavi">
	 	
		<a href="#" class="page"><?php echo $this->pagination->create_links();?></a>
	</div><!-- end .wp-pagenavi -->			 				
	
	</div><!-- end #content -->
	
	<div id="sideright">
		
	<div class="sidebox">
		<table>
				<tr><td><Strong>Name</strong></td>
					<td><?php echo $this->session->userdata('first_name') ."\t".$this->session->userdata('last_name');?></td>
				</tr>
				<tr>
					<td><strong>Username</strong></td>
					<td><?php echo $this->session->userdata('username');?></td>
				</tr>
				<tr>
					<td><strong>Phone</strong></td>
					<td><?php echo $this->session->userdata('phone');?></td>
					</tr>
				<tr>
					<td><strong>Email</strong></td>
					<td><?php echo $this->session->userdata('email');?></td>
				</tr>
				<tr>
					<td><strong>Residence</strong></td>
					<td><?php echo $this->session->userdata('location');?></td>
				</tr>
				

			</table>

			<div class="clear"></div>
						<h2>Sporting</h2>
						<table> 
							<tr>
								<td><strong>Sport</strong></td>
								<td><?php echo $this->session->userdata('fav_sport');?></td>
							</tr>
							<tr>
								<td><strong>Event</strong></td>
								<td><?php echo $this->session->userdata('option');?></td>
							</tr>
						</table>
							
	</div>
	
	<div class="sidebox">
		<ul>
			<li>
				<h2 class="widget-title">Archives</h2>
				<ul>
					<li><a href="#" class="current">Nov 2010</a></li>
					<li><a href="#">Sep 2010</a></li>
					<li><a href="#">Oct 2010</a></li>
					<li><a href="#">Aug 2010</a></li>
				</ul>

			</li>
		</ul>
	</div>
	</div><!-- end #sideright -->
	<div class="clear"></div><!-- clear float -->
</div><!-- end #main -->