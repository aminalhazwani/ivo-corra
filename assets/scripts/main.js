$(window).on("load", function () {
	if ( $(window).width() >= 768 ) {
		var max_x = ($(window).width() - 0);
		var max_y = $('.work').length*600;//9000;
		var min_x = 200;
	}
	if ( $(window).width() >= 480 ){
		var max_x = ($(window).width() - 100);
		var max_y = $('.work').length*150;//6000;
		var min_x = 200;
	}
	else {
		var max_x = $(window).width();
		var max_y = $('.work').length*150;//6000;
		var min_x = 100;
	}

	var min_y = 0;
	var filled_areas = new Array();

	$('.work').each(function() {
		console.log("calculating");
	    var rand_x=0;
	    var rand_y=0;
	    var area;
	    do {
	        rand_x = Math.round(min_x + ((max_x - min_x)*(Math.random() % 1)));
	        rand_y = Math.round(min_y + ((max_y - min_y)*(Math.random() % 1)));
	        area = {x: rand_x, y: rand_y, width: $(this).width(), height: $(this).height()};
	    	console.log(".");
	    } while(check_overlap(area));

	    filled_areas.push(area);

	    $(this).css({left:pixel2percentage(rand_x)+"%", top: rand_y});
	});

	function check_overlap(area) {
	    for (var i = 0; i < filled_areas.length; i++) {

	        check_area = filled_areas[i];

	        var bottom1 = area.y + area.height;
	        var bottom2 = check_area.y + check_area.height;
	        var top1 = area.y;
	        var top2 = check_area.y;
	        var left1 = area.x;
	        var left2 = check_area.x;
	        var right1 = area.x + area.width;
	        var right2 = check_area.x + check_area.width;
	        if (bottom1 < top2 - 20 || top1 - 20 > bottom2 || right1 < left2 - 20 || left1 - 20 > right2) {
	            continue;
	        }
	        return true;
	    }
	    return false;
	}

	function pixel2percentage(pixel){
		var width = window.innerWidth;
		return percentage = 100 * ( width - pixel ) / width
	}

});

$(window).on("load", function () {
	$('.work').css({opacity: 1});

	$('.menu__toogle').click(function(){
	   	$('.menu__toogle').toggleClass('is-open');
      $('.menu__container').toggleClass('is-open');
	   	$('.container').toggleClass('is-hidden');
	});

	$('.contact__toogle').click(function(){
	   $('.contact__toogle').toggleClass('is-open');
	   $('.contact__container').toggleClass('is-open');
	   $('.container').toggleClass('is-hidden');
	});

	$('.lb-next').click(function(){
	  $('.lb-next').addClass('activated');
	  $('.lb-prev').addClass('activated');
	});

	$('.lb-prev').click(function(){
	  $('.lb-next').addClass('activated');
	  $('.lb-prev').addClass('activated');
	});

	$('.work__element').click(function(){
		$(this).next('.work__info').addClass('is-active');
	});

	$('.work__info--button').click(function(){
		$(this).next('.work__info--description').toggleClass('is-open');
	});

	$('.work__info--close').click(function(){
		$('.work__info--description').removeClass('is-open');
	});

});



