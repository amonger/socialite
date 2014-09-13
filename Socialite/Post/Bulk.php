<?php

namespace Socialite\Post;

use Socialite\MessageInterface;
use Socialite\Service\ServiceInterface;

/**
 * This allows mass sending of messages which implement the ServiceInterface
 *
 * Class Bulk
 */
class Bulk
{
    private $posts;

    public function __construct()
    {
        $this->posts = [];
    }

    /**
     * @param ServiceInterface $service
     * @return $this
     */
    public function addPost(ServiceInterface $service)
    {
        $this->posts[] = $service;
        return $this;
    }

    /**
     * @param MessageInterface $message
     */
    public function send(MessageInterface $message)
    {
        /** @var \Socialite\Service\ServiceInterface $post */
        foreach ($this->posts as $post) {
            $post->post($message);
        }
    }

}