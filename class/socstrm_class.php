<?php
require_once('twitter/TwitterAPIExchange.php');

class SocialStream {
		
	function __construct() {
		$this->twitter_feed();
	}

	/**
	 * Get twitter feed using:
	 * https://github.com/J7mbo/twitter-api-php
	 * @author Lukas Juhas
	 * @version 1.0
	 * @package Social Stream
	 * @since   2014-10-27
	 */
	public function twitter_feed() {
		$settings = array(
			'oauth_access_token' => "1059177924-gCzoye8tDJxX5A1bUjHgcJt5X47vyzFC34fQBPP",
			'oauth_access_token_secret' => "2Ef503kIK0J548iKbRuFMf03emX3VCb6yVsdILQKLE",
			'consumer_key' => "gkHd7RgvRSkVYCAgg85COg",
			'consumer_secret' => "cMk8U8S3iaNiAE9eUDBjrWE2qPbrPxpO1hePyVs8nNE"
		);

		$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
		$getfield = '?screen_name=ItsLukasJuhas';
		$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange($settings);
		$response = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();

		$this->twitter_feed = json_decode($response);

		return $this;
	}
}