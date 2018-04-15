$(function() {

	let width = $('ul.navbar-nav li.dropdown').width();
	$('.dropdown-menu').width(width+20);

	$('ul.navbar-nav li.nav-item').hover(function() {
		$(this).css('background-color', '#EEEEEE');
	}, function() {
		$(this).css('background', 'transparent');
	});

	$('ul.navbar-nav li.dropdown').hover(function() {

		$(this).css('background-color', '#EEEEEE');

		$(this).find(".dropdown-menu").fadeIn(100, function() {
			$(this).addClass('show');
		});

	}, function() {

		$(this).find(".dropdown-menu").fadeOut(100, function() {
			$(this).removeClass('show');
		});

		$(this).css('background', 'transparent');

	});

	$('.nav-item').hover(function(){
	  $(this).toggleClass('custom-background');
	});

	$('.nav-item').click(function(){
		$(this).find('.dropdown-menu').toggleClass('show');
	});

});
