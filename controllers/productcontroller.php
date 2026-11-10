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

    public function save() {
        $data = $_POST;
        $this->model->create($data);
        
        $this->index();
    }

    public function edit($id) {
        $aproduct = $this->model->readById($id);

        if (!$aproduct){
            exit;
        }

        $this->view("products", [
            "aproduct" => $aproduct,
            "products" => $this->model->readAll()
        ]);
    }

    public function update(){
        $data = $_POST;
        $this->model->update($data);

        $this->index();
    }

    public function delete($id){
        $aproduct = $this->model->readById($id);
        if (!$aproduct){
            exit;
        }
        $this->model->delete($id);
        $this->index();
    }

}

?>