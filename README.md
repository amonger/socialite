#Socialite

Socialite is a social media component which allows posting to popular social media platforms either independently or
in bulk.

## Single Post Use

###Posting to facebook

```PHP
    $facebook = Socialite\Service\ServiceFactory::facebook(array(
        'appId'              => 'APP_ID',
        'secret'             => 'APP_SECRET'
    ));

    $message = new Socialite\Message();
    $message->setBody("Test Post");

    $facebook->post($message);
```

###Posting to Twitter
```PHP
    $twitter = ServiceFactory::twitter(array(
        'consumer_key'    => "CONSUMER_KEY",
        'consumer_secret' => "CONSUMER_SECRET",
        'token'           => "TOKEN",
        'token_secret'    => "TOKEN_SECRET"
    ));

    $message = new Socialite\Message();
    $message->setBody("Test Post");

    $twitter->post($message);
```

## Bulk Post

```PHP
    $twitter = ServiceFactory::twitter(array(
        'consumer_key'    => "CONSUMER_KEY",
        'consumer_secret' => "CONSUMER_SECRET",
        'token'           => "TOKEN",
        'token_secret'    => "TOKEN_SECRET"
    ));
    $facebook = ServiceFactory::facebook(array(
        'appId'              => 'APP_ID',
        'secret'             => 'APP_SECRET'
    ));
    $post = new \Socialite\Message();

    $post->setBody("test");

    $bulk = new \Socialite\Post\Bulk;

    $bulk
        ->addPost($twitter)
        ->addPost($facebook)
        ->send($post)
    ;
```