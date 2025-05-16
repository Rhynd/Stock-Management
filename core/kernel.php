<?php
class kernel {

    private static $url;
    private static $controller;

    public static function run(){
        self::$url = Router::getPath();
        self::loadHelper("debug");
        self::loadController();

        $ctrlname = self::$url["controller"]."Controller";
        self::$controller = new $ctrlname;

        if (method_exists(self::$controller, self::$url["action"])){
            call_user_func_array(array(self::$controller, self::$url["action"]), self::$url["params"]);
        }
        else{
            echo"Erreur 404 : la page n'exsiste pas";
        }
    }

    private static function loadController() {
        if (file_exists(CONTROLLERS.DS.self::$url["controller"]."controller.php")) {
            include_once CONTROLLERS.DS.self::$url["controller"]."controller.php";
        }
        else{
            echo"Erreur 404 : la page n'exsiste pas";
        }
    }

    private static function loadHelper($helper){
        if (file_exists(HELPERS.DS.$helper.".php")) {
            include_once(HELPERS.DS.$helper.".php");
        }
        else{
            echo"Erreur : le helpers n'existe pas";
        }

    }

}