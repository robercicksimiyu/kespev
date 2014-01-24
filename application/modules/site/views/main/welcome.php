<?php $images=base_url()."kespev_assets/images/";?>
<style>
.alert{
	background:#fcfcfc;
}
</style>
<div class="container">
  <div class="row">
    <div class="span7">
    	<h1 class="alert alert-info" style="background: #fa872a; color:#000; margin-top:-8px;">Latest Events</h1>
    	<div class="clear"></div>
    	<?php foreach($content as $row):?>
    	<div class="post alert" >
    		
    		<h2 class="posttitle"><a href="<?php echo site_url('site/this_event/'.$row->evt_name.'/'.$row->id);?>"><?php echo $row->evt_name;?></a> | <?php $time=explode(" ", $row->time_posted); $date=array_shift($time); $date=explode("-",$date);echo "<span class='datecircle'>".$date[2]."</span>"." ".$this->comment->months($date[1]); ?></h2>
    		<?php $username=$row->owner;?>
    		<div class="entry-utility">
    		by <a href="<?php echo site_url('main/profile/'.$username);?>"><?php if(strtolower($row->owner)!=$this->session->userdata('username')){echo $row->owner;}else{echo "me";}?></a>, posted in <a href="#"><?php echo $row->sports;?></a> 
    		</div>

    		<div class="entry-utility-date"><span class="cd"><strong>Where? </strong> <?php echo $row->venue;?>  | </span><strong>When? </strong>From <?php echo $row->from;?></span> to <span class="cm"><?php echo $row->to;?></span></div>
    		<div class="entry">
    		<strong>What is  <?php echo $row->evt_name;?> ?</strong>
    		<p><?php echo $row->description;?></p>
    		<!-- <a href="./single.html" class="more">Continue Reading</a> -->
    		<div class="clear"></div>
    		</div>
    		<img src="<?php echo $images;?>hide-1.png" alt="delete" class="delete" />
    		<strong><a href="<?php echo site_url('site/this_event/'.$row->evt_name.'/'.$row->id);?>"><?php echo $this->comment->count_comment($row->id);?></a><?php if($this->comment->count_comment($row->id)<2){echo " comment <span id='comment'>xcd</span>";}else{echo " comments <span id='comment'>xcd</span>";};?></strong>
    		<?php if($this->comment->count_comment($row->id)>0):?>
    		<?php foreach($this->comment->display($row->id) as $comnt):?>
    			<p class="span6 comment"><span class="com">com</span><a href="<?php echo site_url('main/profile/'.$comnt->posted_by);?>"><?php echo $comnt->posted_by;?></a> <?php echo $comnt->comment;?> | <?php echo $this->comment->timing($comnt->time_commented);?></p>

    		<?php endforeach;?>
    		<?php else:?>
    			<p class="comment">No comments</p>
    		<?php endif;?>		
    		

    			
    		
    		<?php echo form_open('site/comment');?>
    			<input type="text" name="comment" style="width:578px;" rows="10" placeholder="Press enter to submit comment" required="required">
    			<input type="hidden" name="event_id" value="<?php echo $row->id;?>">
    			<input type="hidden" name="username" value="<?php echo $this->session->userdata('username');?>">
    		</form>
    		
    		
    	</div><!-- end .post -->

    	<?php endforeach;?>
    	<div class="pagination pagination-large">
    		<?php echo $this->pagination->create_links();?>
    	</div><!-- end .wp-pagenavi -->	
    	<div class="clear" style="margin-bottom:65px;"></div>
	</div>
	<div class="span5" >
		<div class="sidebox" >
		<div class="clear"></div>
		<ul>
		  <li>
			 <h2 class="widget-title">Sport Categories</h2>
			 <ul>
			    <li><a href="<?php echo site_url('site/sport/athletics');?>" >Athletics Events  <span class="circle">   <?php echo $sports_num['athletics'];?></span></a>  </li>
			    <li><a href="<?php echo site_url('site/sport/basketball');?>">Basketball Events<span class="circle">  <?php echo $sports_num['basketball'];?></span></a></li>
			    <li><a href="<?php echo site_url('site/sport/football');?>">Football Events<span class="circle"><?php echo $sports_num['football'];?></span></a></li>
			    <li><a href="<?php echo site_url('site/sport/handball');?>">Handball Events<span class="circle"><?php echo $sports_num['handball'];?></span></a></li>
			    <li><a href="<?php echo site_url('site/sport/hockey');?>">Hockey Events<span class="circle"><?php echo $sports_num['hockey'];?></span></a></li>
			    <li><a href="<?php echo site_url('site/sport/volleyball');?>">Volleyball Events<span class="circle"><?php echo $sports_num['volleyball'];?></span></a></li>
			    <li><a href="<?php echo site_url('site/sport/rugby');?>">Rugby Events<span class="circle"><?php echo $sports_num['rugby'];?></span></a></li>
			 </ul>
		  </li>
		</ul>
	    </div>
	    <div class="sidebox">
		<strong><h1>Sports Graph</h1></strong>
		<canvas id="canvas" height="250" width="300"></canvas>
		<script>
		var barChartData = {
			labels : ["Athletics","Basketball","Handball","Hockey","Football","Rugby","Volleyball"],
			datasets : [
				{
				fillColor : "#F38630",
				strokeColor : "rgba(220,220,220,1)",
				data : [
				<?php echo $sports_num['athletics'];?>,
				<?php echo $sports_num['basketball'];?>,
				<?php echo $sports_num['handball'];?>,
				<?php echo $sports_num['hockey'];?>,
				<?php echo $sports_num['football'];?>,											
				<?php echo $sports_num['rugby'];?>,
				<?php echo $sports_num['volleyball'];?>
				]
				}
										
			]
									
		}

		var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(barChartData);
	    </script>
		</div>
	

	</div>
  </div>
