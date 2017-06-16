<?php
function site_scripts() {
	
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    // Load What-Input files in footer
    wp_enqueue_script( 'what-input', get_template_directory_uri() . '/vendor/what-input/what-input.min.js', array(), '', true );
    
    // Adding Foundation scripts file in the footer
    wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/assets/js/foundation.js', array( 'jquery' ), '6.2', true );
    
    
    // Adding Pace.js
    wp_enqueue_script( 'pace-js', get_template_directory_uri() . '/assets/js/scripts/pace.js', array( 'jquery' ), '6.2', false );
    
    /* UNCOMMENT ANY OF THE FOLLOWING IF NEEDED */
    
    // MODERNIZR
    wp_enqueue_script( 'modernizer-js', get_template_directory_uri() . '/assets/js/scripts/modernizr.js', array( 'jquery' ), '', false );
    
    // HISTORY.JS (Needed to make forward / back buttons work after ajax page loads)
    wp_enqueue_script( 'history-js', get_template_directory_uri() . '/assets/js/scripts/history/history.js', array(), '', true );
    
    
    // GREENSOCK (more plugins available in plugins folder)
    wp_enqueue_script( 'greensock-js', get_template_directory_uri() . '/assets/js/scripts/greensock/src/minified/TweenMax.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'greensock-tl-js', get_template_directory_uri() . '/assets/js/scripts/greensock/src/minified/TimelineMax.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'scrollto-js', get_template_directory_uri() . '/assets/js/scripts/greensock/src/minified/plugins/ScrollToPlugin.min.js', array( 'jquery' ), '', true );
    
    
    // SCROLLMAGIC
    wp_enqueue_script( 'scrollmagic-js', get_template_directory_uri() . '/assets/js/scripts/scrollmagic/ScrollMagic.min.js', array( 'jquery' ), '', false );  
    wp_enqueue_script( 'scrollmagic-indicators-js', get_template_directory_uri() . '/assets/js/scripts/scrollmagic/addindicators.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'scrollmagic-animationgsap-js', get_template_directory_uri() . '/assets/js/scripts/scrollmagic/animationgsap.js', array( 'jquery' ), '', true );
    
    
    // OWL CAROUSEL
    // wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/assets/js/scripts/owl-carousel/owl-carousel/owl.carousel.min.js', array( 'jquery' ), '', true ); 
    // wp_enqueue_style( 'owl-css', get_template_directory_uri() . '/assets/js/scripts/owl-carousel/owl-carousel/owl.carousel.css', array(), '', 'all' );
    // wp_enqueue_style( 'owl-css-theme', get_template_directory_uri() . '/assets/js/scripts/owl-carousel/owl-carousel/owl.theme.css', array(), '', 'all' );
    // wp_enqueue_style( 'owl-css-transitions', get_template_directory_uri() . '/assets/js/scripts/owl-carousel/owl-carousel/owl.transitions.css', array(), '', 'all' );
    

    // GMAPS
    wp_enqueue_script(
        'google-maps',
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyBGWYxGh3RIDOPN3oaCqwupdur2VMIdd4w ',
        array(),
        null,
        null
    );
    wp_enqueue_script( 'gmaps-js', get_template_directory_uri() . '/assets/js/scripts/gmaps/gmaps.js', array( 'jquery' ), '', false );    
            
    // Adding scripts file in the footer (change path to min when site goes live)
    wp_enqueue_script( 'scripts-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );
    //wp_enqueue_script( 'scripts-js', get_template_directory_uri() . '/assets/js/scripts.min.js', array( 'jquery' ), '', true );
    
    
    // Localize the main scripts file so that PHP variables can be accessed in the main script.js file	
	wp_localize_script( 'scripts-js', 'php_data', array(
		
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'animation_style' => get_option( 'options_animation' ),
		'pagination' => get_option( 'options_pagination' ),
		'custom_ajaxurl' => get_template_directory_uri().'/custom-ajax-handler.php',
		'security' => wp_create_nonce( 'string_funcname' ),
		'home_url' => home_url()
	));

   
    
    // Register main stylesheet (can be changed to minified path route when site goes live)
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/css/style.css', array(), '', 'all' );
    //wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/css/style.min.css', array(), '', 'all' );
    

}
add_action('wp_enqueue_scripts', 'site_scripts', 999);