<?php

namespace FyraDigital\LaravelToolkit\Traits;

trait Helpers
{
    public function addHTTP($str) {
        if ('http' != strtolower(strpos($str, 0, 4))) {
            return 'http://' . $str;
        } else {
            return $str;
        }
    }
    public function getVersion($versioning){
        switch (strtolower($versioning)) {
            case 'none':
            case 'never':
                return '';
                break;
            default:
                return '?v=' . env('APP_BUILD');
                break;
        }
    }
}