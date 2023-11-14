<?php 
    include 'header.php';
    if (isset($_GET['act']) && $_GET['act']!="") {
        $act = $_GET['act'];
        switch ($act) {
        case "dssp":
            include "../admin/sanpham/listproduct.php";
            break;
        case "dstk":
            include "../admin/info_login.php";
            break;
        case "dsdn":
            include "../admin/login.php";
            break;
    
            
         
        }
    } else {
        include 'home.php';
    }
    
    include 'footer.php';
?>