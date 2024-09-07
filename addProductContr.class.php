<?php
class AddproductContr extends Addproduct {
    private $product_name;
    private $product_price;
    private $product_image;

    public function __construct($product_name, $product_price, $product_image) {
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->product_image = $product_image;
    }

    public function addProd() {
        $this->addProductt($this->product_name, $this->product_price, $this->product_image);
    }
}
?>
