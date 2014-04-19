<?php
    /**
     * Created by PhpStorm.
     * User: alan
     * Date: 4/19/14
     * Time: 9:49 PM
     */

    namespace Socialite;


    class Post
    {
        private $title;
        private $body;
        private $time;
        private $lat;
        private $lon;

        function __construct ()
        {
            $this->time = time();
        }


        /**
         * @param mixed $body
         */
        public function setBody ($body)
        {
            $this->body = $body;
        }

        /**
         * @return mixed
         */
        public function getBody ()
        {
            return $this->body;
        }

        /**
         * @param mixed $date
         */
        public function setDate ($date)
        {
            $this->date = $date;
        }

        /**
         * @return mixed
         */
        public function getDate ()
        {
            return $this->date;
        }

        /**
         * @param mixed $lat
         */
        public function setLat ($lat)
        {
            $this->lat = $lat;
        }

        /**
         * @return mixed
         */
        public function getLat ()
        {
            return $this->lat;
        }

        /**
         * @param mixed $lon
         */
        public function setLon ($lon)
        {
            $this->lon = $lon;
        }

        /**
         * @return mixed
         */
        public function getLon ()
        {
            return $this->lon;
        }

        /**
         * @param mixed $title
         */
        public function setTitle ($title)
        {
            $this->title = $title;
        }

        /**
         * @return mixed
         */
        public function getTitle ()
        {
            return $this->title;
        }


    }