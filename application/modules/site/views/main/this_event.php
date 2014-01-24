<?php $image=base_url()."kespev_assets/images";?>


<div class="container">
	<div class="row">
	  <div class="span7">
		<?php if(isset($game)):?>
		<?php echo "<h1 class='pagetitle'>{$game} Events</h1>";?>
		<?php else:?>
		<h1 class="alert alert-info" style="background: #fa872a; color:#000;margin-top:-8px;">Games Update</h1>
		<?php endif;?>
	
			<?php foreach($content as $row):?>
			<div class="post span7">
				<h2 class="posttitle"><a href="<?php echo site_url('site/this_event/'.$row->evt_name.'/'.$row->id);?>"><?php echo $row->evt_name;?></a> </h2>
				<?php $username=$row->owner;?>
				<div class="entry-utility">
				by <a href="<?php echo site_url('main/profile/'.$username);?>"><?php if($row->owner!=$this->session->userdata('username')){echo $row->owner;}else{echo "me";}?></a>, posted in <a href="#"><?php echo $row->sports;?></a> 
				</div>

				<div class="entry-utility-date"><span class="cd"><strong>Where? </strong> <?php echo $row->venue;?>  | </span><strong>When? </strong>From <?php echo $row->from;?></span> to <span class="cm"><?php echo $row->to;?></span></div>
				<div class="entry">
				<strong>What is  <?php echo $row->evt_name;?> ?</strong>
				<p><?php echo $row->description; ?></p>
				<!-- <a href="./single.html" class="more">Continue Reading</a> -->
				<div class="clear"></div>
				</div>
				
				<strong><a href="<?php echo site_url('site/this_event/'.$row->evt_name.'/'.$row->id);?>"><?php echo $this->comment->count_comment($row->id);?></a><?php if($this->comment->count_comment($row->id)<2){echo " comment <span id='comment'>xcd</span>";}else{echo " comments <span id='comment'>xcd</span>";};?></strong>
				<?php if($this->comment->count_comment($row->id)>0):?>
				<?php foreach($this->comment->display_all($row->id) as $comnt):?>
					<p class="span7 alert comment"><a href="<?php echo site_url('main/profile/'.$comnt->posted_by);?>"><?php echo $comnt->posted_by;?></a> <?php echo $comnt->comment;?>  <?php $time=explode(" ", $comnt->time_commented); $date=array_shift($time); $date=explode("-",$date);echo "<span class='datecircle'>".$date[2]."</span>"." ".$this->comment->months($date[1])." | ".$time[0]; ?></p>
				<?php endforeach;?>
				<?php else:?>
					<p class="comment">No comments</p>
				<?php endif;?>		
				

					
				
				<?php echo form_open('site/comment');?>
					<input type="text" name="comment" class="span7" placeholder="Press enter to submit comment" required="required">
					<input type="hidden" name="event_id" value="<?php echo $row->id;?>">
					<input type="hidden" name="username" value="<?php echo $this->session->userdata('username');?>">
				</form>
				<div class="clear"></div>
				
			</div><!-- end .post -->

			<?php endforeach;?>
	
	
			 <div class="wp-pagenavi">
				<a href="#" class="page">1</a><span class="current">2</span><a href="#" class="nextpostslink">&raquo;</a>
			 </div><!-- end .wp-pagenavi -->			 				
	  </div>
	  <div class="span5">
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
	</div>
	<div class="clear"></div><!-- clear float -->
</div>
<div class="clear" style="margin-bottom:69px;"></div>