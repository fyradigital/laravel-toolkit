<?php

namespace FyraDigital\LaravelToolkit;

class Fyra
{
    public $version = '1.0.0';

    public function loadAsset($name, $versioning='true') {
        $strHTML = '';
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
            case '.css':
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
    public function addHTTP($str) {
        if ('http' != strtolower(strpos($str, 0, 4))) {
            return 'http://' . $str;
        } else {
            return $str;
        }
    }
    public function truncWords($str, $len = 40, $delimiter = '...') {
        return strlen($str) > $len ? substr($str, 0, strrpos($str, ' ', -(strlen($str) - $len))) . $delimiter : $str;
    }
    public function strHighlight($haystack, $str, $len = 300) {
        $str = strtolower($str);
        if (strlen($haystack)>$len && strpos(strtolower($haystack), $str)>0) {
            if (strpos(strtolower($haystack), $str)>($len/2)) {
                $startPos = strpos(strtolower($haystack), $str)-($len/2);
                $endPos = strpos(strtolower($haystack), $str)+($len/2);
            } else {
                if (strpos(strtolower($haystack), $str)>20) {
                    $startPos = 20;
                } else {
                    $startPos = strpos(strtolower($haystack), $str);
                }
                $endPos = $startPos+($len-20);
            }
            $strHTML = '...' . substr($haystack, $startPos, $endPos) . '...';
        } else {
            $strHTML = $haystack;
        }
        $strHTML = preg_replace("/\w*?$str\w*/i", '<span class="bold">$0</span>', $strHTML);
        return $strHTML;
    }

}