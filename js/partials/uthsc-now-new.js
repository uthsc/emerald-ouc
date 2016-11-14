var url = '/now/json/uthsc-now.json',
	loadPostsFirst = 0,
	loadPostsLast = 20;

function renderNewsPosts(containerElement, data, masonry) {

	var remainingPostCount = posts.length - loadPostsLast;

	$(containerElement).append(parseUthscNowPosts(data));

	// init Masonry
	var $grid = $('.uthsc-now').masonry({
		itemSelector: '.grid-item',
		// use element for option
		columnWidth: '.grid-sizer',
		percentPosition: true
	});
	// layout Masonry after each image loads
	$grid.imagesLoaded().progress( function() {
		$grid.masonry('layout');
	});


	$('.uthsc-now-loader').empty();

	if (masonry) {
		$('.uthsc-now').masonry('reloadItems');
		$('.uthsc-now').masonry();
	}

	if (remainingPostCount > 20) {
		$('.uthsc-now-more').html('<div class="button uthsc-now-load-more-button">Load More</div>');

		$('.uthsc-now-load-more-button').click( function(){
			renderNewsPosts('.uthsc-now',posts,true);
		});
	} else {

		var nowSocial = '';
		nowSocial+='<div class="row">';
		nowSocial+='<div class="columns text-center uthsc-social-icons" aria-label="UTHSC on social media">';
		nowSocial+='<p>That\'s all for now<br/>Follow UTHSC online...</p>'			;
		nowSocial+='<a href="https://facebook.com/uthsc" aria-label="facebook">';
		nowSocial+='<span class="fa fa-facebook fa-2x " aria-hidden="true"></span>';
		nowSocial+='<span class="show-for-sr">facebook</span>';
		nowSocial+='</a>';
		nowSocial+='<a href="https://twitter.com/uthsc" aria-label="twitter">';
		nowSocial+='<span class="fa fa-twitter fa-2x " aria-hidden="true"></span>';
		nowSocial+='<span class="show-for-sr">twitter</span>';
		nowSocial+='</a>';
		nowSocial+='<a href="https://instagram.com/uthsc" aria-label="instagram">';
		nowSocial+='<span class="fa fa-instagram fa-2x " aria-hidden="true"></span>';
		nowSocial+='<span class="show-for-sr">instagram</span>';
		nowSocial+='</a>';
		nowSocial+='<a href="https://linkedin.com/company/university-of-tennessee-health-science-center" aria-label="linked in">';
		nowSocial+='<span class="fa fa-linkedin fa-2x " aria-hidden="true"></span>';
		nowSocial+='<span class="show-for-sr">linked in</span>';
		nowSocial+='</a>';
		nowSocial+='<a href="https://youtube.com/user/uthsc" aria-label="youtube">';
		nowSocial+='<span class="fa fa-youtube fa-2x " aria-hidden="true"></span>';
		nowSocial+='<span class="show-for-sr">You-tube</span>';
		nowSocial+='</a>';
		nowSocial+='<a href="https://pinterest.com/uthsc/" aria-label="pinterest">';
		nowSocial+='<span class="fa fa-pinterest fa-2x " aria-hidden="true"></span>';
		nowSocial+='<span class="show-for-sr">pinterest</span>';
		nowSocial+='</a>';
		nowSocial+='</div>';
		nowSocial+='</div>';
		$('.uthsc-now-more').html(nowSocial);
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

	loadPostsFirst += 20;
	loadPostsLast += 20;

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