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
            postTitle = posts[i]['title']['rendered'];

        if (typeof posts[i]._embedded['wp:featuredmedia'] !== 'undefined') {
            featuredImageLink = posts[i]._embedded['wp:featuredmedia'][0]['source_url'];
            featuredImageLink = featuredImageLink.replace('.jpg', '-300x300.jpg')
        } else {
            featuredImageLink = '-resources/2015/images/homepage-news-featured-image-place-holder.jpg';
        }

        html += '<a class="' + 'post-0' + (i + 1) + '" href="' + postLink + '"><div class="row collapse">' +
            '<figure> ' +
            '<img src="' + featuredImageLink + '"' +
            'class="attachment-thumbnail size-thumbnail wp-post-image" ' +
            'alt="Radhakrishna Feature">' +
            '</figure>' +
            '<p><span class="anchortext">' + postTitle +'</span></p>' +
            '</div></a>';
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