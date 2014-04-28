<?php

    namespace Socialite\Service;

    use Guzzle\Plugin\Oauth\OauthPlugin;
    use Guzzle\Service\Client;
    use Socialite\Service\Tumblr\Tumblr;

    class ServiceFactory
    {
        public static function twitter ($consumerKey, $consumerSecret, $token, $tokenSecret)
        {
            return new Twitter\TwitterAdapter(new Twitter\Twitter(new Client(), new OauthPlugin(array(
                'consumer_key'    => $consumerKey,
                'consumer_secret' => $consumerSecret,
                'token'           => $token,
                'token_secret'    => $tokenSecret
            ))));
        }

        public static function facebook ($appId, $secret)
        {
            return new Facebook\Facebook(new \Facebook(array(
                'appId'  => $appId,
                'secret' => $secret
            )));
        }

        public static function tumblr ($consumerKey, $consumerSecret, $token, $secret)
        {
            $tumblr = new Tumblr(new \Tumblr\API\Client($consumerKey, $consumerSecret, $token, $secret));
            return $tumblr;
        }
    }