<?php
    /**
     * Created by PhpStorm.
     * User: alan
     * Date: 4/20/14
     * Time: 9:16 PM
     */

    namespace Socialite\Post;


    use Socialite\Message;
    use Socialite\Service\ServiceInterface;

    class Bulk
    {
        private $posts;

        public function __construct ()
        {
            $this->posts = array();
        }

        public function addPost (ServiceInterface $service)
        {
            $this->posts[] = $service;
            return $this;
        }

        public function send (Message $message)
        {
            /** @var \Socialite\Service\ServiceInterface $post */
            foreach ($this->posts as $post) {
                try {
                    $post->post($message);
                } catch (\Exception $e) {
                    
                }
            }
        }

    }