<?php

namespace Dimimo\Feeds\Facades;

use Illuminate\Support\Facades\Facade;
use RuntimeException;

class FeedsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws RuntimeException
     */
    protected static function getFacadeAccessor(): string
    {
        return 'Feeds';
    }
}
