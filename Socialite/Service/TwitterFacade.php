<?php

    namespace Socialite\Service;

    use Guzzle\Plugin\Oauth\OauthPlugin;
    use Guzzle\Service\Client;

    class TwitterFacade
    {
        public static function get($oauth = array())
        {
            return new Twitter(new Client(), new OauthPlugin($oauth));
        }
    }