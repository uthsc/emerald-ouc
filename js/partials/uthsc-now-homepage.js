var uthscNowHomepage = {
	url: '/now/uthsc-now-homepage.json',

	loadPostsFirst: 0,

	loadPostsLast: 14,

	posts: [],

	renderNewsPosts: function(containerElement, data, masonry) {
		jQuery(containerElement).append(uthscNowHomepage.parseUthscNowPosts(data));

		var $grid = jQuery('.uthsc-now').imagesLoaded( function(){
			$grid.masonry({
				// set itemSelector so .grid-sizer is not used in layout
				itemSelector: '.grid-item',
				// use element for option
				columnWidth: '.grid-sizer',
				percentPosition: true
			});
		});

		jQuery('.uthsc-now-loader').empty();

		if (masonry) {
			jQuery('.uthsc-now').masonry('reloadItems');
			jQuery('.uthsc-now').masonry();
		}

		if (uthscNowHomepage.loadPostsFirst <= 15) {
			//add load more button
			jQuery('.uthsc-now-more').html('<div class="button uthsc-now-load-more-button">Load More&nbsp;<span class="fa fa-refresh" aria-hidden="true"></span></div>');
			jQuery('.uthsc-now-load-more-button').click( function(){
				uthscNowHomepage.renderNewsPosts('.uthsc-now',uthscNowHomepage.posts,true);
			});
		} else {
			// add go to uthsc now button
			jQuery('.uthsc-now-more').html('<a class="button" href="/now">Go to UTHSC-Now&nbsp;<span class="fa fa-chevron-right" aria-hidden="true"></span></a>');
		}
	},

	limitCaptionChars: function (string, limit) {
		if(!!string && string.length > limit){
			var trimmedString = string.substr(0, limit);
			return trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(" ")))+'&nbsp;&hellip;';
		}

		return string;
	},

	parseUthscNowPosts: function(data) {

		var html = "";

		for (var i=uthscNowHomepage.loadPostsFirst;i<uthscNowHomepage.loadPostsLast;i++) {

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
					'<p>' + uthscNowHomepage.limitCaptionChars(postTitle, 100) +'</p>' +
					'</div>';
			} else {
				html += '<div class="uthsc-now--image">' +
					'<img src="' + postImage + '" style="width:100%"/>' +
					'</div>' +

					'<div class="uthsc-now--message">' +
					'<p>' + uthscNowHomepage.limitCaptionChars(postTitle, 100) +'</p>' +
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

		uthscNowHomepage.loadPostsFirst += 15;
		uthscNowHomepage.loadPostsLast += 15;

		return html;
	}
};

$.ajax({
	type: "GET",
	url: uthscNowHomepage.url,
	dataType: "json",
	success: function (data) {
		uthscNowHomepage.posts = data;
		uthscNowHomepage.renderNewsPosts('.uthsc-now',data);
	}
});