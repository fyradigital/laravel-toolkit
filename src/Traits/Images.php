<?php

namespace FyraDigital\LaravelToolkit\Traits;

trait Images
{
    public function imageTag($image, $attributes=[])
    {
        $strAttributes = '';
        foreach($attributes as $key => $value) {
            $strAttributes .= ' ' . $key . '="' . $value . '"';
        }
        if (isset($image['name'])) {
            $strAttributes .= ' alt="' . $image['name'] . '"';
        }
        return '<img src="'. $image['url'] .'" ' . $strAttributes . ' />';
    }
}