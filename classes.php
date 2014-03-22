<?php

    namespace Socialite\Service {
        require_once "vendor/autoload.php";

        use Guzzle\http\client as GuzzleClient;
        use Guzzle\Plugin\Oauth\OauthPlugin;

        interface ServiceInterface
        {
//            public function post (GuzzleClient $client);

        }

        class TwitterFacade
        {
            public static function get($oauth = array())
            {
                return new Twitter(new GuzzleClient, new OauthPlugin($oauth));
            }
        }

        class Twitter implements ServiceInterface
        {
            private $client;
            private $oauth;
            private $responseType;

            function __construct (GuzzleClient $client, OauthPlugin $oauth, $responseType = "json")
            {
                $this->oauth  = $oauth;
                $this->client = $client;
                $this->client
                    ->setBaseUrl('https://api.twitter.com/{version}')
                    ->setConfig(array('version' => '1.1'));
                $this->client->addSubscriber($oauth);
                $this->responseType = $responseType;
            }

            /**
             * @param mixed $client
             */
            public function setClient ($client)
            {
                $this->client = $client;
            }

            /**
             * @return mixed
             */
            public function getClient ()
            {
                return $this->client;
            }

            /**
             * @param mixed $oauth
             */
            public function setOauth ($oauth)
            {
                $this->oauth = $oauth;
            }

            /**
             * @return mixed
             */
            public function getOauth ()
            {
                return $this->oauth;
            }

            public function tweet($status)
            {
                $request = $this->client->post('statuses/update.json', array(
                    "body" => array(
                    "status" => $status
                    )
                ));

                $request->send();

            }

            public function getUserTimeline()
            {
                $request = $this->client->get('statuses/user_timeline.json');

                return call_user_func(array($request->send(), $this->responseType));
            }

            public function search ($query = "")
            {
                $request = $this->client->get('search/tweets.json');
                $request->getQuery()->set('q', $query);
                return call_user_func(array($request->send(), $this->responseType));
            }

        }

        class Facebook implements ServiceInterface
        {
            public function __construct ()
            {

            }

            public function post (GuzzleClient $client)
            {

            }
        }

        class Pintrest implements ServiceInterface
        {
            public function __construct ()
            {

            }

            public function post (GuzzleClient $client)
            {

            }
        }
    }

    namespace Socialite\Transport {
        require_once "vendor/autoload.php";

        use \Guzzle\Http\Client as GuzzleClient;
        use Socialite\Service\ServiceInterface;

        class Transport
        {

            private $client;

            public function __construct (GuzzleClient $client)
            {
                $this->client = $client;
            }

            public function post (ServiceInterface $service)
            {
                return $service->post($this->client);

            }
        }
    }

