<?php

// Main theme functions file
require_once(get_template_directory().'/assets/functions/theme-functions.php');	

// Main theme Ajax functions file
require_once(get_template_directory().'/assets/functions/theme-ajax-functions.php');	
	
// Theme support options
require_once(get_template_directory().'/assets/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/assets/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/assets/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/assets/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/assets/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/assets/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/assets/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/assets/translation/translation.php'); 




// Remove 4.2 Emoji Support
// require_once(get_template_directory().'/assets/functions/disable-emoji.php'); 

// Adds site styles to the WordPress editor
//require_once(get_template_directory().'/assets/functions/editor-styles.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/assets/functions/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/assets/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/assets/functions/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/assets/functions/admin.php'); 



// ACF Options Pages


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page('Main Menu Items');

}




// Media Sizes


/*
if ( function_exists( 'add_image_size' ) ) {
	
	add_image_size( 'showroom-desktop-3200', 188, 141, array( 'center', 'center' )); 
	add_image_size( 'showroom-desktop-3200-ret', 367, 282, array( 'center', 'center'  ));

}
*/



//-------------------------------------------------
// Page Slug Body Class
//-------------------------------------------------

function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );





// Update featured Image with new main 'full_image' field

function acf_set_featured_image( $value, $post_id, $field  ){
    
    if($value != ''){
	    //Add the value which is the image ID to the _thumbnail_id meta data for the current post
	    add_post_meta($post_id, '_thumbnail_id', $value);
    }
 
    return $value;
}

add_filter('acf/update_value/name=blog_main_image', 'acf_set_featured_image', 10, 3);




function render_main_menu_item($title, $link){
	
	?>
	
	<div class="main-menu-item">
		<a href="<?php echo $link; ?>" class="main-menu-item-link"><?php echo $title; ?></a>
	</div>
	
	<?php
		
}



function render_homepage_latest_item($title,$description){
	
	?>
		<div class="homepage-latest-item-wrap fade-in-and-up">
			<div class="homepage-latest-item-outer bg-img">
				<div class="homepage-latest-item-outer-liner">
					<div class="title"><?php echo $title; ?></div>
				</div>
			</div>
			
			<div class="homepage-latest-item-description">
				<h2><?php echo $description; ?></h2>
			</div>
		</div>
	
	<?php
	
}




function render_side_titled_text_block($title,$content,$colour){

	?>
	
	<div class="side-titled-text-block <?php echo $colour; ?>">
		<div class="row">
			<div class="large-3 columns left-col">
				<span class="title fade-in-and-up"><h2 class="section-title-small <?php echo $colour; ?>"><?php echo $title; ?></h2></span>
			</div>
			<div class="large-7 columns right-col no-float-right end ">
				<span class="content side-titled-text-block-content fade-in-and-up <?php echo $colour; ?>">
					<?php echo $content; ?>
				</span>
			</div>
		</div>
	</div>

	<?php
}




function render_side_titled_text_block_with_lower_content($title,$content,$colour,$lower_content){

	?>
	
	<div class="side-titled-text-block <?php echo $colour; ?>">
		
		<div class="row">
			<div class="large-3 columns left-col">
				<span class="title"><h2 class="section-title-small <?php echo $colour; ?>"><?php echo $title; ?></h2></span>
			</div>
			<div class="large-7 columns right-col no-float-right end">
				<span class="content side-titled-text-block-content <?php echo $colour; ?>">
					<?php echo $content; ?>
				</span>
			</div>
		</div>
		
		<!-- lower content -->
		<div class="lower-content">
			<div class="row lower-content-row">
				<div class="large-3 columns left-col">
					&nbsp;
				</div>
				<div class="large-7 columns right-col no-float-right end">
					<?php echo $lower_content; ?>
				</div>
			</div>
		</div>
		
	</div>

	<?php
}


// Page top title block


