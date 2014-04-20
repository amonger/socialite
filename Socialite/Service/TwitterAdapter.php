<?php
/**
 * Created by PhpStorm.
 * User: alan
 * Date: 4/20/14
 * Time: 8:15 PM
 */

namespace Socialite\Service;


use Socialite\Post;

class TwitterAdapter implements ServiceInterface {

    /** @var \Socialite\Service\Twitter $twitter */
    private $twitter;

    public function __construct(Twitter $twitter)
    {
        $this->twitter = $twitter;
    }

    public function post(Post $post)
    {
        $this->twitter->tweet($post);
    }
} 