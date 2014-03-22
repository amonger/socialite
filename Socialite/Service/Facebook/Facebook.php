<?php

namespace Socialite\Service\Facebook;

use \Facebook;
use Socialite\MessageInterface;
use Socialite\Service\ServiceInterface;

/**
 * Class Facebook
 */
class Facebook implements ServiceInterface
{

    private $facebook;

    /**
     * @param Facebook $facebook
     */
    public function __construct(Facebook $facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @param MessageInterface $post
     * @return mixed
     */
    public function post(MessageInterface $post)
    {
        return $this->facebook->api(
            '/me/feed',
            'POST',
            [
                'message' => $post->getBody()
            ]
        );
    }

    /**
     * @return mixed
     */
    public function getLoginUrl()
    {
        return $this->facebook->getLoginUrl(
            [
                'scope' => 'publish_actions'
            ]
        );
    }

    /**
     * @return mixed
     */
    public function getLogoutUrl()
    {
        return $this->facebook->getLogoutUrl();
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->facebook->getUser();
    }
}
