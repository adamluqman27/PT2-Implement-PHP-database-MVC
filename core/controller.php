<?php

class Controller {
    
    protected function model($model) {
        require_once "model/$model.php";
        return new $model();
    }

    protected function view($view, $data = []) {
        extract($data);
        require "view/$view.php";
    }
}

?>