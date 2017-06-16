<?php
// Single Blog Post
?>

<?php get_header(); ?>


<!-- Page Header -->

<?php
	
$this_page_id = $post->ID;	
$this_page_data = get_post($this_page_id);
$this_page_title = 	$this_page_data->post_title;

?>

<section class="pos-rel bg-white page-header">
	
	<?php render_page_top_title_block($this_page_title,'blog'); ?>
	
</section>
	
	
	 <div class="single-blog-content-wrap">
		
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    <?php
			    
			  // get the main image out  
			    
			  // blog_main_image 
			   
			?>
			
			<!-- Top Image -->
			
			<?php
			$post_top_image_id = get_post_meta(get_the_ID(),'blog_main_image',true);
			$post_top_image_url = wp_get_attachment_image_src( $post_top_image_id, 'full' )[0];	
				
				
			?>
			
	
					
			<div class="blog-image-content">
				<div class="blog-image-outer" style="background-image:url(<?php echo $post_top_image_url; ?>);">
				
				</div>
			</div>


			
			<!-- Top Content -->

			
			<div class="blog-text-content text neg-margin-top">
				<div class="row blog-credited-text-row">
					
					<!-- Left Column -->
					<div class="large-6 columns col-left">
						
					<?php if( have_rows('acknowledgements') ){ ?>
					
						<div class="blog-acknowledgements-wrap">
						
							<?php
								
								while ( have_rows('acknowledgements') ) : the_row();	
								
									$subject = get_sub_field('subject');
									$author = get_sub_field('author');
									
									?>
									<div class="acknowledgement">
										<div class="subject"><?php echo $subject; ?></div>
										<div class="author"><?php echo $author; ?></div>
									</div>
									<?php
								
								endwhile;
								
							?>
						
						</div>
						
					<?php } ?>	
						
					</div>
					
					<!-- Right Column -->
					<div class="large-6 columns col-right">
						<div class="col-right-inner">
				
							<div class="blog-single-main-text-content">
								<div class="row">
									<div class="large-10 large-offset-2 columns">
										
										 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sagittis, ex id lacinia porta, nisl turpis dapibus mauris, at pulvinar mi ipsum a arcu. Duis consequat fermentum arcu et posuere. Quisque tincidunt enim vitae nisi auctor, sed efficitur eros lobortis.</p> <p>Nullam at aliquet ligula, sed semper nisl. Praesent tristique commodo nibh eget tincidunt. Vestibulum sit amet malesuada leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed metus risus, semper id eros a, tincidunt tincidunt quam. Duis sodales magna nisi, non aliquam libero viverra ut. Nullam at mauris vitae dolor rhoncus vestibulum. Aenean gravida neque a dolor malesuada, vel euismod augue facilisis. Maecenas non massa ligula.</p>
 
									</div><!-- close .column-->
								</div><!-- close .row -->
							</div><!-- close .blog-single-main-text-content -->
							
						</div><!-- close .col-right-inner -->
					</div><!-- close column -->
				</div><!-- close row -->
			</div><!-- close .blog-text-content -->
		
				
			
			<?php
				
			// Start optional content blocks	
					
				if( have_rows('layout') ){
					
					while ( have_rows('layout') ) : the_row();
				
			
					//  'full_width_image':
					
					
					if( get_row_layout() == 'full_width_image' ){
			
						
						$image_id = get_sub_field('image');
						$image_url = wp_get_attachment_image_src( $image_id, 'full' )[0];
						$negative_top_margin = get_sub_field('negative_top_margin');
						
						if($negative_top_margin=="Yes"){
							
							$negative_top_margin_class = 'neg-margin-top';
							
						}else{
							
							$negative_top_margin_class = '';
						}
						
						?>
						
							<div class="blog-image-content <?php echo $negative_top_margin_class; ?>">
								<div class="blog-image-outer" style="background-image:url(<?php echo $image_url; ?>);">
								
								</div>
							</div>
						
						<?php

					
					}
					
					
					
					// quote block
					
					if( get_row_layout() == 'quote_block' ){
						
						$quote = get_sub_field('quote');
						
						?>
					
						    <div class="blog-text-content quote">
							    <div class="row blog-large-quote-row">
								    <div class="large-5 medium-5 columns col-left">
									    		
										<?php if( have_rows('acknowledgements') ){ ?>
										<div class="blog-acknowledgements-wrap">		
												
												<?php
													
													while ( have_rows('acknowledgements') ) : the_row();	
													
														$subject = get_sub_field('subject');
														$author = get_sub_field('author');
														
														?>
														<div class="acknowledgement">
															<div class="subject"><?php echo $subject; ?></div>
															<div class="author"><?php echo $author; ?></div>
														</div>
														<?php
													
													endwhile;
													
												?>
										
										</div>		
										<?php } ?>		
									
									    
								    </div><!-- close .col-left -->
								    <div class="large-7 medium-7 columns col-right">
									    
									    <div class="blog-single-quote-content">
										    
										    <?php echo $quote; ?>
										    
									    </div>
									    
								    </div><!-- close .col-right -->
							    </div><!-- close row -->
						    </div><!-- close .blog-text-content -->
					
					
						<?php
					
					}
					
					
					// simple text block
					
					
					// simple_text_block
					
					if( get_row_layout() == 'simple_text_block' ){
					
						$text = wpautop(get_sub_field('text'));
						$padding_top = get_sub_field('padding_top');
						$padding_bottom = get_sub_field('padding_bottom');
						
						if($padding_top=="No"){
							$padding_top_class = 'simple-text-no-padding-top';
						}else{
							$padding_top_class = 'simple-text-padding-top';
						}
						if($padding_bottom=="No"){
							$padding_bottom_class = 'simple-text-no-padding-bottom';
						}else{
							$padding_bottom_class = 'simple-text-padding-bottom';
						}
						
						?>
						
					    <div class="blog-text-content simple-text <?php echo $padding_bottom_class; ?> <?php echo $padding_top_class; ?>">
					    	<div class="row blog-simple-text-row">
								<div class="large-5 large-offset-7 columns text-col">
									<div class="blog-simple-main-text-content">
										
										<?php echo $text; ?>
										
									</div><!-- close .blog-simple-main-text-content -->
								</div><!-- close .text-col -->
					    	</div><!-- close .row -->
					    </div><!-- close .blog-text-content -->
						
						
						<?php
					
					}
			
			endwhile;
			
			}
			
			?>
 
		    <?php endwhile; else : ?>
		
		   		<?php //get_template_part( 'parts/content', 'missing' ); ?>
		
		    <?php endif; ?>
		    
		    
	</div> <!-- close blog single contents wrap -->
	    
	 
	 
	   
	<!-- Render a related articles / share tab effect -->
	
	    
	<div class="blog-related-shared-tab-split">	    
		
			<div class="row">
				
			   <div class="large-6 large-push-6 columns col-right">
				   
				   <div class="inner">
					   <div class="row">
						   <div class="large-10 large-offset-2 columns">Share..</div>
					   </div>
				   </div>
				   
			   </div><!-- close col-right -->
				
				
			   <div class="large-6 large-pull-6 columns col-left">
				   
				   	<div class="inner">
					   	
					   	<?php
						  // only show related articles if there are actually any related articles
						  $related_articles = get_post_meta( get_the_ID(), 'related_articles', true ); 	
						  if($related_articles){
							  	
					   	?>
					   	
					   
					   			Related Articles
					   
					   
					   <?php
						   
						   
					   }
					   
					   ?>
					   
					</div>
				   
			   </div><!-- close col-left -->
	
			</div><!-- close row -->	
		
		
		<div class="under-colour"></div>
		
	</div><!-- close blog-related-shared-tab-split -->
	
	
	
	
	
	<!-- Blog related articles -->
	
	
	
	
	<?php
		
	$related_articles = get_post_meta( get_the_ID(), 'related_articles', true );
	
	if( $related_articles ) {
		
		$num_related_articles = count( get_field( 'related_articles' ) );
		//echo '<p>Num related articles: '.$num_related_articles.'</p>';
		
		?>
		
		<div class="blog-single-bottom-related-articles">
			<div class="row">
				
			<?php
				
				for( $i = 0; $i < $related_articles; $i++ ) {
					
					$article = get_post_meta( get_the_ID(), 'related_articles_' . $i . '_article', true );
					//$class = 0 == $i || 0 == $i % 2 ? 'one-half first' : 'one-half';
					
					render_single_blog_related_article($article);
				}	
				
			?>
			
			</div>
		</div>		
		
		
	<?php
		
	} 
	
	?>


<?php get_footer(); ?>