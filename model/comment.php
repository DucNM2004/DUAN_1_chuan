<?php 
function load_all_comment($id){
    $sql = "SELECT comment.id,comment.comment_content,comment.idItem,comment.idPerson,comment.timeComment,customer.name_customer 
    FROM `comment` INNER JOIN `customer` ON customer.id=comment.idPerson WHERE idItem = '$id' ";
    $list = pdo_query($sql);
    return $list;
}
function insert_comment($content,$idpro,$id_uer){
    $sql = "INSERT INTO comment(comment_content,idItem,idPerson) value('$content','$idpro','$id_uer')";
    pdo_execute($sql);
}
function get_comment($itemperpage,$offset,$search){
    $sql = "SELECT  comment.comment_content, customer.name_customer,comment.timeComment, product.name,comment.id as id_comment from comment
    join customer on comment.idPerson = customer.id
    join product on comment.idItem = product.id where 1 ";
    if($search != ""){
        $sql .="AND product.name like '%$search%'";
    }
    if($itemperpage>0 && $offset>=0){
        $sql .= "LIMIT $itemperpage OFFSET $offset";
    }
    $list = pdo_query($sql);
    return $list;
}
function delete_comment($id){
    $sql = "DELETE FROM comment where id = $id";
    pdo_query($sql);
}
function count_comment(){
    $sql = "SELECT count(id) as soluong from comment";
    $list = pdo_query_one($sql);
    return $list;
}
?>