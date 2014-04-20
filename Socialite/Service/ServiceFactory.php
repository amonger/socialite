<?php

    namespace Socialite\Service;

    use Guzzle\Plugin\Oauth\OauthPlugin;
    use Guzzle\Service\Client;

    class ServiceFactory
    {
        public static function twitter ($oauth = array())
        {
            return new Twitter\TwitterAdapter(new Twitter\Twitter(new Client(), new OauthPlugin($oauth)));
        }

        public static function facebook ($config = array())
        {
            return new Facebook\Facebook(new \Facebook($config));
        }
    }