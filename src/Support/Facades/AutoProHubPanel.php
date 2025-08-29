<?php

namespace Prasso\AutoProHub\Support\Facades;

use Illuminate\Support\Facades\Facade;

class AutoProHubPanel extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'autoprohub';
    }
}
