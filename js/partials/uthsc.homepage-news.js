/*
 * Get posts from news site
 */
function postsAjax(url, containerElement) {
    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        success: function (data) {
            posts = data;
            render(containerElement);
        }
    });
}

function parseNewsPosts() {

    var html = '';

    for (var i=0;i<3;i++) {

        var postLink = posts[i]['link'],
            featuredImageLink = '',
            postTitle = posts[i]['title']['rendered'],
            imageVisibilityClass = '',
            titleVisibilityClass = '',
            imageAltText = ''

        if (typeof posts[i]._embedded['wp:featuredmedia'] !== 'undefined') {
            featuredImageLink = posts[i]._embedded['wp:featuredmedia'][0]['source_url'];
            featuredImageLink = featuredImageLink.replace('.jpg', '-300x300.jpg')
        } else {
            featuredImageLink = '-resources/2015/images/homepage-news-featured-image-place-holder.jpg';
        }

        if (i < 1) {
            imageVisibilityClass = 'large-5';
            titleVisibilityClass = 'medium-12 medium-uncentered large-7 large-push-1';

            html += '<a href="' + postLink + '"><div class="row collapse">' +
                '<div class="columns small-4 medium-12' + imageVisibilityClass + '"> ' +
                '<figure> ' +
                '<img width="300" height="300" src="' + featuredImageLink + '"' +
                'class="attachment-thumbnail size-thumbnail wp-post-image" ' +
                'alt="Radhakrishna Feature"' +
                '</figure>' +
                '</div>' +
                '<div class="columns small-12 small-centered' + titleVisibilityClass + '">' +
                '<p><span class="anchortext">' + postTitle +'</span></p></div> ' +
                '</div></a>';

        } else {
            html += '<a href="' + postLink + '"><div class="row collapse">' +
                '<figure style="width: 100px; float: left; margin-bottom: .25em; margin-right: .75em;"> ' +
                '<img width="100" height="100" src="' + featuredImageLink + '"' +
                'class="attachment-thumbnail size-thumbnail wp-post-image" ' +
                'alt="Radhakrishna Feature">' +
                '</figure>' +
                '<p><span class="anchortext">' + postTitle +'</span></p>' +
                '</div></a>';
        }


    }

    return html;

}

function render(element) {
    $(element).empty();
    $(element).html(parseNewsPosts);
    console.log(posts);
}

function renderEducationPosts() {
    postsAjax("http://news.uthsc.edu/wp-json/wp/v2/posts?categories=59&per_page=3&_embed", '.news-posts-academics');
}

function renderResearchPosts() {
    postsAjax("http://news.uthsc.edu/wp-json/wp/v2/posts?categories=60&per_page=3&_embed", '.news-posts-research');
}

function renderClinicalCarePosts() {
    postsAjax("http://news.uthsc.edu/wp-json/wp/v2/posts?categories=61&per_page=3&_embed", '.news-posts-clinical-care');
}

function renderPublicServicePosts() {
    postsAjax("http://news.uthsc.edu/wp-json/wp/v2/posts?categories=331&per_page=3&_embed", '.news-posts-public-service');
}

/*
 * Render names on page load
 */
$(document).ready(function(){
    renderEducationPosts();
    renderResearchPosts();
    renderClinicalCarePosts();
    renderPublicServicePosts();
});