</div>



<div  id="supdialog">
	<?php if(isset($message)):?>
	<div id='message' class="ui-state-error ui-corner-all">
		<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
			<strong>Sorry:</strong><p><?php echo $message;?></p>
	</div>
	<?php endif;?>
<?php echo form_open('main/update_user',array('id'=>"signupf"));?>
				
	<table>
		<tr><td><Strong>Name</strong></td>
			<td><input type="text" class="inputbox" name="fName" value="<?php echo $this->session->userdata('first_name');?>"><input type="text" name="lName" value="<?php echo $this->session->userdata('last_name');?>"></td>
		</tr>

		<tr>
			<td><strong>Username</strong></td>
			<td><input type="text" class="inputbox" name="username" value="<?php echo $this->session->userdata('username');?>"></td>
		</tr>
		<tr>
			<td><strong>Phone</strong></td>
			<td><input type="text" class="inputbox" name="phone" value="<?php echo $this->session->userdata('phone');?>"></td>
			</tr>
		<tr>
			<td><strong>Residence</strong></td>
			<td><input type="text" class="inputbox" name="location" value="<?php echo $this->session->userdata('location');?>"></td>
		</tr>
		<tr>
			<td><strong>Sport</strong></td>
			<td><input type="text" class="inputbox" name="sport" value="<?php echo $this->session->userdata('fav_sport');?>"></td>
		</tr>
		<tr>
			<td><strong>Event</strong></td>

			<td>
				<select name="option" class="inputbox" id="option">
					<option id="opt_1" value="<?php echo $this->session->userdata('option');?>"><?php echo $this->session->userdata('option');?></option>
					<option id="opt_1" value="Organizer">Organizer</option>
					<option id="opt_2" value="Participant">Participant</option>
				</select>
			</td>
			
		</tr>
		

	</table>	
	
	<input type="submit" id="sup" class="button" value="Update" onblur="" onfocus=""/>

</form>
</div>
</div>
</div>

<?php if(isset($confirming_err)):?>
<div id="confirm_err" class="ui-corner-all">
	<?php echo $confirming_err;?>
</div>

<script language="javascript">

	$('#confirm_err').dialog({
		title:"Update error",
		autoOpen:true,
		width:400,
		
		buttons:[
			{
				text:"Cancel",
				click:function(){
					$(this).dialog("close");
				}
			},
			{
				text:"Try again",
				click:function(){
					$('#supdialog').dialog("open");
				}
			}

		]
		
	}).dialog("open");


	
</script>
<?php endif;?>
<?php if(isset($thank_you)):?>

	<div id="thank_you">
		<?php echo $thank_you;?>
	</div>

	<script language="javascript">

		$('#thank_you').dialog({
			title:"<h5 style='color:#fa8234;font-weight:bold;font-size:14px;'>update complete</h5>",
			autoOpen:true,
			width:200,
			height:150,
			buttons:[
				{
					text:"Ok",
					click:function(){
						$(this).dialog("close");
					}
				},
				
			]
			
		}).dialog("open");


		
	</script>




<?php endif;?>
