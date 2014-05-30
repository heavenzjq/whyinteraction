jQuery(function($) {

	//#main-slider
	$(function(){
		$('#main-slider.carousel').carousel({
			interval: 8000
		});
	});

	$( '.centered' ).each(function( e ) {
		$(this).css('margin-top',  ($('#main-slider').height() - $(this).height())/2);
	});

	$(window).resize(function(){
		$( '.centered' ).each(function( e ) {
			$(this).css('margin-top',  ($('#main-slider').height() - $(this).height())/2);
		});
	});

	//portfolio
	$(window).load(function(){
		$portfolio_selectors = $('.portfolio-filter >li>a');
		if($portfolio_selectors!='undefined'){
			$portfolio = $('.portfolio-items');
			$portfolio.isotope({
				itemSelector : 'li',
				layoutMode: 'masonry',
        		resizable: true,
				masonry: {
		            columnWidth: 'li'
		        }
			});
			$portfolio_selectors.on('click', function(){
				$portfolio_selectors.removeClass('active');
				$(this).addClass('active');
				var selector = $(this).attr('data-filter');
				$portfolio.isotope({ filter: selector });
				return false;
			});
		}
		var docViewTop = $(window).scrollTop();
    	var docViewBottom = docViewTop + $(window).height();
		if(docViewBottom > $("#about").offset().top && $(".AlpinePhotoTiles-image-div-container:hidden").size() > 0){
			showInstagramImage();
		}
	});

	//contact form
	var form = $('.contact-form');
	form.submit(function () {
		$this = $(this);
		$.post($(this).attr('action'), function(data) {
			$this.prev().text(data.message).fadeIn().delay(3000).fadeOut();
		},'json');
		return false;
	});

	//goto top
	// $('.gototop').click(function(event) {
	// 	event.preventDefault();
	// 	$('html, body').animate({
	// 		scrollTop: $("body").offset().top
	// 	}, 500);
	// });	

	//Pretty Photo
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false
	});	

	// jQuery(window).resize(function(){
 //        $('.portfolio-items').isotope('reLayout');
 //    });


	$('.nav a[href^="#"]').bind('click.smoothscroll',function (e) {
		e.preventDefault();

		var target = this.hash,
		$target = $(target);

		$('html, body').stop().animate({
			'scrollTop': $target.offset().top-80
		}, 300, 'swing', function () {
				window.location.hash = target;
		});
	});

	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
		var docViewTop = $(window).scrollTop();
    	var docViewBottom = docViewTop + $(window).height();
		if(docViewBottom > $("#about").offset().top && $(".AlpinePhotoTiles-image-div-container:hidden").size() > 0){
			showInstagramImage();
		}
	});

	$('.top').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});
});

function showInstagramImage(){
	var items = jQuery(".AlpinePhotoTiles-image-div-container:hidden");
	if(items.length > 0){
		jQuery(items[Math.floor(Math.random()*items.length)]).show(showInstagramImage);
	}
}

function isScrolledIntoView(elem)
{
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}