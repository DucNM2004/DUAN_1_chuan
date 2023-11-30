<?php
function get_staff_list($itemperpage,$offset,$search){
    $sql = "SELECT customer.*, customer.id as 'id_customer' from customer where customer.role = 2 ";
    if($search != ""){
        $sql .= " AND name_customer like '%$search%' ";
    }
    if($itemperpage>0 && $offset>=0){
        $sql .= "LIMIT $itemperpage OFFSET $offset";
    }
    $list = pdo_query($sql);
    return $list;
}
function count_staff2(){
    $sql = "SELECT count(id) as soluong from customer where role = 2 ";
    $list = pdo_query_one($sql);
    return $list;
}
?>