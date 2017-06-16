<?php
	
/////////////// MAIN PHP FUNCTIONS FILE FOR THE THEME  //////////////////////////
	
	
/////////////// ADD CUSTOM BODY CLASSES EXAMPLE  //////////////////////////

add_filter( 'body_class', 'my_custom_body_classes' );
function my_custom_body_classes( $classes ) {
	//if ( is_search() ){
		$classes[] = 'md'; // show products properly on the search page
		$classes[] = 'md-starter-theme';
		//$classes[] = 'archive';
	//}
	return $classes;
}	

	
	
	
?>