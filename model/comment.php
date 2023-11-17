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


?>