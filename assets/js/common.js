jQuery(document).ready(function($) {

	// Slider home page
	$('.header-slider').owlCarousel({
			items: 1,
			mouseDrag: false,
			dotsClass: 'slider-dots',
			dotClass: 'slider-dots__item',
			autoplay: true,
			loop : true
	});

	// Gallery products
	// $('.images-slider').owlCarousel({
	// 	// margin: 23,
	// 	URLhashListener:true,
	// 	items: 1,
	// 	dots: false,
	// 	nav: true,
	// 	navText: [
	// 		'<svg class="single-images-thumbnails__icon single-images-thumbnails__icon--prev"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left-arrow"></use></svg>',
	// 		'<svg class="single-images-thumbnails__icon single-images-thumbnails__icon--next"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right-arrow"></use></svg>'
	// 	]
	// });
	// // Gallery products thumbnails
	// $('.single-images-thumbnails').owlCarousel({
	// 	margin: 23,
	// 	dots: false,
	// 	nav: true,
	// 	navText: [
	// 		'<svg class="single-images-thumbnails__icon single-images-thumbnails__icon--prev"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left-arrow"></use></svg>',
	// 		'<svg class="single-images-thumbnails__icon single-images-thumbnails__icon--next"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right-arrow"></use></svg>'
	// 	]
	// });

	$('.images-slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.single-images-thumbnails'
	});
	// $('.easyzoom').easyZoom();
	$('.single-images-thumbnails').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.images-slider',
		prevArrow: '<svg class="single-images-thumbnails__icon single-images-thumbnails__icon--prev"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left-arrow"></use></svg>',
		nextArrow: '<svg class="single-images-thumbnails__icon single-images-thumbnails__icon--next"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right-arrow"></use></svg>',
		focusOnSelect: true
	});
	// Animation
	$(".catalog__item").animated("fadeInUp");

	var specialItem = $('.special__item').length;

		$(".special__item-wrapp").each(function(index, el) {

			if(index % 2 != 0) {
				$(el).animated("fadeInRight");
			}
			else {
				$(el).animated("fadeInLeft");
			}
		});


	// Sticky header
	$('.header').removeClass('stuck');
	$(window).scroll(function() {
		if($(window).width() > 768) {
			if($(this).scrollTop() > 100) {
				$('.header').addClass('stuck');
			}
			else {
				$('.header').removeClass('stuck');
			}
		}
	});

	// Features counter numbers
	$('.counter').counterUp();

	// Search modal
	$('.header-search__btn').click(function(e) {
		e.preventDefault();
		$('.search-wrapp').addClass('open');

		// Close search by pressing Esc
		document.onkeydown = function(evt) {
			evt = evt || window.event;
			if (evt.keyCode == 27) {
				$('.search-wrapp').removeClass('open');
			}
		};
	});

	$('.search-wrapp__close').click(function(e) {
		e.preventDefault();
		$('.search-wrapp').removeClass('open');
	});


	// Fancybox
	$('.fancybox').fancybox();

	$('[data-fancybox="images"]').fancybox();

	//
	$('.form-control').on('focus', function(e) {
		$(this).parent().addClass('is-focused');
	});

	$('.order-metering-form__input, .order-metering-form__textarea, .form-control').on('focusout', function() {
		if($(this).val() === '') {
			$(this).parent().removeClass('is-focused');
		}
	});

	// Isotope
	var grid = $('.gallery').isotope({
		// options
		itemSelector: '.gallery-item',
		layoutMode: 'masonry',
	});

	// Mask phone
	$('#phone, #in-order-phone').mask('+38 (000) 00 00 000');

	// Navigate toggle
	$('.nav-toggle').click(function(e) {
		if($('.nav-toggle').hasClass('active')) {
			$('.nav-toggle').removeClass('active');
			$('.nav').removeClass('open');
		}
		else {
			$('.nav-toggle').addClass('active');
			$('.nav').addClass('open');
		}
	});

	// Mmenu
	$('.dropdown-megamenu > .nav__link, .dropdown-megamenu > .caret, .dropdown > .nav__link, .dropdown > .caret').click(function() {
		if($(this).parent().hasClass('open')) {
			$(this).parent().removeClass('open');
		}
		else {
			$(this).parent().addClass('open');
		}
	});

	// Одинакова висота колонок
	$(function() {
		$('.recommend-product__item, .product').matchHeight();
	});

	// Top button
	$(window).scroll(function() {
		var height = $(document).outerHeight() / 4;
		if($(this).scrollTop() > height) {
			$(".top-btn").addClass('active');
		}
		else {
			$(".top-btn").removeClass('active');
		}
	});
	$(".top-btn").click(function () {
		$("body, html").animate({
			scrollTop: 0
		}, 800);
		return false;
	});

	// Order form ajax
	$(".order-metering-form").submit(function() {
		var th = $(this);
		var str = th.serialize();
		$.ajax({
			type: "POST",
			url: "/wp-content/themes/akordmebli/mail.php",
			data: str,
			success: function(msg) {
				if(msg == 'OK') {
					result = '<div class="ok">Дякуємо за Ваше замовлення! <br>Скоро ми Вам зателефонуємо.</div>';
					$(".order-metering-form > .form-field, .order-metering-form > .btn, .order-metering-form > .g-recaptcha").hide();
					setTimeout(function() {
						th.trigger('reset');
						$('.order-metering-form > .form-field').removeClass('is-focused');
						$(".order-metering-form > .form-field, .order-metering-form > .btn, .order-metering-form > .g-recaptcha").show();
						$('#note').hide();
					}, 2000);
					grecaptcha.reset(widget1);
				}
				else {
					result = msg;
					grecaptcha.reset(widget1);
				}
				$('#note').show();
				$('#note').html(result);
				
			}
		});
		return false;
	});

	// Contact form ajax
	$(".feedback-form").submit(function() {
		var th = $(this);
		var str = th.serialize();
		$.ajax({
			type: "POST",
			url: "/wp-content/themes/akordmebli/mail-feedback.php",
			data: str,
			success: function(msg) {
				if(msg == 'OK') {
					result = '<div class="ok">Дякуємо за Ваше повідомлення!</div>';
					$(".feedback-form > .form-field, .feedback-form > .btn, .feedback-form > .g-recaptcha").hide();
					setTimeout(function() {
						th.trigger('reset');
						$('.feedback-form > .form-field').removeClass('is-focused');
						$(".feedback-form > .form-field, .feedback-form > .btn, .feedback-form > .g-recaptcha").show();
						$('.feedback-form__msg').hide();
					}, 2000);
					grecaptcha.reset(widget2);
				}
				else {
					result = msg;
					grecaptcha.reset(widget2);
				}
				$('.feedback-form__msg').show();
				$('.feedback-form__msg').html(result);
				
			}
		});
		return false;
	});

	// In order form ajax
	$(".in-order").submit(function() {
		var th = $(this);
		var str = th.serialize();
		$.ajax({
			type: "POST",
			url: "/wp-content/themes/akordmebli/mail-in-order.php",
			data: str,
			success: function(msg) {
				if(msg == 'OK') {
					result = '<div class="ok">Дякуємо за Ваше замовлення! <br>Скоро ми Вам зателефонуємо.</div>';
					$(".order-metering-form > .form-field, .order-metering-form > .btn, .order-metering-form > .g-recaptcha").hide();
					setTimeout(function() {
						th.trigger('reset');
						$('.order-metering-form > .form-field').removeClass('is-focused');
						$(".order-metering-form > .form-field, .order-metering-form > .btn, .order-metering-form > .g-recaptcha").show();
						$('.note').hide();
					}, 2000);
					grecaptcha.reset(widget3);
				}
				else {
					result = msg;
					grecaptcha.reset(widget3);
				}
				$('.note').show();
				$('.note').html(result);
				
			}
		});
		return false;
	});

	// Preloader
	// $(window).on('load', function() {
	// 	$('#loader-wrapp').remove();
	// 	$('#loader-wrapp').delay(500).fadeTo(500, 0, function() {
	// 		$(this).remove();
	// 	});
	// });
});


