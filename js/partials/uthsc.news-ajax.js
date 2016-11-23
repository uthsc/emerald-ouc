/*
 * Get posts from news site
 */
function newsAjax(url, oucSnippetId, postCount) {
	$.ajax({
		type: "GET",
		url: url,
		dataType: "json",
		success: function (data) {
			uthscNewsSnippet.renderNewsPosts(oucSnippetId, postCount, data);
		}
	});
}

var uthscNewsSnippet = (function(){

	function hasFeaturedMedia(post) {
		if( typeof(post._embedded['wp:featuredmedia']) !== 'undefined' ){
			if ( post._embedded['wp:featuredmedia'][0]['code'] == 'rest_forbidden' ) {
				return false
			}
			return true
		}
		return false;
	}

	function getFeaturedImage(post) {
		var featuredImageLink = '/-resources/2015/images/homepage-news-featured-image-place-holder.jpg';
		if ( hasFeaturedMedia(post) ) {
			if (typeof(post._embedded['wp:featuredmedia'][0]['media_details']['sizes']['thumbnail']) !== 'undefined') {
				featuredImageLink = post._embedded['wp:featuredmedia'][0]['media_details']['sizes']['thumbnail']['source_url'];
			}
		}
		return featuredImageLink
	}

	function parseSinglePost(post, oucSnippetId) {

		var postLink = post['link'],
			featuredImageLink = getFeaturedImage(post),
			date = new Date(post['date']),
			monthNames = [
				"January", "February", "March",
				"April", "May", "June", "July",
				"August", "September", "October",
				"November", "December"
			],
			monthIndex = date.getMonth(),
			postDate = monthNames[monthIndex] + ' ' + date.getDate() + ', ' + date.getFullYear(),
			postTitle = post['title']['rendered'];

		parsedPost = '<div class="column">' +
			'<div class="uthsc-news-box">' +
			'<a data-equalizer-watch="news-boxes-' + oucSnippetId + '" ' + 'href="' + postLink + '">' +
			'<div class="row">' +

			'<div class="columns small-3 large-4">' +
			'<img alt="" src="' + featuredImageLink + '" />' +
			'</div>' +

			'<div class="columns small-9 large-8">' +
			'<h4>' + postTitle + '</h4>' +
			'<p>' + postDate + '</p>' +
			'</div>' +

			'</div>' +
			'</a>' +
			'</div>' +
			'</div>';

		return parsedPost;
	}

	function parseNewsPosts(postCount, oucSnippetId, posts) {

		var htmlPosts = posts.map(function (post) {
			return parseSinglePost(post, oucSnippetId)
		});

		return htmlPosts.join('');
	}

	function reFlowNews(oucSnippetId) {
		//equalizer re-flow
		//$('.news-snippet').foundation();
		// var elem = new Foundation.Equalizer($(".news-snippet"), {
		// 	equalizeOnStack: false
		// });
		//Foundation.reInit('equalizer');
		//$('.random-snippet-class-' + oucSnippetId).foundation();
		var foo = new Foundation.Equalizer($('.news-snippet-' + oucSnippetId), {equalizeOnStack:false});
	}

	publicAPI = {
		featuredImage: function (post) {
			return getFeaturedImage(post);
		},

		renderNewsPosts: function (oucSnippetId, postCount, posts) {
			$('.news-snippet-' + oucSnippetId).empty();
			$('.news-snippet-' + oucSnippetId).html( parseNewsPosts(postCount, oucSnippetId, posts) );
			reFlowNews(oucSnippetId);
		}
	}

	return publicAPI;
})();