<?php
/*
Template Name: Tabbed Content
*/
?>

<?php get_header(); ?>
		
		<div class="row columns">	
			
			<div id="tabs">
				<a href="<?php echo home_url(); ?>/page-4/" class="partial-ajax" data-target-container="tabbed-content">Page 4</a><br>
				<a href="<?php echo home_url(); ?>/page-5/" class="partial-ajax" data-target-container="tabbed-content">Page 5</a><br>
				<a href="<?php echo home_url(); ?>/page-6/" class="partial-ajax" data-target-container="tabbed-content">Page 6</a><br>
			</div>
			
		</div>

		<div class="row columns">
			<div id="tabbed-content">	
					
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
					<?php get_template_part( 'parts/loop', 'page' ); ?>
					
				<?php endwhile; endif; ?>	
										
			</div>
		</div>


<?php get_footer(); ?>
