<?php

namespace Socialite\Service\Twitter;

use Socialite\MessageInterface;
use Socialite\Service\ServiceInterface;

/**
 * Class TwitterAdapter
 */
class TwitterAdapter implements ServiceInterface
{

    private $twitter;

    /**
     * @param Twitter $twitter
     */
    public function __construct(Twitter $twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * @param MessageInterface $post
     */
    public function post(MessageInterface $post)
    {
        $this->twitter->tweet($post);
    }
}
