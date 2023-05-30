jQuery(function ($) {
	// vars

	var windowWith = 0;

	// menu

	// menu - show or hide main menu

	function show_menu() {
		// vars

		var inner_width = $('.wrapper').width();
		var logo_width = $('.header__logo').outerWidth();
		var menu_width = $('.header__mainmenu .header__menu').outerWidth();
		var submenu_width = $(
			'.header__mainmenu .header__submenu'
		).outerWidth();

		// console.log(inner_width);
		// console.log(logo_width);
		// console.log(menu_width);
		// console.log(inner_width);

		if (inner_width < 640) {
			hideMenu();
			return;
		}

		if ($('.header').hasClass('header--top')) {
			if (inner_width > logo_width + menu_width) {
				showMenu();
			} else {
				hideMenu();
			}
		} else {
			if (inner_width > logo_width + menu_width + submenu_width) {
				showMenu();
			} else {
				hideMenu();
			}
		}

		function showMenu() {
			$('.header__mainmenu .header__menu').show();
			$('.header__mainmenu .language-switcher').show();
			$('.header__mainmenu .header__menu-button').hide();
			$('.header__mainmenu .header__submenu').removeClass(
				'menu-button'
			);
		}

		function hideMenu() {
			$('.header__mainmenu .header__menu').hide();
			$('.header__mainmenu .language-switcher').hide();
			$('.header__mainmenu .header__menu-button').show();
			$('.header__mainmenu .header__submenu').addClass('menu-button');
			$('.header__mainmenu .header__submenu .language-switcher').show();
		}
	}

	// menu - scroll menu button

	function scroll_menu_button() {
		// if (!$('.header')) return;

		if ($('.header').hasClass('header--top')) {
			scrollTop = $(window).scrollTop();

			if (scrollTop > 72) {
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
		if (!$('footer')) return;

		// vars

		var window_height = $(window).height();
		var top_offset = $(window).scrollTop();
		var footer_offset = $('footer').offset().top;
		var visible_footer = window_height + top_offset - footer_offset;

		// console.log(top_offset);

		if (top_offset > 128 && visible_footer < 128) {
			$('.header__mainmenu .header__scroll-button').fadeIn();
			$('.header__mainmenu .header__scroll-button').addClass('show');
		} else if (visible_footer >= 128) {
			$('.header__mainmenu .header__scroll-button').fadeIn();
			$('.header__mainmenu .header__scroll-button').addClass('show');
			$('.header__mainmenu .header__scroll-button').css(
				'top',
				footer_offset - top_offset - 0
			);
			$('.header__mainmenu .whatsapp-container').css(
				'top',
				footer_offset - top_offset - 0
			);
			console.log('footer offset');
		} else {
			$('.header__mainmenu .header__scroll-button').fadeOut();
			$('.header__mainmenu .header__scroll-button').removeClass('show');
			$('.header__mainmenu .header__scroll-button').css('top', 'initial');
			console.log('footer top');
		}
	}

	// menu - hide menu

	function hide_menu() {
		$('.header *').removeClass('active');
		$('.header__search-button').hide();
	}

	// execute

	$(document).ready(function () {
		// menu - click menu button

		$('.header__menu-button').click(function () {
			$(this).toggleClass('active');
			$('.header__sidemenu').toggleClass('active');
		});

		// menu - click menu item

		$('.header__menu li a').click(function () {
			hide_menu();
		});

		// menu - show and hide searchmenu

		$('.header__submenu .search').click(function () {
			$('.header__search-button').fadeIn();
			$('.header__search-button').addClass('active');
			$('.header__searchmenu').addClass('active');
			$('.header__searchmenu .search__input input').focus();
		});

		$('.header__search-button').click(function () {
			$('.header__search-button').removeClass('active');
			$('.header__search-button').fadeOut();
			$('.header__searchmenu').removeClass('active');
		});

		// menu - click scroll button

		$('.header__scroll-button').click(function () {
			$('html, body').animate(
				{
					scrollTop: $('header').offset().top - 0,
				},
				500
			);
		});

		// smooth scroll

		// $('a[href^="#"]').on('click', function (e) {
		// 	e.preventDefault();

		// 	hashOffset = $(this.hash).offset();

		// 	if (hashOffset) {
		// 		$('html, body').animate(
		// 			{
		// 				scrollTop: $(this.hash).offset().top - 0,
		// 			},
		// 			500
		// 		);
		// 	}
		// });

		// video container

		$('.video-container').click(function () {
			$(this).addClass('active');
			$(this).children('iframe')[0].src += '?rel=0&autoplay=1';
			$(this).children('iframe').addClass('active');
		});

		// faq

		$('.faq__question').click(function () {
			if ($('.faq__answer').is(':visible')) {
				$('.faq__answer').slideUp(250);
				$('.faq__question').removeClass('active');
			}

			if ($(this).next('.faq__answer').is(':visible')) {
				$(this).next('.faq__answer').slideUp(250);
				$(this).removeClass('active');
			} else {
				$(this).next('.faq__answer').slideDown(250);
				$(this).addClass('active');
			}
		});

		// form - animate total

		var total_value = 0;

		$('.ginput_container_total input').change(function () {
			value = $(this).val();
			// console.log(value);

			$('.ginput_container_total input')
				.prop('Counter', total_value)
				.animate(
					{
						Counter: $(this).val(),
					},
					{
						duration: 500,
						easing: 'swing',
						step: function (val) {
							$('.ginput_container_total span').text(
								'€ ' +
									Math.ceil(val).toLocaleString('nl') +
									',00'
							);
						},
					}
				);

			total_value = value;
		});

		// post

		// post - load more

		var post_type = '';
		var post_per_page = '';
		var post_current_page = 1;
		var post_max_pages = '';
		var post_text_more = '';
		var post_text_loading = '';
		var post_text_done = '';

		$('.card__load-more button').on('click', function () {
			$('.card__container').removeClass('current');
			$(this).parent().siblings('.card__container').addClass('current');

			post_type = $('.card__container.current').attr('data-post-type');
			post_per_page = $('.card__container.current').attr(
				'data-post-per-page'
			);
			post_current_page++;
			post_max_pages = $('.card__container.current').attr(
				'data-post-max-pages'
			);
			post_text_more = $('.card__container.current').attr(
				'data-post-text-more'
			);
			post_text_loading = $('.card__container.current').attr(
				'data-post-text-loading'
			);
			post_text_done = $('.card__container.current').attr(
				'data-post-text-done'
			);

			$.ajax({
				url:
					site_url +
					'/wp-json/websquad/posts?post-type=' +
					post_type +
					'&post-per-page=' +
					post_per_page +
					'&post-current-page=' +
					post_current_page,
				type: 'GET',
				dataType: 'json',

				beforeSend: function () {
					$('.card__load-more button').html(post_text_loading);
				},

				success: function (data) {
					if (post_current_page <= post_max_pages) {
						var post_items = [];

						$('.card__load-more button').html(post_text_more);

						$.each(data, function (key, val) {
							(id = val.id),
								(type = val.type),
								(image = val.image),
								(title = val.title),
								(date = val.date),
								(text = val.text),
								(button = val.button),
								(post_item =
									'' +
									'<div class="card__item ">' +
									// image

									'' +
									(image
										? '' +
										  '<div class="card__image' +
										  (type == 'video'
												? ' card__image--video'
												: '') +
										  '">' +
										  '<a href="' +
										  button +
										  '" ' +
										  (post_type == 'facebook' ||
										  post_type == 'projects'
												? 'target="_blank"'
												: '') +
										  '>' +
										  '<img src="' +
										  image +
										  '" alt="' +
										  text +
										  '">' +
										  '</a>' +
										  '</div>' +
										  ''
										: '' + '' + '') +
									// text

									'' +
									(text
										? '' +
										  '<div class="card__text">' +
										  '<h2>' +
										  title +
										  '</h2>' +
										  '' +
										  (date
												? '' +
												  '<h3>' +
												  date +
												  '</h3>' +
												  ''
												: '' + '' + '') +
										  '<p>' +
										  text +
										  '</p>' +
										  '</div>' +
										  ''
										: '' + '' + '') +
									// button

									'' +
									(button
										? '' +
										  '<div class="card__button">' +
										  '<a class="button button--filled-secondary" href="' +
										  button +
										  '"' +
										  (post_type == 'facebook' ||
										  post_type == 'projects'
												? 'target="_blank"'
												: '') +
										  '>Bekijk</a>' +
										  '</div>' +
										  ''
										: '' + '' + '') +
									'</div>');

							post_items.push(post_item);
						});

						$('.card__container.current').append(post_items);
					}

					if (post_current_page == post_max_pages) {
						$('.card__load-more button').prop('disabled', true);
						$('.card__load-more button').addClass(
							'button--disabled'
						);
						$('.card__load-more button').html(post_text_done);
					}
				},

				error: function (error) {
					console.log(error);
				},
			});
		});
	});

	// execute - when loaded

	$(window).ready(function () {
		windowWith = $(window).width();

		show_menu();
		scroll_scroll_button();
		console.log('this is after loaded');
	});

	// execute - when scroll

	$(window).scroll(function () {
		scroll_menu_button();
		scroll_scroll_button();
	});

	// execute - after resize

	$(window).resize(function () {
		if (windowWith != $(window).width()) {
			hide_menu();
			show_menu();
			console.log('this is after resize');

			windowWith = $(window).width();
		}

		clearTimeout(window.resizedFinished);
		window.resizedFinished = setTimeout(function () {}, 250);
	});

	// set theme color

	setThemeColor();
	function setThemeColor() {
		var color = getComputedStyle(
			document.documentElement
		).getPropertyValue('--cl-primary');
		var meta = document.querySelector('meta[name="theme-color"]');
	
		if (meta) {
			meta.setAttribute('content', color);
		} else {
			meta = document.createElement('meta');
			meta.setAttribute('name', 'theme-color');
			meta.setAttribute('content', color);
			document.head.appendChild(meta);
		}
	}

});
