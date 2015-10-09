<?php

use Mockery as M;
use AdamWathan\EloquentOAuth\OAuthManager;

class OAuthManagerTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        M::close();
    }

    public function test_placeholder() {}
}
