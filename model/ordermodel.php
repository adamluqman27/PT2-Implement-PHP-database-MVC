<?php
 
class OrderModel {
    private $db;
 
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
 
    public function readAll() {
        $sql = "SELECT o.*, c.fld_customer_name, s.fld_staff_name
                FROM tbl_orders_a203267 o
                LEFT JOIN tbl_customers_a203267 c ON c.fld_customer_num = o.fld_customer_num
                LEFT JOIN tbl_staffs_a203267 s ON s.fld_staff_num = o.fld_staff_num
                ORDER BY o.fld_order_num DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
 
    public function readById($id) {
        $sql = "SELECT o.*, c.fld_customer_name, c.fld_customer_phone,
                       s.fld_staff_name, s.fld_staff_email
                FROM tbl_orders_a203267 o
                LEFT JOIN tbl_customers_a203267 c ON c.fld_customer_num = o.fld_customer_num
                LEFT JOIN tbl_staffs_a203267 s ON s.fld_staff_num = o.fld_staff_num
                WHERE o.fld_order_num = :order_num";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':order_num', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
    public function create($data) {
        $sql = "INSERT INTO tbl_orders_a203267
                (fld_order_date, fld_staff_num, fld_customer_num)
                VALUES (:order_date, :staff_num, :customer_num)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':order_date', $data['order_date'], PDO::PARAM_STR);
        $stmt->bindValue(':staff_num', $data['staff_num'], PDO::PARAM_STR);
        $stmt->bindValue(':customer_num', $data['customer_num'], PDO::PARAM_STR);
        $stmt->execute();
        return $this->db->lastInsertId();
    }
 
    public function update($data) {
        $sql = "UPDATE tbl_orders_a203267
                SET fld_order_date = :order_date,
                    fld_staff_num = :staff_num,
                    fld_customer_num = :customer_num
                WHERE fld_order_num = :order_num";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':order_num', $data['order_num'], PDO::PARAM_INT);
        $stmt->bindValue(':order_date', $data['order_date'], PDO::PARAM_STR);
        $stmt->bindValue(':staff_num', $data['staff_num'], PDO::PARAM_STR);
        $stmt->bindValue(':customer_num', $data['customer_num'], PDO::PARAM_STR);
        return $stmt->execute();
    }
 
    public function delete($id) {
        $this->db->beginTransaction();
        try {
            $details = $this->db->prepare("DELETE FROM tbl_orders_details_a203267 WHERE fld_order_num = :order_num");
            $details->bindValue(':order_num', $id, PDO::PARAM_INT);
            $details->execute();
 
            $order = $this->db->prepare("DELETE FROM tbl_orders_a203267 WHERE fld_order_num = :order_num");
            $order->bindValue(':order_num', $id, PDO::PARAM_INT);
            $result = $order->execute();
 
            $this->db->commit();
            return $result;
        } catch (Throwable $exception) {
            $this->db->rollBack();
            throw $exception;
        }
    }
}
 
?>