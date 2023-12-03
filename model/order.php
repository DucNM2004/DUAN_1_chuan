<?php 
function getOrderByIdCustomer($id) {
    $sql = "SELECT orders.id, id_customer, order_status,orders.order_address as address, orders.order_phone as phone_number,order_date, orders.total, id_order, sum(order_detail.quantity) as 'total_quantity' 
    FROM orders join customer on orders.id_customer = customer.id join order_detail on orders.id = order_detail.id_order 
    GROUP by id_order having id_customer = $id and order_status = 1 or order_status = 2"; 
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
function getOrder($itemperpage,$offset){
    $sql = "SELECT orders.id, name_customer ,customer.id as 'customer_id', email, order_date, orders.order_address as address, orders.order_phone as phone_number, orders.total, id_order, sum(order_detail.quantity) 
    as 'total_quantity', order_status FROM orders join customer on orders.id_customer = customer.id 
    join order_detail on orders.id = order_detail.id_order where orders.order_status <> 5 GROUP by id_order ORDER BY orders.id DESC ";
   if($itemperpage>0 && $offset>=0){
    $sql .= "LIMIT $itemperpage OFFSET $offset";
    }
    $list = pdo_query($sql);
    return $list;
}
function count_order3(){
    $sql = "SELECT count(id) as soluong from orders where orders.order_status <> 5";
    $list = pdo_query_one($sql);
    return $list;
}
function count_order4(){
    $sql = "SELECT count(id) as soluong from orders where orders.order_status = 5";
    $list = pdo_query_one($sql);
    return $list;
}
function getOrdersucess($itemperpage,$offset){
    $sql = "SELECT orders.id, name_customer ,customer.id as 'customer_id', email, order_date, orders.order_address as address, orders.order_phone as phone_number, orders.total, id_order, sum(order_detail.quantity) 
    as 'total_quantity', order_status FROM orders join customer on orders.id_customer = customer.id 
    join order_detail on orders.id = order_detail.id_order where orders.order_status = 5 GROUP by id_order ORDER BY orders.id DESC ";
   if($itemperpage>0 && $offset>=0){
    $sql .= "LIMIT $itemperpage OFFSET $offset";
    }
    $list = pdo_query($sql);
    return $list;
}
function confirm_order($id){
    $sql = "UPDATE orders SET order_status = 2 where id = $id";
    pdo_execute($sql);
}
function cancel_order($id){
    $sql = "UPDATE orders SET order_status = 3 where id = $id";
    pdo_execute($sql);
}
function re_confirm_order($id){
    $sql = "UPDATE orders SET order_status = 1 where id = $id";
    pdo_execute($sql);
}
function user_cancel_order($id){
    $sql = "UPDATE orders SET order_status = 4 where id = $id";
    pdo_execute($sql);
}

?>