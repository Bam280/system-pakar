/************* Main Js File ************************
    Template Name: Aubna
    Author: Themescare
    Version: 1.0
    Copyright 2020
*************************************************************/


/*------------------------------------------------------------------------------------
    
JS INDEX
=============
01 - Button Hover JS
02 - Search JS
03 - Menu Toggle JS
04 - Email Setup JS
05 - Jarralax
06 - Counter JS
07 - Testimonial Slider JS
08 - Back To Top
09 - Preloader

-------------------------------------------------------------------------------------*/


(function ($) {
	"use strict";

	jQuery(document).ready(function ($) {


		/* 
		=================================================================
		01 - Button Hover JS
		=================================================================	
		*/


		$('.aubna-btn').on('mouseenter', function (e) {
			var parentOffset = $(this).offset(),
				relX = e.pageX - parentOffset.left,
				relY = e.pageY - parentOffset.top;
			$(this).find('span').css({
				top: relY,
				left: relX
			})
		}).on('mouseout', function (e) {
			var parentOffset = $(this).offset(),
				relX = e.pageX - parentOffset.left,
				relY = e.pageY - parentOffset.top;
			$(this).find('span').css({
				top: relY,
				left: relX
			})
		});


		/* 
		=================================================================
		02 - Search JS
		=================================================================	
		*/
		if ($('.search-popup__toggler').length) {
			$('.search-popup__toggler').on('click', function (e) {
				$('.search-popup').addClass('active');
				e.preventDefault();
			});
		};

		if ($('.search-popup__overlay').length) {
			$('.search-popup__overlay').on('click', function (e) {
				$('.search-popup').removeClass('active');
				e.preventDefault();
			});
		};


		/* 
		=================================================================
		03 - Menu Toggle JS
		=================================================================	
		*/
		$(".menu-toggle").on("click", function () {
			$(this).toggleClass("is-active");
		});
        
        /* 
		=================================================================
		04 - Email Setup JS
		=================================================================	
		*/

        $("#contact-form").on('submit', function (e) {
            e.preventDefault();

            //Get input field values from HTML form
            var user_name = $("input[name=name]").val();
            var user_email = $("input[name=email]").val();
            var user_subject = $("input[name=subject]").val();
            var user_message = $("textarea[name=message]").val();

            //Data to be sent to server
            var post_data;
            var output;
            post_data = {
                'user_name': user_name,
                'user_email': user_email,
                'user_message': user_message,
                'user_subject': user_subject
            };

            //Ajax post data to server
            $.post('assets/email/contact_form.php', post_data, function (response) {

                //Response server message
                if (response.type == 'error') {
                    output = '<div class="alert alert-danger"><i class="fa fa-exclamation" aria-hidden="true"></i><span class="notification-text">' + response.text + '</span></div>';
                } else {
                    output = '<div class="alert alert-info"><i class="fa fa-check" aria-hidden="true"></i><span class="notification-text">' + response.text + '</span></div>';

                    //If success clear inputs
                    $("input, textarea").val('');
                }

                $("#notification").html(output); 

                $(".notification").delay(15000).queue(function (next) {
                    $(this).addClass("scale-out");
                    next();
                });
                $(".notification").on("click", function(){ 
                    $(this).addClass("scale-out");
                });

            }, 'json');
        });

		/* 
		=================================================================
		05 - Jarralax
		=================================================================	
		*/

		$('.jarallax').jarallax();

		/* 
		=================================================================
		06 - Counter JS
		=================================================================	
		*/


		$('.counter').counterUp({
			delay: 10,
			time: 1000
		});


		/* 
		=================================================================
		07 - Testimonial Slider JS
		=================================================================	
		*/


		$(".doctor-slider").owlCarousel({
			autoplay: true,
			loop: true,
			margin: 20,
			touchDrag: true,
			mouseDrag: true,
			nav: false,
			dots: true,
			autoplayTimeout: 6000,
			autoplaySpeed: 1200,
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
			responsive: {
				0: {
					items: 1
				},
				480: {
					items: 1
				},
				600: {
					items: 2
				},
				1000: {
					items: 3
				},
				1200: {
					items: 3
				}
			}
		});


		/* 
		=================================================================
		08 - Back To Top
		=================================================================	
		*/
		if ($("body").length) {
			var btnUp = $('<div/>', {
				'class': 'btntoTop'
			});
			btnUp.appendTo('body');
			$(document).on('click', '.btntoTop', function () {
				$('html, body').animate({
					scrollTop: 0
				}, 700);
			});
			$(window).on('scroll', function () {
				if ($(this).scrollTop() > 200) $('.btntoTop').addClass('active');
				else $('.btntoTop').removeClass('active');
			});
		}


	});


	$(window).on('load', function () {

		/* 
		=================================================================
		09 - Preloader
		=================================================================	
		*/
		$('#js-preloader').addClass('loaded');

	});
}(jQuery));

