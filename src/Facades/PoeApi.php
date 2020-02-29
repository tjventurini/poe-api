<?php

namespace Tjventurini\PoeApi\Facades;

use Illuminate\Support\Facades\Facade;

class PoeApi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return 'poe-api';
    }
}