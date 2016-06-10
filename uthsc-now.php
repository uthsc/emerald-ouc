<?php

function curl_feed($url) {
    $ch = curl_init();
    // Disable SSL verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Will return the response, if false it print the response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Set the url
    curl_setopt($ch, CURLOPT_URL,$url);
    // Execute
    $result=curl_exec($ch);
    // Closing
    curl_close($ch);

    return $result;
}

$uthsc_now_feed = array();

$instagram = 'https://api.instagram.com/v1/users/302960952/media/recent?access_token=302960952.a74da0d.1d808ab911114752b305e9877884d51c&count=8&max_id=1256745241756493035_302960952';
$instagram_results = json_decode(curl_feed($instagram),true);

foreach ( $instagram_results['data'] as $ipost) {

    $instagram_date = date('F j, Y', $ipost['created_time']);

    $instagram_post = array(
        'service'      => 'instagram',
        'service_icon' => 'fa fa-instagram',
        'date'         => $instagram_date,
        'date_raw'     => $ipost['created_time'],
        'date_epoch'   => $ipost['created_time'],
        'link'         => $ipost['link'],
        'caption'      => $ipost['caption']['text'],
        'image'        => $ipost['images']['standard_resolution']['url']
);

//    var_dump($ipost);
//    echo '<br /><br /><br />';

    array_push($uthsc_now_feed, $instagram_post);
}

$facebook = 'https://graph.facebook.com/uthsc/feed?access_token=286629201725123%7CqjqCyyPF-0vm3oCusFn3MM4xPHg&fields=message,created_time,full_picture,permalink_url&limit=8';
$facebook_results = $news_results = json_decode(curl_feed($facebook),true);

foreach ($facebook_results['data'] as $fpost) {
    $facebook_post_date = intval( strtotime( $fpost['created_time'] ) );
    $facebook_post_date_time = new DateTime( "@$facebook_post_date" );
    $facebook_time = $facebook_post_date_time->format('F j, Y');

    $facebook_post = array(
        'service'       => 'facebook',
        'service_icon'  => 'fa fa-facebook-official',
        'service_color' => '',
        'date'          => $facebook_time,
        'date_raw'      => $fpost['created_time'],
        'date_epoch'    => strtotime($fpost['created_time']),
        'link'          => $fpost['permalink_url'],
        'caption'       => $fpost['message'],
        'image'         => $fpost['full_picture']
    );

    if(!is_null($facebook_post['caption'])) {
        array_push($uthsc_now_feed, $facebook_post);
    }


//    var_dump($fpost);
//    echo '<br /><br /><br />';
}

$news = 'http://news.uthsc.edu/wp-json/wp/v2/posts?categories=153&per_page=12&_embed';
$news_results = json_decode(curl_feed($news),true);

foreach ( $news_results as $post) {



    $uthsc_news_post_date = intval( strtotime( $post['date_gmt'] ) );
    $uthsc_news_post_date_time = new DateTime( "@$uthsc_news_post_date" );
    $news_time = $uthsc_news_post_date_time->format('F j, Y');

    $uthsc_news_post = array(
        'service'       => 'uthsc_news',
        'service_icon'  => 'fa fa-newspaper-o',
        'service_color' => '',
        'date'          => $news_time,
        'date_raw'      => $post['date_gmt'],
        'date_epoch'    => strtotime($post['date_gmt']),
        'link'          => $post['link'],
        'caption'       => $post['title']['rendered']
    );


    array_push($uthsc_now_feed, $uthsc_news_post);
}

//Twitter curl thing
$twitter_key = 'BXHrZAAOcVGTAEE51Vn7CEQIB';
$twitter_secret = '0bFB4dF2Q87DgRnzwEdCAECbhXQXvyrgvGaaZWoxHkY09Xko92';
$twitter_api_endpoint = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=uthsc&exclude_replies=true&count=100&include_rts=false'; // endpoint must support "Application-only authentication"

$basic_credentials = base64_encode($twitter_key.':'.$twitter_secret);
$tk = curl_init('https://api.twitter.com/oauth2/token');
curl_setopt($tk, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$basic_credentials, 'Content-Type: application/x-www-form-urlencoded;charset=UTF-8'));
curl_setopt($tk, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
curl_setopt($tk, CURLOPT_RETURNTRANSFER, true);
$token = json_decode(curl_exec($tk));
curl_close($tk);

//// use token
if (isset($token->token_type) && $token->token_type == 'bearer') {
    $br = curl_init($twitter_api_endpoint);
    curl_setopt($br, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token->access_token));
    curl_setopt($br, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($br);
    curl_close($br);

    $twitter_results = $data;
}

if($twitter_results) {
    foreach ( json_decode($twitter_results,true) as $tweet) {

        $tweet_date = intval(strtotime( $tweet['created_at']));
        $tweet_date_time = new DateTime( "@$tweet_date" );

        $tweet_time = $tweet_date_time->format('F j, Y');

        $uthsc_tweet = array(
            'service'      => 'twitter',
            'service_icon' => 'fa fa-twitter',
            'date'         => $tweet_time,
            'date_raw'     => $tweet['created_at'],
            'date_epoch'   => strtotime($tweet['created_at']),
            'link'         => 'https://twitter.com/statuses/' . $tweet['id'],
            'caption'      => $tweet['text'],
            'image'        => $tweet['entities']['media'][0]['media_url']
        );


        //echo json_encode($tweet['entities']['media']['id']);
//        var_dump($tweet['entities']['media'][0]['media_url']);
//        echo '<br /><br /><br />';

        array_push($uthsc_now_feed, $uthsc_tweet);
    }
}

//var_dump($uthsc_now_feed);




function date_compare($a, $b)
{
    $t1 = strtotime($a['date']);
    $t2 = strtotime($b['date']);
    return $t2 - $t1;
}
$arr2 =  usort($uthsc_now_feed, 'date_compare');


echo json_encode($uthsc_now_feed);

