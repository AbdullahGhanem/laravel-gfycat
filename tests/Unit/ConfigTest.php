<?php

namespace Ewa\Tokeet\Tests\Unit;

use Ewa\Tokeet\Tests\TestCase;

class ConfigTest extends TestCase
{
    /** @test */
    public function config_has_api_key()
    {
        $this->assertEquals('test-api-key', config('tokeet.api_key'));
    }

    /** @test */
    public function config_has_account_id()
    {
        $this->assertEquals('test-account-id', config('tokeet.account_id'));
    }

    /** @test */
    public function config_has_base_url()
    {
        $this->assertEquals('https://capi.tokeet.com/v1', config('tokeet.base_url'));
    }
}
