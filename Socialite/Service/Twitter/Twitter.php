<?php

namespace Socialite\Service\Twitter;

use Guzzle\http\client as GuzzleClient;
use Guzzle\Plugin\Oauth\OauthPlugin;
use Socialite\MessageInterface;

/**
 * This is an Oauth implementation to connect to the twitter api. This implements a tweet method
 *
 * Class Twitter
 */
class Twitter
{
    private $client;
    private $oauth;
    private $responseType;

    /**
     * @param GuzzleClient $client
     * @param OauthPlugin $oauth
     * @param string $responseType
     */
    public function __construct(GuzzleClient $client, OauthPlugin $oauth, $responseType = "json")
    {
        $this->oauth = $oauth;
        $this->client = $client
            ->setBaseUrl('https://api.twitter.com/{version}')
            ->addSubscriber($oauth)
            ->setConfig(
                [
                    'version' => '1.1'
                ]
            );
        $this->responseType = $responseType;
    }

    /**
     * @param MessageInterface $post
     * @return mixed
     */
    public function tweet(MessageInterface $post)
    {
        $request = $this->client->post('statuses/update.json', [],
            [
                "status" => $post->getBody()
            ]
        );

        return $request->send();

    }

    public function getLatestTweets($screenName, $count)
    {
        $request = $this->client->get('statuses/user_timeline.json');
        $request->getQuery()
            ->set('count', $count)
            ->set('screen_name', $screenName);

        return call_user_func(
            [
                $request->send(),
                $this->responseType
            ]
        );
    }

    public function getFavourites($screenName)
    {
        $request = $this->client->get('favorites/list.json');
        $request
            ->getQuery()
            ->set('screen_name', $screenName);

        return call_user_func(
            [
                $request->send(),
                $this->responseType
            ]
        );
    }

    public function getUserTimeline()
    {
        $request = $this->client->get('statuses/user_timeline.json');

        return call_user_func(
            [
                $request->send(),
                $this->responseType
            ]);
    }

    public function search($query)
    {
        $request = $this->client->get('search/tweets.json');
        $request->getQuery()->set('q', $query);
        return call_user_func(
            [
                $request->send(),
                $this->responseType
            ]
        );
    }
}
