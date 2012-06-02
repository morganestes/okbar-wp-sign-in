jQuery(document).ready(function($) {
	// let them see what they're typing in for the password
	jQuery('#password').showPassword('#show');

	// handle the dropdown and show the form
	jQuery(".signin-link").click(function(e) {
		var base = '/wordpress/wp-content/plugins/signin/';
		e.preventDefault();
		jQuery("fieldset#signin_menu").toggle();
		jQuery(".signin-link").toggleClass("menu-open");
		
		// only load the DOMWindow script if the signin form is displayed,
		// then set it to open if the forgot password link is clicked 
		$.getScript(base + "js/jquery.DOMWindow.js", function(){
														// open PIN reset options in modal window
			$("a#resend_password_link").openDOMWindow({ 
					draggable:1,
					height:400, 
					width:700, 
					eventType:'click', 
					windowSource:'iframe', 
					windowPadding:10, 
					loader:1, 
					loaderImagePath:  base + 'images/ajax-loader.gif', // relative path to the image needed
					loaderHeight:48, 
					loaderWidth:48
				}); // end modal
													}); // end getScript
	}); // end signing display

	// don't fire the submit if you're just closing the form
	jQuery("fieldset#signin_menu").mouseup(function() {
		return false;
	});
	
	
	// hide the form once it's submitted
	jQuery(document).mouseup(function(e) {
		if(jQuery(e.target).parent("a.signin-link").length==0) {
			jQuery(".signin-link").removeClass("menu-open");
			jQuery("fieldset#signin_menu").hide();
		}
	});            
});

function submitForm(){
    var form_url = jQuery("#signin").attr("action");
	var whereto = jQuery("input[name='whereto']:checked").val();
	
	// if they're going to fastcase, validate their info and send them on
	if (whereto == "fastcase") {
		jQuery("#signin").append('<input id="url" name="url" type="hidden" value="http://my.okbar.org/Fastcase" />');
	}
	// else, keep on truckin'
    //submit the form
    jQuery("#signin").submit();
}