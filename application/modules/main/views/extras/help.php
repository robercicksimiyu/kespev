<?php $images=base_url()."kespev_assets/images";?>
<style>
	.sep{margin-bottom: 8px;}
	.faq{background:#def0d8;}
</style>
<div class="clear" style="margin-bottom:49px;"></div>
<div class="container">
	<div class="row">
		<h1>Welcome! How can we help you?</h1>

		<div class="span4 pull-right display">
			
			<div class="this_cont" id="welcome">
				<strong>Sign Up</strong>
				<p>Considering you are new to this website. You will be required to create an account before accesing information.</p>
				<img class="pull-left"src="<?php echo $images;?>/signup.jpg" class="span4">
				<p>Click on the <strong>sign up</strong> button to sign up then procedd to fill the necessary details.</p>

				<div class="sep"></div>
				<strong>Sign In</strong>
				<p>After registering one is required to sign in in order to access the information available.</p>
				<img class="pull-left"src="<?php echo $images;?>/signin.jpg" class="span4">
				<p>Fill in the password and the email and sign up and you will have this page</p>
				<div class="sep"></div>
				<strong>Home Page</strong>
				<img class="pull-left"src="<?php echo $images;?>/home.jpg" class="span5">
				<p>Home page contains all the latest sporting events well paginates and presentable</p>

				<h2 class="alert faq">FAQ</h2>
				<strong>What is Kenya Sporting Events?</strong>
				<p>A web information platform updating you of upcoming sporting events on the web.</p>
				<strong></strong>

				
			</div>

			<div class="this_cont" id="me_content">
				<strong>About you</strong>
				<p>To view you profile and the latest post your will click on the right side of the navigation with a drop down</p>
				<p><img class="pull-left span3"src="<?php echo $images;?>/view_prof.jpg" ></p>
				<p>Whan the view profile navigation is clicked it will display</p>
				<p><img class="pull-left span3"src="<?php echo $images;?>/profl.jpg" ></p>

			</div>

			<div class="this_cont" id="inform_content">
				Before looking at the first example, the css class naming.
			</div>

			<div class="this_cont" id="discover_content">
				Before looking at the first example, the css class naming.
			</div>

			<div class="this_cont" id="connect_content">
				Before looking at the first example, the css class naming.
			</div>

			<div class="this_cont" id="policy_content">
				Before looking at the first example, the css class naming.
			</div>

			<div class="this_cont" id="safety_content">
				Before looking at the first example, the css class naming.
			</div>

		</div>

		<a href="#" id="welcome_link">
			<div class="span6 alert alert-info" >
				<strong>Welcome to Kespev</strong>
				<p>Get started: FAQs with the basics</p>
			</div>
		</a>

		<a href="#" id="me">
			<div class="span6 alert alert-info" >
				<strong>Me</strong>
				<p>Manage your profile and account settings</p>
			</div>
		</a>

		<a href="#" id="inform">
			<div class="span6 alert alert-info" >
				<strong>Inform</strong>
				<p>Letting other people know what is happenning</p>
					
			</div>
		</a>
		
		<a href="#" id="connect">
		<div class="span6 alert alert-info" >
			<strong>Connect</strong>
			<p>Interact with other users</p>
		</div>
		</a>

		<a href="#" id="discover">
		<div class="span6 alert alert-info" >
			<strong>Discover</strong>
			<p>Find information related to your sport of interest</p>
		</div>
		</a>

		<a href="#" id="policies">
		<div class="span6 alert alert-info" >
			<strong>Policies and violations</strong>
			<p>Know kespev rules and report violation</p>
		</div>
		</a>

		<a href="#" id="safety">
		<div class="span6 alert alert-info" >
			<strong>Safety and Security</strong>
			<p>Stay safe and informed</p>
		</div>
		</a>
		
		
		
		
		

	</div>
</div>
<div class="clear" style="margin-bottom:49px;"></div>



<style>
	a:hover{
		
		text-decoration: none;
	}
	p{
		color: #000;
		font-size: 14px;
	}
	strong{
		font-size: 16px;
	}
</style>

<script>
	
	$('.this_cont').hide();
	$('#welcome_link').click(function(){
		$('.this_cont').hide();
		$('#welcome').addClass('alert alert-block').toggle(100);
	});

	$('#me').click(function(){
		$('.this_cont').hide();
		$('#me_content').addClass('alert alert-block').toggle(100);
	});

	$('#inform').click(function(){
		$('.this_cont').hide();
		$('#inform_content').addClass('alert alert-block').toggle(100);
	});

	$('#discover').click(function(){
		$('.this_cont').hide();
		$('#discover_content').addClass('alert alert-block').toggle(100);
	});

	$('#connect').click(function(){
		$('.this_cont').hide();
		$('#connect_content').addClass('alert alert-block').toggle(100);
	});

	$('#policies').click(function(){
		$('.this_cont').hide();
		$('#policy_content').addClass('alert alert-block').toggle(100);
	});

	$('#safety').click(function(){
		$('.this_cont').hide();
		$('#safety_content').addClass('alert alert-block').toggle(100);
	});

</script>