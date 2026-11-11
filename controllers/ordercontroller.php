<?php
 
class OrderController extends Controller {
    private $orderModel;
    private $customerModel;
    private $staffModel;
    private $detailModel;
 
    public function __construct() {
        $this->orderModel = $this->model("ordermodel");
        $this->customerModel = $this->model("customermodel");
        $this->staffModel = $this->model("staffmodel");
        $this->detailModel = $this->model("orderdetailmodel");
    }
 
    public function index() {
        $this->view("orders", [
            "orders" => $this->orderModel->readAll(),
            "customers" => $this->customerModel->readAll(),
            "staffs" => $this->staffModel->readAll()
        ]);
    }
 
    public function save() {
        $data = $_POST;
        $orderNum = $this->orderModel->create($data);
 
        $this->index();
    }
 
    public function edit($id) {
        $order = $this->orderModel->readById($id);
 
        if (!$order) {
            exit;
        }
 
        $this->view("orders", [
            "aorder" => $order,
            "orders" => $this->orderModel->readAll(),
            "customers" => $this->customerModel->readAll(),
            "staffs" => $this->staffModel->readAll()
        ]);
    }
 
    public function update() {
        $data = $_POST;
        $this->orderModel->update($data);
 
        $this->index();
    }
 
    public function delete($id) {
        $order = $this->orderModel->readById($id);
 
        if (!$order) {
            exit;
        }
 
        $this->orderModel->delete($id);
        $this->index();
    }

    public function invoice($orderNum) {
        $order = $this->orderModel->readById($orderNum);
        
        if (!$order) {
            exit;
        }

        $this->view("invoice", [
            "order"   => $order,
            "details" => $this->detailModel->readByOrder($orderNum)
        ]);
    }

}
?>