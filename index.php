<?php
ob_start();
session_start();
include "model/pdo.php";
include "model/products.php";
include "model/comment.php";
include "model/account.php";
include "model/order.php";
include "view/head.php";
$top4 = load_top4_pro();
$top8 = load_top8_new();
if(isset($_GET['act']) && $_GET['act']!=""){
    $act = $_GET['act'];
    switch ($act) {
       case "products":
        $loadcategory = load_all_category();
        $loadcategorytype = load_all_category_type();
        $countpro = count_pro();
        if(isset($_POST['soluong'])){
            $sl = $_POST['soluong'];
            var_dump($sl);
            echo $sl;
        }
        
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
            if(isset($_SESSION['user'])){
                $accountinfo = get_user_info($_SESSION['user']);
                if(isset($_POST['btn_save'])){
                    if(empty($_POST["email"])) {
                        $email = $_POST["current_email"];
                    } else {
                        $email = $_POST["email"];
                    }
        
                    if(empty($_POST["phoneNumber"])) {
                        $phone_number = $_POST["current_phone_number"];
                    } else {
                        $phone_number = $_POST["phoneNumber"];
                    }
        
                    if(empty($_POST["user_name"])) {
                        $name = $_POST["current_name"];
                    } else {
                        $name = $_POST["user_name"];
                    }
                
                    if($_FILES["avatar"]["size"] != 0) {
                        $avatar = $_FILES["avatar"]["name"];
                    }else{
                        $avatar = $_POST['current_picture'];
                    }
                    // var_dump($email);
                    // var_dump($name);
                    // var_dump($phone_number);
                    // var_dump($avatar);
                    move_uploaded_file($_FILES["avatar"]["tmp_name"],"customer/".$_FILES["avatar"]["name"]);
                    up_date_info($name,$email,$phone_number,$avatar,$accountinfo['id']);
                    $accountinfo['name_customer'] = $name;
                    $accountinfo['email']  = $email;
                    $accountinfo['phone_number'] = $phone_number;
                    $accountinfo['picture'] = $avatar;
                    $_SESSION['user'] = $name;
                    $_SESSION['email'] = $email;
                }
                $order = getOrderByIdCustomer($_SESSION['id_user']);
                
            }
            include "view/info.php";
            // include "view/footer.php";
        break;
        case "change_pass":
            $accountinfo = get_user_info($_SESSION['user']);
            if(isset($_POST['btn-change'])){
                $pass_old = $_POST['passWord'];
                $new_pass = $_POST['new-password'];
                $repass = $_POST['rePassWord'];
                $errors = [];
                $account = check_pass($_SESSION['user'],$pass_old);
                if(!$account){
                    $errors['passWord'] = "Mật khẩu cũ không chính xác";
                }

                if($repass != $new_pass){
                    $errors['rePassWord'] = "Mật khẩu nhập lại không trùng khớp";
                }

                if(empty($errors)){
                    update_pass($_SESSION['user'],$new_pass);
                    setcookie('notice',"Bạn đã đổi mật khẩu thành công",time()+1);
                    header("Location: index.php?act=info");
                }
            }
            
            include "view/info.php";
        break;
        case "delete_bill":
            if(isset($_GET['id_order'])){
                $id = $_GET['id_order'];
                delete_order($id);
                delete_order_detail($id);
                setcookie('notice',"Đơn hàng đã được hủy",time()+2);
                header("Location: index.php?act=info");
            }
        break;
        case "order":
            if(isset($_GET['id_order'])){
                $id = $_GET['id_order'];
                $order_detail = getOrderDetailById($id);
            }
            include "view/order.php";
        break;
        case "login":
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name = $_POST['name'];
                $pass = $_POST['pass'];

                $account = login($name,$pass);

                if(is_array($account)){
                    $_SESSION['user'] = $name;
                    $_SESSION['email'] = $account['email'];
                    $_SESSION['picture'] = $account['picture'];
                    $_SESSION['id_user'] = $account['id'];
                    $_SESSION['role'] = $account['role'];
                    
                   header("Location:index.php");
                }
                else{
                    $erros = "Thông tin tài khoản sai";
                }   
                    
            }
            if(isset($_SESSION['user'])){
                header('Location: index.php');
            }  
           
            include "view/login.php";
        break;
        case "logout":
            logout();
            include "view/login.php";
            break;
        case "register":
            if(isset($_POST['register'])&& $_POST['register'] != ""){
                $email = $_POST['email'];
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $addres = $_POST['address'];
                $pass = $_POST['pass'];
                $role =3;
                $error = [];
                if(check_email($email)){
                    $error['email'] = "Email đã tồn tại trên hệ thống";
                }
                if(check_user($name)){
                    $error['user'] = "Username đã tồn tại trên hệ thống";
                }
                if(empty($error)){
                    insert_user($name,$pass,$email,$addres,$phone,$role);
                    $thongbao = "Đăng ký thành công";
                }

            }
            include "view/register.php";
        break;
        case "detail":
            if(isset($_GET['idsp']) && $_GET['idsp']){
                $id = $_GET['idsp'];
                $detailpro = load_one_PRO($id);
                $top8view = load_top8_new();
                $comment = load_all_comment($id);
                update_view($id);
                // $user = get_user_info($_SESSION['user']);
            }
            if(isset($_POST['btn_submit'])){
                $user = get_user_info($_SESSION['user']);
                $content = $_POST['comment'];
                $id = $user['id'];
                $id_pro = $_POST['id_product'];
                insert_comment($content,$id_pro,$id);
                header("Location:index.php?act=detail&idsp=".$detailpro['id']);
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