<?php

namespace Socialite;

use \DateTime;

/**
 * This is a entity class which contains the message to be sent out to the services
 */
class Message implements MessageInterface
{
    private $title;
    private $body;
    private $time;
    private $lat;
    private $lon;

    public function __construct()
    {
        $this->time = time();
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param DateTime $time
     */
    public function setTime(DateTime $time)
    {
        $this->time = $time;
    }

    /**
     * @return DateTime
     */
    public function getTime()
    {
        return $this->time;
    }


    /**
     * @param float $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param float $lon
     */
    public function setLon($lon)
    {
        $this->lon = $lon;
    }

    /**
     * @return float
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}
