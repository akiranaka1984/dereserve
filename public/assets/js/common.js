$(function() {
	$('#av_bnr_list ul').data('show', '6');


	var arr = [],
    showNum = $('#av_bnr_list ul').data('show');

	$('#av_bnr_list ul li').each(function() {
		arr.push($(this).html());
	});
	arr.sort(function() {
		return Math.random() - Math.random();
	});

	$('#av_bnr_list ul').empty();

	for( i = 0; i < showNum; i++ ) {
		$('#av_bnr_list ul').append('<li>' + arr[i] + '</li>');
	}

	setTimeout(function() {
		$('body, #av_bnr_list').css('opacity', 1);
	},700);
});



$(window).on('load', function() {

	if (window.matchMedia('(max-width:1024px)').matches) {
		var state = false;
		var scrollpos;

		$('#menu_btn').on('click', function() {
			$('#menu_btn').toggleClass('menu_btn_active');
			$('#nav').fadeToggle(800);

			if (state == false) {
				scrollpos = $(window).scrollTop();
				$('body').addClass('fixed').css({'top': -scrollpos});
				state = true;
			} else {
				$('body').removeClass('fixed').css({'top': 0});
				$('html, body').scrollTop(scrollpos);
				state = false;
			}
		});
	} else {
		var navOffset = $('#nav').offset();
		$(window).scroll(function() {
			if ($(window).scrollTop() > (navOffset.top - 795)) {
				$('#nav').addClass('nav_fixed');
			} else {
				$('#nav').removeClass('nav_fixed');
			}
		});
	}



	$('#nav ul li a').each(function() {
		var $href = $(this).attr('href');

		if (location.href.match($href)) {
			$(this).parent().addClass('current');
		} else {
			$(this).parent().removeClass('current');
		}
	});
});