<?php
// News and Insights
?>

<?php get_header(); ?>


<?php
	
	$this_page_id = $post->ID;	
	$this_page_data = get_post($this_page_id);
	$this_page_title = 	$this_page_data->post_title;	
		
?>

<!-- Page Header -->
<section class="pos-rel bg-white page-header">
	
	<?php render_page_top_title_block($this_page_title,'page'); ?>
	
</section>


<!-- Nav Trigger -->
<div id="nav-trigger"></div>



<!-- Main outer items wrap -->
<div id="blog-items-outer-wrap">
	
	<div class="row main-blog-row" data-equalizer>
		
		<div class="large-2 columns" id="blog-left-col-outer" data-equalizer-watch>
			<div id="blog-left-col-inner">
				
				<div class="blog-column-header">Top Stories</div>
				
				<div id="blog-left-col-posts-wrap">
				
				<?php

				$latest_posts = new WP_Query( array(
					'post_type'      => 'post', 
					'category_name'    => 'top',
					'posts_per_page' => 5
				));
				$latest_posts_count = $latest_posts->post_count;
				
					if($latest_posts_count > 0){
						
						while ( $latest_posts->have_posts() ) : $latest_posts->the_post();
						
							$latest_post_id = get_the_ID();
							
							render_small_blog_item($latest_post_id);
						
						
						endwhile;
						wp_reset_postdata();
		
					}
					
				?>
				
				</div><!-- close #blog-left-col-posts-wrap -->
			</div><!-- close #blog-left-col-inner -->
		</div><!-- close col -->
		
		
		
		<div class="large-9 columns" id="blog-right-col-outer" data-equalizer-watch>
			<div id="blog-right-col-inner">
				
				<div class="blog-column-header">Latest Feed</div>
				
				<?php
				
				// find total number of available posts	
				$count_posts = wp_count_posts();
				$published_posts = $count_posts->publish;
					
				?>
				
				<div id="blog-right-col-posts-wrap" total="<?php echo $published_posts; ?>">
					
					<?php
	
					$top_posts = new WP_Query( array(
						'post_type'      => 'post', 
						'posts_per_page' => 3
					));
					$top_posts_count = $top_posts->post_count;
					
						if($top_posts_count > 0){
							
							while ( $top_posts->have_posts() ) : $top_posts->the_post();
							
								$top_post_id = get_the_ID();
								
								render_large_blog_item($top_post_id);
								
							
							endwhile;
							wp_reset_postdata();
			
						}
						
					?>

				
				</div><!-- close #blog-right-col-posts-wrap -->
			</div><!-- close #blog-right-col-inner -->	
		</div><!-- close col -->
	</div><!-- close row -->
	
	
	<div class="blog-load-more-outer">
		<div class="row columns">
			<a href="#" class="blog-load-more" cat="0" ppp="3" offset="3">Load More</a>
		</div>
	</div>
	
	
</div><!--Close #blog-items-outer-wrap -->



<section class="pos-rel bg-light-grey who-we-are-section-4" scroll-title="Scroll title 4" id="scroll-anchor-4" section="4">
	
	<?php render_signup_form(); ?>
	
	
</section>



<?php get_footer(); ?>