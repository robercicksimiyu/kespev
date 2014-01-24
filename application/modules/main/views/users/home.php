
<?php $images=base_url()."kespev_assets/images/";?>

		<div id="myCarousel" class="carousel slide" >
	      <div class="carousel-inner">
	        <div class="item">
	          <img src="<?php echo $images;?>slide-01.jpg" alt="">
	          <div class="container">
	            <div class="carousel-caption" >
	              <div class="row" style="width:1234px;">
	                      <div class="span4">
	                     <h1 class="titlecolor"><span class="img-circle">01.</span><br/>Create Account </h1>
	                       	
	                     	<div id="message"></div>
	                      </div><!-- /.span4 -->
	                      <div class="span4">
	                        <h1 class="titlecolor"><span class="img-circle">02.</span><br />Get Informed.</h1>
	                        
	                      </div><!-- /.span4 -->
	                      <div class="span4">
	                        <h1 class="titlecolor"><span class="img-circle">03.</span><br />Inform Someone</h1>
	                        
	                      </div><!-- /.span4 -->
	                    </div>
	            </div>
	          </div>
	        </div>
	        <div class="item active">
	          <img src="<?php echo $images;?>slide-02.jpg" alt="">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Welcome</h1>
	              <p class="lead">Find out  and share all upcoming sporting events around the country. Someone is patiently waiting.</p>
	              <a class="btn btn-large btn-primary" href="<?php echo site_url('main/signup');?>">Sign up today</a>
	            </div>
	          </div>
	        </div>
	        <div class="item">
	          <img src="<?php echo $images;?>slide-03.jpg" alt="">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Sporting Graph.</h1>
	             
	              <canvas id="canvas" height="230" width="300" style="color:'#fff';"></canvas>
	              <div style="float:left;">
	              	<p>All events as they are updated</p>
	              </div>
	              <div style="float:right;">
	              	<p style="color:#fe872a;font-size:14px;">Graph for the latest number of upcoming sporting events. Be sure you are updated.</p>
	              </div>
				 <script>

				 

				var barChartData = {
					labels : ["Athletics","Basketball","Handball","Hockey","Football","Rugby","Volleyball"],
					datasets : [
								{
								fillColor : "#0096c3",
								strokeColor : "rgba(225,225,225,0)",
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
	   <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
	   <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
	</div>
	<div class="clear"></div>

	  
				
<script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>