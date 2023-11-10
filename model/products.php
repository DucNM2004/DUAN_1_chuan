<?php
function load_top4_pro(){
    $sql = "SELECT * FROM `product` order by view_number DESC limit 0,4";
    $list = pdo_query($sql);
    return $list;
}
function load_top8_new(){
    $sql = "SELECT * FROM `product` order by id DESC LIMIT 0,8";
    $list = pdo_query($sql);
    return $list;
}
function load_one_PRO($id){
    $sql = "SELECT* FROM `product` where id = '$id'";
    $list = pdo_query_one($sql);
    return $list;
}
function update_view($id){
    $sql = "UPDATE `product` SET view_number = view_number+1 where id = '$id'";
    pdo_execute($sql);
}
function load_all_product(){
    $sql = "SELECT * FROM product";
    $list = pdo_query($sql);
    return $list;
}
function load_all_category(){
    $sql = "SELECT * FROM category";
    $list = pdo_query($sql);
    return $list;
}
function load_all_category_type(){
    $sql = "SELECT * FROM category_type";
    $list = pdo_query($sql);
    return $list;
}
function load_pro_follow_category($iddm=0,){
    $sql = "SELECT * FROM `product`where 1 ";
    if($iddm > 0){
        $sql .="AND id_category = '$iddm'";
    }
    $list = pdo_query($sql);
    return $list;
}
?>