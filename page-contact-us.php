<?php
// Contact Us
?>

<?php get_header(); ?>


<?php
$this_page_id = $post->ID;	
$this_page_data = get_post($this_page_id);
$this_page_title = 	$this_page_data->post_title;		
?>

<!-- Page Header -->
<section class=" pos-rel bg-white page-header">
	
	<?php render_page_top_title_block($this_page_title,'contact'); ?>
	
</section>


<!-- Nav Trigger -->
<div id="nav-trigger"></div>



<!-- Section 1 - Contact Details -->

<section class="scroll-point pos-rel bg-white contact-us-section-1" scroll-title="Contact Us" id="scroll-anchor-1" section="1">

	<div id="contact-address-details">
		<div class="row contact-us-details-row">
			
			<div class="large-3 columns col-left">&nbsp;</div>
			<div class="large-4 columns col-centre">
				<div id="address-wrap">
					<?php the_field('address'); ?>
				</div>
			</div>
			<div class="large-4 columns col-right">
				<div id="tel-wrap">
					<?php the_field('telephone'); ?>
				</div>
				<div id="fax-wrap">
					<?php the_field('fax'); ?>
				</div>
				<div id="email-wrap">
					<?php the_field('email'); ?>
				</div>
			</div>		
			
		</div><!-- close row -->
	</div>

</section>




<!-- Section 2 - Enquiry Form -->

<section class="scroll-point pos-rel bg-cream contact-us-section-2" scroll-title="Enquire" id="scroll-anchor-2" section="2">

	<div id="contact-us-enquiry-form">
		
		<div class="row contact-us-enquiry-form-row">
			<div class="large-3 columns col-left">
				<h2 class="section-title-small">Enquire</h2>
			</div>
			<div class="large-8 columns end col-right">
			
				<div id="enquiry-form-header">What is your Enquiry?</div>
				
				<div id="equiry-form-form">
					
					* ENQUIRY FORM IN HERE *
					
				</div>
			
			</div>
		</div><!-- close row -->
		
	</div>
	
</section>






<!-- Section 3 - Map -->

<section class="scroll-point pos-rel contact-us-section-3" scroll-title="Where to find us" id="scroll-anchor-3" section="3">
	
	<div id="contact-us-map">
		
		<div id="map">
		</div>
		
<!--
		<div id="contact-us-map-inner">
		
		</div>
-->
		
	</div>
	
</section>




<?php get_footer(); ?>