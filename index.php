<?php
    /**
     * Created by PhpStorm.
     * User: alan
     * Date: 3/21/14
     * Time: 8:31 PM
     */

    require_once "vendor/autoload.php";

    $twitter = \Socialite\Service\TwitterFacade::get(array(
        'consumer_key'    => "aKDqJ8angACRBZ4JfOT9g",
        'consumer_secret' => "NLnDNQetHxG3e7a0iRAn4mhIiIvrzqpIY5YhoKKbTY",
        'token'           => "14303663-FnbM1451j02OUFkHUZcJt4xavvO6Sr7l2rPJaDLBl",
        'token_secret'    => "8oK2rXC3I1A5pjlTId2jhl8n88Aa9rO2rO5A9Flp2NKhl"
    ));

    try{
        $response = $twitter->search("test");

        var_dump($response);
    }
    catch(\Exception $e)
    {
        var_dump($e);

    }

