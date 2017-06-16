<?php
	
/////////////// MAIN AJAX PHP FUNCTIONS FILE FOR THE THEME  //////////////////////////

function my_action_callback_funcname() {
	
	// replace 'funcname' with whatever you want to call it etc.
	
	
	// render code in here then echo it back out.	
	
die();
	
}
add_action( 'wp_ajax_my_action_funcname', 'my_action_callback_funcname');
add_action( 'wp_ajax_nopriv_my_action_funcname', 'my_action_callback_funcname');	
	
	
?>