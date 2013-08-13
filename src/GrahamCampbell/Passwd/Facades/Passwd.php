<?php namespace GrahamCampbell\Passwd\Facades;

use Illuminate\Support\Facades\Facade;

class Passwd extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'passwd'; }

}