(function () {
	var loader = document.getElementById('loader-wrapp');
	window.onload = function () {
		setInterval(function() {
			loader.style.opacity = 0;
			loader.remove();
		}, 1000);
		
	}
}());




// Svg-sprite LocalStorage
;( function( window, document )
{
	'use strict';

	var file     = '/wp-content/themes/akordmebli/assets/img/symbols.html',
			revision = 1;

	if( !document.createElementNS || !document.createElementNS( 'http://www.w3.org/2000/svg', 'svg' ).createSVGRect )
			return true;

	var isLocalStorage = 'localStorage' in window && window[ 'localStorage' ] !== null,
			request,
			data,
			insertIT = function()
			{
					document.body.insertAdjacentHTML( 'afterbegin', data );
			},
			insert = function()
			{
					if( document.body ) insertIT();
					else document.addEventListener( 'DOMContentLoaded', insertIT );
			};

	if( isLocalStorage && localStorage.getItem( 'inlineSVGrev' ) == revision )
	{
		data = localStorage.getItem( 'inlineSVGdata' );
		if( data )
		{
				insert();
				return true;
		}
	}

	try
	{
		request = new XMLHttpRequest();
		request.open( 'GET', file, true );
		request.onload = function()
			{
				if( request.status >= 200 && request.status < 400 )
					{
						data = request.responseText;
						insert();
						if( isLocalStorage )
						{
							localStorage.setItem( 'inlineSVGdata',  data );
							localStorage.setItem( 'inlineSVGrev',   revision );
						}
				}
		}
		request.send();
	}
	catch( e ){}

}( window, document ) );