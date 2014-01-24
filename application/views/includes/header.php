<?php 
	//defining the css,js and images location
	$css=base_url()."kespev_assets/css/";
	$images=base_url()."kespev_assets/images/";
	$js=base_url()."kespev_assets/js/";
	$ui=base_url()."kespev_assets/ui/";
?>

<!DOCTYPE html>
<html><head>
<link rel="shortcut icon" href="http://demo.templatesquare.com/html/innocente/images/favicon(1).ico" />
<meta http-equiv="Content-Script-Type" content="text/javascript" /> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="index, follow" />
<meta name="keywords" content="" />
<meta name="title" content="" />
<meta name="description" content="" />

<link rel="icon" href="<?php echo $images?>favicon.ico" type="image/x-icon">
<title>Kenya Sporting Events</title>
<link rel="shortcut icon" href="http://demo.templatesquare.com/html/innocente/images/favicon.ico" />
<!-- ////////////////////////////////// -->
<!-- //      Start Stylesheets       // -->
<!-- ////////////////////////////////// -->
<link href="<?php echo $ui;?>css/smoothness/jquery-ui-1.9.2.custom.css" rel="stylesheet">

<!-- ////////////////////////////////// -->
<!-- //      Javascript Files        // -->
<!-- ////////////////////////////////// -->
<script type="text/javascript" src="<?php echo $js;?>jquery-1.8.3.js"></script>
<script type="text/javascript" src="<?php echo $js;?>cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo $js;?>geosanslight_500.font.js"></script>
<script type="text/javascript" src="<?php echo $js;?>Chart.js"></script>
<script type="text/javascript" src="<?php echo $js;?>jquery.sticky.js"></script>
<script type="text/javascript" src="<?php echo $js;?>noty/jquery.noty.js"></script>
<script type="text/javascript" src="<?php echo $js;?>noty/layouts/topCenter.js"></script>
<script type="text/javascript" src="<?php echo $js;?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $js;?>noty/themes/default.js"></script>



<script type="text/javascript" src="<?php echo $ui;?>js/jquery-ui-1.9.2.custom.js"></script>

<script type="text/javascript">

	 Cufon.replace('h1') ('h1 a') ('h2') ('h3') ('h4') ('h5') ('h6') ('#top-navigation ul#topnav > li > a', {hover:true}) ('.datebox') ('.header-right p');
</script>
<script type="text/javascript" src="<?php echo $js;?>dropdown.js"></script>
<script type="text/javascript" src="<?php echo $js;?>jquery.cycle.all.min.js"></script>
<script type="text/javascript">
var $ = jQuery.noConflict();

	$(document).ready(function(){
	/* homepage slideshow */
	$('#slider').cycle({
	timeout: 8000,  // milliseconds between slide transitions (0 to disable auto advance)
	fx:      'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...            
	pager:   '#pager',  // selector for element to use as pager container
	next:   '#next-slider',  // selector for element to use as click trigger for next slide
    prev:  '#prev-slider',  // selector for element to use as click trigger for previous slide
	pause:   0,	  // true to enable "pause on hover"
	cleartypeNoBg:   true, // set to true to disable extra cleartype fixing (leave false to force background color setting on slides)
	pauseOnPagerHover: 0 // true to pause when hovering over pager link
	});
	
	$('.social').show();
	
	var availableTags = [
		"Football",
		"Atheletics",
		"Basketball",
		"Handball",
		"Hockey",
		"Rugby"
		
	];

	$( "#sport_prtc" ).autocomplete({
		source: availableTags
	});


	function generate(layout) {
    var n = noty({
      text: layout,
      type: 'alert',
      dismissQueue: true,
      layout: layout,
      theme: 'defaultTheme'
    });
    console.log('html: '+n.options.id);
  }
	
});


</script>
<link href="<?php echo $css?>style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $css?>bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $css?>bootstrap-responsive.css" rel="stylesheet" type="text/css" />

<!--[if IE]>
<script type="text/JavaScript">
$(document).ready(function() {
	  
	$(".sidebox:last-child, body p:last-child ")
	.css({marginBottom:"0px"})
	  
})
</script>
<![endif]-->
<meta charset="UTF-8"></head>
<style>
.carousel {
  margin-bottom: 60px;
}

.carousel .container {
  position: relative;
  z-index: 9;
}

.carousel-control {
  height: 80px;
  margin-top: 30px;
  font-size: 120px;
  text-shadow: 0 1px 1px rgba(0,0,0,.4);
  background-color: transparent;
  border: 0;
  z-index: 10;
}

.carousel .item {
  height: 500px;
}
.carousel img {
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  height: 500px;
}

.carousel-caption {
  background-color: transparent;
  position: static;
  max-width: 550px;
  padding: 0 20px;
  margin-top: 200px;
}
.carousel-caption h1,
.carousel-caption .lead {
  margin: 0;
  line-height: 1.25;
  color: #fff;
  text-shadow: 0 1px 1px rgba(0,0,0,.4);
}
.carousel-caption .btn {
  margin-top: 10px;
}


/* Featurettes
------------------------- */

.featurette-divider {
  margin: 80px 0; /* Space out the Bootstrap <hr> more */
}
.featurette {
  padding-top: 120px; /* Vertically center images part 1: add padding above and below text. */
  overflow: hidden; /* Vertically center images part 2: clear their floats. */
}
.featurette-image {
  margin-top: -120px; /* Vertically center images part 3: negative margin up the image the same amount of the padding to center it. */
}

/* Give some space on the sides of the floated elements so text doesn't run right into it. */
.featurette-image.pull-left {
  margin-right: 40px;
}
.featurette-image.pull-right {
  margin-left: 40px;
}

/* Thin out the marketing headings */
.featurette-heading {
  font-size: 50px;
  font-weight: 300;
  line-height: 1;
  letter-spacing: -1px;
}



/* RESPONSIVE CSS
-------------------------------------------------- */

@media (max-width: 979px) {

  .container.navbar-wrapper {
    margin-bottom: 0;
    width: auto;
  }
  .navbar-inner {
    border-radius: 0;
    margin: -20px 0;
  }

  .carousel .item {
    height: 500px;
  }
  .carousel img {
    width: auto;
    height: 500px;
  }

  .featurette {
    height: auto;
    padding: 0;
  }
  .featurette-image.pull-left,
  .featurette-image.pull-right {
    display: block;
    float: none;
    max-width: 40%;
    margin: 0 auto 20px;
  }
}


@media (max-width: 767px) {

  .navbar-inner {
    margin: -20px;
  }

  .carousel {
    margin-left: -20px;
    margin-right: -20px;
  }
  .carousel .container {

  }
  .carousel .item {
    height: 300px;
  }
  .carousel img {
    height: 300px;
  }
  .carousel-caption {
    width: 65%;
    padding: 0 70px;
    margin-top: 100px;
  }
  .carousel-caption h1 {
    font-size: 30px;
  }
  .carousel-caption .lead,
  .carousel-caption .btn {
    font-size: 18px;
  }

  .marketing .span4 + .span4 {
    margin-top: 40px;
  }

  .featurette-heading {
    font-size: 30px;
  }
  .featurette .lead {
    font-size: 18px;
    line-height: 1.5;
  }
  .marketing {
    position: relative;
  }
  #footer {
        height: 60px;
        background-color: #f5f5f5;
      }
       /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }

 .container .credit {
        margin: 20px 0;
      }



}

</style>

<body>

	


		