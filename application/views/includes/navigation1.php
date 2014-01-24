

<div class="clear"></div>
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo base_url();?>">Kenya Sporting Events</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="<?php echo site_url('main/contact');?>">Get in touch</a></li>
              <li><a href="<?php echo site_url('main/help');?>">Help</a></li>
            </ul>
            <form class="navbar-form pull-right" method="post" action="<?php echo site_url('main/authenticate');?>">
              <input  style="width:215px;" type="email" placeholder="Email" name="l_email" required/>
              <input  style="width:215px;" type="password" placeholder="Password" name="l_password" required/>
              <button type="submit" class="btn btn-medium btn-primary" >Sign in</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