function render_page_top_title_block($title,$type){
	
	
	
	
	?>
	<div class="row title-row <?php echo $type; ?>">
		<div class="large-3 columns logo-col">
			<div id="page-header-logo" class="fade-in">
				
				<svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 75 75">
				<defs>
				    <style>
				      .cls-1 {
				        fill: #ae7c5b;
				        fill-rule: evenodd;
				      }
				    </style>
				  </defs>
				  <path class="cls-1" d="M2361.07,389.441h-45.14a14.947,14.947,0,0,1-14.93-14.93v-1.4a14.949,14.949,0,0,1,14.93-14.931h45.14A14.949,14.949,0,0,1,2376,373.116v1.4A14.947,14.947,0,0,1,2361.07,389.441Zm-45.14-29.251A12.942,12.942,0,0,0,2303,373.116v1.4a12.942,12.942,0,0,0,12.93,12.926h45.14A12.942,12.942,0,0,0,2374,374.511v-1.4a12.942,12.942,0,0,0-12.93-12.926h-45.14Zm45.14,14.625h-45.14A14.948,14.948,0,0,1,2301,359.884v-1.393a14.95,14.95,0,0,1,14.93-14.932h45.14A14.95,14.95,0,0,1,2376,358.491v1.393A14.948,14.948,0,0,1,2361.07,374.815Zm-45.14-29.251A12.942,12.942,0,0,0,2303,358.491v1.393a12.944,12.944,0,0,0,12.93,12.928h45.14A12.944,12.944,0,0,0,2374,359.884v-1.393a12.942,12.942,0,0,0-12.93-12.927h-45.14ZM2331.88,404h-1.39a14.949,14.949,0,0,1-14.93-14.93V343.93A14.948,14.948,0,0,1,2330.49,329h1.39a14.942,14.942,0,0,1,14.93,14.931v45.142A14.942,14.942,0,0,1,2331.88,404Zm-1.39-73a12.943,12.943,0,0,0-12.93,12.927v45.142A12.943,12.943,0,0,0,2330.49,402h1.39a12.943,12.943,0,0,0,12.93-12.926V343.93A12.943,12.943,0,0,0,2331.88,331h-1.39Zm16.02,73h-1.4a14.94,14.94,0,0,1-14.92-14.93V343.93A14.94,14.94,0,0,1,2345.11,329h1.4a14.948,14.948,0,0,1,14.93,14.931v45.142A14.949,14.949,0,0,1,2346.51,404Zm-1.4-73a12.941,12.941,0,0,0-12.92,12.927v45.142A12.941,12.941,0,0,0,2345.11,402h1.4a12.943,12.943,0,0,0,12.93-12.926V343.93A12.943,12.943,0,0,0,2346.51,331h-1.4Z" transform="translate(-2301 -329)"/>
				</svg>
			
			</div>
		</div>
		<div class="large-9 columns title-col">
			<div class="title-wrap fade-in">
				<h1><?php echo $title; ?></h1>
			</div>
		</div>
	</div>

	
	<?php
	
}




function render_chart($chart_title, $chart_left_text){
	
	?>

		<div class="chart">
			
			<div class="chart-header fade-in-and-up">
				<div class="row">
					<div class="large-3 columns">
						<div class="icon">ICO</div>
					</div>
					<div class="large-9 columns">
						<h2 class="chart-title"><?php echo $chart_title; ?></h2>
					</div>
				</div><!-- close row -->
			</div>
			
			
			<div class="chart-container fade-in-and-up">
				<div class="row chart-container-row" data-equalizer>
					<div class="large-3 columns left-col" data-equalizer-watch>
					
						<div class="chart-left-text">
							<div class="liner">
								<?php echo  $chart_left_text; ?> 
							</div>
						</div>
					
					</div>
					<div class="large-9 columns right-col" data-equalizer-watch>
						
						<div class="chart-actual">
							Chart in here
						</div>
					
					</div><!-- close column -->				
				</div><!-- close row -->
			</div><!-- close .chart-container -->
			
		</div><!-- close .chart -->
	
	<?php
	
}


function render_signup_form(){
	
	?>
	
	<div id="signup" class="fade-in-and-up">
	
		<div class="row columns" id="signup-instructions"><h2>Signup instructions to appear here</h2></div>
		
		<div class="row columns" id="signup-form">-- form elements in here --</div>
	</div>
	
		
	<?php
		
}




function render_footnote_links($acf_name){
	
	$links = get_post_meta( get_the_ID(), ''.$acf_name.'', true );

	if( $links ) {
		
		for( $i = 0; $i < $links; $i++ ) {
			
			$link_text = get_post_meta( get_the_ID(), ''.$acf_name.'_' . $i . '_link_text', true );
			$link_type = get_post_meta( get_the_ID(), ''.$acf_name.'_' . $i . '_link_type', true );
			
				if($link_type=="External"){
					
					$link_url = get_post_meta( get_the_ID(), ''.$acf_name.'_' . $i . '_external_link_url', true );
					
					?>
					<div class="footnote-link-outer external-link">
						<a href="<?php echo $link_url; ?>">
							<?php echo $link_text; ?>
						</a>
					</div>
					<?php
						
				}
				if($link_type=="Internal"){
					
					$link_id = get_post_meta( get_the_ID(), ''.$acf_name.'_' . $i . '_internal_link_url', true );
					$link_url = get_permalink($link_id);
					
					?>
					<div class="footnote-link-outer internal-link">
						<a href="<?php echo $link_url; ?>">
							<?php echo $link_text; ?>
						</a>
					</div>
					<?php
					
				}
				if($link_type=="No Link"){
					
					?>
					<div class="footnote-link-outer no-link">
						<?php echo $link_text; ?>
					</div>
					<?php
				}
			
		} // end FOR
		
	} // end IF		
	
}	// end function


