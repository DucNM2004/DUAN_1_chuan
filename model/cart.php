<?php 
function get_cart_info($id_user){
    $sql = "SELECT product.picture,product.name as name_pro,product.quantity as quan_pro,cart_detail.quantity,cart_detail.id as id_cd,size.name as name_size,variants.price 
    FROM cart_detail INNER JOIN cart on cart_detail.id_cart = cart.id 
    INNER JOIN product on cart_detail.id_pro = product.id 
    INNER JOIN size ON cart_detail.id_size = size.id 
    INNER JOIN variants on size.id = variants.id_size 
    WHERE cart.id_user = $id_user GROUP BY cart_detail.id;";
    $list = pdo_query($sql);
    return $list;
}
function insert_cart_deteil($id_cart,$id_pro,$id_size,$price,$quantity,$total){
    $sql = "INSERT INTO cart_detail(id_cart,id_pro,id_size,price,quantity,total) values ($id_cart,$id_pro,$id_size,$price,$quantity,$total)";
    pdo_execute($sql);
}
function insert_cart($id_user){
    $sql = "INSERT INTO cart(id_user) values ($id_user)";
    pdo_execute($sql);
}
function check_cart($id_user){
    $sql = "SELECT * FROM cart where id_user = $id_user";
    $result = pdo_query_one($sql);
    if($result){
        return true;
    }else{
        return false;
    }
}
function get_cart_id($id_user){
    $sql = "SELECT * FROM cart where id_user = $id_user";
    $list = pdo_query_one($sql);
    return $list;
}
function delete_cart($id){
    $sql = "DELETE FROM cart_detail where id=$id";
    pdo_execute($sql);
}
function createOrder($id, $total_cost, $status) {
    $sql = "INSERT INTO orders(id_customer,total,order_status) values ($id, $total_cost, $status)";
    pdo_execute($sql);
}
function getOrder3() {
    $sql = "select * FROM orders order by order_date desc"; 
    $list = pdo_query($sql);
    return $list;
}
function get_cart_info_2(){
    $sql = "SELECT product.picture,product.id as id_pro,product.name as name_pro,product.quantity as quan_pro,cart_detail.quantity,cart_detail.id as id_cd,size.name as name_size,variants.price 
    FROM cart_detail INNER JOIN cart on cart_detail.id_cart = cart.id 
    INNER JOIN product on cart_detail.id_pro = product.id 
    INNER JOIN size ON cart_detail.id_size = size.id 
    INNER JOIN variants on size.id = variants.id_size 
    GROUP BY cart_detail.id;";
    $list = pdo_query($sql);
    return $list;
}
function addDataToOrderDetail($id_order, $id, $product_name, $picture,$price, $quantity, $total) {
    $sql = "INSERT INTO order_detail(id_order, idProduct, product_name, product_picture, price, quantity, total) 
    values ($id_order, $id, '$product_name', '$picture', $price, $quantity, $total)";
    pdo_execute($sql);
}

function changeQuantity($id, $action ,$quantity) {
    $sql = "update product set quantity = quantity $action $quantity where id = $id";
   pdo_execute($sql);
    
}
?>