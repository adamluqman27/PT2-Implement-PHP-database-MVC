<?php 

class ProductModel {
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function readAll() {
        $sql = "SELECT * FROM tbl_products_a203267 ORDER BY fld_product_num ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function create($data) {
    $sql = "INSERT INTO tbl_products_a203267
            (fld_product_num, fld_product_name, fld_product_price,
            fld_product_brand, fld_product_size, fld_product_scent,
            fld_product_quantity, fld_product_image)
            VALUES
            (:product_num, :product_name, :product_price,
            :product_brand, :product_size, :product_scent,
            :product_quantity, :product_image)";
 
    $stmt = $this->db->prepare($sql);
 
    $product_num       = $data['product_num'];
    $product_name      = $data['product_name'];
    $product_price     = $data['product_price'];
    $product_brand     = $data['product_brand'];
    $product_size       = $data['product_size'];
    $product_scent      = $data['product_scent'];
    $product_quantity  = $data['product_quantity'];
    $product_image     = $data['product_image'] ?? '';
 
    $stmt->bindValue(':product_num',       $product_num,       PDO::PARAM_STR);
    $stmt->bindValue(':product_name',      $product_name,      PDO::PARAM_STR);
    $stmt->bindValue(':product_price',     $product_price);
    $stmt->bindValue(':product_brand',     $product_brand,     PDO::PARAM_STR);
    $stmt->bindValue(':product_condition', $product_size, PDO::PARAM_STR);
    $stmt->bindValue(':product_year',      $product_scent,      PDO::PARAM_STR);
    $stmt->bindValue(':product_quantity',  $product_quantity,  PDO::PARAM_INT);
    $stmt->bindValue(':product_image',     $product_image,     PDO::PARAM_STR);
 
    $result = $stmt->execute();
 
    return $result;
    }

    public function readById($id) {
        $sql = "SELECT * FROM tbl_products_a203267 WHERE fld_product_num = :product_num";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':product_num', $id, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function update($data) {
    $sql = "UPDATE tbl_products_a203267
    SET fld_product_num = :new_product_num,
        fld_product_name = :product_name,
        fld_product_price = :product_price,
        fld_product_brand = :product_brand,
        fld_product_size = :product_size,
        fld_product_scent = :product_scent,
        fld_product_quantity = :product_quantity,
        fld_product_image = :product_image
    WHERE fld_product_num = :original_product_num";
 
    $stmt = $this->db->prepare($sql);
 
    $original_product_num = $data['original_product_num'];
    $new_product_num  = $data['product_num'];
    $product_name      = $data['product_name'];
    $product_price     = $data['product_price'];
    $product_brand     = $data['product_brand'];
    $product_size       = $data['product_size'];
    $product_scent      = $data['product_scent'];
    $product_quantity  = $data['product_quantity'];
    $product_image     = $data['product_image'] ?? '';
 
    $stmt->bindValue(':original_product_num', $original_product_num, PDO::PARAM_STR);
    $stmt->bindValue(':new_product_num',   $new_product_num,   PDO::PARAM_STR);
    $stmt->bindValue(':product_name',      $product_name,      PDO::PARAM_STR);
    $stmt->bindValue(':product_price',     $product_price);
    $stmt->bindValue(':product_brand',     $product_brand,     PDO::PARAM_STR);
    $stmt->bindValue(':product_size',      $product_size, PDO::PARAM_STR);
    $stmt->bindValue(':product_scent',      $product_scent,      PDO::PARAM_STR);
    $stmt->bindValue(':product_quantity',  $product_quantity,  PDO::PARAM_INT);
    $stmt->bindValue(':product_image',     $product_image,     PDO::PARAM_STR);
 
    $result = $stmt->execute();
 
    return $result;
    }

    public function delete($id) {
    $sql = "DELETE FROM tbl_products_a203267 WHERE fld_product_num = :product_num";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':product_num', $id, PDO::PARAM_STR);
    $result = $stmt->execute();
    return $result;
}

}

?>