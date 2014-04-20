<?php

    namespace Socialite\Service;

    use Socialite\Message;

    interface ServiceInterface
    {
        public function post (Message $post);

    }