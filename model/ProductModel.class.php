<?php

require_once "frontend.php";
require_once "Product.class.php";

class ProductModel{
    private $Products;

    public function addProduct($product){
        $this->Products[]=$product;
    }

    public function getProducts(){return $this->Products;}

    public function dataProduct(){
        $db=dbConnect();
        $req=$db->query('SELECT * FROM products');
        $requete = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach($requete as $product){
            $product = new Product($product['produit_id'],$product['name'],$product['price'],$product['img']);
            $this->addProduct($product);
        }
    }
    

}