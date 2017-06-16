<?php get_header(); ?>
			
 	<div class="row columns">
 
 
	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	    
			<?php get_template_part( 'parts/loop', 'archive' ); ?>
		    
		<?php endwhile; ?>	

			<?php joints_page_navi(); ?>
			
		<?php else : ?>
									
			<?php get_template_part( 'parts/content', 'missing' ); ?>
				
		<?php endif; ?>
		
 	</div>
																							

<?php get_footer(); ?>