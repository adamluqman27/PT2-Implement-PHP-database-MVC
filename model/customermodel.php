<?php 
class CustomerModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function readAll() {
        $sql = "SELECT * FROM tbl_customers_a203267 ORDER BY fld_customer_num ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readById($id) {
        $sql = "SELECT * FROM tbl_customers_a203267 WHERE fld_customer_num = :customer_num";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':customer_num', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        // DIBETULKAN: fld_register_date -> fld_customer_register_date
        $sql = "INSERT INTO tbl_customers_a203267 
                (fld_customer_num, fld_customer_name, fld_customer_gender, fld_customer_phone, fld_customer_register_date) 
                VALUES (:customer_num, :customer_name, :customer_gender, :customer_phone, :register_date)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':customer_num', $data['customer_num'], PDO::PARAM_STR);
        $stmt->bindValue(':customer_name', $data['customer_name'], PDO::PARAM_STR);
        $stmt->bindValue(':customer_gender', $data['customer_gender'], PDO::PARAM_STR);
        $stmt->bindValue(':customer_phone', $data['customer_phone'], PDO::PARAM_STR);
        $stmt->bindValue(':register_date', $data['register_date'], PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update($data) {
        // DIBETULKAN: fld_register_date -> fld_customer_register_date
        $sql = "UPDATE tbl_customers_a203267 
                SET fld_customer_num = :new_customer_num, 
                    fld_customer_name = :customer_name, 
                    fld_customer_gender = :customer_gender, 
                    fld_customer_phone = :customer_phone, 
                    fld_customer_register_date = :register_date 
                WHERE fld_customer_num = :original_customer_num";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':original_customer_num', $data['original_customer_num'], PDO::PARAM_STR);
        $stmt->bindValue(':new_customer_num', $data['customer_num'], PDO::PARAM_STR);
        $stmt->bindValue(':customer_name', $data['customer_name'], PDO::PARAM_STR);
        $stmt->bindValue(':customer_gender', $data['customer_gender'], PDO::PARAM_STR);
        $stmt->bindValue(':customer_phone', $data['customer_phone'], PDO::PARAM_STR);
        $stmt->bindValue(':register_date', $data['register_date'], PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM tbl_customers_a203267 WHERE fld_customer_num = :customer_num";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':customer_num', $id, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
?>