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
    public function M_addPanier($id,$name,$price,$img,$quantity){
        if ($quantity>10) {
            $quantity=10;
        }
        if (isset($_COOKIE["Panier"])) {
            $cookie_data = stripslashes($_COOKIE["Panier"]);
            $panier_data = json_decode($cookie_data, true);
        } else {
            $panier_data=array();
        }
        $item_id_list = array_column($panier_data, 'item_id');
        if (in_array($id,$item_id_list)) {
            foreach ($panier_data as $key => $value) {
                if ($panier_data[$key]["item_id"] == $id) {
                    if ($panier_data[$key]["item_quantity"] < 10) {
                        $panier_data[$key]["item_quantity"] = $panier_data[$key]["item_quantity"] + $quantity;
                    }
                }
            }
        }else {
            $item_array = array(
            'item_id'           => $id,
            'item_name'         => $name,
            'item_price'        => $price,
            'item_img'          => $img,
            'item_quantity'     => $quantity
            );
            $panier_data[] = $item_array;
        }
        $item_data = json_encode($panier_data);
        $expire = 365*24*3600;
        setcookie('Panier',$item_data,time()+$expire);
    }
    public function M_getPanier(){
        if (isset($_COOKIE["Panier"])) {
            $cookie_data = stripslashes($_COOKIE["Panier"]);
            $panier_data = json_decode($cookie_data, true);
            return $panier_data;
        } else {
            return null;
        }
    }
    public function C_clearPanier(){
        $expire = 365*24*3600;
        setcookie("Panier","",time()-$expire);
    }
    public function M_delPanier($id){
        $cookie_data = stripslashes($_COOKIE["Panier"]);
        $panier_data = json_decode($cookie_data, true);
        foreach ($panier_data as $key => $value) {
            if ($panier_data[$key]["item_id"] == $id) {
                unset($panier_data[$key]);
                $item_data = json_encode($panier_data);
                $expire = 365*24*3600;
                setcookie('Panier',$item_data,time()+$expire);
            }
        }
    }

}