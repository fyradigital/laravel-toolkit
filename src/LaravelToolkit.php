<?php

namespace FyraDigital\LaravelToolkit;

use FyraDigital\LaravelToolkit\Traits\Helpers;
use FyraDigital\LaravelToolkit\Traits\Loaders;
use FyraDigital\LaravelToolkit\Traits\StringManipulation;
use FyraDigital\LaravelToolkit\Traits\Tracking;

class Fyra
{
    use Helpers;
    use Loaders;
    use StringManipulation;
    use Tracking;

    public $version = '1.0.0';
}