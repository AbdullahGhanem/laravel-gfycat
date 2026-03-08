<?php

namespace Ewa\Tokeet\Tests\Unit;

use Ewa\Tokeet\Facades\Tokeet;
use Ewa\Tokeet\TokeetController;
use Ewa\Tokeet\Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    /** @test */
    public function it_registers_the_tokeet_binding()
    {
        $this->assertInstanceOf(TokeetController::class, app('ewa-tokeet'));
    }

    /** @test */
    public function the_facade_resolves_to_the_controller()
    {
        $this->assertInstanceOf(TokeetController::class, Tokeet::getFacadeRoot());
    }
}
