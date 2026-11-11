<?php 
class CustomerController extends Controller {
    private $model;

    public function __construct() {
        $this->model = $this->model("CustomerModel");
    }

    public function index() {
        $customers = $this->model->readAll();
        $this->view("customers", ["customers" => $customers]);
    }

    public function save() {
        $this->model->create($_POST);
        $this->index();
    }

    public function edit($id) {
        $acustomer = $this->model->readById($id);
        if (!$acustomer) exit;
        
        $this->view("customers", [
            "acustomer" => $acustomer,
            "customers" => $this->model->readAll()
        ]);
    }

    public function update() {
        $this->model->update($_POST);
        $this->index();
    }

    public function delete($id) {
        $acustomer = $this->model->readById($id);
        if (!$acustomer) exit; 
        
        $this->model->delete($id);
        $this->index();
    }
}
?>