<?php
    namespace Socialite\Service\Facebook;

    use Socialite\Message;

    /**
     * Created by PhpStorm.
     * User: alan
     * Date: 3/22/14
     * Time: 2:02 PM
     */
    class Facebook implements \Socialite\Service\ServiceInterface
    {

        private $facebook;

        public function __construct (\Facebook $facebook)
        {
            $this->facebook = $facebook;
        }

        public function post (Message $post)
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

        public function getLogoutUrl ()
        {
            return $this->facebook->getLogoutUrl();
        }

        public function getUser ()
        {
            return $this->facebook->getUser();
        }

    }