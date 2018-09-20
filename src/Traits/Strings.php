<?php

namespace FyraDigital\LaravelToolkit\Traits;

trait Strings
{
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