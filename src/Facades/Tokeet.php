<?php

namespace Ewa\Tokeet\Facades;

use Illuminate\Support\Facades\Facade;

class Tokeet extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ewa-tokeet';
    }
}