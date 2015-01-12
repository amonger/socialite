<?php

namespace Socialite\Service;

use \Facebook;
use Guzzle\Plugin\Oauth\OauthPlugin;
use Guzzle\Service\Client;
use Socialite\Service\Tumblr\Tumblr;
use \Tumblr\API\Client as TumblrClient;

/**
 * Class ServiceFactory
 */
class ServiceFactory
{
    /**
     * @param string $consumerKey
     * @param string $consumerSecret
     * @param string $token
     * @param string $tokenSecret
     *
     * @return Twitter\TwitterAdapter
     */
    public static function twitter($consumerKey, $consumerSecret, $token, $tokenSecret)
    {
        return new Twitter\TwitterAdapter(
            new Twitter\Twitter(
                new Client(),
                new OauthPlugin(
                    [
                        'consumer_key'      => $consumerKey,
                        'consumer_secret'   => $consumerSecret,
                        'token'             => $token,
                        'token_secret'      => $tokenSecret
                    ]
                )
            )
        );
    }

    /**
     * @param string $appId
     * @param $secret
     *
     * @return Facebook\Facebook
     */
    public static function facebook($appId, $secret)
    {
        return new Facebook\Facebook(
            new Facebook(
                [
                    'appId'     => $appId,
                    'secret'    => $secret
                ]
            )
        );
    }

    /**
     * @param string $consumerKey
     * @param string $consumerSecret
     * @param string $token
     * @param string $secret
     *
     * @return Tumblr
     */
    public static function tumblr($consumerKey, $consumerSecret, $token, $secret)
    {
        return new Tumblr(
            new TumblrClient(
                $consumerKey,
                $consumerSecret,
                $token,
                $secret
            )
        );
    }
}
