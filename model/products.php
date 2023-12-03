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
function load_same_cate($id_category,$id){
    $sql = "SELECT * FROM `product` where id_category = $id_category and id <> $id";
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
function load_pro_follow_category($itemperpage,$offset,$iddm=0,$search,$sort){
    $sql = "SELECT * FROM `product`where 1 ";
    if($search !=""){
        $sql .= "AND name like '%$search%'";
    }
    if($sort != ""){
        $sql .= $sort;
    }
    if($iddm > 0){
        $sql .="AND id_category = '$iddm'"; 
    }
    if($itemperpage>0 && $offset>=0){
        $sql .= "LIMIT $itemperpage OFFSET $offset";
    }
   
    $list = pdo_query($sql);
    return $list;
}
function count_pro(){
    $sql = "SELECT count(id) as soluong from product";
    $list = pdo_query_one($sql);
    return $list;
}
// admin

function delete_pro($id){
    $sql = "DELETE FROM product where id = $id";
    pdo_execute($sql);
}

function insert_sanpham($name,$price,$saleOff,$file_name,$description,$quantity,$id_category){
    $sql = "INSERT INTO product(name,price,saleOff,picture,description, quantity,id_category)
        values('$name','$price','$saleOff','$file_name','$description','$quantity','$id_category')";
    pdo_execute($sql);
}
function get_category_type(){
    $sql = "SELECT category.*,
    category_type.id as category_type_id,
    category_type.type as category_type_name
    from category
    join category_type on category.id_category_type = category_type.id";
    $list = pdo_query($sql);
    return $list;
}
function upload_product($name,$price,$saleOff,$picture,$description,$view_number, $quantity, $id_category,$id){
    $sql = "UPDATE product set 
            name = '$name',
            price = $price,
            saleOff = $saleOff,
            picture = '$picture',
            description = '$description',
            view_number = '$view_number',
            quantity = '$quantity',
            id_category = $id_category 
            where id = $id";
    pdo_execute($sql);
}
function load_pro_follow_category2($itemperpage,$offset,$search){
    $sql = "SELECT product.*,category.title_category FROM `product` inner join category on product.id_category = category.id where 1 ";
    if($search != ""){
        $sql .="AND name like '%$search%'"; 
    }
    if($itemperpage>0 && $offset>=0){
        $sql .= "LIMIT $itemperpage OFFSET $offset";
    }
   
    $list = pdo_query($sql);
    return $list;
}
function get_count_search($search){
    $sql = "select count(*) as sl from product where product.name like '%$search%'";
    $list= pdo_query_one($sql);
    return $list;
}
?>