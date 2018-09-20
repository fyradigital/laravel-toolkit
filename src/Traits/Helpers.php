<?php

namespace FyraDigital\LaravelToolkit\Traits;

trait Helpers
{
    public function loadAsset($name, $versioning='true') {
        $versioning = strtolower($versioning);
        switch (strtolower(substr($name, -3))) {
            case '.js':
                $strHTML = '<script src="';
                $strHTML .= url($name);
                if ('never'==$versioning) {
                } elseif ('local'==env('APP_ENV')) {
                    $strHTML .= '?v=' . time();
                } elseif ('true'===$versioning) {
                    $strHTML .= '?v=' . env('APP_BUILD');
                }
                $strHTML .= '" type="text/javascript"></script>';
                break;
            case 'css':
                $strHTML = '<link href="';
                $strHTML .= url($name);
                if ('never'==$versioning) {
                } elseif ('local'==env('APP_ENV')) {
                    $strHTML .= '?v=' . time();
                } elseif ('true'===$versioning) {
                    $strHTML .= '?v=' . env('APP_BUILD');
                }
                $strHTML .= '" rel="stylesheet" type="text/css" />';
                break;
            default:
                $strHTML = '<img src="';
                $strHTML .= url($name);
                if ('never'==$versioning) {
                } elseif ('local'==env('APP_ENV')) {
                    $strHTML .= '?v=' . time();
                } elseif ('true'===$versioning) {
                    $strHTML .= '?v=' . env('APP_BUILD');
                }
                $strHTML .= '"/>';
                break;
        }
        return $strHTML;
    }
}