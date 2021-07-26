<?php

namespace Ghanem\Gfycat\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Ghanem\Gfycat\Tests\TestCase;

class InstallGfycatTest extends TestCase
{
    /** @test */
    function the_install_command_copies_the_configuration()
    {
        // make sure we're starting from a clean state
        if (File::exists(config_path('gfycat.php'))) {
            unlink(config_path('gfycat.php'));
        }

        $this->assertFalse(File::exists(config_path('gfycat.php')));

        Artisan::call('gfycat:install');

        $this->assertTrue(File::exists(config_path('gfycat.php')));
    }
}
