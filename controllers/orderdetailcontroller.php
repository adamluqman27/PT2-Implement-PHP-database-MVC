<?php
 
class OrderDetailController extends Controller {
    private $detailModel;
    private $orderModel;
    private $productModel;
 
    public function __construct() {
        $this->detailModel  = $this->model("orderdetailmodel");
        $this->orderModel   = $this->model("ordermodel");
        $this->productModel = $this->model("productmodel");
    }
 
    public function index($orderNum = null) {
        
        if (session_status() === PHP_SESSION_NONE) session_start(); 

        if ($orderNum === null || $orderNum === '') {
            exit;
        }
 
        $order = $this->orderModel->readById($orderNum);
        if (!$order) {
            exit;
        }
        $_SESSION['current_order_num'] = $orderNum;
        $this->view("orderdetails", [
            "order"    => $order,
            "details"  => $this->detailModel->readByOrder($orderNum),
            "products" => $this->productModel->readAll()
        ]);
    }
 
    public function save() {
        if (session_status() === PHP_SESSION_NONE) session_start();
 
        $data = $_POST;
        $this->detailModel->create($data);
 
        $this->index($_SESSION['current_order_num']);
    }
 
    public function edit($id) {
        $detail = $this->detailModel->readById($id);
        if (!$detail) {
            exit;
        }
 
        $this->view("orderdetails", [
            "order"    => $this->orderModel->readById($detail['fld_order_num']),
            "details"  => $this->detailModel->readByOrder($detail['fld_order_num']),
            "products" => $this->productModel->readAll(),
            "adetail"  => $detail
        ]);
    }
 
    public function update() {
        if (session_status() === PHP_SESSION_NONE) session_start();
 
        $data = $_POST;
        $this->detailModel->update($data);
 
        $this->index($_SESSION['current_order_num']);
    }
 
    public function delete($id) {
        if (session_status() === PHP_SESSION_NONE) session_start();
 
        $detail = $this->detailModel->readById($id);
        if (!$detail) {
            exit;
        }
        $this->detailModel->delete($id);
 
        $this->index($_SESSION['current_order_num']);
    }
}
 
?>