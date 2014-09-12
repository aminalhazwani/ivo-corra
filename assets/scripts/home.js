$(window).on("load", function () {
	var max_x = $(window).width();
	var max_y = $('.work').length*300;

	var min_x = 200;
	var min_y = 0;

	var filled_areas = new Array();

	$('.work').each(function() {
	    var rand_x=0;
	    var rand_y=0;
	    var area;
	    do {
	        rand_x = Math.round(min_x + ((max_x - min_x)*(Math.random() % 1)));
	        rand_y = Math.round(min_y + ((max_y - min_y)*(Math.random() % 1)));
	        area = {x: rand_x, y: rand_y, width: $(this).width(), height: $(this).height()};
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
	        if (bottom1 < top2 - 100 || top1 - 100 > bottom2 || right1 < left2 - 100 || left1 - 100 > right2) {
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