<?php

namespace FyraDigital\LaravelToolkit\Traits;

trait Images
{
    public function imageTag($image, $attributes='') {
        return '<img src="'. $image['url'] .'" alt="x" />';
    }
}