<?php
// Who are We?
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

<section class="scroll-point pos-rel bg-cream who-are-we section-1" scroll-title="Our Mission" id="scroll-anchor-1" section="1">

	<?php 
		
		$title = get_field('section_1_title');
		$content = get_field('section_1_content');
		
		render_side_titled_text_block($title,$content,'dark'); 
		
	?>
	
	<!-- Images (3) -->
	
	
	<?php
		
		// section_1_image_1
		// section_1_image_2
		// section_1_image_3	
		
		
	$section_1_image_1 = get_field('section_1_image_1');
	$section_1_image_1_interchange_markup = render_interchange_markup($section_1_image_1);	
	$section_1_image_2 = get_field('section_1_image_2');
	$section_1_image_2_interchange_markup = render_interchange_markup($section_1_image_2);
	$section_1_image_3 = get_field('section_1_image_3');
	$section_1_image_3_interchange_markup = render_interchange_markup($section_1_image_3);
		
	?>
	
	<div id="section-1-3-images">
		
		<div class="row">
			
			<div class="large-8 columns">
				<div id="section-1-image-1" class="bg-img c" <?php echo $section_1_image_1_interchange_markup; ?>></div>
			</div>
			
			<div class="large-4 columns">
				<div id="section-1-image-2" class="bg-img fade-in-and-up" <?php echo $section_1_image_2_interchange_markup; ?>></div>
				<div id="section-1-image-3" class="bg-img fade-in-and-up" <?php echo $section_1_image_3_interchange_markup; ?>></div>
				
			</div>
			
		</div>
		
	</div>

	
</section>


<!-- Section 2 -->

<section class="scroll-point pos-rel bg-cream who-are-we section-2" scroll-title="Our Heritage" id="scroll-anchor-2" section="2">
	
	<?php 
		
		$title = get_field('section_2_title');
		$content = get_field('section_2_content');
		
		render_side_titled_text_block($title,$content,'dark'); 
		
		
		// section_2_image
	$section_2_image = get_field('section_2_image');
	$section_2_image_interchange_markup = render_interchange_markup($section_2_image);
		
	?>	
	
	
	<!-- Large Viewport Image -->	
	
	<div class="viewport-width-image bg-img fade-in-and-up" <?php echo $section_2_image_interchange_markup; ?>>
		<div class="viewport-width-image-liner">
		
		</div>
	</div>
	
	
	
</section>


<!-- Section 3 -->

<section class="scroll-point pos-rel bg-transparent  who-we-are-section-3" scroll-title="Key Team Members" id="scroll-anchor-3" section="3">
	

	<!-- section main content -->
	
<!-- 	<div id="section-main-content"> -->
		
		
		<!-- top title -->
		
		<div id="section-top-title" class="fade-in-and-up">
			
			<div class="row columns">
				<h2 class="section-title-small"><?php the_field('section_3_top_title'); ?></h2>
			</div>
			
		</div>
		
		
		<!-- start large profile images -->
		
		<div id="section-3-large-profiles">
			
			<?php
			
				// section_3_large_profiles
				
					// name
					// title
					// description
					// image	
				
			?>
			
			<?php		
			
			$large_profiles = get_post_meta( get_the_ID(), 'section_3_large_profiles', true );
			
				if( $large_profiles ) {
					
					for( $i = 0; $i < $large_profiles; $i++ ) {
						
						$name = get_post_meta( get_the_ID(), 'section_3_large_profiles_' . $i . '_name', true );
						$title = get_post_meta( get_the_ID(), 'section_3_large_profiles_' . $i . '_title', true );
						$description = get_post_meta( get_the_ID(), 'section_3_large_profiles_' . $i . '_description', true );
						$image = get_post_meta( get_the_ID(), 'section_3_large_profiles_' . $i . '_image', true );
						$image_interchange_markup = render_interchange_markup($image);
						
						
						?>
						
						<div class="row large-profile-row fade-in-and-up">
						
							<div class="large-6 columns large-profile-col large-profile-left-col">
								<div class="name"><?php echo $name; ?></div>
								<div class="title"><?php echo $title; ?></div>
								<div class="description"><?php echo $description; ?></div>
							</div>
							
							<div class="large-6 columns large-profile-col large-profile-right-col">
								<div class="large-profile-outer bg-img" <?php echo $image_interchange_markup; ?>>
									<div class="large-profile-inner"></div>
								</div>
							</div>					       
						
						</div>
						
						<?php
							
						unset($image_interchange_markup);
						
					} // end FOR
					
				} // end IF
				
			?>
						
		</div>
		
		
		
		<!-- bottom title above small profiles -->
		
		<div id="section-bottom-title" class="fade-in-and-up">
			
			<div class="row columns">
				<h2 class="section-title-small fade-in-and-up"><?php the_field('section_3_bottom_title'); ?></h2>
			</div>
			
		</div>
		
		
		
		<!-- start small profile images -->
		
		<div id="section-3-small-profiles">
			
			<?php		
			
			$small_profiles = get_post_meta( get_the_ID(), 'section_3_small_profiles', true );
			
				if( $small_profiles ) {
					
					?>
					
					<div class="row" id="small-profile-row">
					
					<?php
					
					for( $i = 0; $i < $small_profiles; $i++ ) {
						
						$name = get_post_meta( get_the_ID(), 'section_3_small_profiles_' . $i . '_name', true );
						$title = get_post_meta( get_the_ID(), 'section_3_small_profiles_' . $i . '_title', true );
						//$description = get_post_meta( get_the_ID(), 'section_3_small_profiles_' . $i . '_description', true );
						$image = get_post_meta( get_the_ID(), 'section_3_small_profiles_' . $i . '_image', true );
						$image_interchange_markup = render_interchange_markup($image);
						
						?>
						
							<div class="large-4 columns small-profile-col fade-in-and-up">
								<div class="image">
									<div class="small-profile-outer bg-img" <?php echo $image_interchange_markup; ?>>
										<div class="small-profile-inner">
											
										</div>
									</div>
								</div>
								<div class="name"><?php echo $name; ?></div>
								<div class="title"><?php echo $title; ?></div>
							</div>				       
						
						<?php
						
					} // end FOR
					
					?>
					
					</div>
					
					<?php
					
				} // end IF
				
			?>			
			
		</div>
		
		
		
<!-- 	</div> -->
	
	<!-- fake bg colours -->
	<div id="fake-grey"></div>
	<div id="fake-white"></div>

	
</section>




<section class="pos-rel bg-light-grey who-we-are-section-4" scroll-title="Scroll title 4" id="scroll-anchor-4" section="4">
	
	<?php render_signup_form(); ?>
	
	
</section>



<?php get_footer(); ?>