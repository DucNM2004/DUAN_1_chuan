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


?>