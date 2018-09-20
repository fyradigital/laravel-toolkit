<?php

namespace FyraDigital\LaravelToolkit\Traits;

trait Tracking
{
    public function loadTrackers() {
        $strHTML = $this->initGA();
        $strHTML .= $this->initHotJar();
        $strHTML .= $this->initHubSpot();
        return $strHTML;
    }
    public function initGA($gaId=null) {
        $gaId = isset($gaId) ?: env('GA_ID', '');
        if (''==$gaId) {
            $strHTML = "<script type='text/javascript'>";
            $strHTML .= "alert('initGA Error: ID not set!');";
            $strHTML .= "</script>";
        } else {
            $strHTML = "<script async src='https://www.googletagmanager.com/gtag/js?id={$gaId}'></script>";
            $strHTML .= "<script type='text/javascript'>";
            $strHTML .= "window.dataLayer = window.dataLayer || [];";
            $strHTML .= "function gtag(){dataLayer.push(arguments);}";
            $strHTML .= "gtag('js', new Date());";
            $strHTML .= "gtag('config', '{$gaId}');";
            $strHTML .= "</script>";
        }
        return $strHTML;
    }
    public function initHotJar($hotjarId=null) {
        $hotjarId = isset($hotjarId) ?: env('HOTJAR_ID', '');
        if (''==$hotjarId) {
            $strHTML = "<script type='text/javascript'>";
            $strHTML .= "alert('initHotJar Error: ID not set!');";
            $strHTML .= "</script>";
        } else {
            $strHTML = "<script type='text/javascript'>";
            $strHTML .= "(function(h,o,t,j,a,r){";
            $strHTML .= "h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};";
            $strHTML .= "h._hjSettings={hjid:{$hotjarId},hjsv:6};";
            $strHTML .= "a=o.getElementsByTagName('head')[0];";
            $strHTML .= "r=o.createElement('script');r.async=1;";
            $strHTML .= "r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;";
            $strHTML .= "a.appendChild(r);";
            $strHTML .= "})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');";
            $strHTML .= "</script>";
        }
        return $strHTML;
    }
    public function initHubSpot($hubspotId=null) {
        $hubspotId = isset($hubspotId) ?: env('HUBSPOT_ID', '');
        if (''==$hubspotId) {
            $strHTML = "<script type='text/javascript'>";
            $strHTML .= "alert('initHubSpot Error: ID not set!');";
            $strHTML .= "</script>";
        } else {
            $strHTML = "<script type='text/javascript'>";
            $strHTML .= "var _hsq = window._hsq = window._hsq || [];";
            $strHTML .= "(function(d,s,i,r) {";
            $strHTML .= "if (d.getElementById(i)){return;}";
            $strHTML .= "var n=d.createElement(s),e=d.getElementsByTagName(s)[0];";
            $strHTML .= "n.id=i;n.src='//js.hs-analytics.net/analytics/'+(Math.ceil(new Date()/r)*r)+'/{$hubspotId}.js';";
            $strHTML .= "e.parentNode.insertBefore(n, e);";
            $strHTML .= "})(document,'script','hs-analytics',300000);";
            $strHTML .= "</script>";
        }
        return $strHTML;
    }
}
