<?php
    /**
     * Created by PhpStorm.
     * User: alan
     * Date: 4/20/14
     * Time: 8:15 PM
     */

    namespace Socialite\Service\Twitter;


    use Socialite\Message;

    class TwitterAdapter implements \Socialite\Service\ServiceInterface
    {

        /** @var \Socialite\Service\Twitter\Twitter $twitter */
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