<?php


function routeUrl($link) {
    if(isset($_GET['url'])) {
        $url = rtrim($_GET['url'], "/");
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return in_array($link, $url);
    }
    else{
        return false;
    }
    
}