/*
 * Get posts from news site
 */
function newsAjax(url, oucSnippetId, postCount) {
	$.ajax({
		type: "GET",
		url: url,
		dataType: "json",
		success: function (data) {
			posts = data;
			renderNewsPosts(oucSnippetId, reFlowNews, postCount);
		}
	});
}

function parseNewsPosts(postCount, oucSnippetId) {
	var html = '';

	for (var i=0;i<postCount;i++) {

		var postLink = posts[i]['link'],
			featuredImageLink = '',
			date = new Date( posts[i]['date'] ),
			monthNames = [
				"January", "February", "March",
				"April", "May", "June", "July",
				"August", "September", "October",
				"November", "December"
			],
			monthIndex = date.getMonth(),
			postDate = monthNames[monthIndex] + ' ' + date.getDate() + ', ' + date.getFullYear(),
			postTitle = posts[i]['title']['rendered'];

		if (typeof posts[i]._embedded['wp:featuredmedia'] !== 'undefined') {
			featuredImageLink = posts[i]._embedded['wp:featuredmedia'][0]['source_url'];
			featuredImageLink = featuredImageLink.replace('.jpg', '-300x300.jpg')
		} else {
			featuredImageLink = '/-resources/2015/images/homepage-news-featured-image-place-holder.jpg';
		}

		html += '<div class="column">' +
			'<div class="uthsc-news-box ' + 'post-0' + (i + 1) + '">' +
			'<a data-equalizer-watch="news-boxes-' + oucSnippetId + '" ' + 'href="' + postLink + '">' +
			'<div class="row">' +

			'<div class="columns small-3 large-4">' +
			'<img alt="" src="' + featuredImageLink + '" />' +
			'</div>' +

			'<div class="columns small-9 large-8">' +
			'<h4>' + postTitle +'</h4>' +
			'<p>' + postDate +'</p>' +
			'</div>' +

			'</div>' +
			'</a>' +
			'</div>' +
			'</div>';
	}

	return html;
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

function renderNewsPosts(oucSnippetId, reFlowNews, postCount) {
	$('.news-snippet-' + oucSnippetId).empty();
	$('.news-snippet-' + oucSnippetId).html(parseNewsPosts(postCount, oucSnippetId));

	if ( reFlowNews &&  ( typeof(reFlowNews) === 'function' ) ) reFlowNews(oucSnippetId);
}