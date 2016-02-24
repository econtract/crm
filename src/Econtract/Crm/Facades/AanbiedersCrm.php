<?php namespace Econtract\Crm\Facades;


use Illuminate\Support\Facades\Facade;

class Crm extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Crm';
    }

}