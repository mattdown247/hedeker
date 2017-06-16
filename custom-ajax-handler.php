<?php
	
/* MD Custom ajax handler */

	define('DOING_AJAX', true);
	
	if (!isset( $_REQUEST['action']))
		die('-1');
		
	//make sure you update this line to the relative location of the wp-load.php
	require_once('../../../wp-load.php');
	
	require_once('../../../wp-config.php');
	
	require_once('../../../wp-includes/post.php' );
	require_once('../../../wp-includes/formatting.php' );
	require_once('../../../wp-includes/query.php' );
	require_once('../../../wp-includes/taxonomy.php' );
	require_once('../../../wp-includes/meta.php' );
	require_once('../../../wp-includes/user.php' );
	require_once('../../../wp-includes/functions.php' );
	
	
	//Typical headers
	header('Content-Type: text/html');
	send_nosniff_header();
	
	//Disable caching
	header('Cache-Control: no-cache');
	header('Pragma: no-cache');
	
	$action = esc_attr(trim($_REQUEST['action']));
	
	// Declare all actions (function names) that you will use this ajax handler for, as an added security measure.
	$allowed_actions = array(

		'test_ajax_html',
		'load_more_blog',
		'ajax_blog_categories',
		'load_blog_items_by_cat',
		'count_blog_posts_by_cat'
	);
	
	// Change DUMMY_ to something unique to your project.
	
	if(in_array($action, $allowed_actions)) {
		
		if(is_user_logged_in())
		
			do_action('MD_'.$action);
			
		else
		
			do_action('MD_nopriv_'.$action);
			
	} else {
		
		die('-1');
		
	}
?>