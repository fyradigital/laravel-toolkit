<?php namespace FyraDigital\LaravelToolkit;

class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return Fyra::class;
    }
}