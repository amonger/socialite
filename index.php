<?php
    /**
     * Created by PhpStorm.
     * User: alan
     * Date: 3/21/14
     * Time: 8:31 PM
     */

    require_once "vendor/autoload.php";

    use Socialite\Service\ServiceFactory;

    $twitter = ServiceFactory::twitter(array(
        'consumer_key'    => "GFMnwyn2w6xxR3T3hSrlkjEVB",
        'consumer_secret' => "KnvGGp5PxMrEW3di73tpDQqDTOgCl2OlqAoQNZolyLctq1mMob",
        'token'           => "14303663-AOra3BvSQ03dak3IFoVOXc2fdHbni3RU3gEyuTi1K",
        'token_secret'    => "FR8U5zGHlL0ugG2YrjmOTLmIBgssxHALpaX7qZAUM4325"
    ));

    $config = array(
        'appId' => '129873470374596',
        'secret' => 'c45c626f1da7e0dbd0764db9840df79a',
        'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
    );

    $facebook = new \Facebook($config);
    $user_id = $facebook->getUser();
    var_dump($user_id);

    try{
//        $response = $twitter->search("test");
//        var_dump($response);

//        var_dump($twitter->getLatestTweets("howardthomson", 5));
//        $post = new \Socialite\Post;
//        $post->setBody("test");
//        var_dump($twitter->tweet($post));
//        var_dump($twitter->getFavourites("haveacigaro"));
    }
    catch(\Exception $e)
    {
        print_r($e->getMessage());
    }

    if($user_id) {

        // We have a user ID, so probably a logged in user.
        // If not, we'll get an exception, which we handle below.
        try {
            $ret_obj = $facebook->api('/me/feed', 'POST',
                array(
                    'link' => 'www.example.com',
                    'message' => 'Posting with the PHP SDK!'
                ));
            echo '<pre>Post ID: ' . $ret_obj['id'] . '</pre>';

            // Give the user a logout link
            echo '<br /><a href="' . $facebook->getLogoutUrl() . '">logout</a>';
        } catch(FacebookApiException $e) {
            // If the user is logged out, you can have a
            // user ID even though the access token is invalid.
            // In this case, we'll get an exception, so we'll
            // just ask the user to login again here.
            $login_url = $facebook->getLoginUrl( array(
                'scope' => 'publish_actions'
            ));
            echo 'Please <a href="' . $login_url . '">login.</a>';
            error_log($e->getType());
            error_log($e->getMessage());
        }
    } else {

        // No user, so print a link for the user to login
        // To post to a user's wall, we need publish_actions permission
        // We'll use the current URL as the redirect_uri, so we don't
        // need to specify it here.
        $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_actions' ) );
        echo 'Please <a href="' . $login_url . '">login.</a>';

    }

