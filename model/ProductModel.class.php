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
    // panier
    public function M_addPanier(){
        $db=dbConnect();
        $req = $db->prepare('SELECT * FROM products WHERE produit_id = :id');
        $req->execute(array(
            'id' => $_GET['id']));
        $resultat = $req->fetch();
        $product = new Product($resultat['produit_id'],$resultat['name'],$resultat['price'],$resultat['img']);
        $_SESSION['panier'][$_GET['id']]=$product;
    }
    public function M_getPanier(){
        if (isset($_SESSION['panier'])) {
            return $_SESSION['panier'];
        }else {
            return array();
        }
    }
    public function M_delPanier(){
        if (isset($_SESSION['panier'][$_GET['id']])) {
            unset($_SESSION['panier'][$_GET['id']]);
        }
    }

}