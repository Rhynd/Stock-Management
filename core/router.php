<?php /** @noinspection AutoloadingIssuesInspection */

class Router{
    private static $url;
    private static $urlParsed;
    private static $finalURL;

    public static function getPath(){
        self::$url = $_SERVER['PATH_INFO'];

        if (!empty(self::$url)){
            self::parsedURL();

            self::$finalURL["controller"] = self::$urlParsed[0];
            self::$finalURL["action"] = self::$urlParsed[1];
            array_splice(self::$urlParsed, 0, 2);
            if (!empty(self::$urlParsed)) {
                self::$finalURL["params"] = self::$urlParsed;
            }
            else{
                self::$finalURL["params"] = [];
            }
        }
        return self::$finalURL;
    }

    private static function parsedURL(){
        self::$urlParsed = explode("/", self::$url);
        array_splice(self::$urlParsed, 0, 1);
    }
}