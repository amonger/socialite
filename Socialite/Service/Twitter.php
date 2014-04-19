<?php

    namespace Socialite\Service;

    use Guzzle\http\client as GuzzleClient;
    use Guzzle\Plugin\Oauth\OauthPlugin;

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
            $request = $this->client->post('statuses/update.json', array(), array(
                "body" => array(
                    "status" => $status
                )
            ));

            return $request->send();

        }

        public function getLatestTweets($screenName, $count)
        {
            $request = $this->client->get('statuses/user_timeline.json');
            $request->getQuery()
                ->set('count', $count)
                ->set('screen_name', $screenName);

            return call_user_func(array($request->send(), $this->responseType));
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