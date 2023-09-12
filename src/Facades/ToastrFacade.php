<?php

namespace Vironeer\Toastr\Facades;

use Illuminate\Support\Facades\Facade;

class ToastrFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'toastr';
    }
}
