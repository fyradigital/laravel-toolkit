<?php

namespace FyraDigital\LaravelToolkit\Traits;

trait Loaders
{
    public function initJQuery() {
        $strHTML = "<!--[if lt IE 9]>";
        $strHTML .= $this->loadAsset('https://d4wgqzyt29bpb.cloudfront.net/js/jquery/jquery-1.12.4.min.js');
        $strHTML .= "<![endif]-->";
        $strHTML .= "<![if !IE|gte IE 9]>";
        $strHTML .= $this->loadAsset('https://d4wgqzyt29bpb.cloudfront.net/js/jquery/jquery-3.3.1.min.js');
        $strHTML .= "<![endif]>";
        return $strHTML;
    }
    public function loadAsset($name, $versioning='default') {
        if ('default'==$versioning && strpos(strtolower($name), 'cloudfront.net')>0) {
            $version = '';
        } else {
            $version = $this->getVersion($versioning);
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