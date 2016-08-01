var url = '/now/uthsc-now.json',
	loadPostsFirst = 0,
	loadPostsLast = 14;

function renderNewsPosts(containerElement, data, masonry) {
	$(containerElement).append(parseUthscNowPosts(data));

	var $grid = $('.uthsc-now').imagesLoaded( function(){
		$grid.masonry({
			// set itemSelector so .grid-sizer is not used in layout
			itemSelector: '.grid-item',
			// use element for option
			columnWidth: '.grid-sizer',
			percentPosition: true
		});
	});

	$('.uthsc-now-loader').empty();

	if (masonry) {
		$('.uthsc-now').masonry('reloadItems');
		$('.uthsc-now').masonry();
	}

	if (loadPostsFirst <= 15) {
		//add load more button
		$('.uthsc-now-more').html('<div class="button uthsc-now-load-more-button">Load More&nbsp;<span class="fa fa-refresh" aria-hidden="true"></span></div>');
		$('.uthsc-now-load-more-button').click( function(){
			renderNewsPosts('.uthsc-now',posts,true);
		});
	} else {
		// add go to uthsc now button
		$('.uthsc-now-more').html('<a class="button" href="/now">Go to UTHSC-Now&nbsp;<span class="fa fa-chevron-right" aria-hidden="true"></span></a>');
	}
}


function limitCaptionChars(string, limit) {
	if(!!string && string.length > limit){

		var trimmedString = string.substr(0, limit);
		trimmedString = trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(" ")));
		trimmedString += '&nbsp;&hellip;';
		return trimmedString;
	}

	return string;
}


function parseUthscNowPosts(data) {

	var html = "";

	for (var i=loadPostsFirst;i<loadPostsLast;i++) {

		var postService = data[i]['service'],
			serviceName = data[i]['service_name'],
			postLink = data[i]['link'],
			postTitle = data[i]['caption'],
			postDate = data[i]['date'],
			postIcon = data[i]['service_icon'],
			postImage = data[i]['image'],
			imageClass;

		if (postImage == null) {
			imageClass = 'uthsc-now--no-image'
		} else {
			imageClass = 'uthsc-now--image'
		}

		html += '<a ' + 'href="' + postLink + '" ' + 'class="grid-item uthsc-now--item ' + imageClass + ' ' + postService + ' ' + 'post-0' + (i + 1) + ' ">' +
			'<div class="uthsc-now--container">';

		if (postImage == null) {
			html += '<div class="uthsc-now--message">' +
				'<p>' + limitCaptionChars(postTitle, 100) +'</p>' +
				'</div>';
		} else {
			html += '<div class="uthsc-now--image">' +
				'<img src="' + postImage + '" style="width:100%"/>' +
				'</div>' +

				'<div class="uthsc-now--message">' +
				'<p>' + limitCaptionChars(postTitle, 100) +'</p>' +
				'</div>';
		}

		html += '<div class="uthsc-now--footer">' +
			'<div class="uthsc-now--service">' +
			'<span class="' + postIcon +'">&nbsp;' + serviceName + '</span>' +
			'</div>' +
			'<div class="uthsc-now--date">' +
			'<p>' + postDate +'</p>' +
			'</div>'+
			'</div>';

		html += '</div>' +
			'</a>';
	}

	loadPostsFirst += 15;
	loadPostsLast += 15;

	return html;
}


$.ajax({
	type: "GET",
	url: url,
	dataType: "json",
	success: function (data) {
		posts = data;
		renderNewsPosts('.uthsc-now',posts);
	}
});