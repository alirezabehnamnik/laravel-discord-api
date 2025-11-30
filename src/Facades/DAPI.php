<?php

namespace Reysa\DiscordAPI\Facades;

use Illuminate\Support\Facades\Facade;

class DAPI extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'discord-api';
    }
}
