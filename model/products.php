<?php
function load_top4_pro(){
    $sql = "SELECT * FROM `product` order by view_number DESC limit 0,4";
    $list = pdo_query($sql);
    return $list;
}




?>