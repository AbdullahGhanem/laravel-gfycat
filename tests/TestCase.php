<?php

namespace Ewa\Tokeet\Tests;

use Ewa\Tokeet\TokeetServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            TokeetServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('tokeet.api_key', 'test-api-key');
        $app['config']->set('tokeet.account_id', 'test-account-id');
        $app['config']->set('tokeet.base_url', 'https://capi.tokeet.com/v1');
    }
}
