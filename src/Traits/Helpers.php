<?php

namespace FyraDigital\LaravelToolkit\Traits;

trait Helpers
{
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
    public function loadAsset($name, $versioning='default') {
        if ('default'==$versioning && strpos(strtolower($name), 'cloudfront.net')>0) {
            $version = '';
        } else {
            $version = getVersion($versioning);
        }
        switch (strtolower(substr($name, -3))) {
            case '.js':
                $strHTML = '<script src="';
                $strHTML .= url($name) . $version;
                $strHTML .= '" type="text/javascript"></script>';
                break;
            case 'css':
                $strHTML = '<link href="';
                $strHTML .= url($name) . $version;
                $strHTML .= '" rel="stylesheet" type="text/css" />';
                break;
            default:
                $strHTML = '<img src="';
                $strHTML .= url($name) . $version;
                $strHTML .= '"/>';
                break;
        }
        return $strHTML;
    }
}