<?php 
function load_all_comment($id){
    $sql = "SELECT comment.id,comment.comment_content,comment.idItem,comment.idPerson,comment.timeComment,customer.name_customer 
    FROM `comment` INNER JOIN `customer` ON customer.id=comment.idPerson WHERE idItem = '$id' ";
    $list = pdo_query($sql);
    return $list;
}



?>