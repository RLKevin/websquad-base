jQuery(function( $ ) {
	console.log('is jqeury even working?');
  	// vars

		var windowWith = 0;

	// menu

		// menu - show or hide main menu
		
		function show_menu() {

			// vars

			var inner_width = $('.wrapper').width();
			var logo_width = $('.header__logo').outerWidth();
			var menu_width = $('.header__mainmenu .header__menu').outerWidth();
			var submenu_width = $('.header__mainmenu .header__submenu').outerWidth();

			// console.log(inner_width);
			// console.log(logo_width);
			// console.log(menu_width);
			// console.log(inner_width);

			if ($('.header').hasClass('header--top')) {

				if ( inner_width > logo_width + menu_width ) {
					
					// show menu
					
					$('.header__mainmenu .header__menu').show();
					$('.header__mainmenu .header__menu-button').hide();
					$('.header__mainmenu .header__submenu').removeClass('menu-button');

				} else {

					// hide menu

					$('.header__mainmenu .header__menu').hide();
					$('.header__mainmenu .header__menu-button').show();
					$('.header__mainmenu .header__submenu').addClass('menu-button');

				}

			} else {

				if ( inner_width > logo_width + menu_width + submenu_width ) {
					
					// show menu
					
					$('.header__mainmenu .header__menu').show();
					$('.header__mainmenu .header__menu-button').hide();
					$('.header__mainmenu .header__submenu').removeClass('menu-button');

				} else {

					// hide menu

					$('.header__mainmenu .header__menu').hide();
					$('.header__mainmenu .header__menu-button').show();
					$('.header__mainmenu .header__submenu').addClass('menu-button');

				}
			}
		}

		// menu - scroll menu button

		function scroll_menu_button() {

			if ($('.header').hasClass('header--top')) {

				scrollTop = $(window).scrollTop();

				if ( scrollTop > 72 ){

					$('.header__menu-button').addClass('scroll');
					$('.header__search-button').addClass('scroll');

				} else {

					$('.header__menu-button').removeClass('scroll');
					$('.header__search-button').removeClass('scroll');

				}
			}
		}

		// menu - scroll scroll button & whatsapp

		function scroll_scroll_button() {

			// vars

			var window_height = $(window).height();
			var top_offset = $(window).scrollTop();
			var footer_offset = $('footer').offset().top;
			var visible_footer = (window_height + top_offset) - footer_offset;

			// console.log(top_offset);
			
			if ( top_offset > 128 && visible_footer < 128 ){

				$('.header__mainmenu .header__scroll-button').fadeIn();
				$('.header__mainmenu .header__scroll-button').addClass('show');

			} else if ( visible_footer >= 128 ) {

				$('.header__mainmenu .header__scroll-button').fadeIn();
				$('.header__mainmenu .header__scroll-button').addClass('show');
				$('.header__mainmenu .header__scroll-button').css('top', footer_offset - top_offset - 0);
				$('.header__mainmenu .whatsapp-container').css('top', footer_offset - top_offset - 0);
				console.log('footer offset');

			} else {

				$('.header__mainmenu .header__scroll-button').fadeOut();
				$('.header__mainmenu .header__scroll-button').removeClass('show');
				$('.header__mainmenu .header__scroll-button').css('top', 'auto');
				console.log('footer top');

			}

		}

		

		// menu - hide menu

		function hide_menu() {
			
			$('.header *').removeClass('active');
			$('.header__search-button').hide();

		}

	// slider

		function set_slider() {
			console.log('set slider');

			$('.content__slider').owlCarousel({
				smartSpeed: 500,
				items: 1,
				loop: true,
				autoplay: true,
				autoplayTimeout: 5000,
				autoplayHoverPause: true,
				nav: true,
				dots: true,
				autoHeight: true,
				mouseDrag: false,
				touchDrag: false,
				pullDrag: false,
				navText: [
					'',
					''
				],
			});

			$('.gallery__slider').owlCarousel({
				responsive: {
					0: {
						items: 1,
					},
					1280: {
						items: 2,
					},
					2560: {
						items: 3,
					},
				},
				smartSpeed: 500,
				center: true,
				loop: true,
				autoplay: true,
				autoplayTimeout: 5000,
				autoplayHoverPause: true,
				nav: true,
				dots: true,
				autoHeight: true,
				mouseDrag: false,
				touchDrag: false,
				pullDrag: false,
				navText: [
					'',
					''
				],
			});

			// $('.hero__slider').owlCarousel({
			// 	smartSpeed: 500,
			// 	items: 1,
			// 	loop: true,
			// 	autoplay: true,
			// 	autoplayTimeout: 5000,
			// 	nav: true,
			// 	dots: true,
			// 	autoHeight: true,
			// 	mouseDrag: false,
			// 	touchDrag: false,
			// 	pullDrag: false,
			// 	navText: [
			// 		'',
			// 		''
			// 	],
			// });

			// $('.hero--half__slider').owlCarousel({
			// 	smartSpeed: 500,
			// 	items: 1,
			// 	loop: true,
			// 	autoplay: true,
			// 	autoplayTimeout: 5000,
			// 	nav: false,
			// 	dots: false,
			// 	autoHeight: true,
			// 	mouseDrag: false,
			// 	touchDrag: false,
			// 	pullDrag: false,
			// });

			$('.reference__slider').owlCarousel({
				smartSpeed: 500,
				items: 1,
				loop: true,
				autoplay: true,
				autoplayTimeout: 5000,
				autoplayHoverPause: true,
				nav: true,
				dots: false,
				autoHeight: true,
				mouseDrag: false,
				touchDrag: false,
				pullDrag: false,
				navText: [
					'',
					''
				],
				onInitialize : function(element){
					$('.reference__slider').children().sort(function(){
						return Math.round(Math.random()) - 0.5;
					}).each(function(){
						$(this).appendTo($('.reference__slider'));
					});
				},
			});

			$('.usp__slider--points').owlCarousel({
				responsive: {
					0: {
						items: 1,
						autoWidth: false,
						autoHeight: false,
						margin: 0,
					},
					640: {
						items: 2,
					},
					1280: {
						autoWidth: true,
						autoHeight: true,
						margin: 96,
					},
					1920: {
						autoWidth: true,
						autoHeight: true,
						margin: 192,
					},
				},
				smartSpeed: 500,
				center: true,
				loop: true,
				autoplay: true,
				autoplayTimeout: 2500,
				autoplayHoverPause: true,
				nav: false,
				dots: false,
				autoHeight: true,
				mouseDrag: false,
				touchDrag: false,
				pullDrag: false,
				navText: [
					'',
					''
				],
				onInitialize : function(element){
					$('.usp__slider--points').children().sort(function(){
						return Math.round(Math.random()) - 0.5;
					}).each(function(){
						$(this).appendTo($('.usp__slider--points'));
					});
				},
			});

			// $('.usp__slider--steps').owlCarousel({
			// 	responsive: {
			// 		0: {
			// 			items: 1.5,
			// 			margin: 32,
			// 		},
			// 		640: {
			// 			items: 2.5,
			// 			margin: 32,
			// 		},
			// 		1280: {
			// 			items: 3.5,
			// 			margin: 64,
			// 		},
			// 		2650: {
			// 			items: 5.5,
			// 			margin: 64,
			// 		},
			// 	},
			// 	smartSpeed: 150,
			// 	loop: false,
			// 	merge: true,
			// 	nav: true,
			// 	dots: false,
			// 	autoHeight: true,
			// 	lazyLoad: true,
			// });
		}

	// execute

	$(document).ready(function() {
		// menu - click menu button

			$('.header__menu-button').click(function(){
					
				$(this).toggleClass('active');
				$('.header__sidemenu').toggleClass('active');

			});

		// menu - click menu item

			$('.header__menu li a').click(function(){
					
				hide_menu();

			});

		// menu - show and hide searchmenu

			$('.header__submenu .search').click(function(){
					
				$('.header__search-button').fadeIn();
				$('.header__search-button').addClass('active');
				$('.header__searchmenu').addClass('active');
				$('.header__searchmenu .search__input input').focus();

			});

			$('.header__search-button').click(function(){
				
				$('.header__search-button').removeClass('active');
				$('.header__search-button').fadeOut();
				$('.header__searchmenu').removeClass('active');

			});

		// menu - click scroll button

			$('.header__scroll-button').click(function(){
					
				$('html, body').animate({

					scrollTop : $('header').offset().top - 0

				}, 500);

			});

		// smooth scroll

			$('a[href^="#"]').on('click', function(e){
						
				e.preventDefault();
				
				hashOffset = $(this.hash).offset();

				if (hashOffset) {
					
					$('html, body').animate({

						scrollTop : $(this.hash).offset().top - 0

					}, 500);

				}
				
			});

		// video container

			$(".content__video-container").click(function() {

				$(this).addClass('active');
				$(this).children('iframe')[0].src += "?rel=0&autoplay=1";
				$(this).children('iframe').addClass('active');

			});

		// faq

			$(".faq__question").click(function() {

				if ($('.faq__answer').is(':visible')) {

					$(".faq__answer").slideUp(250);
					$(".faq__question").removeClass('active');

				}

				if ($(this).next(".faq__answer").is(':visible')) {

					$(this).next(".faq__answer").slideUp(250);
					$(this).removeClass('active');

				} else {

					$(this).next(".faq__answer").slideDown(250);
					$(this).addClass('active');

				}

			});

		// form - animate total

			var total_value = 0;

			$('.ginput_container_total input').change(function(){
				
				value = $(this).val();
				// console.log(value);
		
				$('.ginput_container_total input').prop('Counter', total_value).animate({
					Counter: $(this).val()
				}, {
					duration: 500,
					easing: 'swing',
					step: function(val) {
						$('.ginput_container_total span').text('€ ' + Math.ceil(val).toLocaleString('nl') + ',00');
					}
				});

				total_value = value;

			});
		
		// post

			// post - load more

			var post_type = '';
			var post_per_page = ''
			var post_current_page = 1;
			var post_max_pages = '';
			var post_text_more = '';
			var post_text_loading = '';
			var post_text_done = '';

			$('.card__load-more button').on('click', function(){

				$('.card__container').removeClass('current');
				$(this).parent().siblings('.card__container').addClass('current');

				post_type = $('.card__container.current').attr('data-post-type');
				post_per_page = $('.card__container.current').attr('data-post-per-page');
				post_current_page ++;
				post_max_pages = $('.card__container.current').attr('data-post-max-pages');
				post_text_more = $('.card__container.current').attr('data-post-text-more');
				post_text_loading = $('.card__container.current').attr('data-post-text-loading');
				post_text_done = $('.card__container.current').attr('data-post-text-done');

				$.ajax({

					url: site_url + '/wp-json/websquad/posts?post-type=' + post_type + '&post-per-page=' + post_per_page + '&post-current-page=' + post_current_page,
					type: 'GET',
					dataType: 'json',

					beforeSend: function () {

						$('.card__load-more button').html(post_text_loading);

					},

					success: function(data) {

						if ( post_current_page <=  post_max_pages ) {

							var post_items = [];

							$('.card__load-more button').html(post_text_more);
						
							$.each(data, function(key, val){

								id = val.id,
								type = val.type,
								image = val.image,
								title = val.title,
								date = val.date,
								text = val.text,
								button = val.button,

								post_item =	'' +

									'<div class="card__item animate__animated animate__bounceInUp">' +

										// image

										'' + ( image ? '' +
											
											'<div class="card__image' + ( type == 'video' ? ' card__image--video' : '' ) + '">' +

												'<a href="' + button + '" ' + (post_type == 'facebook' || post_type == 'projects' ? 'target="_blank"' : '') + '>' +

													'<img src="' + image + '" alt="' + text + '">' +
												
												'</a>' +

											'</div>' +
											
										'' : '' +
										
											'' +
											
										'' ) +

										// text

										'' + ( text ? '' +
											
											'<div class="card__text">' +

												'<h2>' + title + '</h2>' + 

												'' + ( date ? '' +

													'<h3>' + date + '</h3>' + 

												'' : '' +
										
													'' +
													
												'' ) +

												'<p>' + text + '</p>' +

											'</div>' +
											
										'' : '' +
										
											'' +
											
										'' ) +

										// button

										'' + ( button ? '' +
											
											'<div class="card__button">' +

												'<a class="button button--filled-secondary" href="' + button + '"' + (post_type == 'facebook' || post_type == 'projects' ? 'target="_blank"' : '') + '>Bekijk</a>' +

											'</div>' +
											
										'' : '' +
										
											'' +
											
										'' ) +
										
									'</div>'
								
								post_items.push(post_item);

							});

							$('.card__container.current').append(post_items);

						}

						if ( post_current_page == post_max_pages ) {

							$('.card__load-more button').prop("disabled", true);
							$('.card__load-more button').addClass('button--disabled');
							$('.card__load-more button').html(post_text_done);
										
						}

					},

					error: function(error) {

						console.log(error);
						
					}

				});

			});
	});

	// execute - when loaded
	
	$(window).ready(function() {

		windowWith = $( window ).width();

		show_menu();
		scroll_scroll_button();
		set_slider();
		console.log('this is after loaded');

	});

	// execute - when scroll

	$(window).scroll(function() {

		scroll_menu_button();
		scroll_scroll_button();

	});

	// execute - after resize

	$(window).resize(function() {

		if( windowWith != $( window ).width() ){

			hide_menu();
			show_menu();
			set_slider();
			console.log('this is after resize');

			windowWith = $( window ).width();

		}

		clearTimeout(window.resizedFinished);
		window.resizedFinished = setTimeout(function(){

		}, 250);

	});

	// execute in gutenberg every 5 sec

	// if ($("body").hasClass("wp-admin")) {
	// 	setInterval(function(){
	// 		set_slider();
	// 	  }, 1000);
	// };
		
});
