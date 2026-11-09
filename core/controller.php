<?php

class Controller {
    
    protected function model($model) {
        require_once "models/$model.php";
        return new $model();
    }

    protected function view($view, $data = []) {
        extract($data);
        require "views/$view.php";
    }
}

?>