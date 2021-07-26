<?php

namespace Ghanem\Gfycat\Facades;

use Illuminate\Support\Facades\Facade;

class Gfycat extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ghanem-gfycat';
    }
}