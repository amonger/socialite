<?php
    namespace Socialite\Service;

    use Socialite\Post;

    /**
     * Created by PhpStorm.
     * User: alan
     * Date: 3/22/14
     * Time: 2:02 PM
     */
    class Facebook implements ServiceInterface
    {

        private $facebook;

        public function __construct (\Facebook $facebook)
        {
            $this->facebook = $facebook;
        }

        public function post (Post $post)
        {
            return $this->facebook->api('/me/feed', 'POST',
                array(
                    'message' => $post->getBody()
                ));
        }

        public function getLoginUrl ()
        {
            return $this->facebook->getLoginUrl(array(
                'scope' => 'publish_actions'
            ));
        }
    }