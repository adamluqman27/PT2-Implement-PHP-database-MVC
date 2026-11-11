<?php
 
class OrderDetailModel {
    private $db;
 
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
 
    public function readByOrder($orderNum) {
        $sql = "SELECT d.*, p.fld_product_name, p.fld_product_price
                FROM tbl_orders_details_a203267 d
                LEFT JOIN tbl_products_a203267 p ON p.fld_product_num = d.fld_product_num
                WHERE d.fld_order_num = :order_num
                ORDER BY d.fld_order_detail_num ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':order_num', $orderNum, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
 
    public function readById($id) {
        $sql = "SELECT * FROM tbl_orders_details_a203267 WHERE fld_order_detail_num = :detail_num";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':detail_num', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
    public function create($data) {
        $sql = "INSERT INTO tbl_orders_details_a203267
                (fld_order_num, fld_product_num, fld_order_detail_quantity)
                VALUES (:order_num, :product_num, :quantity)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':order_num', $data['order_num'], PDO::PARAM_INT);
        $stmt->bindValue(':product_num', $data['product_num'], PDO::PARAM_STR);
        $stmt->bindValue(':quantity', $data['quantity'], PDO::PARAM_INT);
        return $stmt->execute();
    }
 
    public function update($data) {
        $sql = "UPDATE tbl_orders_details_a203267
                SET fld_product_num = :product_num,
                    fld_order_detail_quantity = :quantity
                WHERE fld_order_detail_num = :detail_num";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':detail_num', $data['detail_num'], PDO::PARAM_INT);
        $stmt->bindValue(':product_num', $data['product_num'], PDO::PARAM_STR);
        $stmt->bindValue(':quantity', $data['quantity'], PDO::PARAM_INT);
        return $stmt->execute();
    }
 
    public function delete($id) {
        $sql = "DELETE FROM tbl_orders_details_a203267 WHERE fld_order_detail_num = :detail_num";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':detail_num', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
 
?>