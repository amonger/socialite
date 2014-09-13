#Socialite

Socialite is a social media component which allows posting to popular social media platforms either independently or
in bulk.

## Single Post Use

###Posting to facebook

```PHP
    $facebook = Socialite\Service\ServiceFactory::facebook($appId, $appSecret);

    $message = new Socialite\Message();
    $message->setBody("Test Post");

    $facebook->post($message);
```

###Posting to Twitter
```PHP
    $twitter = ServiceFactory::twitter($consumerKey, $consumerSecret, $token, $tokenSecret);

    $message = new Socialite\Message();
    $message->setBody("Test Post");

    $twitter->post($message);
```

## Bulk Post

```PHP
    $twitter    = \Socialite\Service\ServiceFactory::twitter($consumerKey, $consumerSecret, $token, $tokenSecret);
    $facebook   = \Socialite\Service\ServiceFactory::facebook($appId, $appSecret);
    $post       = new \Socialite\Message();

    $post->setBody("test");

    $bulk = new \Socialite\Post\Bulk;

    $bulk
        ->addPost($twitter)
        ->addPost($facebook)
        ->send($post)
    ;
```