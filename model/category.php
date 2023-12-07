<?php

function load_all_category2($itemperpage,$offset,$search){
    $sql = "SELECT category.*,
    category_type.id as category_type_id,
    category_type.type as category_type_name
    from category
    join category_type on category.id_category_type = category_type.id where 1 ";
    if($search != ""){
        $sql .="AND title_category like '%$search%' "; 
    }
    else{
        $sql .= "";
    }
    if($itemperpage>0 && $offset>=0 && $search == ""){
        $sql .= "LIMIT $itemperpage OFFSET $offset";
    }
   
    $list = pdo_query($sql);
    return $list;
}

function count_category(){
    $sql = "SELECT count(id) as soluong from category";
    $list = pdo_query_one($sql);
    return $list;
}
function delete_category($id){
    $sql = "UPDATE category SET status = 1 where id=$id";
    pdo_execute($sql);
}
function add_category($title_category, $description, $id_category_type){
    $sql = "INSERT INTO category(title_category, description, id_category_type) VALUE ('$title_category','$description',$id_category_type)";
    pdo_execute($sql);
}
function get_category($id){
    $sql = "SELECT * FROM category where id=$id";
    $list = pdo_query_one($sql);
    return $list;
}
function update_category($id, $title_category, $description, $id_category_type){
    $sql = "UPDATE category set 
        title_category = '$title_category', 
        description = '$description', 
        id_category_type = $id_category_type 
        where id = $id";
       pdo_execute($sql);
}
function check_category($id_cate){
    $sql = "SELECT * FROM product Where id_category = $id_cate";
    $result = pdo_query($sql);
    if($result){
        return true;
    }else{
        return false;
    }
}
?>