Socialite
===============
Socialite is a social media component which allows posting to popular social media platforms either independently or
in bulk.

Use
---------------
Posting to facebook

```PHP
        $facebook = Socialite\Service\ServiceFactory::facebook(array(
            'appId'              => '555452137901326',
            'secret'             => '000a5f9f289d3c98beb441e28ab917a6',
            'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
        ));

        $message = new Socialite\Message();
        $message->setBody("Test Post");

        $facebook->post($message);
```