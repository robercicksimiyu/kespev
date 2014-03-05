var $ = jQuery.noConflict();
$(document).ready(function() {
		/* for top navigation */
		$(" #topnav ul ").css({display: "none"}); // Opera Fix
		$(" #topnav li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown(400);
		},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
		});


		
		
		$('#supdialog').dialog({
			title:"Change your profile",
			autoOpen:false,
			width: 450,
			buttons:[
				{
					text:"Close",
					click:function(){
						$(this).dialog("close");
					}
				}
			]
		});


		$('a#edit_pro').click(function(event){
			$( "#supdialog" ).dialog( "open" );
			event.preventDefalt();
		}).button();

		$(".post .delete").click(function(){
				$(this).parents(".post").animate({ opacity: 'hide' }, "slow");
			});

		
});		 
	