// Blog Items used on News & Insights Page


function render_small_blog_item($post_id){
	
	$post_data = get_post($post_id);
	$post_category = get_the_category($post_id);
	$first_post_category = $post_category[0]->cat_name;	
	$post_title = $post_data->post_title;	
	$post_date = $post_data->post_date;	
	$post_date = get_the_date('j F Y',$post_id);
	$post_excerpt = $post_data->post_excerpt;	
	$post_thumnbnail_id = get_post_thumbnail_id($post_id);
	$post_thumnbnail_url = wp_get_attachment_image_src( $post_thumnbnail_id,  'medium' )[0];
	$post_permalink = get_permalink($post_id);
	
	?>
	
	
	<div class="small-blog-item-outer">
		
		<div class="small-blog-item-image bg-img">
			<a href="<?php echo $post_permalink; ?>"></a>
		</div>
		
		<div class="small-blog-item-category">
			<h2 class="blog-small-category-title"><?php echo $first_post_category; ?></h2>
		</div>
		
		<div class="small-blog-item-title">
			<p class="blog-small-post-title"><?php echo $post_title; ?></p>
		</div>
		
		<div class="small-blog-item-date">
			<p class="blog-small-post-date"><?php echo $post_date; ?><p>
		</div>
	
	</div>

	
	
	<?php
	
}



function render_large_blog_item($post_id){
	
	$post_data = get_post($post_id);
	$post_category = get_the_category($post_id);
	$first_post_category = $post_category[0]->cat_name;
	$post_title = $post_data->post_title;
	$post_thumnbnail_id = get_post_thumbnail_id($post_id);
	$post_thumnbnail_url = wp_get_attachment_image_src( $post_thumnbnail_id,  'medium' )[0];
	
	?>
	
	<div class="large-blog-item-outer">
		<?php // echo $post_id; ?>
		
		<div class="large-blog-item-image" style="background-image:url('<?php echo $post_thumnbnail_url; ?>');">Image</div>
		<div class="large-blog-item-text">
			<div class="row">
				<div class="large-7 columns text-container-col">
					
					<div class="large-blog-all-text-wrap">
						<div class="category">
							<h2 class="blog-small-category-title">..<?php echo $first_post_category; ?>..</h2>
						</div>
						<div class="title">
							<p class="blog-large-post-title"><?php echo $post_title; ?></p>
						</div>
						<div class="posted">* Date Posted in here *</div>
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
	
	<?php
	
}








function render_single_blog_related_article($post_id){
	
	// get the post data out
/*
	$related_article_data = get_post($blog_post_id);
	$related_article_title = $related_article_data->post_title;
	$related_article_slug = $related_article_data->post_name;
	$related_article_category = get_the_category($blog_post_id);
	$related_article_first_category = $related_article_category[0]->cat_name;
	$related_article_date = $related_article_data->post_date;
	$related_article_date = get_the_date('j F Y',$blog_post_id);
*/
	
		$post_data = get_post($post_id);
		$post_category = get_the_category($post_id);
		$first_post_category = $post_category[0]->cat_name;	
		$post_title = $post_data->post_title;	
		$post_date = $post_data->post_date;	
		$post_date = get_the_date('j F Y',$post_id);
		$post_excerpt = $post_data->post_excerpt;	
		$post_thumnbnail_id = get_post_thumbnail_id($post_id);
		$post_thumnbnail_url = wp_get_attachment_image_src( $post_thumnbnail_id,  'medium' )[0];
		$post_permalink = get_permalink($post_id);
		$post_image_id = get_post_meta($post_id,'blog_main_image',true);
		$post_image_url = wp_get_attachment_image_src( $post_image_id, 'medium' )[0];
	
	
	?>
	
	<div class="large-3 columns single-blog-related-col">
		<div class="single-blog-related-liner">
			
			<!-- image -->
			<a href="<?php echo $post_permalink; ?>">
				<div class="image-outer bg-img">
					<div class="image-inner" style="background-image:url(<?php echo $post_image_url; ?>);">
					
					</div>
				</div>
			</a>
			
			<!-- category -->
			<div class="category">
				<h2 class="single-blog-related-article-category"><?php echo $first_post_category; ?></h2>
			</div>
			
			<!-- title -->
			<div class="title">
				<p class="single-blog-related-article-title"><?php echo $post_title; ?></p>
			</div>
			
			<!-- date -->
			<div class="date">
				<p class="single-blog-related-article-date"><?php echo $post_date; ?></p>
			</div>
		
		</div>
	</div>
	
	<?php
	
}




