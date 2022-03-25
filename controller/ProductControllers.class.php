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
    public function C_addPanier($id,$name,$price,$img,$quantity){
        $this->ProductModel->M_addPanier($id,$name,$price,$img,$quantity);
    }
    public function C_delPanier($id){
        $this->ProductModel->M_delPanier($id);
    }
    public function C_delAllPanier(){
        $this->ProductModel->C_clearPanier();
    }
}