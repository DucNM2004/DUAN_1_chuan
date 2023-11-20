<?php 
function getOrderByIdCustomer($id) {
    $sql = "select orders.id, id_customer, order_status,address, phone_number,order_date, orders.total, id_order, sum(order_detail.quantity) as 'total_quantity' 
    FROM orders join customer on orders.id_customer = customer.id join order_detail on orders.id = order_detail.id_order 
    GROUP by id_order having id_customer = $id;"; 
    $list = pdo_query($sql);
    return $list;
   
}
function getOrderDetailById($id){
    $sql = "select order_date, orders.total as 'total_price', idProduct,order_detail.total,  product_name as 'name_product', product_picture as 'picture', order_detail.price, order_detail.quantity 
    FROM orders join order_detail on orders.id = order_detail.id_order where orders.id = $id;";
    $list = pdo_query($sql);
    return $list;
}
function delete_order($id){
    $sql = "delete from orders where id = $id";
    pdo_execute($sql);
}
function delete_order_detail($id){
    $sql = "delete from order_detail where id_order = $id";
    pdo_execute($sql);
}

?>