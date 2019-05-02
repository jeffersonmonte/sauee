/* =================================
------------------------------------
	ProDent - Dentist Template
	Version: 1.0
 ------------------------------------
 ====================================*/


'use strict';


$(window).on('load', function() {
	/*------------------
		Preloder
	--------------------*/
	$(".loader").fadeOut();
	$("#preloder").delay(400).fadeOut("slow");

});

(function($) {
	/*------------------
		Navigation
	--------------------*/
	$('.nav-switch').on('click', function(event) {
		$(this).toggleClass('active');
		$('.nav-warp').slideToggle(400);
		event.preventDefault();
	});


	/*------------------
		Background Set
	--------------------*/
	$('.set-bg').each(function() {
		var bg = $(this).data('setbg');
		$(this).css('background-image', 'url(' + bg + ')');
	});


	/*------------------
		Progress Bar
	--------------------*/
	$('.progress-bar-style').each(function() {
		var progress = $(this).data("progress");
		var bgcolor = $(this).data("bgcolor");
		var prog_width = progress + '%';
		if (progress <= 100) {
			$(this).append('<div class="bar-inner" style="width:' + prog_width + '; background: '+ bgcolor +';"><span>' + prog_width + '</span></div>');
		}
		else {
			$(this).append('<div class="bar-inner" style="width:100%; background: '+ bgcolor +';"><span>100%</span></div>');
		}
	});




	/*------------------
		Testimonials
	--------------------*/
	$('.testimonials-slider').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		margin: 128,
		center:true,
		items: 1,
		mouseDrag: false,
		animateOut: 'fadeOutRight',
		animateIn: 'fadeInLeft',
		autoplay:true
	});


	$(document).ready(function () {
    $('h6').text('value is '+$('.rivne-rating').val());
    $('body').on('click', '.rivne-rating-div>i', function(e){
    let obj = $(this);
    obj.prevAll().removeClass('far').addClass('fas');
    obj.addClass('fas').removeClass('far');		obj.nextUntil().removeClass('fas').addClass('far');
    var target = obj.parent();
    target.children('input').val(+obj.index()+1);
    //--test
    $('h6').text('value is '+$('.rivne-rating').val());
    //---
    });
    if ($('input').is('.rivne-rating')) {
    var es = $('.rivne-rating');
    es.css('visibility', 'hidden');
    var div = '<div class="rivne-rating-div"></div>';
    es.wrap(div);
    var d = es.parent();
    for (var num = 0; num < es.length; num++) {
    let el=es.eq(num);
    var height = el.css('height');
    var width = el.css('width');
    var color = el.css('color');
    d.eq(num).css({
    'height': height,
    'width': width,
    'color': color,
    'display':'flex',
    'justify-content': 'space-around'
    });
    var stars = es.eq(num).html();
    for (var i = 0; i < 5; i++) {
    stars += '<i class="fas fa-star"></i>';
    }
    es.eq(num).before(stars);
    es.hide();
    ratingchange();
    }
    }
    });
    function ratingchange(){
    var e=$('.rivne-rating');
    for(var k=0; k<e.length; k++){
    let elem=e.eq(k);
    let valueInput = +elem.val();
    let star = elem.siblings('i');
    star.removeClass('fas').addClass('far');
    for(var l=0; l<valueInput;l++){
    star.eq(l).addClass('fas').removeClass('far');
    }
    }
    }


	/*------------------
		Brands Slider
	--------------------*/
	$('.brands-slider').owlCarousel({
		loop: true,
		nav: false,
		dots: false,
		margin : 40,
		autoplay: true,
		responsive : {
			0 : {
				items: 1,
			},
			480 : {
				items: 2,
			},
			768 : {
				items: 4,
			},
			1200 : {
				items: 5,
			}
		}
	});





	/*------------------
		Popular Services
	--------------------*/
	$('#customers-testimonials').owlCarousel( {
			loop: true,

			items: 4,
			margin: 30,
			autoplay: true,
			dots:true,
	    nav:true,
			autoplayTimeout: 8500,
			smartSpeed: 450,
	  	navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
			responsive: {
				0: {
					items: 1
				},
				768: {
					items: 2
				},
				960: {
					items: 3
				},
				1140: {
					items: 4
				}
			}
		});


	/*------------------
		Accordions
	--------------------*/
	$('.panel-link').on('click', function (e) {
		$('.panel-link').removeClass('active');
		var $this = $(this);
		if (!$this.hasClass('active')) {
			$this.addClass('active');
		}
		e.preventDefault();
	});


	/*------------------
		Circle progress
	--------------------*/
	$('.circle-progress').each(function() {
		var cpvalue = $(this).data("cpvalue");
		var cpcolor = $(this).data("cpcolor");
		var cptitle = $(this).data("cptitle");
		var cpid 	= $(this).data("cpid");

		$(this).append('<div class="'+ cpid +' loader-circle"></div><div class="progress-info"><h2>'+ cpvalue +'%</h2><p>'+ cptitle +'</p></div>');

		if (cpvalue < 100) {

			$('.' + cpid).circleProgress({
				value: '0.' + cpvalue,
				size: 110,
				thickness: 7,
				fill: cpcolor,
				emptyFill: "rgba(0, 0, 0, 0)"
			});
		} else {
			$('.' + cpid).circleProgress({
				value: 1,
				size: 110,
				thickness: 7,
				fill: cpcolor,
				emptyFill: "rgba(0, 0, 0, 0)"
			});
		}

	});

})(jQuery);
