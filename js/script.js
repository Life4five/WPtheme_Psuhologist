
// Брейкпоинты размеров экрана
var WIDTH_TABL = 1200;
var WIDTH_MOB = 767;
var WIDTH_SMOB = 560;

$('.burger-menu').click( function() {
	// $('.nav-window').css('display', 'flex');
	$('.nav-window').show();
	$('body').css('overflow','hidden');
});
$('.nav-menu-close, .nav-menu li').click( function() {
	$('body').css('overflow','visible');
	$('.nav-window').hide();
});


function introSlide() {
	if ( $('.intro-title').hasClass('shown') ) {} else {

		$('.intro-title').addClass('shown');
		$('.intro-title').css('width','0');
		$('.intro-title').animate({
			width:"100%",
		},500,"swing", function () {

			$('.intro-title-overlap').animate({
				width:"0%",
				},500,"swing", function () {

					$('.intro-img-container').animate({
						width:"100%"
					},800,"swing")
				})

		});
	}
}
function expSlide() {
	var expTitle = $('.exp-title-wrapper');
	var overlap = $('.exp-title-overlap');

	if ( expTitle.hasClass('shown') ) {  } else {
		
		expTitle.addClass('shown');
		expTitle.css('width','0');
		expTitle.css('visibility','visible');
		overlap.css('visibility','visible');

		expTitle.animate({
			width:"100%",
		},500,"swing", function () {

			overlap.animate({
				width:"0",
				},500,"swing")

		});

		// $('.exp-img').animate({
		// 	width:"512px",
		// },1000,"swing");
	}
}

function checkIntro() {
	var scr_pos = $(window).scrollTop();
	var introTitle_pos = $(".intro-title").offset().top;
	if (scr_pos < introTitle_pos) {
		introSlide();
	}
}

function checkExp() {
	var scr_pos = $(window).scrollTop();
	var expTitle_pos = $(".exp-title").offset().top;
	if (scr_pos > expTitle_pos - innerHeight + 200) {
		expSlide();
	}
}
	

$(window).on('scroll', function() {
	if (window.innerWidth > WIDTH_MOB) {
		checkIntro();
		checkExp();
	}
});

function animations() {

	ScrollReveal().reveal('.exp', {
		delay: 200,
		interval: 200,
		duration: 1000,
		viewFactor: 0.3,
	});
	ScrollReveal().reveal('.psiholog, .appointment, .result .wrapper:first-child, .result .wrapper:last-child, .prices, .form', {
		delay: 0,
		interval: 200,
		duration: 750,
		viewFactor: 0.3,
	});
	ScrollReveal().reveal('.intro-text', {
		delay: 500,
		interval: 200,
		duration: 1000,
		distance: '50px',
		origin: 'left'
	});
	ScrollReveal().reveal('.exp-list', {
		delay: 750,
		interval: 500,
		duration: 1000,
		distance: '50px',
		origin: 'left'
	});
	ScrollReveal().reveal('.exp-text', {
		delay: 1000,
		interval: 500,
		duration: 1000,
		distance: '50px',
		origin: 'left'
	});
	ScrollReveal().reveal('.exp-btn', {
		delay: 1250,
		interval: 500,
		duration: 1000,
		distance: '50px',
		origin: 'left'
	});
	ScrollReveal().reveal('header', {
		delay: 0,
		interval: 500,
		duration: 1000,
		distance: '50px',
		origin: 'top'
	});
	ScrollReveal().reveal('.intro-img-link', {
		delay: 1400,
		interval: 500,
		duration: 1000,
		distance: '20px',
		origin: 'right'
	});
	
	
}

