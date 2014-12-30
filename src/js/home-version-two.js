$(function () {

	var useOnlyWithForScaling = true;

	var highRes = {minPicSize:240, maxPicSize:600, minScreenWidth:1024, maxScreenWidth:-1, 
	minPaddingX:100, maxPaddingX:200, minPaddingY:200, maxPaddingY:400, iterations:100};
	
	var midRes = {minPicSize:200, maxPicSize:350, minScreenWidth:480, maxScreenWidth:1023, 
	minPaddingX:20, maxPaddingX:200, minPaddingY:100, maxPaddingY:300, iterations:50};
	
	var lowRes = {minPicSize:180, maxPicSize:300, minScreenWidth:0, maxScreenWidth:479, 
	minPaddingX:20, maxPaddingX:160, minPaddingY:20, maxPaddingY:70, iterations:10};

	function requiredResConfiguration(screen_width){
		var currentRes = highRes;
		if (screen_width < highRes.minScreenWidth)
			currentRes = midRes;
		if (screen_width < currentRes.minScreenWidth)
			currentRes = lowRes;
		return currentRes;
	}
	
	function adaptResConfiguration(currentRes, screen_width){
		var resConfig = {minPicSize:currentRes.minPicSize, maxPicSize:currentRes.maxPicSize, 
		minScreenWidth:currentRes.minScreenWidth, maxScreenWidth:currentRes.maxScreenWidth, 
		minPaddingX:currentRes.minPaddingX, maxPaddingX:currentRes.maxPaddingX, 
		minPaddingY:currentRes.minPaddingY, maxPaddingY:currentRes.maxPaddingY, iterations: currentRes.iterations};
				
		var maxSize = currentRes.maxScreenWidth;
		
		if( currentRes.maxScreenWidth < 0){
			maxSize  = screen.width;
		}

		resConfig.minPicSize = currentRes.minPicSize * screen_width / maxSize;
		resConfig.maxPicSize = currentRes.maxPicSize * screen_width / maxSize;
		resConfig.minPaddingX = currentRes.minPaddingX * screen_width / maxSize;
		resConfig.maxPaddingX = currentRes.maxPaddingX * screen_width / maxSize;
		resConfig.minPaddingY = currentRes.minPaddingY * screen_width / maxSize;
		resConfig.maxPaddingY = currentRes.maxPaddingY * screen_width / maxSize;

		return resConfig;
	}
	

	function randomImagePlacement(imagesContainers) {
		var screen_width = $('.container').width();
		console.log(screen_width);
		
		var areas = new Array();

		var currentRes = requiredResConfiguration($(window).width());
		
		var currentRes = adaptResConfiguration(currentRes, $(window).width());

		var paddingX = currentRes.maxPaddingX - currentRes.minPaddingX;
		var paddingY = currentRes.maxPaddingY - currentRes.minPaddingY;
		console.log(paddingX);

		var imagesContainers = $('.work');
		
		var imageWidth = currentRes.maxPicSize - currentRes.minPicSize;
		

		var left = new Position(currentRes.minPaddingX, currentRes.minPaddingY);
		var top = new Position(currentRes.minPaddingX, currentRes.minPaddingY);

		for(var i = 0; i < imagesContainers.length; i++){
			if(i >0){
				var c=0;
				while(c<currentRes.iterations && !randomPlacementAnywhere(left, top, imagesContainers, i, areas, currentRes, paddingX, paddingY)){
					c++;
				}
				if(c >=currentRes.iterations)
				randomPlaceOnNextFreePosition(left, top, imagesContainers, i, areas, currentRes, paddingX, paddingY);
			}else
			randomPlaceOnNextFreePosition(left, top, imagesContainers, i, areas, currentRes, paddingX, paddingY);
		}
		
		function randomPlacementAnywhere(left, top, imagesContainers, i, areas, currentRes, paddingX, paddingY){
			var remainingImages = imagesContainers.length-i;
			var index = Math.floor(Math.random() * remainingImages);
			
			var currentItem = imagesContainers[index];
			
			var newImageSize = newSize(currentItem);
			
			if(newImageSize.height <= 0){
				imagesContainers[index].Area =  newImageSize;
				swap(imagesContainers, index, remainingImages-1);
				return true;
			}	
			var remainingSizeLeft = screen_width - newImageSize.width - currentRes.maxPaddingX;
			
			//var pos_y = left.y - newImageSize.height - currentRes.minPaddingY;
			
			
			var pos_y = left.y - currentRes.minPaddingY;
			
			if (pos_y <= 0)
				return false;
			
			var rand_x = Math.round(currentRes.minPaddingX +(remainingSizeLeft*Math.random()));
			var rand_y = currentRes.minPaddingY+ Math.floor(Math.random() * pos_y);
			
			var area = new Area(rand_x, rand_y, newImageSize.width, newImageSize.height);
			
			if(!area.check_overlap(areas,currentRes.minPaddingX, currentRes.minPaddingY)){
				areas.push(area);

				imagesContainers[index].Area = area;
			
				swap(imagesContainers, index, remainingImages-1);
				$(currentItem).css({left:rand_x, top:rand_y, width:newImageSize.width});
				
				
				if(left.y > (rand_y+newImageSize.height+currentRes.minPaddingY))
					return true;
					
				if(top.y < (rand_y+newImageSize.height+currentRes.minPaddingY)){
					top.y = rand_y+newImageSize.height+currentRes.minPaddingY;
					left.x = top.x;
					left.y = top.y;
					return true;
				}
				
				if(left.y < (rand_y+newImageSize.height+currentRes.minPaddingY)){
					left.x = top.x;
					left.y = top.y;
				}
				
					
				return true;
			}
			return false;
			

		}
		
		function randomPlaceOnNextFreePosition(left, top, imagesContainers, i, areas, currentRes, paddingX, paddingY){
			var remainingImages = imagesContainers.length-i;
			var index = Math.floor(Math.random() * remainingImages);
			
			var currentItem = imagesContainers[index];
			
			var newImageSize = newSize(currentItem);

			if(newImageSize.height <= 0){
				imagesContainers[index].Area =  newImageSize;
				swap(imagesContainers, index, remainingImages-1);
				return;
			}			
			
			var remainingSizeLeft = screen_width - (left.x+newImageSize.width) - currentRes.maxPaddingX;
			
			if (remainingSizeLeft < 0){
				left.y = top.y;
				if (left.x > (screen_width*0.75))
					left.x = 0;
				else{
					left.x = screen_width/4;
				}

			}
			else{
			left.y +=currentRes.minPaddingY;
			//left.x +=currentRes.minPaddingX;
			}

			var rand_x = Math.round(left.x +(paddingX*Math.random()));
			var rand_y = Math.round(left.y + ((paddingY)*(Math.random())));

			left.x = rand_x+newImageSize.width+currentRes.minPaddingX;
			if(top.y < (rand_y+newImageSize.height+currentRes.minPaddingY))
				top.y = rand_y+newImageSize.height+currentRes.minPaddingY;

	
			$(currentItem).css({left:rand_x, top:rand_y, width:newImageSize.width});

			var area = new Area(rand_x, rand_y, newImageSize.width, newImageSize.height);
			
			areas.push(area);

			imagesContainers[index].Area = area;
			
			swap(imagesContainers, index, remainingImages-1);
		}
		
		function newSize(currentItem)
		{
			var width = $(currentItem).width();
			var height = $(currentItem).height();
			if(height <= 0){
				return new Area(0, 0, width, height);
			}			
			var newWidth = currentRes.minPicSize+(imageWidth*Math.random());
			if (width < height && !useOnlyWithForScaling){
				var theight = newWidth;
				newWidth = newWidth * width / height;
				height = theight;
			}
			else{
				height = newWidth * height/ width;
			}
			
			return new Area(0, 0, newWidth, height);
		}
		
		function swap(array, index1, index2){
			var firstElement = array[index1];
			var secondElement = array[index2];
			array[index1] = secondElement;
			array[index2] = firstElement;
		}
	
		return imagesContainers;
	}

	function calcImageHeight(max_min_x, max_max_x){
		var max_x = $(window).width();
		var max_size_y = 0;
		if (max_x > 1400)
			max_size_y = max_max_x;
		else if(max_x < 500)
			max_size_y = max_min_x;
		else
		max_size_y = max_min_x + ((max_max_x- max_min_x)/900)*(max_x - 500);
		return max_size_y;
	}
		
	function calcPadding(padding_min, padding_max){
		var max_x = $(window).width();
		if (max_x > 1400)
			return padding_max;
		else if(max_x < 500)
			return padding_min;
		else
		return padding_min + ((padding_max-padding_min)/900)*(max_x- 500);
	}
	
	function Position(x, y) {
		this.x = x;
		this.y = y;
	}	
	
	function Area(x, y, width, height) {		
		this.x = x;
		this.y = y;
		this.width = width;
		this.height = height;		
		
		var top_left = new Position(x, y);
		var top_right = new Position(x+width, y);
		var bottom_left = new Position(x, y+height);
		var bottom_right = new Position(x+width, y+height);
		
		this.get_overlap =  function (filled_areas, spaceX, spaceY) {		
			var overlappingAreas = new Array();
			
			for (var i = 0; i < filled_areas.length; i++) {
				var check_area = filled_areas[i];
				
				var top_left_check = new Position(check_area.x, check_area.y);
				var top_right_check = new Position(check_area.x+check_area.width, check_area.y);
				var bottom_left_check = new Position(check_area.x, check_area.y+check_area.height);
				var bottom_right_check = new Position(check_area.x+check_area.width, check_area.y+check_area.height);

				if (bottom_left.y < (top_left_check.y - spaceY) ||  bottom_left_check.y < (top_left.y - spaceY) || 
					top_right.x < (top_left_check.x - spaceX) ||  top_right_check.x < (top_left.x - spaceX) ) {
					continue;
				}
				overlappingAreas.push(check_area);
			}
			return overlappingAreas;
		};
		
		this.check_overlap =  function (filled_areas, spaceX, spaceY) {
			var overlappingAreas = this.get_overlap(filled_areas, spaceX, spaceY);
			if (overlappingAreas.length > 0) return true;
			else
			return false;
		};
		
		this.contains = function (filled_areas, spaceX, spaceY) {

			for (var i =0; i< filled_areas.length;i++) {
				var check_area = filled_areas[i];
			
				var top_left_check = new Position(check_area.x, check_area.y);
				var top_right_check = new Position(check_area.x+check_area.width, check_area.y);
				var bottom_left_check = new Position(check_area.x, check_area.y+check_area.height);
				var bottom_right_check = new Position(check_area.x+check_area.width, check_area.y+check_area.height);

				if (top_left_check.x-spaceX < top_left.x && top_right.x < top_right_check.x+spaceX && 
					top_left_check.y -spaceY < top_left.y && bottom_left_check.y+spaceY > bottom_left.y) {
					return true;
				}
			}
			return false;		
		};
	}	
	
	function getMaxY(areas){
		var max_y = areas[0].y + areas[0].height;
		for(var i = 1; i < areas.length; i++){
			var current_y = (areas[i].y+ areas[i].height);
			if(current_y > max_y)
				max_y = current_y;
		}
		return max_y;
	}

	function enlargeImages(old_width, imagesContainers) {
	console.log("enlarge");
		var areas = new Array();
		var screen_width = $(window).width();

		var padding = calcPadding(20, 100 );
		var item = imagesContainers[imagesContainers.length-1];
		var prev_x =  parseInt($(item).css('left'), 10);
		var initial_y =  parseInt($(item).css('top'), 10);
		
		var initial_y = pixel2percentage(initial_y);
		if (initial_y > 200)
			initial_y = 100;
		$(item).css({top:initial_y});
		initial_y =  parseInt($(item).css('top'), 10);

		var prevArea = new Area(prev_x, initial_y, $(item).width(), $(item).height());
		areas.push(prevArea);
		
		var pos_y = prevArea.y;
		
		for(var i = imagesContainers.length-2; i >=0; i--){
		
			var prev_right_x = prev_x+$(imagesContainers[i-1]).width();
			var remainingSizeLeft = (screen_width - (prev_x+prev_right_x));
		
			var old_x =  parseInt($(imagesContainers[i]).css('left'), 10);
			var old_y =  parseInt($(imagesContainers[i]).css('top'), 10);
			$(imagesContainers[i]).css({top:pixel2percentage(old_y)});
			var new_y =  parseInt($(imagesContainers[i]).css('top'), 10);
			
			var area = new Area(old_x, new_y,  $(imagesContainers[i]).width(), $(imagesContainers[i]).height());
			
			if((area.x + area.width) < screen_width && area.x > prev_right_x){
				var offset = Math.floor(Math.random() * (area.height/2));
				$(imagesContainers[i]).css({top:(pos_y+offset)});
			}
			else{
				var max_y = getMaxY(areas);
				new_y =  max_y+padding;
				$(imagesContainers[i]).css({top:new_y});
			}
			
			area.y = parseInt($(imagesContainers[i]).css('top'), 10);
			pos_y = area.y;
			areas.push(area);
		}
		
		function pixel2percentage(pixel){
			var factor = window.innerWidth / old_width;
			return height = pixel * factor
		}
		
		old_width = screen_width;
		return old_width;
	}


	function shrinkAndRepositionImages( imagesContainers) {
		console.log("shrink");
		var areas = new Array();
		var screenWidth = $('.container').width();

		var padding = calcPadding(20, 100 );
		var item = imagesContainers[imagesContainers.length-1];
		var initial_x =  parseInt($(item).css('left'), 10);
		var initial_y =  parseInt($(item).css('top'), 10);
		$(item).css({top:pixel2percentage(initial_y)});
		initial_y =  parseInt($(item).css('top'), 10);
		
		var prevArea = new Area(initial_x, initial_y, $(item).width(), $(item).height());
		areas.push(prevArea);
		
		for(var i = imagesContainers.length-2; i >=0; i--){
			var old_x =  parseInt($(imagesContainers[i]).css('left'), 10);
			var old_y =  parseInt($(imagesContainers[i]).css('top'), 10);
			$(imagesContainers[i]).css({top:pixel2percentage(old_y)});
			var new_y =  parseInt($(imagesContainers[i]).css('top'), 10);

			var area = new Area(old_x, new_y, $(imagesContainers[i]).width(), $(imagesContainers[i]).height());
	
			if(area.check_overlap(areas, padding) || area.contains(areas, padding)){
				var max_y = getMaxY(areas);
				new_y =  max_y+padding;
				$(imagesContainers[i]).css({top:new_y});			
			}
		    area.y = new_y;
			areas.push(area);
		}
		
		function pixel2percentage(pixel){
			var factor = $('.container').width() / old_width;
			return height = pixel * factor
		}
		
		old_width = screenWidth;
		return old_width;
	}
	
	function resizeImages( screenWidth,imagesContainers) {
		for(var i = 0; i <imagesContainers.length; i++){
			var item = imagesContainers[i];
			$(item).css({top:interpolateValue(item.Area.y,screenWidth), 
						left:interpolateValue(item.Area.x,screenWidth), 
						width:interpolateValue(item.Area.width,screenWidth)});
		}
		
		function interpolateValue(pixel,screenWidth){
			var factor = screenWidth / old_width;
			return height = pixel * factor;
		}
	}
	
	function resizeOrLoadImages( prev_width,screenWidth,imagesContainers){
		
		var oldConfig = requiredResConfiguration(prev_width);
		var newConfig = requiredResConfiguration($(window).width());
		if (oldConfig != newConfig){
			console.log("switch");
			imagesContainers = randomImagePlacement(imagesContainers);
			old_width = screenWidth;
		}
		else{
			resizeImages( screenWidth,imagesContainers);
		}

		return imagesContainers;
	}


	var old_width = $('.container').width();
	var prev_width = $(window).width();
	var imagesContainers = $('.work');
	
	$(window).on("load", function (){imagesContainers = randomImagePlacement(imagesContainers)});
	$(window).on("resize", function (){	
	var screenWidth = $('.container').width();
	imagesContainers = resizeOrLoadImages( prev_width,screenWidth,imagesContainers);
	prev_width	= $(window).width();});
});