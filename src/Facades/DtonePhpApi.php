<?php

namespace Kstmostofa\DtonePhpApi\Facades;

use Illuminate\Support\Facades\Facade;

class DtonePhpApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'kstmostofa-dtone-php-api-laravel';
    }
}