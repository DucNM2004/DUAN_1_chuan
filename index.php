<?php
ob_start();
session_start();
include "model/pdo.php";
include "model/products.php";
include "model/comment.php";
include "model/account.php";
include "model/order.php";
include "model/cart.php";
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
        
        if(isset($_POST['submit'])){
            $search = $_POST['search'];
        }
        else{
            $search ="";
        }
        extract($countpro);
        if(isset($_POST['sort'])){
            $sort = $_POST['sort_select'];
            if($sort == "1"){
                $sort = "order by name ASC ";
            }
            elseif($sort == "4"){
                $sort = "order by name DESC ";
            }
            elseif ($sort == "2"){
                $sort = "order by date_added ASC ";
            }
            elseif ($sort == "5"){
                $sort = "order by date_added DESC ";
            }
            elseif($sort == "3"){
                $sort = "order by price ASC ";
            }
            elseif($sort == "6"){
                $sort = "order by price DESC ";
            }
        }else{
            $sort = "";
        }
        if(isset($_POST['loc'])){
            $itemperpage = $_POST['soluong'];
        }
        elseif(!empty($_GET['perpage'])){
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
        $allpro = load_pro_follow_category($itemperpage,$offset,$iddm,$search,$sort);
        include "view/products.php";
        break;
        case "cart":
            $item = get_cart_info($_SESSION['id_user']);
           
            include "view/cart.php";
        break;
        case "add_cart":
            if(isset($_GET['idpro'])){
            $id = $_GET['idpro'];
            $product = load_one_PRO($id);
            $size = isset($_POST['size']) ? $_POST['size']:"S";
            // $img = $product['picture'];
            // $name = $product['name'];
            $id_cart = get_cart_id($_SESSION['id_user']);
            $ic = $id_cart['id'];
          
            $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
            $price = $product['saleOff'] == 0 ? $product['price'] : $product['price']*($product['saleOff'] / 100);
            $total = intval($price)* intval($quantity);
            // if(check_cart($_SESSION['id_user'])==true){
            //     insert_cart_deteil($ic,$id,$size,$price,$quantity,$total);
            //     setcookie('notice', 'Thêm thành công', time() + 2, '/');
            //     header('location: index.php?act=cart');
            // }else{
            //     insert_cart($_SESSION['id_user']);
            //     insert_cart_deteil($ic,$id,$size,$price,$quantity,$total);
            //     setcookie('notice', 'Thêm thành công', time() + 2, '/');
            //     header('location: index.php?act=cart');
            // }

                
                $i = 1;
                if(empty($_SESSION['carts'][$id])) {
                    $_SESSION['carts'][$id]['name'] = $product['name']; 
                    $_SESSION['carts'][$id]['id'] = $product['id']; 
                    $_SESSION['carts'][$id]['picture'] = $product['picture']; 
                    $_SESSION['carts'][$id]['price'] = $price;
                    $_SESSION['carts'][$id]['size'] = $size;    
                    $_SESSION['carts'][$id]['quantity'] = $quantity;
                    $_SESSION['carts'][$id]['max_quantity'] = $product['quantity'];
                    
                    setcookie('notice', 'Thêm thành công', time() + 2, '/');
                    header('location: index.php?act=cart');
                    
                } else {
                    $check = $_SESSION['carts'][$id]['quantity'] + $quantity;
                    if($check <= $product['quantity']) {
                        if($size == $_SESSION['carts'][$id]['size']){
                        $_SESSION['carts'][$id]['quantity'] = $_SESSION['carts'][$id]['quantity'] + $quantity;
                        setcookie('notice', 'Thêm thành công', time() + 2, '/');
                        header('location: index.php?act=cart');
                        }else{
                            $_SESSION['carts'][$id]['name'] = $product['name']; 
                            $_SESSION['carts'][$id]['id'] = $product['id']; 
                            $_SESSION['carts'][$id]['picture'] = $product['picture']; 
                            $_SESSION['carts'][$id]['price'] = $price;
                            $_SESSION['carts'][$id]['size'] = $size;    
                            $_SESSION['carts'][$id]['quantity'] = $quantity;
                            $_SESSION['carts'][$id]['max_quantity'] = $product['quantity'];
                            setcookie('notice', 'Thêm thành công', time() + 2, '/');
                            header('location: index.php?act=cart');
                        }
                    } else {
                        setcookie('notice', 'số lượng vượt quá giới hạn', time() + 2, '/');
                        header("location: index.php?act=detail&idsp=$id");
                    }
                    
                
                }
                
                
            }

            include "view/cart.php";
            break;
        case "change_quantity":
            if(isset($_GET['id_product'])) {
                $id=$_GET['id_product'];
                if(isset($_SESSION['carts'])) {
                    if($_GET['set'] == "incre" && $_SESSION['carts'][$id]['quantity'] < $_SESSION['carts'][$id]['max_quantity']) {
                        $_SESSION['carts'][$id]['quantity']++;
                    }
    
                    if($_GET['set'] == "decre" && $_SESSION['carts'][$id]['quantity'] > 0) {
                        $_SESSION['carts'][$id]['quantity']--;
                    }
                }
                if($_SESSION['carts'][$id]['quantity'] == 0) {
                    $_SESSION['carts'][$id]['quantity'] = 1;
                }
                if($_SESSION['carts'][$id]['quantity'] == $_SESSION['carts'][$id]['max_quantity']){
                    $_SESSION['carts'][$id]['quantity'] = $_SESSION['carts'][$id]['max_quantity'];
                }
            }
            header('location: index.php?act=cart');
            include "view/cart.php";
        case "delete_cart":
            if(isset($_GET['id'])&&$_GET['id']>0){
                $id = $_GET['id'];
                unset($_SESSION['carts'][$id]);
                setcookie('nofication', 'Xóa thành công', time() + 2, '/');
                header('location: index.php?act=cart');
            } 
            else{
                    setcookie('nofication', 'Xóa không thành công', time() + 2, '/');
                    header('location: index.php?act=cart');
                }
                
            include "view/cart.php";
            break;
        case "order":
            if(isset($_SESSION['id_user']) && $_SESSION['role'] == 3) {
                if(isset($_POST['btn_create']) && !empty($_SESSION['carts'])) {
                    $id = $_SESSION['id_user'];
                    $total_cost = $_POST['results'];
                    createOrder($id, $total_cost, 1);
    
                    // Lấy ra order
                    $order = getOrder3();
                    $id_order = $order[0]['id'];
                    // var_dump($order);
                    // die;
                    foreach ($_SESSION['carts'] as $value) {
                        $total_item_cost = $value['price'] * $value['quantity'];
                        addDataToOrderDetail($id_order, $value['id'], $value['name'], $value['picture'],$value['price'], $value['quantity'],$total_item_cost);
                        changeQuantity($value["id"], '-' ,$value['quantity']);
                    }
                    setcookie('notice', 'Đã Tạo Hóa Đơn Thành Công, xem chi tiết trong phần quản lý', time() + 2, '/');
                    unset($_SESSION['carts']);
                    header('location: index.php?act=info');
                } else {
                    setcookie('notice', 'Chưa có sản phẩm', time() + 2, '/');
                    header('location: index.php?act=cart');
                }
            } else {
                setcookie('notice', 'Tài khoản admin không dùng để mua sản phẩm, xin vui lòng tạo tài khoản người dùng', time() + 2, '/');
                header('location: index.php?act=cart');
            }
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
                    if(empty($_POST["address"])) {
                        $address = $_POST["current_address"];
                    } else {
                        $address = $_POST["address"];
                    }
    
                    $er = [];
                    $picture = $_FILES["avatar"]["size"];
                    if($picture != 0){
                        $dir = "../customer/";
                        $namefile = $_FILES["avatar"]["name"];
                        $targetfile = $dir.$namefile;
                        $typefile = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION));
                        if($typefile == "jpg" || $typefile == "png" || $typefile == "gif" || $typefile == "jpeg" || $typefile == "webp" || $typefile == "jfif"){
                            move_uploaded_file($_FILES["avatar"]["tmp_name"],"customer/".$_FILES["avatar"]["name"]);
                        }
                        else{
                            $er['picture'] = "Bạn chỉ được chọn File ảnh(jpg,png,jpeg)";
                        }
                    }
                    else{
                        $namefile = $_POST['current_picture'];
                    }
                  
                    
                    if(empty($er)){
                    up_date_info($name,$email,$address,$phone_number,$namefile,$accountinfo['id']);
                    $accountinfo['name_customer'] = $name;
                    $accountinfo['email']  = $email;
                    $accountinfo['phone_number'] = $phone_number;
                    $accountinfo['picture'] = $namefile;
                    $accountinfo['address'] = $address;
                    $_SESSION['user'] = $name;
                    $_SESSION['email'] = $email;
                    }else{
                        if(!empty($er['picture'])){
                            setcookie('notice',"Bạn chỉ được chọn file ảnh",time()+2);
                            header("Location: index.php?act=info");
                        }
                    }
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
                // var_dump($account);
                // die;
                if($account == false){
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
                else{
                    if(!empty($errors['passWord'])){
                        die;
                        header("Location: index.php?act=info");
                        setcookie('notice',$errors['passWord'],time()+2);
                       
                    }
                    elseif(!empty($errors['rePassWord'])){
                        header("Location: index.php?act=info");
                        setcookie('notice',$errors['rePassWord'],time()+2);
                        
                    }
                }

            }
            
            include "view/info.php";
        break;
        case "delete_bill":
            if(isset($_GET['id_order'])){
                $id = $_GET['id_order'];
                delete_order($id);
                setcookie('notice',"Đơn hàng đã được xóa",time()+2);
                header("Location: index.php?act=info");
            }
        break;
        case "cancel_bill":
            if(isset($_GET['id_order'])) {
                $id = $_GET['id_order'];
                user_cancel_order($id);
                setcookie("notice","Hủy thành công", time() + 2, '/');
                header("Location: index.php?act=info");
            } else {
                setcookie("notice","Đã Xảy Ra Lỗi, thử lại sau", time() + 2, '/');
                header("Location: index.php?act=info");
            }
        break;
        case "order_detail":
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
        case "forgotpass":
            if (isset($_POST['forget_password'])) {
                $email = $_POST['email'];

                $account = check_email_forgotpass($email);

                if ($account != false) {
                    sendMail($email, $account['name_customer'], $account['passWord']);
                    $sendMailMess = "Gửi email thành công";
                } else {
                    $sendMailMess = "Email bạn nhập ko có trong hệ thống";
                }
            }
            include "view/forgot_pass.php";
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
                $id_category  = $detailpro['id_category'];
                // var_dump($id_category);
                // var_dump($id);
                // die;
                $top8view = load_same_cate($id_category,$id);
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
    // var_dump($_SESSION['id_user']);
    // var_dump($_SESSION['user']);
    // var_dump($_SESSION['role']);
    // die;
    include "view/home.php";
}

include "view/footer.php";





?>