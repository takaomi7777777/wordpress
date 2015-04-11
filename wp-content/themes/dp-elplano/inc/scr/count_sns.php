<?php
// Count Tweet
function countTweet($url) {

	if (!function_exists('json_decode')) return;

	//twitter tweetcount
	$tweetcount         = @file_get_contents('http://urls.api.twitter.com/1/urls/count.json?url=' . urlencode($url), true);
	$decode_tweetcount  = json_decode($tweetcount, true);
	$twitter_tweetcount = (int)$decode_tweetcount['count'];

	return $twitter_tweetcount;
}
// Count Likes
function countFacebookLikes($url = null) {

	if (!$url) return;
	if (!function_exists('json_decode')) return;

	$json = @file_get_contents('http://graph.facebook.com/' . urlencode($url), true);
	$data = json_decode($json);

	if ($data->{'error'}) return;

	return ($data->{'shares'}) ? (int)$data->{'shares'} : 0;
}

// Count Hatena bookmarks
function countHatena($url = null) {

	if (!$url) return;
	if (!function_exists('json_decode')) return;

	$response = @file_get_contents('http://api.b.st-hatena.com/entry.count?url=' . urlencode($url));

	return ($response) ? (int)$response : 0;
}
?>