$(document).ready( function(){
	if (window.innerWidth > WIDTH_MOB) {
		checkIntro();
		checkExp();
	}
	$('input.bot_handler').removeAttr('checked');
	$('.wpcf7-submit').removeAttr('disabled');



    // Модальные окна
	$('.show_modal').click(function(){
		var mod_window = '#'+$(this).data('window');
		$(mod_window).show().offset({top: $(window).scrollTop() + 100});
        $('.modal_blackout').show();
		var seans = $(this).data('seans');
		var seans_fld = $('input[name=your-seans]');
		if ( seans !== undefined && seans != '' && seans_fld.length > 0 ) {
			seans_fld.val(seans);
		}
    
	});
	$('.modal_blackout, .modal_close').click(function(){
		$('.modal, .modal_blackout').hide();
		$('video').each(function(index, elem){
			$(elem)[index].pause();
		});
	});
	

	// $('.exp-serts').find('a').attr({'rel':'gallery'}).fancybox();
	function init_fancybox() {
		$('.fancybox').attr({'rel':'gallery'}).fancybox();
	}
	init_fancybox();



	var sl1_sel = $('.reviews_slider');
	var sl1_conf = {
		dots: false,
		arrows: true,
		slidesToShow: 5,
		slidesToScroll: 1,
		prevArrow: '<svg class="slick_arr_left"><use xlink:href="#arr_left"></use></svg>',
		nextArrow: '<svg class="slick_arr_right"><use xlink:href="#arr_right"></use></svg>',
		responsive: [
		  {
			breakpoint: WIDTH_TABL,
			settings: {
			  slidesToShow: 4,
			}
		  },
		  {
			breakpoint: WIDTH_MOB,
			settings: {
			  slidesToShow: 3,
			}
		  },
		  {
			breakpoint: WIDTH_SMOB,
			settings: {
			  slidesToShow: 1,
			}
		  },
		]
	};
	setSlick(sl1_sel, sl1_conf);

	var sl2_sel = $('.exp-serts-mobile');
	var sl2_conf = {
		  dots: false,
		  arrows: true,
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  prevArrow: '<svg class="slick_arr_left"><use xlink:href="#arr_left"></use></svg>',
		  nextArrow: '<svg class="slick_arr_right"><use xlink:href="#arr_right"></use></svg>',
	};
	setSlick(sl2_sel, sl2_conf);

	function setSlick (sl_sel, sl_conf) {
		if (sl_sel.length) {
			if (sl_sel.hasClass('slick-initialized')) {
				sl_sel.slick('refresh');
			} else {
				sl_sel.slick(sl_conf);
			}
		}
	}

	// При ресайзе
	var sl_flag1 = 0;
	$(window).on("orientationchange load resize", function () {
		var sl_flag2 = 0;
		if (window.innerWidth <= WIDTH_TABL) {
			sl_flag2 = WIDTH_TABL;
			if (window.innerWidth <= WIDTH_MOB) {
				sl_flag2 = WIDTH_MOB;
				if (window.innerWidth <= WIDTH_SMOB) {
					sl_flag2 = WIDTH_MOB;
				}
			}
		}
		if (sl_flag1 != sl_flag2) {
			setSlick(sl1_sel, sl1_conf);
			init_fancybox();
			sl_flag1 = sl_flag2;
		}
	});

	if (window.innerWidth > WIDTH_MOB) {
		animations();
	}



	

	function json_animations(element_id, json_file) {

		var element = document.getElementById(element_id);
		console.log(element.getElementsByTagName('img').length);
		for (let i = 0; i < element.getElementsByTagName('img').length; i++) {
			element.getElementsByTagName('img')[i].remove();
		}
		var animData = {
			wrapper: element,
			animType: 'svg',
			loop: true,
			prerender: true,
			autoplay: true,
			path: '/wp-content/themes/family-psiholog/js/'+json_file
	
		};
		var anim = bodymovin.loadAnimation(animData);
		
		anim.play();
	}
	json_animations('appointment-bg', 'private_talk.json');
	json_animations('psiholog-card-img-1', '1_meditatsiya.json');
	json_animations('psiholog-card-img-2', '2_obnimashki.json');
	json_animations('psiholog-card-img-3', '3_zerkalo.json');
	json_animations('result-img', 'nice_girl.json');
	json_animations('result-img-mobile', 'nice_girl.json');
});