<?php 

class ProductController extends Controller {
    private $model;

    public function __construct() {
        $this->model = $this->model("ProductModel");
    }

    public function index() {
        $records = $this->model->readAll();
        $this->view("products", ["products" => $records]);
    }
}

?>