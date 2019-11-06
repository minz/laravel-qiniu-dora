<?php

namespace Minz\Laravel\Qiniu\Dora;

use Illuminate\Support\Facades\Facade;

class QiniuDoraFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'dora';
    }
}
