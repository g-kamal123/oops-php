<?php
session_start();
$_SESSION['prod_array'] = array();
class Description{
    public $name;
    public $price;
    public $image;

    function __construct($name,$price,$image){
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
    }
    function get_name(){
        return $this->name;
    }
    function get_price(){
        return $this->price;
    }
    function get_image(){
        return $this->image;
    }
}
class Cart{
    public function addToCart($prod_obj){
        array_push($_SESSION['prod_array'],$prod_obj);
    }
    public function display(){
        foreach($_SESSION['prod_array'] as $key=> $val){
            echo '<tr><td style="text-align:center;">'.$val->name.'</td><td "text-align:center;">'.$val->price.'</td><td "text-align:center;"><img src='.$val->image.' width="30px" height="30px"></td></tr>';
        }
    }
}
if(isset($_POST['name'])){
    $prod_name = $_POST['name'];
    $prod_price = $_POST['price'];
    $prod_img = $_POST['image'];
    $prod_obj = new Description($prod_name,$prod_price,$prod_img);
    $prod_cart = new Cart();
    $prod_cart->addToCart($prod_obj);
    $prod_cart->display();
}
?>