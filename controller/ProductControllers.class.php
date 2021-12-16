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

    //panier
    public function C_showPanier(){
        $Products=$this->ProductModel->M_getPanier();
        require('view/frontend/paniers.php');
    }
    public function C_addPanier(){
        $this->ProductModel->M_addPanier();
    }
    public function C_delPanier(){
        $this->ProductModel->M_delPanier();
    }
}