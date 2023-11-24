<?php
function load_variant($itemperpage,$offset,$search){
    $sql = "SELECT variants.id, product.name as name_pro,product.id as id_pro,size.name as name_size, variants.price, quantity_size 
    FROM variants 
    JOIN product on variants.id_product = product.id 
    JOIN size on variants.id_size = size.id where 1";
    if($search != ""){
        $sql .= " AND product.name like '%$search%'";
    }
    if($itemperpage>0 && $offset>=0){
        $sql .= " LIMIT $itemperpage OFFSET $offset";
    }
    $list = pdo_query($sql);
    return $list;
}

function load_size(){
    $sql = "SELECT * FROM size ";
    $list = pdo_query($sql);
    return $list;
}

function load_var_pro(){
    $sql = "SELECT product.name as name_pro,product.id as id_pro from product";
    $list = pdo_query($sql);
    return $list;
}

function add_variant($id_size,$id_pro,$price,$quantity){
    $sql = "INSERT INTO variants(id_size,id_product,price,quantity_size) values ($id_size,$id_pro,$price,$quantity)";
    pdo_execute($sql);
}
function count_var(){
    $sql = "SELECT count(id) as soluong from variants";
    $list = pdo_query_one($sql);
    return $list;
}
function update_quantity_pro($id,$quantity){
    $sql = "UPDATE product SET quantity = quantity+ $quantity where id = $id";
    pdo_execute($sql);
}
function get_var_info($id){
    $sql = "SELECT variants.id, product.name as name_pro,product.id as id_pro,size.id as id_size,size.name as name_size, variants.price, quantity_size 
    FROM variants 
    JOIN product on variants.id_product = product.id 
    JOIN size on variants.id_size = size.id where variants.id = $id";
    $list = pdo_query_one($sql);
    return $list;
}
function update_variant($id,$id_pro,$id_size,$price,$quantity){
    $sql = "UPDATE variants SET id_size = $id_size,id_product = $id_pro,price = $price,quantity_size = $quantity where id = $id";
    pdo_execute($sql);
}
function delete_var($id){
    $sql = "DELETE FROM variants Where id = $id";
    pdo_execute($sql);
}
function check_var($id_pro,$id_size){
    $sql = "SELECT * FROM variants where id_product = $id_pro and id_size = $id_size";
    $result = pdo_query_one($sql);
    if($result){
        return true;
    }else{
        return false;
    }
}

?>