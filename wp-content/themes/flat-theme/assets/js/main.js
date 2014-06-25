var showing = false;

var switchInstagramImageIntervalId;


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

	// ask to fastclick to remove the 300ms tap delay on mobile browsers
	window.addEventListener( 'load', function() {
	      FastClick.attach( document.body );
	}, false);

	// ask to fastclick to remove the 300ms tap delay on mobile browsers
    // prevent scrolling mechanism to happen on selected elements
	  var noScrolls = document.querySelectorAll( '.no-scroll' );
	  var noScrollFn = function( e ) { e.preventDefault(); };
	  Array.prototype.forEach.call( noScrolls, function(el,i){
	    el.addEventListener( 'touchstart', noScrollFn );
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
		if($("#about").size() > 0){
			var docViewTop = $(window).scrollTop();
	    	var docViewBottom = docViewTop + $(window).height();
			if(docViewBottom > $("#about").offset().top && !showing){
				if($(".AlpinePhotoTiles-image-div-container.invisible").size() > 0){
					showing = true;
					showInstagramImage();
				}
			}
		}
	});

	$('.top').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});

	//Carousel
	$('.row-fluid').click(function() {
	  $('#myCarousel').carousel('next');
	});
});

function showInstagramImage(){
	if(switchInstagramImageIntervalId == undefined){
		switchInstagramImageIntervalId = setInterval(switchInstagramImage, 2000);
	}
	var items = jQuery(".AlpinePhotoTiles-image-div-container.invisible");
	if(items.length > 0){
		jQuery(items[Math.floor(Math.random()*items.length)]).addClass("visible");
		jQuery(items[Math.floor(Math.random()*items.length)]).removeClass("invisible");
	}else if(jQuery('a',this).size() > 1){
		var showingFace = jQuery('a.front',this);
		var hideFace = jQuery('a.back',this);

		if(jQuery(this).hasClass('flipped')){
			showingFace = jQuery('a.back',this);
			hideFace = jQuery('a.front',this);
		}

		var herf = jQuery(showingFace).attr('href');
		jQuery('a[href="'+herf+'"] img').addClass('activeImg');
        
        herf = jQuery(hideFace).attr('href');
        jQuery('a[href="'+herf+'"] img').removeClass('activeImg');
        jQuery('a[href="'+herf+'"] img').addClass('inActiveImg');

        jQuery(hideFace).remove();
	}
}

function switchInstagramImage(){
	var items = jQuery(".AlpinePhotoTiles-image-div-container");

	var item = items[Math.floor(Math.random()*items.length)];

	if(jQuery('a',item).size() < 2){
		addNewImageDiv(jQuery(item));
	}
	jQuery(item).toggleClass("flipped");
}

function addNewImageDiv(imageContainer){
	var inactiveImgs = jQuery(".inActiveImg");
	if(inactiveImgs.size() < 1){
		return;
	}
	var inactiveImg = inactiveImgs[Math.floor(Math.random()*inactiveImgs.length)];
	jQuery(inactiveImg).removeClass("inActiveImg");

	var newDiv = jQuery('<div id="'+jQuery("div",imageContainer).attr("id")+'" class="AlpinePhotoTiles-image-div"></div>');   
    newDiv.css({
            'background-image':'url("'+jQuery(inactiveImg).attr("src")+'")'
          });  
    newDiv.attr("oncontextmenu","return false;");

    imageContainer.append(newDiv);

    if(jQuery('a',imageContainer).hasClass('front')){
    	newDiv.wrap('<a href="'+jQuery(inactiveImg).parent().attr("href")+'" class="AlpinePhotoTiles-link face back" target="'+jQuery(inactiveImg).parent().attr("target")+'"></a>');
    }else{
    	newDiv.wrap('<a href="'+jQuery(inactiveImg).parent().attr("href")+'" class="AlpinePhotoTiles-link face front" target="'+jQuery(inactiveImg).parent().attr("target")+'"></a>');
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