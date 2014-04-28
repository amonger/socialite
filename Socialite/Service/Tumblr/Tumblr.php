<?php
    /**
     * Created by PhpStorm.
     * User: alan
     * Date: 4/28/14
     * Time: 9:34 PM
     */

    namespace Socialite\Service\Tumblr;

    use Socialite\Message;
    use Tumblr\Api\Client as TumblrClient;

    class Tumblr implements \Socialite\Service\ServiceInterface
    {

        private $tumblrClient;

        public function __construct (TumblrClient $tumblr)
        {
            $this->tumblrClient = $tumblr;
        }

        public function post (Message $post)
        {
            $this->tumblrClient->createPost($post->getTitle(), array("body" => $post->getBody()));
        }

    }