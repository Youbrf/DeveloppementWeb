<?php

require_once "model/ProductModel.class.php";



class ProductControllers{
    private $ProductModel;

    public function __construct(){
        $this->ProductModel = new ProductModel;
        $this->ProductModel->dataProduct();
    }

    public function productsShowAll(){
        $Products = $this->ProductModel->getProducts();
        require('view/frontend/products.php');
    }
}