<?php 
ob_start();
session_start();
    include '../model/pdo.php';
    include "../model/products.php";
    include "../model/account.php";
    include "../model/home.php";
    include "../model/comment.php";
    include "../model/category.php";
    include 'header.php';

    if (isset($_GET['act']) && $_GET['act']!="") {
        $act = $_GET['act'];
        switch ($act) {
        case "listproduct":
            
            if(isset($_POST['sb'])){
                $se = $_POST['se'];
            }
            else{
                $se = "";
            }
            $count_comment = count_pro();
            extract($count_comment);
            $itemperpage = 6;
            
            if(!empty($_GET['page'])){
                $currentpage  = $_GET['page'];
            }
            else{
                $currentpage = 1;
            }
            
            $offset = ($currentpage-1) * $itemperpage;
            $totalpage = ceil($soluong / $itemperpage);
            $list = load_pro_follow_category($itemperpage,$offset,$se);
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
        case "add":
                if (isset($_POST['submit'])){
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $saleOff = $_POST['saleOff'];
                    $image = $_FILES['picture'];
                    $picture = ($image['error'] == 0) ? $image['name'] : '';
                    $description = $_POST['description'];
                    $quantity = $_POST['quantity'];
                    $id_category = $_POST['id_category'];
                    if ($image == "") {
                        setcookie('notice',"Phải có ảnh",time()+2);
                    } else {
                        $folder = "../products/";
                        $file_extension = explode('.', $picture)[1];
                        $file_name = time() . '.' . $file_extension;
                        $path_file = $folder . $file_name;
                        move_uploaded_file($image['tmp_name'], $path_file);
                        }
                        insert_sanpham($name,$price,$saleOff,$file_name,$description,$quantity,$id_category);
                        header("Location: index.php?act=listproduct");
                        setcookie('notice',"Đã thêm thành công",time()+2); 
                        
                    }
                $category_type = load_all_category();
            include "sanpham/add.php";
            break;
        case "updatepro":
            if(isset($_GET['id']) && $_GET['id']>0){
                $id = $_GET['id'];
                $item = load_one_PRO($id);
                $category_type = load_all_category();
            }
            if (isset($_POST['btn-submit'])) {
                $name = $_POST['name'];
                $id_pro = $_POST['id_pro'];
                $price = $_POST['price'];
                $saleOff = $_POST['saleOff'];
                $image = $_FILES['new-picture'];
                $picture = ($image['error'] == 0) ? $image['name'] : '';
                $description = $_POST['description'];
                $quantity = $_POST['quantity'];
                $view_number = $_POST['view_number'];
                $id_category = $_POST['id_category'];
                if ($image != "" && $image['size']>0) {
                    $folder = '../products/';
                    $file_extension = explode('.', $picture)[1];
                    $file_name = time() . '.' . $file_extension;
                    $path_file = $folder . $file_name;
                    $item = load_one_PRO($id_pro);
                    move_uploaded_file($image['tmp_name'], $path_file);
                }else{
                    if(isset($_POST['picture-old'])){
                        $picture_old = $_POST['picture-old'];
                    }else {
                        $picture_old = $item['picture'];
                    }
                     $file_name = $picture_old;
                    
                }
                
                upload_product($name, $price, $saleOff, $file_name, $description, $view_number, $quantity, $id_category, $id_pro);
                setcookie('notice',"Đã sửa thành công",time()+2); 
                header('location: index.php?act=listproduct');
            }
            include "sanpham/update.php";
            break;
        case "listcategory":
            if(isset($_POST['sb'])){
                $se = $_POST['se'];
            }
            else{
                $se = "";
            }
            $count_category = count_category();
            extract($count_category);
            $itemperpage = 4;
            
            if(!empty($_GET['page'])){
                $currentpage  = $_GET['page'];
            }
            else{
                $currentpage = 1;
            }
            
            $offset = ($currentpage-1) * $itemperpage;
            $totalpage = ceil($soluong / $itemperpage);
            $category_type = load_all_category2($itemperpage,$offset,$se);
            
            include "../admin/danhmuc/listcategory.php";
            break;
        case "add_category":
            if(isset($_POST['submit'])){
                $name = $_POST['name-product-category'];
                $mota = $_POST['desc-product-category'];
                $category_type = $_POST['id_product_type'];
                add_category($name,$mota,$category_type);
                setcookie('notice',"Danh mục đã được thêm",time()+2);
                header("Location: index.php?act=listcategory");
            }
            include "danhmuc/listcategory.php";
            break;
        case "delete_category":
            if(isset($_GET['id'])&&$_GET['id']>0){
                $id = $_GET['id'];
                delete_category($id);
                setcookie('notice',"Danh mục đã được xóa đã được xóa",time()+2);
                header("Location: index.php?act=listcategory");
            }
            include "danhmuc/listcategory.php";
            break;
        case "listcomment":
            if(isset($_POST['search'])){
                $search = $_POST['search'];
            }
            else{
                $search = "";
            }
            $count_comment = count_comment();
            extract($count_comment);
            $itemperpage = 4;
            
            if(!empty($_GET['page'])){
                $currentpage  = $_GET['page'];
            }
            else{
                $currentpage = 1;
            }
            
            $offset = ($currentpage-1) * $itemperpage;
            $totalpage = ceil($soluong / $itemperpage);
            $list_comment = get_comment($itemperpage,$offset,$search);
            include "comment/listcomment.php";
            break;
        case "delete_comment":
            if(isset($_GET['id'])&&$_GET['id']>0){
                $id = $_GET['id'];
                delete_comment($id);
                setcookie('notice',"Bình luận đã được xóa đã được xóa",time()+2);
                header("Location: index.php?act=listcomment");
            }
            break;
        case "listaccount":
            if(isset($_POST['submit'])){
                $search = $_POST['search'];
            }
            else{
                $search = "";
            }
            $count_acc = count_account();
            extract($count_acc);
            $itemperpage = 4;
            
            if(!empty($_GET['page'])){
                $currentpage  = $_GET['page'];
            }
            else{
                $currentpage = 1;
            }
            
            $offset = ($currentpage-1) * $itemperpage;
            $totalpage = ceil($soluong / $itemperpage);
            $listaccount = get_user_list($itemperpage,$offset,$search);
            
            include "account/listaccount.php";
            break;
        case "addaccount":
            if (isset($_POST['btn-submit'])) {
                $name_customer = $_POST['username'];
                $picture = $_FILES['image'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone_number = $_POST['phone_number'];
                $passWord = $_POST['password'];
                $picture_name = ($picture['error'] == 0) ? $picture['name'] : '';
                $role = $_POST['role'];
                if ($picture == "") {
                    setcookie('notice',"Phải có ảnh",time()+2);
                } else {
                    $folder = "../customer/";
                    $file_extension = explode('.', $picture_name)[1];
                    $file_name = time() . '.' . $file_extension;
                    $path_file = $folder . $file_name;
                    move_uploaded_file($picture['tmp_name'], $path_file);
                    }
                    create_customer($name_customer, $email, $passWord, $file_name, $role, $address, $phone_number);
                    header("Location: index.php?act=listaccount");
                    setcookie('notice',"Đã thêm thành công",time()+2); 
                    
                }
            break;    
        case "delete_acc":
            if(isset($_GET['id']) && $_GET['id']>0){
                $id = $_GET['id'];
                delete_account($id);
                setcookie('notice',"Người dùng đã được xóa đã",time()+2);
                header("Location: index.php?act=listaccount");
            }
            break;
    }
    } else {
        $total_moneys = doanh_thu_hang_thang();
        $count_staff = count_staff();
        $count_customers = count_account();
        $count_comment2 = count_comment();
        $count_products = count_pro(); 
        $count_product_category = count_category();
        $count_orders = count_order();
        var_dump($count_customers);
        include 'home.php';
    }
    
    include 'footer.php';
?>