<?php 
    function insert_sanpham($name,$price,$saleOff,$picture,$description,$quantity,$view_number,$id_category){
        $sql = "insert into product(name,price,saleOff,picture,description,quantity,view_number,id_category) values('$name','$price','$saleOff','$picture','$description','$quantity','$view_number','$id_category')";
        pdo_execute($sql);
        
        
    }

?>