<?php

    namespace Socialite\Service;

    use Guzzle\Plugin\Oauth\OauthPlugin;
    use Guzzle\Service\Client;

    class ServiceFactory
    {
        public static function twitter ($oauth = array())
        {
            return new TwitterAdapter(new Twitter(new Client(), new OauthPlugin($oauth)));
        }

        public static function facebook ($config = array())
        {
            return new Facebook(new \Facebook($config));
        }
    }