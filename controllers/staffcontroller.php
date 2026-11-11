<?php 
class StaffController extends Controller {
    private $model;

    public function __construct() {
        $this->model = $this->model("StaffModel");
    }

    public function index() {
        $staffs = $this->model->readAll();
        $this->view("staffs", ["staffs" => $staffs]);
    }

    public function save() {
        $this->model->create($_POST);
        $this->index();
    }

    public function edit($id) {
        $astaff = $this->model->readById($id);
        if (!$astaff) exit;
        
        $this->view("staffs", [
            "astaff" => $astaff,
            "staffs" => $this->model->readAll()
        ]);
    }

    public function update() {
        $this->model->update($_POST);
        $this->index();
    }

    public function delete($id) {
        $astaff = $this->model->readById($id);
        if (!$astaff) exit; 
        
        $this->model->delete($id);
        $this->index();
    }
}
?>