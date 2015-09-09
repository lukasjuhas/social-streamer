<?php
/**
* Useful function for twitter using codebird-php
* https://dev.twitter.com/rest/public
*/
class twitter {

    //These are your keys/tokens/secrets provided by Twitter
    const CONSUMER_KEY = 'ENTERHERE';
    const CONSUMER_SECRET = 'ENTERHERE';
    const ACCESS_TOKEN = 'ENTERHERE';
    const ACCESS_TOKEN_SECRET = 'ENTERHERE';

    /**
    * Authentication using codebird-php
    * @author Lukas Juhas
    * @version 1.0
    * @date    2015-09-09
    * @return  [type]     [description]
    */
    static private function cb_auth() {
        //codebird is going to be doing the oauth lifting for us
        require_once( WPSS_PLUGIN_DIR . 'twitter/vendor/codebird.php' );

        //Get authenticated
        \Codebird\Codebird::setConsumerKey(self::CONSUMER_KEY, self::CONSUMER_SECRET);
        $cb = \Codebird\Codebird::getInstance();
        $cb->setToken(self::ACCESS_TOKEN, self::ACCESS_TOKEN_SECRET);

        return $cb;
    }

    /**
    * Get most recent tweets
    *
    * IMPORTANT (from twitter API):
    * "We include retweets in the count, even if include_rts is not supplied.
    * It is recommended you always send include_rts=1 when using this API method."
    *
    * 	https://dev.twitter.com/rest/reference/get/statuses/user_timeline
    *
    * @author Lukas Juhas
    * @version 1.0
    * @date    2015-09-09
    * @param   string     $screen_name     The screen name of the user for whom to return results for. Example Values: noradio
    * @param   integer    $count           Specifies the number of tweets to try and retrieve, up to a maximum of 200 per distinct request. The value of count is best thought of as a limit to the number of tweets to return because suspended or deleted content is removed after the count has been applied. We include retweets in the count, even if include_rts is not supplied. It is recommended you always send include_rts=1 when using this API method.
    * @param   boolean    $retweets        When set to false, the timeline will strip any native retweets (though they will still count toward both the maximal length of the timeline and the slice selected by the count parameter). Note: If you’re using the trim_user parameter in conjunction with include_rts, the retweets will still contain a full user object.
    * @param   boolean    $exclude_replies This parameter will prevent replies from appearing in the returned timeline. Using exclude_replies with the count parameter will mean you will receive up-to count tweets — this is because the count parameter retrieves that many tweets before filtering out retweets and replies. This parameter is only supported for JSON and XML responses.
    * @return  object                      Returns obejct with all tweets.
    */
    static public function get_most_recent_tweets($screen_name, $count = 5, $retweets = true, $exclude_replies = false, $json = false) {
        $cb = self::cb_auth();
        //These are our params passed in for our request to twitter
        //The GET request is made by our codebird instance for us further down
        $params = array(
            'screen_name' => $screen_name,
            'count' => $count,
            'include_rts' => $retweets,
            'exclude_replies' => $exclude_replies
        );
        //tweets returned by Twitter in JSON object format
        $tweets = (array) $cb->statuses_userTimeline($params);

        //unset rubbish that would break foreach loop
        unset($tweets['httpstatus']);
        unset($tweets['rate']);

        //handle errors
        if($tweets['errors']) {
            foreach($tweets['errors'] as $key => $error) {
                // create array of errros
                $errors['error'] = $error->message;
                break; // just get first error.
            }

            // return errors as array.
            return $errors;
        }

        //if you going to use it in javascript.
        if($json)
            return json_encode($tweets);


        return $tweets;
    }

    /**
    * get user object and validate it
    * @author Lukas Juhas
    * @version 1.0
    * @date    2015-09-09
    * @param   [type]     $user_screen_name [description]
    * @return  [type]                       [description]
    */
    static public function get_user($user_screen_name) {
        $cb = self::cb_auth();

        $params = array(
            'screen_name' => $user_screen_name,
        );
        $user = (array) $cb->users_lookup($params);

        //unset rubbish that would break foreach loop
        unset($user['httpstatus']);
        unset($user['rate']);

        //handle errors
        if($user['errors']) {
        foreach($user['errors'] as $key => $error) {
            // create array of errros
            $errors['error'] = $error->message;
            break; // just get first error.
        }

        // return errors as array.
        return $errors;
    }

    return $user;

    }

    /**
    * see if user exists based on screen name
    * @author Lukas Juhas
    * @version 1.0
    * @date    2015-09-09
    * @param   string     $user_screen_name e.g. 'thisisbenchmark'
    * @return  boolean                      returns true or false
    */
    static public function user_exists($user_screen_name) {
        //if user name is not given or it's empty
        if(empty($user_screen_name))
            return false;

        //get user object
        $user = self::get_user($user_screen_name);

        //if there is an erorr, user doesn't exists
        if($user['error'])
            return false;

        return true;
    }

    /**
    * get tweet's url fromt $tweet object.
    * if you loop through most_recent tweets e.g.
    * foreach($tweets as $tweet) {
    *    $tweet_url = GetTweets::tweet_url($tweet);
    * }
    * @author Lukas Juhas
    * @version 1.0
    * @date    2015-09-09
    * @param   object     $tweet single tweet object
    * @return  string            returns url to the tweet
    */
    static public function get_tweet_url($tweet) {
        // make sure we've got value
        if(empty($tweet))
            return false;

        // https://twitter.com/thisisbenchmark/status/613368577400393728
        return 'https://twitter.com/'.$tweet->user->screen_name.'/status/'.$tweet->id;
    }

    /**
    * get username out of twitter url for user
    * @author Lukas Juhas
    * @version 1.0
    * @date    2015-09-09
    * @param   string     $url [description]
    * @return  [type]          [description]
    */
    static public function get_username_from_url($url) {
        //make sure we've got value
        if(empty($url))
            return false;

        //get everything after last forwardslash which we assume is gonna be username
        $user_name = substr(strrchr(rtrim($url, '/'), '/'), 1);

        //if url doesnt contain username return false
        if($user_name == 'twitter.com')
            return false;

        return $user_name;
    }
}
