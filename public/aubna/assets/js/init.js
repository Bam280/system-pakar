/************* Template Init Js File ************************
    Template Name: Aubna - Coronavirus Medical Prevention HTML Template
    Author: Themescare
    Version: 1.0
    Copyright 2020
*************************************************************/


$(function () {

	"use strict";
	var wind = $(window);

	/*==================================
	Navbar Scrolling Setup
	====================================*/

	wind.on("scroll", function () {
		var bodyScroll = wind.scrollTop(),
			navbar = $(".navbar")
		if (bodyScroll > 200) {
			navbar.addClass("fixed-top");
		} else {
			navbar.removeClass("fixed-top");
		}
	});
	

});

