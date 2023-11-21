<?php
// function count_products()
// {
//     $sql = "SELECT COUNT(*) AS total FROM product";
//     $list = pdo_query_one($sql); 
//     return $list;
// }

// // đếm số lượng khách hàng

// đếm số lượng nhân viên
function count_staff()
{
    $sql = "SELECT COUNT(id) as soluong FROM customer
            where customer.role = 2";
    $list  = pdo_query_one($sql);
    return $list;
}

// // đếm số lượng các loại sản phẩm
// function count_product_categories()
// {
//     $sql = "SELECT COUNT(*) FROM category";
   
//     return $this->loadRecord();
// }

// // đếm số lượng bình luận
// function count_comment1()
// {
//     $sql = "SELECT COUNT(*) FROM comment";
   
//     return $this->loadRecord();
// }

// // đếm số lượng đơn hàng
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
function doanh_thu_hang_thang()
{
    $sql = "SELECT SUM(total) AS total, MONTH(orders.order_date) AS month
            FROM orders
            WHERE orders.order_status = 2
            GROUP BY MONTH(orders.order_date)";
   $list = pdo_query_one($sql);
   return $list;
}


?>