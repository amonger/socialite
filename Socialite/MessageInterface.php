<?php

namespace Socialite;

use DateTime;

/**
 * Interface MessageInterface
 */
interface MessageInterface
{
    /**
     * @param string $body
     * @return string
     */
    public function setBody($body);

    /**
     * @return string
     */
    public function getBody();

    /**
     * @param DateTime $time
     *
     * @return MessageInterface
     */
    public function setTime(DateTime $time);

    /**
     * @return DateTime
     */
    public function getTime();

    /**
     * @param $lat
     *
     * @return MessageInterface
     */
    public function setLat($lat);

    /**
     * @return float
     */
    public function getLat();

    /**
     * @param $lon
     * @return MessageInterface
     */
    public function setLon($lon);

    /**
     * @return float
     */
    public function getLon();

    /**
     * @param $title
     *
     * @return MessageInterface
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getTitle();
}
