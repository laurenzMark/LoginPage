<?php
class Addproduct extends Dbh {
    public function addProductt($product_name, $product_price, $product_image) {
        $stmt = $this->connect()->prepare("INSERT INTO products('product_name', 'product_price', 'product_image') VALUES (?, ?, ?)");
        if ($stmt->execute([$product_name, $product_price, $product_image])) {
            echo "Product added successfully.";
        } else {
            echo "Error adding product: " . implode(", ", $stmt->errorInfo());
        }
    }
}
?>
