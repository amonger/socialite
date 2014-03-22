<?php

namespace Socialite\Service;

use Socialite\MessageInterface;

interface ServiceInterface
{
    /**
     * @param MessageInterface $post
     * @return mixed
     */
    public function post(MessageInterface $post);
}
