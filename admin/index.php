<?php 
ob_start();
session_start();
    include '../model/sanpham.php';
    include '../model/pdo.php';
    include "../model/products.php";
    include "../model/account.php";
    include 'header.php';

    if (isset($_GET['act']) && $_GET['act']!="") {
        $act = $_GET['act'];
        switch ($act) {
        case "listproduct":
            $list = load_all_product();
            
            include "sanpham/listproduct.php";
            break;
        case "delete_pro":
            if(isset($_GET['idpro']) && $_GET['idpro'] > 0){
                $id = $_GET['idpro'];
                delete_pro($id);
                setcookie('notice',"Sản phẩm đã được xóa",time()+2);
                header('Location:index.php?act=listproduct');
            }
            include "sanpham/listproduct.php";
            break;
        case "addsp":
                if (isset($_POST["btn-submit"]) && $_POST["btn-submit"]){
                    $name = $_POST["name"];
                    $price = $_POST["price"];
                    $saleOff = $_POST["saleOff"];
                    $description = $_POST["description"];
                    $quantity =  $_POST["quantity"];
                    $view_number = $_POST["view_number"];
                    $id_category = $_POST["id_category"];

                    $picture = $_FILES['picute']['name'];
                    $target_dir = "../images/product/";
                    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
                    if(move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)){
                        // echo "The file" . htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                        // echo "Sorry, there was an error uploading your life."
                    }

                  insert_sanpham($name,$price,$saleOff,$picture,$description,$quantity,$view_number,$id_category);
                    $thongbao = "Thêm thành công";
                }

            include "../admin/sanpham/add.php";
            break;
        case "dsdm":
            include "../admin/danhmuc/listcategory.php";
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