<?php




include "view/header.php";
if(isset($_GET['act']) && $_GET['act']!=""){
    $act = $_GET['act'];
    switch ($act) {
       case "products":
        include "view/products.php";
        break;
        case "cart":
            include "view/cart.php";
        break;
        case "info":
            include "view/info.php";
        break;
        case "login":
            include "view/login.php";
        break;
        case "register":
            include "view/register.php";
        break;
        case "detail":
            include "view/detail.php";
        break;
    }
}
else {
    include "view/home.php";
}

include "view/footer.php";





?>