function temp_render_blog_categories(){
	
	
/*
		$current_category = get_queried_object();
		$current_category_id = $current_category->term_id;
		
		if($current_category_id==''){
			
			
			$all_active_class = ' active';
			
		}else{
			
			$all_active_class = '';
		}
*/
		
		// Render 'All link'
		echo '<a href="'.home_url().'/blog/" class="'.$all_active_class.'">All</a>';
		
		$args = array(
			'orderby' => 'name',
			'parent' => 0
		);
		$categories = get_categories( $args );
		
		
		foreach ( $categories as $category ) {
			
			$cat_id = $category->term_id;	
									
/*
			if($cat_id == $current_category_id){
				
				$cat_active_class = ' active';
				
			}else{
				
				$cat_active_class = ' not-active';
			}
*/
			
			echo '<a class="blog-category-link blog-category-id-'.$cat_id.' current_category-'.$current_category_id.' '.$cat_active_class.'" href="' . get_category_link( $category->term_id ) . '"';
										
			echo '>' . $category->name . '</a>';
		} 
	
	
}



add_action("MD_ajax_blog_categories", "ajax_blog_categories_func");
add_action("MD_nopriv_ajax_blog_categories", "ajax_blog_categories_func");


function ajax_blog_categories_func(){
	
		$out = '';
	
		$out .='<ul>';
	
		// Render 'All link'
		$out .='<li><a class="ajax-click" href="'.home_url().'/news-and-insights/" class="'.$all_active_class.'">All Stories</a></li>';	
		
		
		$args = array(
			'orderby' => 'name',
			'parent' => 0
		);
		$categories = get_categories( $args );
		
		
		foreach ( $categories as $category ) {
			
			$cat_id = $category->term_id;
			$cat_slug = $category->slug;
			
			//$out .= '<li><a class="blog-category-link blog-category-id-'.$cat_id.' current_category-'.$current_category_id.' '.$cat_active_class.'" href="' . get_category_link( $category->term_id ) . '>' . $category->name . '</a></li>';
			//$out .= '<li><a class="ajax-click " href="' . get_category_link( $cat_id ) . '">' . $category->name . '</a></li>';
			$out .= '<li><a class="ajax-load-blog-category" blog-cat="'.$cat_id.'" href="' . get_category_link( $cat_id ) . '">' . $category->name . '</a></li>';
			
		}
		
		$out .='</ul>';


		wp_die($out);

	
}


function render_interchange_markup($image_id){
	
	$small_image_url = wp_get_attachment_image_src($image_id, 'small');
	$medium_image_url = wp_get_attachment_image_src($image_id, 'medium');
	$large_image_url = wp_get_attachment_image_src($image_id, 'large');
	$xlarge_image_url = wp_get_attachment_image_src($image_id, 'xlarge');
	
	$html = 'data-interchange="['.$small_image_url[0].', small],';
	$html .= '['.$medium_image_url[0].', medium],';
	$html .= '['.$large_image_url[0].', large],';
	$html .= '['.$xlarge_image_url[0].', xlarge],';
	$html .='"';
	
	return $html;
	
}



/// Ajax Functions




add_action("MD_test_ajax_html", "test_ajax_html_func");
add_action("MD_nopriv_test_ajax_html", "test_ajax_html_func");

function test_ajax_html_func(){
	
	
	$send_back_html_data = 'Test Ajax HTML Function data back from server';
	echo $send_back_html_data;
	exit();
	
}



// Ajax function for loading more blog posts

add_action("MD_load_more_blog", "load_more_blog_func");
add_action("MD_nopriv_load_more_blog", "load_more_blog_func");


