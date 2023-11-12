<?php
include "model/pdo.php";
include "model/products.php";
include "model/comment.php";


include "view/header.php";
$top4 = load_top4_pro();
$top8 = load_top8_new();
if(isset($_GET['act']) && $_GET['act']!=""){
    $act = $_GET['act'];
    switch ($act) {
       case "products":
        $loadcategory = load_all_category();
        $loadcategorytype = load_all_category_type();
        $countpro = count_pro();
        extract($countpro);
        if(!empty($_GET['perpage'])){
            $itemperpage = $_GET['perpage'];
        }
        else{
            $itemperpage = 6;
        }
        if(!empty($_GET['page'])){
            $currentpage  = $_GET['page'];
        }
        else{
            $currentpage = 1;
        }
        
        $offset = ($currentpage-1) * $itemperpage;
        $totalpage = ceil($soluong / $itemperpage);
        if(isset($_GET['iddm']) && $_GET['iddm']>0){
            $iddm = $_GET['iddm'];
        }
        else{
            $iddm = 0;
        }
        $allpro = load_pro_follow_category($itemperpage,$offset,$iddm);
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
            if(isset($_GET['idsp']) && $_GET['idsp']){
                $id = $_GET['idsp'];
                $detailpro = load_one_PRO($id);
                $top8view = load_top8_new();
                $comment = load_all_comment($id);
                update_view($id);
                // print_r($detailpro);
                // die;
            }
            include "view/detail.php";
        break;
    }
}
else {
    include "view/home.php";
}

include "view/footer.php";





?>