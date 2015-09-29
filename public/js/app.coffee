$(document).ready ->	
	$('.activity-switcher').slick
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: false,
		arrows: false,
		asNavFor: '.activity-switcher-tabs',
  		adaptiveHeight: true

	$('.activity-switcher-tabs').slick
		slidesToShow: 2,
		slidesToScroll: 1,
		asNavFor: '.activity-switcher',
		dots: false,
		arrows: false,
		focusOnSelect: true

	$("body").niceScroll({touchbehavior:false,cursorcolor:"#aaa",cursoropacitymax:1,cursorwidth:6,cursorborder:"0 solid #2848BE",cursorborderradius:"0",background:"rgba(0,0,0,.15)",autohidemode:"false"})
