<?php

class Controller {

    private $ctrl_name;
    protected $template = "default";
    protected $vars = [];

    public function __construct() {
        if (method_exists($this, "__init")){
            $this->__init();
        }
        $this->ctrl_name = str_replace("Controller", "", get_class($this));
        $this->loadModel($this->ctrl_name);
    }


     protected function render($view = ""){
        if ($view == ""){
            $view = debug_backtrace()[1]['function'];
        }

        ob_start();
        extract($this->vars);
        if (file_exists(VIEWS.DS.$this->ctrl_name.DS.$view.".php")){
            include_once(VIEWS . DS . $this->ctrl_name . DS . $view . ".php");
        }
        else{
            echo"Erreur 404 : la page n'exsiste pas";
        }

        $content_for_layout = ob_get_clean();
        //DEBUG::printr($this->vars);
        if (file_exists(TEMPLATES.DS.$this->template.".php")){
            include_once(TEMPLATES.DS.$this->template.".php");
        }
        else{
            echo"Erreur : le templates n'existe pas";
        }

    }

    protected function loadModel($model){
        $model_name = $model."Model";
        if (file_exists(MODELS.DS.$model_name.".php")) {
            include_once(MODELS.DS.$model_name.".php");
        } else {
            echo "Erreur : le templates n'existe pas";
        }
        $this->$model = new $model_name();
    }

    protected function set($var){
        $this->vars = array_merge($this->vars, $var);
    }

    public function add_css(array $css){
        if (!empty($css)){
            foreach ($css as $c) {
                echo "<link rel = \"stylesheet\" href = \"/css/".$c.".css\">";
            }
        }
    }

    public function add_js(array $js){
        if (!empty($js)){
            foreach($js as $j){
                echo "<script src = \"/js/".$j.".js\"></script";
            }
        }
    }

}
