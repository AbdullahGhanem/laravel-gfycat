<?php

namespace Ewa\Tokeet\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Ewa\Tokeet\Tests\TestCase;

class InstallTokeetTest extends TestCase
{
    /** @test */
    public function the_install_command_copies_the_configuration()
    {
        if (File::exists(config_path('tokeet.php'))) {
            unlink(config_path('tokeet.php'));
        }

        $this->assertFalse(File::exists(config_path('tokeet.php')));

        Artisan::call('tokeet:install');

        $this->assertTrue(File::exists(config_path('tokeet.php')));
    }
}
