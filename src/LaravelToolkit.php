<?php

namespace FyraDigital\LaravelToolkit;

use FyraDigital\LaravelToolkit\Traits\Helpers;
use FyraDigital\LaravelToolkit\Traits\Images;
use FyraDigital\LaravelToolkit\Traits\Loaders;
use FyraDigital\LaravelToolkit\Traits\Strings;
use FyraDigital\LaravelToolkit\Traits\Tracking;

class Fyra
{
    use Helpers;
    use Images;
    use Loaders;
    use Strings;
    use Tracking;

    public $version = '1.0.0';
}