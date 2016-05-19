/*
 * Get posts from news site
 */
function newsAjax(url, containerElement) {
	$.ajax({
		type: "GET",
		url: url,
		dataType: "json",
		success: function (data) {
			posts = data;
			renderNewsPosts(containerElement, reFlowNews);
		}
	});
}

function reFlowNews() {
	//equalizer re-flow
	//$('.news-snippet').foundation();
	var elem = new Foundation.Equalizer($(".news-snippet"), {
		equalizeOnStack: false
	});
	//Foundation.reInit('equalizer');
}

function renderNewsPosts(containerElement, reFlowNews) {
	$(containerElement).empty();
	$(containerElement).html(parseNewsPosts);

	if ( reFlowNews &&  ( typeof(reFlowNews) === 'function' ) ) reFlowNews();
}

