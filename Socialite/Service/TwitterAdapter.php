<?php
    /**
     * Created by PhpStorm.
     * User: alan
     * Date: 4/20/14
     * Time: 8:15 PM
     */

    namespace Socialite\Service;


    use Socialite\Message;

    class TwitterAdapter implements ServiceInterface
    {

        /** @var \Socialite\Service\Twitter $twitter */
        private $twitter;

        public function __construct (Twitter $twitter)
        {
            $this->twitter = $twitter;
        }

        public function post (Message $post)
        {
            $this->twitter->tweet($post);
        }
    }