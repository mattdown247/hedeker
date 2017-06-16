
<?php
function render_footer_line(){
	?>
	
	<div class="row columns footer-line-row">
		<div class="footer-line"></div>
	</div>
	
	
<?php
	
}	


function render_footer_divider_row(){
	
	?>
	<div class="row footer-divider-row">
		<div class="large-2 columns">&nbsp;</div>
		<div class="large-10 columns footer-line-col">
			<div class="line"></div>
		</div>
	</div>
	
	<?php
}
	
?>


		</div><!-- close content width constraint -->
		</div><!-- close #content -->
		
			<footer class="footer" role="contentinfo">
				<div id="footer-liner">			
			
					
					<!-- Newsletter Signup -->
					
					<?php render_footer_divider_row(); ?>
					
					<div class="row" id="footer-newsletter-signup-row">
						
						<div class="large-2 columns">
							<div id="footer-logo"></div>
						</div>
						
							<div class="large-8 columns">
								<div class="row">
									<div class="large-6 columns">Form Left</div>
									<div class="large-6 columns">Form Right</div>
								</div>
							</div>
						
						<div class="large-2 columns">
							Submit
						</div>
						
					</div>
					
					
					
					
					<!-- Contact -->
					
					<?php render_footer_divider_row(); ?>
					
					<div class="row" id="footer-contact-row">
						
						<div class="large-2 columns">&nbsp;</div>
						
							<div class="large-2 columns">
								Contact 1
							</div>
							<div class="large-2 columns">
								Contact 2
							</div>	
							<div class="large-2 columns">
								Contact 3
							</div>
							<div class="large-2 columns">
								Contact 4
							</div>					
						
						<div class="large-2 columns">&nbsp;</div>
						
					</div>
					
					
					<!-- News & Insights -->
					
					<?php render_footer_divider_row(); ?>
					
					
					<div class="row" id="footer-insights-row">
						
						<div class="large-2 columns">&nbsp;</div>
						
							<div class="large-2 columns">
								Insights 1
							</div>
							<div class="large-2 columns">
								Insights 2
							</div>	
							<div class="large-2 columns">
								Insights 3
							</div>
							<div class="large-2 columns">
								Insights 4
							</div>					
						
						<div class="large-2 columns">&nbsp;</div>
						
					</div>
					
					
					
<!--
					<div class="row" id="footer-contact-row">
						<div class="large-10 large-offset-2 columns">
							
							<div class="row" id="footer-contact-row-inner">
								<div class="large-3 columns">
									1
								</div>
								<div class="large-3 columns">
									2
								</div>
								<div class="large-3 columns">
									3
								</div>
								<div class="large-3 columns">
									4
								</div>
							</div>
							
							
						</div>
					</div>
-->
					
					
					<!-- News & Insights / Working With Us -->
					
					
					<!-- Our Strategies / Who We Are -->
					
					
				</div>
			</footer> <!-- end .footer -->
							
		
		<?php wp_footer(); ?>
		
		
		<div id="dev-trace-switch">Trace Image</div>
		
	</body>
</html> <!-- end page -->