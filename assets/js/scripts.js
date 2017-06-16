jQuery(document).foundation();
/*
These functions make sure WordPress
and Foundation play nice together.
*/

jQuery(document).ready(function($) {

	// Test if Jquery is firing
	//alert('Test Jquery firing');
	
	
	Foundation.reInit('equalizer');
	
	
	/////////////////////////////////
	/// Test Ajax Functions
	/////////////////////////////////	
	
	
/*
	$.test_ajax_json_firing = function(){
		
		
		$.ajax({
			
			url: php_data.custom_ajaxurl,
			async: true,
			cache: true,
			
            data : {
                action : 'load_machine',
                machine_id: machine_id
            },
            
		    beforeSend: function() {
			    
				//console.log('Ajax beforeSend triggered, abouto fetch Machine ID: '+machine_id);
		        $.fade_out_modal_items();
		        $('#spin-modal-contents-wrap').addClass('loading');
		        $('#machine-modal-main-image-container').removeClass('ribbon');
		        $('.ustwo-outer').removeClass('visible');
		        $('.rarity-outer').removeClass('visible');
		        $('#spin-ribbon').addClass('faded');

		    },
		    
		    error: function(xhr, textStatus, errorThrown){
			    
		       console.log('Ajax Request Failed:(xhr)'+xhr);
		       console.log('Ajax Request Failed:(textStatus)'+textStatus);
		       console.log('Ajax Request Failed:(errorThrown)'+errorThrown);
		    },
            
			success: function( data) {
				
				// console.log('Data sent back from Ajax call (raw): '+data);
				
				var sent_back = jQuery.parseJSON(data);
				
				//console.log('Data sent back from Ajax call: '+data);
				var machine_id = sent_back.machine_id;
				var machine_title = sent_back.machine_title;
				var machine_brand_id = sent_back.machine_brand_id;
				var machine_brand_logo_src = sent_back.machine_brand_logo_src;
				var machine_brand_logo_inline_style = sent_back.machine_brand_logo_inline_style;
				// .....
				

			}
			
		}).done(function(){
						

			
		}).then(function(){
			

			$.get_machine_array_position(machine_id);	
			
			// console.log('Finished loading Machine ID:'+machine_id);
			

		});
		
	}
	
	
	
	$.test_ajax_html_firing = function(){
		
		
		$.ajax({
			
			url: php_data.custom_ajaxurl,
			async: true,
			cache: true,
			
            data : {
                action : 'test_ajax_html'
            },	
		    error:  function(jqXHR, textStatus){
			    
		       console.log("Status: "+ jqXHR.status);
		       console.log("textStatus: " + textStatus);
		       
		    },
	        success: function(data) {	
		        			
				//$('#about-main-contents').html(data);
				//$('#about-main-contents').append('<div id="about-close-bottom"></div>');
				alert(data);
				
			}
		})
		.done(function(data){
				
			// alert('Done!');
			
		})
		.then(function(data){
			
			// alert('Then!');

		});	
		
	}
	
	
	$(document).on('click','a.test-ajax-html',function(e){
		
		e.preventDefault();
		$.test_ajax_html_firing();
		
	});
*/
	
	/////////////////////////////////
	/// Blog - Ajax Load More
	/////////////////////////////////	
	
	
	$(document).on('click','a.blog-load-more',function(e){
		
		e.preventDefault();
		
			var cat = $(this).attr('cat');
			var ppp = $(this).attr('ppp');

			$.ajax_load_more_blog(cat,ppp);

		
	});
	
	
	
	$.ajax_load_more_blog = function(cat,ppp){
		
		// offset is established by how many blog posts there are currently in the main column.
		var offset = $('.large-blog-item-outer').length;
		
		$.ajax({
			
			url: php_data.custom_ajaxurl,
			async: true,
			cache: true,
			
            data : {
                action : 'load_more_blog',
                'cat' : cat,
                'ppp' : ppp,
                'offset' : offset
                
            },	
		    error:  function(jqXHR, textStatus){
			    
		       console.log("Status: "+ jqXHR.status);
		       console.log("textStatus: " + textStatus);
		       
		    },
	        success: function(data) {	
		        
		        var $data = $(data);
		        			
		        if($data.length){
			        
			        $('#blog-right-col-posts-wrap').append(data);
			        
		        }else{ // No more posts to load, so hide the load more button
			        
			        //alert('No more posts');
			        $.hide_blog_ajax_load_more();
		        }			
				
			}
		})
		.done(function(data){
				
			//alert('Done!');
			console.log('Ajax loading More Blog Posts -- Done!');
			$.check_num_loaded_posts();
			
		})
		.then(function(data){
			
			//alert('Then!');
			console.log('Ajax loading More Blog Posts -- Then!');
			//$('#content').foundation();
			Foundation.reInit('equalizer');

		});	
		
	}
	
	
	/////////////////////////////////
	/// Blog - Check number of loaded posts against available total
	/////////////////////////////////	
	
	$.check_num_loaded_posts = function(){
		
		var total_num = parseInt($('#blog-right-col-posts-wrap').attr('total'));
		var total_loaded  = $('.large-blog-item-outer').length;
		
		if(total_loaded >= total_num){
			
			$.hide_blog_ajax_load_more();
			
		}else{
			
			$.show_blog_ajax_load_more();
			
		}
		
	}

	
	/////////////////////////////////
	/// Blog - Ajax Load Categories as link options in top nav
	/////////////////////////////////
	
	
	$.ajax_load_blog_categories = function(){
		
		// alert('Ajax Load Blog Categories');
		
		$.ajax({
			
			url: php_data.custom_ajaxurl,
			async: true,
			cache: true,
			
            data : {
                action : 'ajax_blog_categories'
                
            },	
		    error:  function(jqXHR, textStatus){
			    
		       console.log("Status: "+ jqXHR.status);
		       console.log("textStatus: " + textStatus);
		       
		    },
	        success: function(data) {	
		        
		        	
		        // see if the blog categories are already loaded in..
		        	
	        	if(!$('html').hasClass('blog-categories-loaded')){
					
					$('#header-middle-scroll-items').html('').append(data);
					$('html').addClass('blog-categories-loaded');
	        	}
		        		
			}
		})
		.done(function(data){
				
			//alert('Done!');
			console.log('Ajax loading Blog Cats -- Done!');

			// $body.ajaxify()
			
			$('#header-middle-scroll-items').ajaxify();
			
		})
		.then(function(data){
			
			//alert('Then!');
			console.log('Ajax loading Blog Cats -- Then!');

		});		
		
	}
	
	
	if($('body').hasClass('page-news-and-insights') || $('body').hasClass('archive')){
		
		$.ajax_load_blog_categories();
		setTimeout(function(){
			$.check_num_loaded_posts();
		},500);
	}
	
	
	/////////////////////////////////
	/// Blog - Fade in / out main column functions
	/////////////////////////////////
	
	$.fade_out_main_blog_column = function(){
		
		$('#blog-right-col-posts-wrap').addClass('faded');
	}
	$.fade_in_main_blog_column = function(){
		
		$('#blog-right-col-posts-wrap').removeClass('faded');
	}
	
	
	/////////////////////////////////
	/// Blog - Ajax Click Action for blog category
	/////////////////////////////////
	
	$(document).on('click','a.ajax-load-blog-category',function(e){
		
		e.preventDefault();
		var blog_cat = $(this).attr('blog-cat');
		//alert(blog_cat);
		$.ajax_load_blog_items_by_category(blog_cat);
		
	});
	
	
	/////////////////////////////////
	/// Blog - Ajax Fetch Blog Items by Category
	/////////////////////////////////
	
	$.ajax_load_blog_items_by_category = function(cat){
	
	
		// set a false height on the right column
		$('#blog-right-col-inner').addClass('forced-window-height');
	
        // fade out the current items
		$.fade_out_main_blog_column();
		
		// cleart the current items
		setTimeout(function(){
			$('#blog-right-col-posts-wrap').html('');
		},300);
		
		// scroll the window back up  // TODO
		$.scroll_blog_back_to_top();
		
		// count how many blog posts this new category has
		$.count_num_blog_posts_by_category(cat);
		
		// set the new category as an attribute in the Ajax Load More Link
		$.update_load_more_cat_in_link(cat);
		
		
		var offset = 0;
		var ppp = 3;
		
		$.ajax({
			
			url: php_data.custom_ajaxurl,
			async: true,
			cache: true,
			
            data : {
                action : 'load_blog_items_by_cat',
                'cat' : cat,
                'ppp' : ppp,
                'offset' : offset
                
            },	
		    error:  function(jqXHR, textStatus){
			    
		       console.log("Status: "+ jqXHR.status);
		       console.log("textStatus: " + textStatus);
		       
		    },
	        success: function(data) {	
		        
		        var $data = $(data);
		        //alert('Done loading');	
		        
		        // load the new items	
		         
				 $('#blog-right-col-posts-wrap').append(data);
		        
				
			}
		})
		.done(function(data){
			
			// fade back in the new content
			setTimeout(function(){
				$.fade_in_main_blog_column();
			},300);
			
			setTimeout(function(){
				$('#blog-right-col-inner').removeClass('forced-window-height');
			},500);
				
				
			//alert('Done!');
			console.log('Ajax loading Blog Posts By Category -- Done!');
			$.check_num_loaded_posts();
			
		})
		.then(function(data){
			
			//alert('Then!');
			console.log('Ajax loading Blog Posts By Category -- Then!');
			Foundation.reInit('equalizer');

		});		
		
	}
	
	
	
	
	
	
	// blog-load-more-outer
	
	
	/////////////////////////////////
	/// Blog - Load the category attribute into the Load More Link
	/////////////////////////////////
	
	
	$.update_load_more_cat_in_link = function(cat){
		
		$('.blog-load-more-outer a.blog-load-more').attr('cat',cat);		
	}
	
	
	/////////////////////////////////
	/// Blog - Ajax - Count Number of posts by category
	/////////////////////////////////
	
	$.count_num_blog_posts_by_category = function(cat){
	
		$.ajax({
			
			url: php_data.custom_ajaxurl,
			async: true,
			cache: true,
			
            data : {
                action : 'count_blog_posts_by_cat',
                'cat' : cat
                
            },	
		    error:  function(jqXHR, textStatus){
			    
		       console.log("Status: "+ jqXHR.status);
		       console.log("textStatus: " + textStatus);
		       
		    },
	        success: function(data) {	
			         
				 $('#blog-right-col-posts-wrap').attr('total',data);
		       
			}
		})
		.done(function(data){
			
			
		})
		.then(function(data){
			

		});	
		
	}
	
	
	/////////////////////////////////
	/// Blog - Scroll back to top of main column
	/////////////////////////////////
	
	$.scroll_blog_back_to_top = function(){
		
	    var $window = $(window),
	        header_height = $('#header-items-wrap').height() - 1;
	        blog_scroll_top = $('#blog-items-outer-wrap').offset().top - header_height;
	   
	    TweenMax.to($window, 1, {
	        scrollTo:{
	            y: blog_scroll_top, 
	            autoKill: true
	        }, 
	        ease:Power2.easeOut 
	     });		
		
	}
	
	
	/////////////////////////////////
	/// Blog - Hide Ajax Load More button
	/////////////////////////////////
	
	
	$.hide_blog_ajax_load_more = function(){
		
		$('.blog-load-more-outer').addClass('hidden');
	}
	$.show_blog_ajax_load_more = function(){
		
		$('.blog-load-more-outer').removeClass('hidden');
	}

	
	/////////////////////////////////
	/// Top Nav Bar Function
	/////////////////////////////////
	
	
	$.fade_out_top_nav_bar = function(){
		
		$('header.header').addClass('faded');
	}
	$.fade_in_top_nav_bar = function(){
		
		$('header.header').removeClass('faded');
	}
	
	
	/////////////////////////////////
	///  Functions to lock and unlock window scroll
	/////////////////////////////////
	
	$.lock_window_scroll = function(){
		
		var scrollPosition = [
		  self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
		  self.pageYOffset || document.documentElement.scrollTop  || document.body.scrollTop
		];
		var html = jQuery('html'); // it would make more sense to apply this to body, but IE7 won't have that
		html.data('scroll-position', scrollPosition);
		html.data('previous-overflow', html.css('overflow'));
		html.css('overflow', 'hidden');
		window.scrollTo(scrollPosition[0], scrollPosition[1]);
		
	}
	
	$.unlock_window_scroll = function(){
		
		var html = $('html');
		var scrollPosition = html.data('scroll-position');
		html.css('overflow', html.data('previous-overflow'));
		window.scrollTo(scrollPosition[0], scrollPosition[1]);
		
	}
	
	/////////////////////////////////
	///  Meet Our Founder - Read More functions
	/////////////////////////////////
	
	
	$.scroll_founder_contents_to_top = function(){
		
		$('#honesty-opened').scrollTop(0);
	}
	
	
	$.meet_our_founder_expand = function(){
		
		$('html').addClass('honesty-expanded');
		
	
/*
		// scroll the honesty section to the top
   	    $window = $(window),
        header_height = $('#header-items-wrap').height() - 1;
        section_scroll_top = $('#scroll-anchor-3').offset().top;
   
	    TweenMax.to($window, 0.5, {
	        scrollTo:{
	            y: section_scroll_top, 
	            autoKill: true
	        }, 
	        ease:Power2.easeOut 
	     });
	     
	     setTimeout(function(){
	     	$('#honesty-overlay').addClass('visible');
	     },500);

	     $.fade_out_top_nav_bar();
*/


   	    $window = $(window),
        header_height = $('#header-items-wrap').height() - 1;
        section_scroll_top = $('#scroll-anchor-3').offset().top;
   
	    TweenMax.to($window, 0.5, {
	        scrollTo:{
	            y: section_scroll_top, 
	            autoKill: true
	        }, 
	        ease:Power2.easeOut 
	     });
		 
		 setTimeout(function(){
			 
		     $.fade_out_top_nav_bar();
		     $('#honesty-opened').addClass('visible');
		     $('#initial-honesty-side-title').addClass('faded');
		     $('#initial-small-profile-outer').addClass('faded');
		     
			$.lock_window_scroll();
		     
	     },500);
		
	}
	
	
	$.meet_our_founder_collapse = function(){
		
		
		$.unlock_window_scroll();
		
		$.fade_in_top_nav_bar();
		$('#honesty-opened').removeClass('visible');
		$('#initial-honesty-side-title').removeClass('faded');
		$('#initial-small-profile-outer').removeClass('faded');
		
		setTimeout(function(){
			$.scroll_founder_contents_to_top();
		},500);
		
	}
	
	
	$(document).on('click','a.meet-our-founder-read-more',function(e){
		
		e.preventDefault();
		$.meet_our_founder_expand();
		
	});
	
	
	$(document).on('click','a.meet-our-founder-close',function(e){
		
		e.preventDefault();
		$.meet_our_founder_collapse();
		
	});

	
	/////////////////////////////////
	///  TEST - For each function on menu items with call back 
	/////////////////////////////////
	
	
/*
	$.test_fadeout_menu_items = function(){
	
		
		TweenMax.staggerTo(".main-menu-item", 0.5, {className:"+=bold"}, 0.1, test);
	
	}
	
	function test(){
		
		$.menu_close();
	}
*/
	
	
	/////////////////////////////////
	///  Scrollmagic - Controller init()
	/////////////////////////////////
	
	var controller = new ScrollMagic.Controller();
	
	
	/////////////////////////////////////////////
	///  Scrollmagic - detect scrollto sections on scroll
	/////////////////////////////////////////////	
	
	$.scroll_section_active_scene = function(){
		
		setTimeout(function(){
			
			// work out header height as a percentage of the viewport height
			var win_height = $(window).height();
			var header_height = $('#header-items-wrap').height();
			var trigger_pos = (header_height / win_height);
			
			$('.scroll-point').each(function(){
				
			  var $this = $(this);
			  var scroll_section_num = $this.attr('section');
			  var section_duration = $this.height();

				
				section_scene = new ScrollMagic.Scene({
					
					triggerElement: this,
					triggerHook:trigger_pos,
					duration:section_duration
					
				})

				.setClassToggle('.link-scroll-'+scroll_section_num+'','active')
				//.addIndicators()
				.addTo(controller)
				.reverse(true);
				
			});
			
			
		},500);
	}
	
	$(window).on('load',function(){
		$.scroll_section_active_scene();
	});
	


	/////////////////////////////////////////////
	///  Scrollmagic - transparent to white on scroll
	/////////////////////////////////////////////		
	
	$.main_nav_bar_transparent_to_white_on_scroll = function(){
		
		setTimeout(function(){
			
			var header_height = $('#header-items-wrap').height();
			
			console.log('Scrollmagic - Navbar pink to white on scroll');

			nav_pink_to_white_scene = new ScrollMagic.Scene({
				
				triggerElement: "#nav-trigger",
				triggerHook:"onLeave",
				offset:-header_height
				
			})
			.on('start', function () {
				
			        
			})
			.setClassToggle('#header-items-wrap','scrolled-white')
			//.addIndicators({name:"nav bar transparent to white on scroll"})
			.addTo(controller);	
		
		},500);
		
	}
	
	$(window).on('load',function(){
		$.main_nav_bar_transparent_to_white_on_scroll();
	});
	
	
	
	/////////////////////////////////
	/// Scrollmagic - Fade In and Up animations
	/////////////////////////////////
	
	$.fade_in_and_up_animations = function(){
		
		setTimeout(function(){

			$('.fade-in-and-up').each(function(){
				
				var $this = $(this);
				
				// set the main content section to active
				section_scene = new ScrollMagic.Scene({
					
					triggerElement: this,
					triggerHook:0.75
					//duration:this_section_height
					//globalSceneOptions: {reverse: false}
					
				})
				.setClassToggle(this,'visible')
				//.addIndicators({name:" fade in and up animations"})
				.addTo(controller)
				.reverse(false);
				
			});	
		
		},500);	// end of main timeout for creating the scene		
		
	}
	
	
	$.fade_in_and_up_animations();
	
	
	
	/////////////////////////////////
	/// Scrollmagic - Fade In only animations
	/////////////////////////////////
	
	$.fade_in_animations = function(){
		
		setTimeout(function(){

			$('.fade-in').each(function(){
				
				var $this = $(this);
				
				// set the main content section to active
				section_scene = new ScrollMagic.Scene({
					
					triggerElement: this,
					triggerHook:0.75
					//duration:this_section_height
					//globalSceneOptions: {reverse: false}
					
				})
				.setClassToggle(this,'visible')
				//.addIndicators({name:" fade in animations"})
				.addTo(controller)
				.reverse(false);
				
			});	
		
		},500);	// end of main timeout for creating the scene		
		
	}
	
	$.fade_in_animations();
	
	
	
	/////////////////////////////////
	/// Scrollmagic - Section fade in animations (for larger blocks etc.)
	/////////////////////////////////
	
	$.section_fade_in_animations = function(){
		
		setTimeout(function(){

			$('.fade-in-section').each(function(){
				
				var $this = $(this);
				
				// set the main content section to active
				section_scene = new ScrollMagic.Scene({
					
					triggerElement: this,
					triggerHook:0.85
					//duration:this_section_height
					
				})
				.setClassToggle(this,'visible')
				//.addIndicators({name:" fade in section animations"})
				.addTo(controller)
				.reverse(false);
				
			});	
		
		},500);	// end of main timeout for creating the scene		
		
	}
	
	$.section_fade_in_animations();	
	
	
	

	/////////////////////////////////
	/// Scrollmagic - Blog Pin left column
	/////////////////////////////////	
	
	
/*
	$.pin_blog_left_col = function(){
		
		var header_height = $('#header-items-wrap').height();
		
		var scene = new ScrollMagic.Scene({
			triggerElement: "#blog-left-col-inner",
			triggerHook:"onLeave",
			offset:-header_height,
			pushFollwers: false,
			duration: 500
			})
						.setPin("#blog-left-col-inner")
						.addIndicators({name: "2 (duration: 300)"}) // add indicators (requires plugin)
						.addTo(controller);		
		
	}
	
	if($('body').hasClass('page-news-and-insights') || $('body').hasClass('archive')){
		
		$.pin_blog_left_col();
		
	}
*/
	
	
/*
	$.fade_in_scene = function(){
		
		setTimeout(function(){

			$('.fade-in-on-scroll').each(function(){
				
			  var $this = $(this);
				
			  var fade_in_scene_tl = new TimelineMax();
			  fade_in_scene_tl		
			    .to($this, 1, {autoAlpha: '1', y: '0px', ease:Power3.easeInOut})
			    
			    // cubic-bezier(.59,.01,.28,1)
				
				section_scene = new ScrollMagic.Scene({
					
					triggerElement: this,
					triggerHook:0.85
					
				})
				.setTween(fade_in_scene_tl)
				.setClassToggle(this,'visible')
				//.addIndicators()
				.addTo(controller)
				.reverse(false);
				
			});	
			
			
			
			$('.fade-in-on-scroll-at-start').each(function(){
				
			  var $this = $(this);
				
			  var fade_in_scene_start_tl = new TimelineMax();
			  fade_in_scene_start_tl		
			    .to($this, 0.75, {autoAlpha: '1', y: '0px', ease:Power3.easeInOut})
				
				section_scene_start = new ScrollMagic.Scene({
					
					triggerElement: this,
					triggerHook:0.975
					
				})
				.setTween(fade_in_scene_start_tl)
				//.addIndicators()
				.addTo(controller)
				.reverse(false);
				
			});
			
			
		
		 },500);	// end of main timeout for creating the scene	
		
	}
	
	$.fade_in_scene();
*/
	


	/////////////////////////////////
	///  Menu Open / Close Functions
	/////////////////////////////////
	
	$.menu_open = function(){
		
		$('#slide-menu').addClass('visible');
		$('html').addClass('menu-open');
		$.animate_menu_items_in();
	}
	
	$.menu_close = function(){
		
		$('#slide-menu').removeClass('visible');
		$('html').removeClass('menu-open');
	}
	
	$(document).on('click','a.nav-toggle',function(e){
		
		e.preventDefault();
		
		if($('html').hasClass('menu-open')){
			
			$.menu_close();
			
		}else{
			
			$.menu_open();
		}
		
	})



	/////////////////////////////////
	///  Menu Items - Set visibility classes
	/////////////////////////////////
	
	$.hide_menu_items = function(){
		
		$('.main-menu-item').each(function(){
			$(this).addClass('hidden');
		});
		
	}
	
	// run hide_menu_items at page load
	$(window).on('load',function(){
		$.hide_menu_items();
	});
	
	
	$.show_menu_items = function(){
		
		$('.main-menu-item').each(function(){
			$(this).removeClass('hidden');
		});		
		
	}
	
	
	$.animate_menu_items_in = function(){
		
		
		TweenMax.staggerTo(".main-menu-item", 0, {className:"-=hidden"}, 0.1);
		
	}
	
	$.animate_menu_items_out = function(){
	
		TweenMax.staggerTo(".main-menu-item", 0, {className:"+=hidden"}, -0.1, animate_menu_items_out_done);
	
	}
	
	function animate_menu_items_out_done(){
		
		$.menu_close();
	}
	
	
	/////////////////////////////////
	///  Breakout Image 
	/////////////////////////////////
	
	// get just the pixels part of a measurement
	
	$.fn.pixels = function(property) {
	    return parseInt(this.css(property).slice(0,-2));
	};
	
	
	$.breakout_images = function(){
		
		var window_w = $(window).width();
		var row_w = $('.row').width();
		var col_padding = $('.columns').pixels('paddingLeft');

		var margin = (window_w - row_w)/2 + col_padding;	
		
		//$('.breakout-image.right').html('margin-right: -' + margin);
		$('.breakout-image.right').css({'margin-right':-margin});	
		
		//$('.breakout-image.left').html('margin-left: -' + margin);
		$('.breakout-image.left').css({'margin-left':-margin});	
		

			//new Foundation.Equalizer($(".eq-reflow")).applyHeight();
			setTimeout(function(){
				Foundation.reInit('equalizer');
			},500);
		
	}
	
	//$(window).on('load',function(){
		
		$.breakout_images();
		
	//});
	
	
	$(window).on('resize',function(){
		
		$.breakout_images();
		
	});
	
	
	

	/////////////////////////////////
	///  Get page scroll sections and insert them into header
	/////////////////////////////////
	
	
	$.get_page_scroll_sections = function(){
		
		$('html').removeClass('blog-categories-loaded');
		
		var html = "<ul>";
		var count = '1';
		
		$('.scroll-point').each(function(){
			
			var scroll_section_title = $(this).attr('scroll-title');
			html += '<li class="link-scroll-'+count+'"><a href="#" class="page-scroll page-scroll-'+count+'" section="'+count+'">' + scroll_section_title + '</a></li>';
			count++;
		});
		
		html += '</ul>';
		
		$('#header-middle-scroll-items').html(html);
		
	}
	
	// Load scroll section detection only on certain pages
	
	if($('body').hasClass('home') || 
		$('body').hasClass('page-who-are-we') || 
		$('body').hasClass('page-working-with-us') || 
		$('body').hasClass('page-our-strategies') || 
		$('body').hasClass('page-meet-our-founder') ||
		$('body').hasClass('page-contact-us')){
		
		$.get_page_scroll_sections();
	}

	
	
	
	/////////////////////////////////
	/// Fade Page scroll sections nav
	/////////////////////////////////
	
	$.hide_page_scroll_nav = function(){
		
		$('#header-middle-scroll-items').addClass('hidden');
		
	}
	$.unhide_page_scroll_nav = function(){
		
		$('#header-middle-scroll-items').removeClass('hidden');
		
	}
	
	
	/////////////////////////////////
	/// Clear Page scroll sections nav
	/////////////////////////////////
	
	$.clear_page_scroll_nav = function(){
		
		$('#header-middle-scroll-items').html('');
		
	}
	
	
	/////////////////////////////////
	/// Scroll to section on click
	/////////////////////////////////	
	
	$(document).on('click',"a.page-scroll", function(){
		
	    var $this = $(this),
	   	    $window = $(window),
	        section = $this.attr('section'),
	        header_height = $('#header-items-wrap').height() - 1;
	        section_scroll_top = $('#scroll-anchor-'+section+'').offset().top - header_height;
	   
	    TweenMax.to($window, 1, {
	        scrollTo:{
	            y: section_scroll_top, 
	            autoKill: true
	        }, 
	        ease:Power2.easeOut 
	     });
	  
	  return false;
	});	
	
	
	/////////////////////////////////
	/// Map on Contact Page
	/////////////////////////////////	
	
	$.contact_map = function(){
		
		new GMaps({
		  div: '#map',
  		  lat: 42.1985544,
		  lng: -87.9171551,
		  mapTypeId: 'satellite',
		  zoom: 14,
		  disableDefaultUI: true,
		  markers: [
		    {lat: 42.1985544, lng: -87.9171551,
		      color: 'blue'}
		  ]
			    
		});		
	}
	
	$(window).on('load',function(){
		
		$.contact_map();
		
	});
	
	
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
	
	/////////////////////////////////
	///  Ajax Page Loading
	/////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	

	if (Modernizr.history && Modernizr.localstorage) {
		
		var
			// Prepare Ajax Application Specific Variables 
			
			rootUrl = php_data['home_url'],
			contentSelector = '#content', // specify main content selector id here
			$content = $(contentSelector),
			contentNode = $content.get(0),
			// Application Generic Variables 
			$body = $(document.body);
		
		// Ensure Content
		if ( $content.length === 0 ) $content = $body;
	


		// Ajax page loading animations (hide things with CSS etc)
		$.start_ajax_page_animation = function(type){
		
			console.log('start_ajax_page_animation()' +type);
			$('html').addClass('ajax-changing');
			$('html').addClass('ajax-changing-'+type);
			$('#content').addClass('hidden');
			
		}
		
		$.end_ajax_page_animation = function(type){
			
			console.log('end_ajax_page_animation()' +type);
			$('html').removeClass('ajax-changing-'+type);
			$('#content').removeClass('hidden');

		}
		
		$.scroll_page_to_top = function(){
		
			console.log('scroll page to top');
	        var bodyelem = ($.browser.safari) ? bodyelem = $('body') : bodyelem = $('html,body');
	        bodyelem.scrollTop(0);	
			
		}
		
		
		
		// set active link classes functions
		$.set_active_link_classes = function(url){
		
			// make sure current page item class is correctly updated
			$('li.menu-item').each(function(){
				
				$(this).removeClass('current-menu-item');
				$(this).removeClass('current_page_item');
				$(this).removeClass('active');
			});
				
									
			$('li.menu-item a').each(function(){
				
				$(this).removeClass('current_page');
				$(this).removeClass('no-ajaxy');
				
				var this_url = $(this).attr('href');
				
				//alert(url);
				
				// add a special class of 'current-page' to any links which just link back to the page we're now viewing
				if(this_url==url){
			
					$(this).addClass('current_page');
					$(this).addClass('no-ajaxy');
					$(this).parent().addClass('current-menu-item');
					$(this).parent().addClass('current_page_item');
					$(this).parent().addClass('active');
				}
				
			});	
			
		}
		
		
		// Main function for processing of the returned HTML content either from Ajax call or localstorage
		
		function process_returned_html(data,url,callback){
			
			var
				$data 			= $(documentHtml(data)),
				$dataBody		= $data.find('#document-body:first ' + contentSelector),
				bodyClasses 	= $data.find('#document-body:first').attr('class'),
				contentHtml, $scripts;		

				
				$scripts = $dataBody.find('#document-script');
				
				if ( $scripts.length ) $scripts.detach();

				// Fetch the main page content and assign it to a variable 
				contentHtml = $dataBody.html()||$data.html();
				
				// if no content is found for some reason, just return to page and exit 
				if ( !contentHtml ) {
					
					document.location.href = url;
					return false;
				}

				// Update the main content area and apply foundation scripts and click actions etc to the new content
				$content.stop(true,true);
				$content.html(contentHtml)
						.ajaxify()
						.load_blog_cat_click()
						.foundation();
						
				
				// add all the body classes back into the body tag		
				$('body').attr('class', bodyClasses);
				
				
				// Scrollmagic, remove main controller and then add it again
					
				controller = controller.destroy(true);
				setTimeout(function(){
					controller = new ScrollMagic.Controller();
				},50);
			
			
				// set active link classes based on the page url the user is now viewing
				$.set_active_link_classes(url);
				
				
				// Global / Common scrollmagic scene functions
				setTimeout(function(){
					$.fade_in_and_up_animations();
					$.fade_in_animations();
					$.section_fade_in_animations();
				},300);
				
					
					// HOMEPAGE
					
					if (bodyClasses.indexOf("home") >= 0){
					
						console.log('Now viewing the homepage');	
						
						setTimeout(function(){
							$.get_page_scroll_sections();
						},300);
													
					}
					
					
					// WHO ARE WE PAGE
				
					if (bodyClasses.indexOf("page-who-are-we") >= 0){
						
						console.log('Now viewing the Who Are We Page');	
						
						setTimeout(function(){
							$.get_page_scroll_sections();
						},300);					
						
					}
					
					// WORKING WITH US
									
					if (bodyClasses.indexOf("page-working-with-us") >= 0){
						
						console.log('Now viewing the Working with Us Page');	
						
						setTimeout(function(){
							$.get_page_scroll_sections();
						},300);					
						
					}
					
					
					// OUR STRATEGIES
									
					if (bodyClasses.indexOf("page-our-strategies") >= 0){
						
						console.log('Now viewing the Our Strategies Page');	
						
						setTimeout(function(){
							$.get_page_scroll_sections();
						},300);					
						
					}
					
					
					// MEET OUR FOUNDER
									
					if (bodyClasses.indexOf("page-meet-our-founder") >= 0){
						
						console.log('Now viewing the Meet our Founder Page');	
						
						setTimeout(function(){
							$.get_page_scroll_sections();
						},300);	
										
						
					}
					
					
					// Blog Homepage / NEWS AND INSIGHTS
					
					if (bodyClasses.indexOf("page-news-and-insights") >= 0){
						
						$.ajax_load_blog_categories();
						$.pin_blog_left_col();
						
					}
					
					
					// Blog Archive (Category)
					
					if (bodyClasses.indexOf("archive") >= 0){
						
						$.ajax_load_blog_categories();
						$.pin_blog_left_col();
						
					}
				
					
					// CONTACT US PAGE
					
					if (bodyClasses.indexOf("page-contact-us") >= 0){
						
						
						console.log('Now viewing the Contact Us Page');
						
						
						setTimeout(function(){
							$.get_page_scroll_sections();
						},300);
						
						// Google Map
						$.contact_map();
						
					}
					
				
				// Detect page scroll sections	
				
				$.hide_page_scroll_nav();
				

				
				setTimeout(function(){
					$.unhide_page_scroll_nav();
				},400);
				
				
				
				// General / Common Scrollmagic Scenes
				setTimeout(function(){
					
					$.scroll_section_active_scene();
					$.main_nav_bar_transparent_to_white_on_scroll();
				
				},100);
				
				
				// Breakout Images calculations
				$.breakout_images();
				
				
				// Ajaxify body contents (makes the links ajax-clickable again)

				$body.ajaxify().partial_ajaxify();

				
				// Grab the page title from the data object Update the page title
				document.title = $data.find('#document-title:first').text();
				
				
				try {
					
					// update the page title 
					document.getElementsByTagName('title')[0].innerHTML = document.title.replace('<','&lt;').replace('>','&gt;').replace(' & ',' &amp; ');
				}
				catch ( Exception ) {
					
					console.log(Exception);
						
				}

				// Add the scripts found in the HTML back into the current DOM structure. (It basically re-attaches them)
				$scripts.each(function(){
				
					var scriptText = $(this).html();
				
					if ( '' != scriptText ) {
						
						scriptNode = document.createElement('script');
						scriptNode.appendChild(document.createTextNode(scriptText));
						contentNode.appendChild(scriptNode);
						
					} else {
						
						$.getScript( $(this).attr('src') );
						
					}
				
				});
				
					
				if ( typeof window.pageTracker !== 'undefined' ) window.pageTracker._trackPageview(relativeUrl);		
				
				
				// Add calback functionality to this function
				if(typeof callback == "function"){
					
				    callback();
				    
				}
	
		}

		
		
		
	
		// Internal Link Identifier 
		
		$.expr[':'].internal = function(obj, index, meta, stack){
			
			var
				$this = $(obj),
				url = $this.attr('href') || '',
				isInternalLink;
				
	
			// Check links to see if they're internal links or not
			isInternalLink = url.substring(0,rootUrl.length) === rootUrl || url.indexOf(':') === -1;
			
			
				// If a user clicks on a link and it is a link to a page they're currently on, just close the menu
				$this.on('click',function(){
					
					// get the classes of the clicked link
					var clicked_link_classes = $this.attr('class');
					// console.log(clicked_link_classes);
					

					if($this.parent().hasClass('current_page_item')){
						
						//console.log('Current page item clicked on...');
						return false;
					}

					// Do same as above (e.g exit main ajax loading action) by tapping into parent or link classes here
					
				});

			// Ignore or Keep
			return isInternalLink;
			
		};
	
	
	
		// HTML Helper
		var documentHtml = function(html){
			
			var result = String(html).replace(/<\!DOCTYPE[^>]*>/i, '')
									 .replace(/<(html|head|body|title|script)([\s\>])/gi,'<div id="document-$1"$2')
									 .replace(/<\/(html|head|body|title|script)\>/gi,'</div>');
			// Return
			return result;
		};
		

	
		// Ajaxify Helper (Adds click functionality to all internal page links)
		$.fn.ajaxify = function(){
			
			var $this = $(this);
	
			// Ajaxify all internal links and add exceptions by inserting classes in the array below
			$this.find('a:internal:not(.no-ajaxy,.partial-ajax,.ajax-load-blog-category,.current_page,[href^="#"],[href*="wp-login"],[href*="wp-admin"])').addClass('ajax-click').on('click', function(event){
				
				
				var
					$this	= $(this),
					url		= $this.attr('href'),
					title 	= $this.attr('title') || null;
					var link_url = $this.attr('href');

	
				// Continue as normal for cmd clicks etc
				if ( event.which == 2 || event.metaKey ) return true;
				
					// The following 3 lines are what make a page load get pushed through the history API
					History.pushState(null,title,url);
					event.preventDefault();
					return false;
				
			});
			
			return $this;
		};
		
		
		
		
		// Close main menu if one of the items is clicked
		
		$.fn.close_menu = function(){
			
			var $this = $(this);
			
			$this.find('a.main-menu-item-link').on('click', function(event){
						
				$.animate_menu_items_out();
				
			});
			
			return $this;
			
		};
		
		
		
	
		
		
		// partial page load function
		$.fn.partial_ajaxify = function(){
		
			var $this = $(this);
			
			//alert('Tset');
			
			$this.find('a.partial-ajax:not(.ajax-click)').on('click', function(event){
				
				event.preventDefault();
				var $this = $(this);
				var url = $this.attr('href');
				var target_container = $this.data('target-container');		

				$.ajax({
	
					url: url,
					cache: true,
		            beforeSend: function () {
			            
			            $('#'+target_container).addClass('hidden');
			            
		            },
					success: function(data, textStatus, jqXHR){
						
						$data 	= $(documentHtml(data));
						$dataBody = $data.find('#document-body:first #' + target_container+' > *');								
														
					},
					error: function(jqXHR, textStatus, errorThrown){
						
						// something went tits up... 
						console.log('Ajax Error: '+errorThrown);
						document.location.href = url;
						return false;
					}
					}).done(function(data){
						
						$('#'+target_container).html($dataBody);
						
							setTimeout(function(){
								$('#'+target_container).removeClass('hidden');
							},200);
						
					});

							
				});	
		
			return $this;
		
		};
		
		
		
		
		// Ajaxify Internal Links on initial page load
		$body.ajaxify().partial_ajaxify().close_menu();				
	
		
			
		// Hook into State Changes and link clicks
		$(window).bind('statechange',function(){
				
				
			var State 		= History.getState();
			var url			= State.url;
			var relativeUrl = url.replace(rootUrl,'');
	

			// Look to see if the page HTML structure has been stored in Localstorage
			var stored_object = JSON.parse(localStorage.getItem('ajax-localstorage-'+url));
			//localStorage.setItem('ajax-localstorage-'+url, JSON.stringify(stored_object));
			var now = $.now(); 
			
			if(stored_object){
				var stored_timestamp = stored_object.timestamp;
				var stored_timestamp_plus_30_mins = (stored_timestamp + 1000 * 60 * 30);
			}

			if (stored_object && (stored_timestamp_plus_30_mins >= now)) { // Yep, found already in Localstorage and hasn't expired yet
			
				
				$.start_ajax_page_animation('local');
				
				
				// start of main setTimeout to slightly delay the changing of content
				setTimeout(function(){
				
					process_returned_html(stored_object.response,stored_object.url,function(){
						
						console.log('Finished processing html object via localStorage');
							
						// scroll page to top 
						setTimeout(function(){
							
							$.scroll_page_to_top();
							
						},200);
						
						// fade content back in 
						setTimeout(function(){
						
							$.end_ajax_page_animation('local');
						
						},400);					
	
					});
				
				},200);
				
				
				$('#footer-message').text('Page rendered via Localstorage');
				
				
				///////////////////////////////////////////////////////////////////////////				
				
				}else{ // Page not found in Localstorage so perform an Ajax request instead
					
				///////////////////////////////////////////////////////////////////////////
				
							
			$.ajax({

				url: url,
				cache: true,
	            beforeSend: function () {
		            
		            // fire functions before the Ajax fetched content is returned. (hide items etc)
		            // console.log('Firing Ajax beforeSend');
		            
		            $.start_ajax_page_animation('ajax');
		            
					setTimeout(function(){
						
						$.scroll_page_to_top();
						
					},250);
	
	            },
				success: function(data, textStatus, jqXHR){
				
					var time_to_store = $.now();
					var object = {url: url, response : data, timestamp: time_to_store}
					localStorage.setItem('ajax-localstorage-'+url, JSON.stringify(object));
		
		
					process_returned_html(data,url,function(){
						
						console.log('Finished processing html object via ajax');
						
					});
					
	
				},
				error: function(jqXHR, textStatus, errorThrown){
					
					// something went tits up... 
					console.log('Ajax Error: '+errorThrown);
					document.location.href = url;
					return false;
				}
	
			}).done(function(bodyClasses){  // Ajax has now finished
				
				
					$('#footer-message').text('Page rendered via Ajax');

					
				// Once everything has been put back into place, unhide things via CSS etc. (may need a slight timeout to make things appear smoother / to be on the safe side)	
				$.end_ajax_page_animation('ajax');
				
				
			}); // end $.ajax
			
 		} // End of the main 'if' statement for checking of localstorage
			
	
		}); // end onStateChange
	
	} // end Modernizr history & localStorage check
	
	/////// END AJAX PAGE LOADING //////
		
	
	
	/////////////////////////////////
	/// Trace Images Turn on / off
	/////////////////////////////////
	
	$(document).on('click','#dev-trace-switch',function(e){
		
		e.preventDefault();
		
		if($('body').hasClass('trace-on')){
			
			$('body').removeClass('trace-on');
			
		}else{
			
			$('body').addClass('trace-on');
			
		}
		
	});	
	
	
	
	/////////////////////////////////
	/// temporary function to clear localstorage (testing purposes)
	/////////////////////////////////	
	

	$.clear_localstorage = function(){
		
		
		localStorage.clear();
	}
	
	$(document).on('click','a.clear-local-storage',function(e){
		
		e.preventDefault();
		$.clear_localstorage();
		
	});
	

});