function load_more_blog_func(){
	

	$ppp     = (isset($_GET['ppp'])) ? $_GET['ppp'] : 3;
    $cat     = (isset($_GET['cat'])) ? $_GET['cat'] : 0;
    $offset  = (isset($_GET['offset'])) ? $_GET['offset'] : 0;

	$posts = new WP_Query( array(
		'post_type'      => 'post', 
		'posts_per_page' => $ppp,
		'cat' => $cat,
		'offset' => $offset
	));
	$posts_count = $posts->post_count;
	
		if($posts_count > 0){
			
			while ( $posts->have_posts() ) : $posts->the_post();
			
				$post_id = get_the_ID();
				render_large_blog_item($post_id);
			
			endwhile;
			wp_reset_postdata();

		}

		exit();

	
}



// Ajax function for loading blog posts by category

add_action("MD_load_blog_items_by_cat", "load_blog_items_by_cat_func");
add_action("MD_nopriv_load_blog_items_by_cat", "load_blog_items_by_cat_func");


function load_blog_items_by_cat_func(){
	

	$ppp     = (isset($_GET['ppp'])) ? $_GET['ppp'] : 3;
    $cat     = (isset($_GET['cat'])) ? $_GET['cat'] : 0;
    $offset  = (isset($_GET['offset'])) ? $_GET['offset'] : 0;

	$posts = new WP_Query( array(
		'post_type'      => 'post', 
		'posts_per_page' => $ppp,
		'cat' => $cat,
		'offset' => $offset
	));
	$posts_count = $posts->post_count;
	
		if($posts_count > 0){
			
			while ( $posts->have_posts() ) : $posts->the_post();
			
				$post_id = get_the_ID();
				render_large_blog_item($post_id);
			
			endwhile;
			wp_reset_postdata();

		}

		exit();

	
}



// Ajax function for counting number of blog posts by category

add_action("MD_count_blog_posts_by_cat", "count_blog_posts_by_cat_func");
add_action("MD_nopriv_count_blog_posts_by_cat", "count_blog_posts_by_cat_func");


function count_blog_posts_by_cat_func(){
	
    $cat     = (isset($_GET['cat'])) ? $_GET['cat'] : 0;
    $category = get_category($cat);
	$count = $category->category_count;
    
    echo $count;
    
	exit();
	
}




/*
add_action("MD_load_machine", "load_machine_into_modal");
add_action("MD_nopriv_load_machine", "load_machine_into_modal");



function load_machine_into_modal(){
	
	$send_back_data = array(
		
		'machine_id' => $machine_id,
		'machine_title' => $machine_title, 
		'machine_slug' => $machine_slug,
		'machine_brand_id' => $brand_id,
		'machine_brand_logo_src' => $brand_black_logo_src,
		'machine_ribbon_display' => $machine_grid_ribbon_display_css,
		'machine_ribbon_text' => $machine_grid_ribbon_text,
		'machine_ribbon_style' => $ribbon_style,
		'machine_brand_logo_width' => $brand_logo_width,
		'machine_brand_logo_height' => $brand_logo_height,
		'machine_brand_logo_padding_top' => $brand_logo_padding_top,
		'machine_brand_logo_inline_style' => $brand_logo_inline_style,
		'machine_year' => $years_list,
		'machine_main_description' => $machine_main_description_final,
		'machine_image_full_url' => $machine_image_full_url,
		'machine_image_real_car_url' => $machine_image_real_car_url,
		'machine_image_real_car_markup' => $image_real_car_markup,
		'machine_photo_credits' => $machine_photo_credits,
		'machine_collection' => $machine_collection,
		'machine_vehicle_top_speed' => $machine_vehicle_top_speed,
		'machine_vehicle_acceleration' => $machine_vehicle_acceleration,
		'machine_vehicle_engine_size' => $machine_vehicle_engine_size,
		'machine_mm_scale' => $machine_mm_scale,
		'machine_mm_rarity' => $machine_mm_rarity,
		'machine_mm_toy_brand' => $machine_mm_toy_brand,
		'machine_mm_manufacture' => $machine_mm_manufacture,
		'machine_images_type' => $images_type,
		'machine_use_variation_images' => $machine_variation_images,
		'machine_terrain_image_markup' => $spin_terrain_image_markup,
		'machine_nickname_image_markup' => $spin_nickname_image_markup,
		'machine_spin_ustwo_auto_display' => $spin_ustwo_auto_logo_display,
		'machine_rarity_logo_display' => $spin_rarity_logo_display,
		'machine_colour_hex' => $colour_hex,
		'machine_image_output' => $image_back,
		'machine_slug' => $machine_slug,
		'machine_share_facebook' => $machine_full_slug_facebook,
		'machine_share_twitter' => $machine_full_slug_twitter,
		'machine_email_atts' => $spin_modal_email_link
		
		
	);
	
	echo json_encode($send_back_data);
	
	exit();
	
}
*/





