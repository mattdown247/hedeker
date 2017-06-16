<?php
// Working With Us
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


<!-- Section 1 -->

<section class="scroll-point pos-rel bg-cream working-with-us-section-1" scroll-title="Institutional Asset Management" id="scroll-anchor-1" section="1">

	<?php 
		
		$title = get_field('section_1_title');
		$content = get_field('section_1_content');
		
		render_side_titled_text_block($title,$content,'dark'); 
		
	?>

	<!-- Section 1 Icons -->
	
	<div id="working-with-us-top-ctas" class="fade-in-and-up">
		
			<?php		
			
			$section_1_ctas = get_post_meta( get_the_ID(), 'section_1_ctas', true );
			
				if( $section_1_ctas ) {
					
					?>
					
					<div class="row" id="working-with-us-top-ctas-row">
					
						<?php
						
						for( $i = 0; $i < $section_1_ctas; $i++ ) {
							
							$icon = get_post_meta( get_the_ID(), 'section_1_ctas_' . $i . '_icon', true );
							$icon_url = wp_get_attachment_image_src( $icon,  'full' )[0];
							$title = get_post_meta( get_the_ID(), 'section_1_ctas_' . $i . '_title', true );
							$description = get_post_meta( get_the_ID(), 'section_1_ctas_' . $i . '_description', true );
	
							?>
							
								<div class="large-3 columns working-with-us-cta-col">
									
									<div class="icon-outer">
										<div class="icon-inner">
											<!-- Image in here -->
											<img src="<?php echo $icon_url; ?>">
										</div>
									</div>
									<div class="title"><h3 class="working-with-us-cta-title"><?php echo $title; ?></h3></div>
									<div class="description">
										<p class="working-with-us-cta-description"><?php echo $description; ?></p>
									</div>
									
								</div>
				       	
							<?php
							
						} // end FOR
						
						?>
					
					</div>
					
					<?php
					
				} // end IF
				
			?>
			
			
			

		
		
	</div>
	
</section>


<!-- Section 2 - Wealth Planning -->

<section class="scroll-point pos-rel working-with-us-section-2" scroll-title="Wealth Planning" id="scroll-anchor-2" section="2">
	
	<!-- Top brown sub title and content -->
	
	<div id="top-brown-content">
		
		<div class="fake-left-cream"></div>
		<div id="fake-bg-brown"></div>
	
			<?php render_side_titled_text_block($title,$content,'light'); ?>
			
			<!-- large image with text over the top -->
			
			<?php
				$section_2_quote = get_field('section_2_quote');
				$section_2_quote_author = get_field('section_2_quote_author');				
			?>
	
	</div>
	
	
	
	<!-- Large image with quote & author -->
	
	
	<?php
	$section_2_background_image = get_field('section_2_background_image');
	$section_2_background_image_interchange_markup = render_interchange_markup($section_2_background_image);		
		
	?>
	
	
	
	<div id="quoted-viewport-image" class="bg-img" <?php echo $section_2_background_image_interchange_markup; ?>>
		
		<div class="fake-left-cream"></div>
		
		
		<div id="quoted-viewport-image-liner">
			
			<div id="text-wrap" class="fade-in-and-up">
				<div id="quote"><?php echo $section_2_quote; ?></div>
				<div id="author"><?php echo $section_2_quote_author; ?></div>
			</div>

		</div>
	</div>
	
	
	<!-- Dark grey numbered points -->
	
	<div id="dark-numbered-points">
		
		<div class="fake-left-cream short-end"></div>
		<div id="fake-bg-grey"></div>
		
		
<!-- 		<div class="fake-left-cream short-end"></div> -->
		
		<?php
			
			if( have_rows('section_2_points') ):
				
				$total_numrows = count( get_field( 'section_2_points' ) );
					
					$current_count = '1';
					
					while( have_rows('section_2_points') ): the_row();
					
						$title = get_sub_field('title');
						$content = get_sub_field('content');
						
						?>
						
						<div class="row dark-num-row fade-in-and-up">
							
							<div class="large-3 columns dark-num-col">
								<span><?php echo $current_count; ?></span>
							</div>
							
							<div class="large-5 columns dark-content-col end">
								
								<div class="title"><h2 class="working-with-us-dark-title"><?php echo $title; ?></h2></div>
								<div class="content"><?php echo $content; ?></div>
								
								<?php
									if($current_count < $total_numrows){
										echo '<div class="divider">--------------</div>';
									}	
								?>
								
							</div>
							
						</div>
						
						<?php
					
					
					$current_count++;
					
					endwhile; 
				
				
			endif;
			
		?>
		
	</div>
	
	
	<!-- Large Image at bottom (Will need to be parallax) -->
	
	
	<?php
	
	// section_2_large_image
	$section_2_large_image = get_field('section_2_large_image');
	$section_2_large_image_interchange_markup = render_interchange_markup($section_2_large_image);	
		
	?>
	
	<div id="large-image-outer" class="bg-img fade-in-and-up" <?php echo $section_2_large_image_interchange_markup; ?>>
		<div id="large-image-inner">
		
		
		</div>
	</div>
	
	
</section>




<!-- Mutual Fund -->


<section class="scroll-point pos-rel bg-white working-with-us-section-3" scroll-title="Mutual Fund" id="scroll-anchor-3" section="3">
		
		<?php
			
			$title = get_field('section_3_title');
			$content = get_field('section_3_content');
			
			render_side_titled_text_block($title,$content,'dark'); 	
		
		?>
		
		<!-- Chart -->
		
		<?php
			
			$chart_title = get_field('section_3_chart_title');
			$chart_left_text = get_field('section_3_chart_left_text');
			
			render_chart($chart_title, $chart_left_text);
			
		?>
		
	
</section>



<section class="pos-rel bg-light-grey who-we-are-section-4" scroll-title="Scroll title 4" id="scroll-anchor-4" section="4">
	
	<?php render_signup_form(); ?>
	
	
</section>



<!--
<section class="pos-rel bg-light-grey who-we-are-section-4" scroll-title="Scroll title 4" id="scroll-anchor-4" section="4">
	
	<?php render_signup_form(); ?>
	
	
</section>
-->



<?php get_footer(); ?>