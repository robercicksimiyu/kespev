<?php $images=base_url()."kespev_assets/images/";?>
<?php $js=base_url()."kespev_assets/js/";?>

<div class="clear"></div>
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo site_url('site');?>">Kenya Sporting Event</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="">
                <a href="<?php echo site_url('site');?>">Home</a>
              </li>
              <li class="">
                <a href="<?php echo site_url('site/post_event');?>">Post Event</a>
              </li>
             
              <li class="dropdown">
                <a class="dropdown-toggle" id="drop5" role="button" data-toggle="dropdown" href="#">View Events In<b class="caret"></b></a>
                <ul id="menu3" class="dropdown-menu" role="menu" aria-labelledby="drop5">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('site/sport/athletics');?>">Athletics</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('site/sport/basketball');?>">Basketball</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('site/sport/handball');?>">Handball</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('site/sport/hockey');?>">Hockey</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('site/sport/rugby');?>">Rugby</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('site/sport/volleyball');?>">Volleyball</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('site/matching_profile/'.$this->session->userdata('fav_sport').'/'.$this->session->userdata('location'));?>">Matching Profile</a></li>
                </ul>
              </li>
              <li class="">
                <a href="<?php echo site_url('main/contact');?>">Get In Touch</a>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" id="drop5" role="button" data-toggle="dropdown" href="#">Inbox<b class="caret"></b></a>
                <ul id="menu3" class="dropdown-menu" role="menu" aria-labelledby="drop5">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">You have a message</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">See all Messages</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav pull-right">
              <li id="fat-menu" class="dropdown">
                <a href="http://twitter.github.com/bootstrap/javascript.html#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('username');?>   <img src="<?php echo $images;?>ico1/24x24/user.png"> <b class="caret"></b></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('main/profile/'.$this->session->userdata('username'));?>" class="view_profile">View Profile</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('main/help');?>">Help</a></li>
                  <li role="presentation" class="divider"></li>
                  <li  role="presentation"><a role="menuitem" id="sout" tabindex="-1"  href="<?php echo site_url('main/logout');?>">Sign Out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    
<div class="clear" style="margin-top:33px;"></div><!-- clear float -->
<div class="separator"></div><!-- clear float -->
<style>
li{
  text-align:left;

}

strong{
  color:#fe872a;
}
</style>
<script>

  function generate(type, layout) {
    var n = noty({
      text:"<li><?php echo $this->session->userdata('first_name');?> <?php echo $this->session->userdata('last_name');?> </li> <li> <strong>username:</strong> <?php echo $this->session->userdata('username');?></li> <li><strong>phone: </strong> <?php echo $this->session->userdata('phone');?></li><li><strong>Sport:  </strong> <?php echo $this->session->userdata('fav_sport');?></li><li><strong>Location: </strong> <?php echo $this->session->userdata('location');?></li>",
      type: type,
      dismissQueue: true,
      layout: layout,
      theme: 'defaultTheme',
      buttons: [
        {addClass: 'btn btn-primary', text: 'Ok', onClick: function($noty) {
            $noty.close();
            // noty({dismissQueue: true, force: true, layout: layout, theme: 'defaultTheme', text: 'You clicked "Ok" button', type: 'success'});
          }
        }
        
      ]
    });
    console.log('html: '+n.options.id);
  }

  $('a.view_profile').click(function(){

    generate('information','topCenter');

  });

  $(function(){
    $('#sout').click(function(event){
       
        $.ajax({
          url: "<?php echo site_url('main/logout');?>",
          success: function(result){
            $('body').html(result);
          }
          });
        event.preventDefault();
    });
  });

   
</script>