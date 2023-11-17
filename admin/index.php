<?php 
    include '../model/sanpham.php';
    include '../model/pdo.php';
    include 'header.php';
    if (isset($_GET['act']) && $_GET['act']!="") {
        $act = $_GET['act'];
        switch ($act) {
        case "dssp":
            include "../admin/sanpham/listproduct.php";
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