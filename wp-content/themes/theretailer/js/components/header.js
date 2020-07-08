jQuery(function($) {

	"use strict";

    if( theretailer_options.sticky_header ) {

		var initialHeaderHeight = $('.gbtr_header_wrapper').outerHeight();

		var content_margin_top_large  = initialHeaderHeight + 70;
		var content_margin_top_medium = initialHeaderHeight + 50;
		var content_margin_top_small  = initialHeaderHeight + 40;
		if( $('.global_content_wrapper').hasClass('hidden-title') ) {
			var content_margin_top_large  = initialHeaderHeight;
			var content_margin_top_medium = initialHeaderHeight;
			var content_margin_top_small  = initialHeaderHeight;
		}

		$(window).on( 'scroll', function() {

			var headerHeight = $('.gbtr_header_wrapper').outerHeight();

			if ( $(this).scrollTop() > headerHeight ) {
				$('.gbtr_header_wrapper').addClass('site-header-sticky sticky');
				if( $(window).innerWidth() >= 960 ) {
					$('.global_content_wrapper').css('margin-top', content_margin_top_large+'px');
				} else if( $(window).innerWidth() >= 720 && $(window).innerWidth() <= 959 ) {
					$('.global_content_wrapper').css('margin-top', content_margin_top_medium+'px');
				} else if( $(window).innerWidth() <= 719 ) {
					$('.global_content_wrapper').css('margin-top', content_margin_top_small+'px');
				}

				if( $(window).innerWidth() <= 782 ) {
					$('body.admin-bar .c-offcanvas--left').css('margin-top', '0');
				}
			} else {
				$('.global_content_wrapper').css('margin-top', '');
				$('.gbtr_header_wrapper').removeClass('site-header-sticky sticky');
				if( $(window).innerWidth() <= 782 ) {
					$('body.admin-bar .c-offcanvas--left').css('margin-top', '46px');
				}
			}
		});
	}

    $(".mobile-main-navigation ul.sf-menu > li.menu-item-has-children .sub-menu").before('<div class="more"></div>');

	$('.mobile-main-navigation ul.sf-menu > li.menu-item-has-children > .more').on( 'click', function(e) {
		$(this).parents('li.menu-item-has-children').find('.sub-menu').toggleClass('open');
	});

    //submenu adjustments
	$(".main-navigation > ul > .menu-item").on( 'mouseenter', function() {
		if ( $(this).children(".sub-menu").length > 0 ) {
			var submenu = $(this).children(".sub-menu");
			var window_width = parseInt($(window).innerWidth());
			var submenu_width = parseInt(submenu.width());
			var submenu_offset_left = parseInt(submenu.offset().left);
			var submenu_adjust = window_width - submenu_width - submenu_offset_left;

			if (submenu_adjust < 0) {
				submenu.css("left", submenu_adjust-30 + "px");
			}
		}
	});

    //tools bar search
	$('.gbtr_tools_search').on({
		mouseenter: function() {
			setTimeout(function(){
				$('.gbtr_tools_search_inputtext').focus();
			},300);
		},
        mouseleave: function(){
			$('.gbtr_tools_search_inputtext').blur();
		}
    });

    function open_desktop_search(){

		$(".gbtr_tools_search").on({
			mouseenter:	function() {
				$(this).addClass("open");
				$(this).find("#s").focus();
			},
			touchstart:	function() {
				$(this).addClass("open");
			},
			mouseleave: function () {
				$(this).removeClass("open");
			},
		});
	}

	if ( $(window).width() > 960 ) {
		open_desktop_search();
	}

    //search
	function switch_search_buttons() {
		if($(".gbtr_tools_search #s").val() !== "") {
			$(".gbtr_tools_search_trigger").css("z-index", "2").css('visibility','hidden');
			$(".gbtr_tools_search_inputbutton").css("z-index", "3").css('visibility','visible');

		} else {
			$(".gbtr_tools_search_trigger").css("z-index", "3").css('visibility','visible');
			$(".gbtr_tools_search_inputbutton").css("z-index", "2").css('visibility','hidden');
		}
	}

	$(".gbtr_tools_search #s").on( 'keydown', function() {
		switch_search_buttons();
	});

	//topbar menu
	$('.gbtr_tools_account_wrapper').on('mouseenter',function(){

		var topbar_menu_position = $('.top-bar-menu-trigger').offset().left - 10;
		var trigger_width = $('.top-bar-menu-trigger').width();
		var topbar_menu_width = $('.gbtr_tools_account').width();

		if ( $(window).width()-topbar_menu_position-topbar_menu_width - 17 < 0 ) {
			topbar_menu_position = topbar_menu_position + ( $(window).width()-topbar_menu_position-topbar_menu_width ) - 15;
		}

		$('.gbtr_tools_account').css({'left':topbar_menu_position}).addClass('show');
	});

	$('.gbtr_tools_account_wrapper').on( 'mouseleave', function() {
		$('.gbtr_tools_account').removeClass('show');
	});

	$(document).on( 'touchstart', function() {
		$('.gbtr_tools_account').removeClass('show');
	});

    $(window).resize(function(){

		if ( $(window).width()>1024 ) {
			open_desktop_search();
		} else {
			$('.gbtr_tools_search').off('hover');
		}

        $(".main-navigation > ul > .menu-item > .sub-menu").css("left", "-15px");
    });
});
