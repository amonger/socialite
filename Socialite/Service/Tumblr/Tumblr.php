<?php

namespace Socialite\Service\Tumblr;

use Socialite\MessageInterface;
use Socialite\Service\ServiceInterface;
use Tumblr\Api\Client as TumblrClient;

/**
 * Class Tumblr
 */
class Tumblr implements ServiceInterface
{

    private $tumblrClient;

    /**
     * @param TumblrClient $tumblr
     */
    public function __construct(TumblrClient $tumblr)
    {
        $this->tumblrClient = $tumblr;
    }

    /**
     * @param MessageInterface $post
     */
    public function post(MessageInterface $post)
    {
        $this->tumblrClient->createPost($post->getTitle(), array("body" => $post->getBody()));
    }
}
