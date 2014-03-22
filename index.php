<?php
    /**
     * Created by PhpStorm.
     * User: alan
     * Date: 3/21/14
     * Time: 8:31 PM
     */

    require_once "vendor/autoload.php";
    require_once "classes.php";

//    $transport = new \Socialite\Transport\Transport(new Guzzle\Http\Client());

    $twitter = \Socialite\Service\TwitterFacade::get(array(
        'consumer_key'    => "DixIt6v40FQDpZX2URMjoQ",
        'consumer_secret' => "tNJxZl8KDIGhxmQ5YSedB8sH0XAbOGYe1iYd40ThKk",
        'token'           => "14303663-iFnRpd8UA9z5vkbUzWobAjq31IxNYDU2ZTCAiVz7r",
        'token_secret'    => "btyPl9aq9TZQghDSNkVOZdLV9KT9PkFVQRYSU8i9hIzoT"
    ));
//    $twitter
//        ->setApiKey("DixIt6v40FQDpZX2URMjoQ")
//        ->setApiSecret("tNJxZl8KDIGhxmQ5YSedB8sH0XAbOGYe1iYd40ThKk")
//        ->setAccessToken("14303663-iFnRpd8UA9z5vkbUzWobAjq31IxNYDU2ZTCAiVz7r")
//        ->setAccessTokenSecret("btyPl9aq9TZQghDSNkVOZdLV9KT9PkFVQRYSU8i9hIzoT");

    $response = $twitter->getUserTimeline();//$twitter->tweet("test");
//    $response = $twitter->search("bbc");
    var_dump($response);