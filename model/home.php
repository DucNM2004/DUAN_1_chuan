<?php

function count_staff()
{
    $sql = "SELECT COUNT(id) as soluong FROM customer
            where customer.role = 2";
    $list  = pdo_query_one($sql);
    return $list;
}


function count_order()
{
    $sql = "SELECT COUNT(id) as soluong FROM orders";
    $list = pdo_query_one($sql);
    return $list;
}

// // tính tổng số tiền
function sum_money()
{
    $sql = "SELECT SUM(total) FROM orders
            WHERE orders.order_status = 2";
    $list = pdo_query($sql);
    return $list;
}

// thống kê doanh thu hàng tháng
function doanh_thu_hang_thang(){
    $sql = "SELECT SUM(total) AS total FROM orders WHERE MONTH(order_date) = 11 AND YEAR(order_date) = 2023 and orders.order_status = 5";
   $list = pdo_query_one($sql);
   return $list;
}
function doanh_thu_hang_thang12(){
    $sql = "SELECT SUM(total) AS totalm FROM orders WHERE MONTH(order_date) = 12 AND YEAR(order_date) = 2023 and orders.order_status = 5";
    $list = pdo_query_one($sql);
    return $list;
}
function count_category_order23(){
    $sql = "SELECT COUNT(product.id_category) as soluong, product.id_category 
    FROM orders INNER JOIN order_detail on orders.id = order_detail.id_order
    INNER JOIN product on product.id = order_detail.idProduct where product.id_category =23 and orders.order_status = 5 GROUP by product.id_category";
    $list =  pdo_query_one($sql);
    return $list;
}
function count_category_order24(){
    $sql = "SELECT COUNT(product.id_category) as soluong, product.id_category 
    FROM orders INNER JOIN order_detail on orders.id = order_detail.id_order
    INNER JOIN product on product.id = order_detail.idProduct where product.id_category =24 and orders.order_status = 5 GROUP by product.id_category";
   $list =  pdo_query_one($sql);
   return $list;
}
function count_category_order25(){
    $sql = "SELECT COUNT(product.id_category) as soluong, product.id_category 
    FROM orders INNER JOIN order_detail on orders.id = order_detail.id_order
    INNER JOIN product on product.id = order_detail.idProduct where product.id_category =25 and orders.order_status = 5 GROUP by product.id_category";
   $list =  pdo_query_one($sql);
   return $list;
}
function count_category_order26(){
    $sql = "SELECT COUNT(product.id_category) as soluong, product.id_category 
    FROM orders INNER JOIN order_detail on orders.id = order_detail.id_order
    INNER JOIN product on product.id = order_detail.idProduct where product.id_category =26 and orders.order_status = 5 GROUP by product.id_category";
    $list =  pdo_query_one($sql);
    return $list;
}
function count_category_order27(){
    $sql = "SELECT COUNT(product.id_category) as soluong, product.id_category 
    FROM orders INNER JOIN order_detail on orders.id = order_detail.id_order
    INNER JOIN product on product.id = order_detail.idProduct where product.id_category =27 and orders.order_status = 5 GROUP by product.id_category";
    $list =  pdo_query_one($sql);
    return $list;
}
function count_category_order29(){
    $sql = "SELECT COUNT(product.id_category) as soluong, product.id_category 
    FROM orders INNER JOIN order_detail on orders.id = order_detail.id_order
    INNER JOIN product on product.id = order_detail.idProduct where product.id_category =29 and orders.order_status = 5 GROUP by product.id_category";
    $list =  pdo_query_one($sql);
    return $list;
}

// SELECT sum(order_detail.total) as tongdoanhthu
// FROM orders INNER JOIN order_detail on orders.id = order_detail.id_order
// WHERE MONTH(orders.order_date) = 11 AND orders.order_status = 2;
?>