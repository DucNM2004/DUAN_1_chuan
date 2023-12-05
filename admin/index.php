<?php 
ob_start();
session_start();

if(!isset($_SESSION['user'])){
    header("location: 404 copy.php");
}else{
    if($_SESSION['role'] != 1){
        header("location: 404 copy.php");
    }
}

    include '../model/pdo.php';
    include "../model/products.php";
    include "../model/account.php";
    include "../model/home.php";
    include "../model/comment.php";
    include "../model/variant.php";
    include "../model/category.php";
    include "../model/staff.php";
    include "../model/order.php";
    include 'header.php';
    

    if (isset($_GET['act']) && $_GET['act']!="") {
        $act = $_GET['act'];
        switch ($act) {
        case "listproduct":
            if(isset($_POST['submit'])){
                $search = $_POST['search'];
            }
            else{
                $search = "";
            }
            $count_pro = count_pro();
            extract($count_pro);

            $itemperpage = 6;
            
            if(!empty($_GET['page'])){
                $currentpage  = $_GET['page'];
            }
            else{
                $currentpage = 1;
            }
            
            $offset = ($currentpage-1) * $itemperpage;
            $totalpage = ceil($soluong / $itemperpage);
            $list = load_pro_follow_category2($itemperpage,$offset,$search);
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
                    $description = $_POST['description'];
                    $quantity = $_POST['quantity'];
                    $id_category = $_POST['id_category'];
                    $er = [];
                   
                    if(!empty($image) && $_FILES['picture']['error'] == 0){
                        $dir = "../products/";
                        $namefile = $_FILES['picture']['name'];
                        $targetfile = $dir.$namefile;
                       
                        $typefile = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION));
                        if($typefile == "jpg" || $typefile == "png" || $typefile == "gif" || $typefile == "jpeg" || $typefile == "webp" || $typefile == "jfif"){
                            move_uploaded_file($_FILES['picture']['tmp_name'],$targetfile);
                        }
                        else{
                            $er['picture'] = "Bạn chỉ được chọn File ảnh(jpg,png,jpeg)";
                        }
                    }
                    if(empty($er['picture'])){
                        insert_sanpham($name,$price,$saleOff,$namefile,$description,$quantity,$id_category);
                        header("Location: index.php?act=listproduct");
                        setcookie('notice',"Đã thêm thành công",time()+2); 
                    }
                    else{
                        if(!empty($er['picture'])){
                            header("Location: index.php?act=add");
                            setcookie('notice',$er['picture'],time()+2); 
                        }
                    }
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
                $description = $_POST['description'];
                $quantity = $_POST['quantity'];
                $view_number = $_POST['view_number'];
                $id_category = $_POST['id_category'];
                $item = load_one_PRO($id_pro);
                $er = [];
                if(!empty($image) && $_FILES['new-picture']['error'] == 0){
                    $dir = "../products/";
                    $namefile = $_FILES['new-picture']['name'];
                    $targetfile = $dir.$namefile;
                    $typefile = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION));
                    if($typefile == "jpg" || $typefile == "png" || $typefile == "gif" || $typefile == "jpeg" || $typefile == "webp" || $typefile == "jfif"){
                        move_uploaded_file($_FILES['new-picture']['tmp_name'],$targetfile);
                    }
                    else{
                        $er['picture'] = "Bạn chỉ được chọn File ảnh(jpg,png,jpeg)";
                    }
                }
                else{
                    $namefile = $item['picture'];
                }
                if(empty($er['picture'])){
                upload_product($name, $price, $saleOff, $namefile, $description, $view_number, $quantity, $id_category, $id_pro);
                setcookie('notice',"Đã sửa thành công",time()+2); 
                header('location: index.php?act=listproduct');
                }
                else{
                    if(!empty($er['picture'])){
                        setcookie('notice',"Bạn ",time()+2);
                        header("Location: index.php?act=updatepro&id=$id_pro");
                        setcookie('notice',$er['picture'],time()+2); 
                    }
                }
            }
            include "sanpham/update.php";
            break;
        case "listcategory":
            if(isset($_POST['submit'])){
                $search = $_POST['search'];
            }
            else{
                $search = "";
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
            $category_type = load_all_category2($itemperpage,$offset,$search);
            
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
        case "update_cate":
            if(isset($_GET['id'])&& $_GET['id']>0){
                $id = $_GET['id'];
                $category_item = get_category($id);
                $category_type = load_all_category_type();
            }
            if (isset($_POST['submit'])) {
                $category_type = $_POST['id-product-category'];
                $name_product_category = $_POST['name-product-category'];
                $desc_product_category = $_POST['desc-product-category'];
                $id_product_type = $_POST['id_product_type'];
                update_category($category_type, $name_product_category, $desc_product_category, $id_product_type);
                setcookie('notice',"Đã sửa thành công",time()+2); 
                header('location: index.php?act=listcategory');
            }
            include "danhmuc/update.php";
            break;
        case "delete_category":
            if(isset($_GET['id'])&&$_GET['id']>0){
                $id = $_GET['id'];
                $error = [];
                if(check_category($id)){
                    $error['1'] = 1;
                }
                if(empty($error['1'])){
                delete_category($id);
                setcookie('notice',"Danh mục đã được xóa đã được xóa",time()+2);
                header("Location: index.php?act=listcategory");
                }else{
                    if(!empty($error['1'])){
                        setcookie('notice',"Danh mục còn chứa sản phẩm nên ko thể xóa",time()+2);
                        header("Location: index.php?act=listcategory");
                    }
                }
            }
            include "danhmuc/listcategory.php";
            break;
        case "listcomment":
            if(isset($_POST['submit'])){
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
                $role = $_POST['role'];
                $error = [];
                if (check_email($email) == true){
                    $error['email'] = "Email đã tồn tại";
                }
                if (check_user($name_customer)== true){
                    $error['user'] = "Tên người dùng đã tồn tại";
                }
                if(!empty($picture) && $_FILES['image']['error'] == 0){
                    $dir = "../customer/";
                    $namefile = $_FILES['image']['name'];
                    $targetfile = $dir.$namefile;
                    $typefile = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION));
                    if($typefile == "jpg" || $typefile == "png" || $typefile == "gif" || $typefile == "jpeg" || $typefile == "webp" || $typefile == "jfif"){
                        move_uploaded_file($_FILES['image']['tmp_name'],$targetfile);
                    }
                    else{
                        $error['picture'] = "Bạn chỉ được chọn File ảnh(jpg,png,jpeg)";
                    }
                }
            
                if(empty($error)){
                
                    create_customer($name_customer, $email, $passWord, $namefile, $role, $address, $phone_number);
                    header("Location: index.php?act=listaccount");
                    setcookie('notice',"Đã thêm thành công",time()+2,'/'); 
                }
                else{
                    if(!empty($error['email'])){
                        header("Location: index.php?act=listaccount");
                        setcookie('notice',$error['email'],time()+2);  
                    }
                    elseif(!empty($error['user'])){
                        header("Location: index.php?act=listaccount");
                        setcookie('notice',$error['user'],time()+2);
                    }elseif(!empty($error['picture'])){
                        header("Location: index.php?act=listaccount");
                        setcookie('notice',$error['picture'],time()+2);
                    }  
                }
            }
                include "account/listaccount.php";
            break;
        case "update_acc":
            if(isset($_GET['id']) && $_GET['id']>0){
                $id = $_GET['id'];
                $user = get_user_byId($id);
            }
            if(isset($_POST["btn_save"])) {
                $id = $_POST['ID'];
                $error = [];
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
    
                if(empty($_POST["address"])) {
                    $address = $_POST["current_address"];
                } else {
                    $address = $_POST["address"];
                }
    
                if(empty($_POST["user_name"])) {
                    $name = $_POST["current_name"];
                } else {
                    $name = $_POST["user_name"];
                }

                if(empty($_POST["pass"])) {
                    $pass = $_POST["current_pass"];
                } else {
                    $pass = $_POST["pass"];
                }
                // var_dump($avatar);
                // die;
                // if (check_email($email) == true){
                //     $error['email'] = "Email đã tồn tại";
                   
                // }
                // if (check_user($name)== true){
                //     $error['user'] = "Tên người dùng đã tồn tại";
                    
                // }
               
                $image = $_FILES["new-picture"];
                if(!empty($image) && $_FILES['new-picture']['error'] == 0){
                    $dir = "../customer/";
                    $namefile = $_FILES['new-picture']['name'];
                    $targetfile = $dir.$namefile;
                    $typefile = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION));
                    if($typefile == "jpg" || $typefile == "png" || $typefile == "gif" || $typefile == "jpeg" || $typefile == "webp" || $typefile == "jfif"){
                        move_uploaded_file($_FILES['new-picture']['tmp_name'],$targetfile);
                    }
                    else{
                        $error['picture'] = "Bạn chỉ được chọn File ảnh(jpg,png,jpeg)";
                    }
                }
                else{
                    $namefile = $_POST['current_picture'];
                }
                if(empty($error)){
                move_uploaded_file($_FILES["new-picture"]["tmp_name"],"customer/".$_FILES["new-picture"]["name"]);
                up_date_info_admin($name,$email,$phone_number,$address,$namefile,$pass,$id);
                setcookie('notice',"Đã cập nhật thông tin thành công",time() + 2);
                header("location: index.php?act=listaccount");
                }else{
                    if(!empty($error['email'])){
                        setcookie('notice',$error['email'],time()+2);
                        header("Location: index.php?act=update_acc&id=$id");
                    }
                    elseif(!empty($error['user'])){
                        setcookie('notice',$error['user'],time()+2);
                        header("Location: index.php?act=update_acc&id=$id");
                    }elseif(!empty($error['picture'])){
                        setcookie('notice',$error['picture'],time()+2);
                        header("Location: index.php?act=update_acc&id=$id");
                    }
                }
            }
            include "account/update.php";
            break;    
        case "delete_acc":
            if(isset($_GET['id']) && $_GET['id']>0){
                $id = $_GET['id'];
                delete_account($id);
                setcookie('notice',"Người dùng đã được xóa đã",time()+2);
                header("Location: index.php?act=listaccount");
            }
            break;
        case "admin_info":
            $user = get_user_info($_SESSION['user']);
            if(isset($_POST["btn_save"])) {
                $id = $_POST['ID'];
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
    
                if(empty($_POST["address"])) {
                    $address = $_POST["current_address"];
                } else {
                    $address = $_POST["address"];
                }
    
                if(empty($_POST["user_name"])) {
                    $name = $_POST["current_name"];
                } else {
                    $name = $_POST["user_name"];
                }

                if(empty($_POST["pass"])) {
                    $pass = $_POST["current_pass"];
                } else {
                    $pass = $_POST["pass"];
                }
                $error =[];
                $image = $_FILES["new-picture"];
                if(!empty($image) && $_FILES['new-picture']['error'] == 0){
                    $dir = "../customer/";
                    $namefile = $_FILES['new-picture']['name'];
                    $targetfile = $dir.$namefile;
                    $typefile = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION));
                    if($typefile == "jpg" || $typefile == "png" || $typefile == "gif" || $typefile == "jpeg" || $typefile == "webp" || $typefile == "jfif"){
                        move_uploaded_file($_FILES['new-picture']['tmp_name'],$targetfile);
                    }
                    else{
                        $error['picture'] = "Bạn chỉ được chọn File ảnh(jpg,png,jpeg)";
                    }
                }
                else{
                    $namefile = $_POST['picture-old'];
                }
             
                if(isset($_SESSION["user"])) {
                    $_SESSION['user'] = $name;
                    $_SESSION['email'] = $email;
                    $_SESSION['picture'] = $_POST['picture-old'];
                }
                if(empty($error)){
                $_SESSION['picture'] = $namefile;
                move_uploaded_file($_FILES["new-picture"]["tmp_name"],"customer/".$_FILES["new-picture"]["name"]);
                up_date_info_admin($name,$email,$phone_number,$address,$namefile,$pass,$id);
                setcookie('notice',"Đã cập nhật thông tin thành công",time() + 2);
                header("location: index.php?act=admin_info");
                }else{
                    if(!empty($error['picture'])){
                        setcookie('notice',$error['picture'],time()+2);
                        header("Location: index.php?act=admin_info");
                    }
                }
            }
            include "admin_info/info.php";
            break;
        case "listvariant":
            if(isset($_POST['submit'])){
                $search = $_POST['search'];
            }
            else{
                $search = "";
            }
            $count_var = count_var();
            extract($count_var);
            $itemperpage = 4;
            
            if(!empty($_GET['page'])){
                $currentpage  = $_GET['page'];
            }
            else{
                $currentpage = 1;
            }
            
            $offset = ($currentpage-1) * $itemperpage;
            $totalpage = ceil($soluong / $itemperpage);
            $list_var = load_variant($itemperpage,$offset,$search); 
            $var_size = load_size();
            $var_pro = load_var_pro();
        include "variant/listvariant.php";
        break;
        case "add_var":
            if(isset($_POST['submit'])){
                $id_pro = $_POST['id_pro'];
                $id_size = $_POST['size'];
                $price = $_POST['size_price'];
                $quantity = $_POST['size_quantity'];
                $product = load_one_PRO($id_pro);
                $error =[];
                
                if(check_var($id_pro,$id_size)){
                    $error['1'] = 1; 
                }
                if($price<$product['price']){
                    $error['2'] = 2;
                    
                }
                if(empty($error)){
                add_variant($id_size,$id_pro,$price,$quantity);
                update_quantity_pro($id_pro,$quantity);
                setcookie('notice',"Bạn đã thêm vào kho thành công",time()+2);
                header("Location: index.php?act=listvariant");
                }else{
                    if(!empty($error['1'])){
                        setcookie('notice',"Sản phẩm và size đã có trong kho hãy kiểm tra lại",time()+2);
                        header("Location: index.php?act=listvariant");
                    }elseif(!empty($error['2'])){
                        setcookie('notice',"Giá không được thấp hơn giá niêm yết của sản phẩm: ".$product['price'],time()+2);
                        header("Location:index.php?act=listvariant");
                    }
                }
            }
        include "variant/listvariant.php";
        break;
        case "update_var":
            if(isset($_GET['id']) && $_GET['id']>0){
                $id = $_GET['id'];
                $item = get_var_info($id);
            }
            if(isset($_POST['submit'])){
                $id_var = $_POST['id-var'];
                $id_size = $_POST['id-size'];
                $id_pro = $_POST['id-product'];
                $name_pro = $_POST['name_product'];
                $name_size = $_POST['name_size'];
                $price_size = $_POST['price'];
                $quantity = $_POST['quantity_size'];
                $old_quantity = $_POST['old_quantity'];
                $up_pro_quan = $quantity-$old_quantity;
                $product = load_one_PRO($id_pro);
                $error = [];

                if($price_size<$product['price']){
                    $error['price'] = "Chỉnh sửa lỗi: 
                    Giá chỉnh sửa không được thấp hơn giá niêm yết của sản phẩm: ".$name_pro.
                    " Giá niêm yết của sản phẩm là: ".$product['price'];
                }
                if(empty($error)){
                update_variant($id_var,$id_pro,$id_size,$price_size,$quantity);
                update_quantity_pro($id_pro,$up_pro_quan);
                setcookie('notice',"Cập nhật kho hàng thành công",time()+2);
                header("Location: index.php?act=listvariant");
                }else{
                    if(!empty($error['price'])){
                    setcookie('notice',"Giá không được thấp hơn giá niêm yết của sản phẩm: ".$product['price'],time()+2);
                    header("Location:index.php?act=update_var&id=$id_var");
                    }
                }
            }
            include "variant/update.php";
        break;
        case "delete_var":
            if(isset($_GET['id']) && $_GET['id']>0){
                $id  = $_GET['id'];
                delete_var($id);
                setcookie('notice',"Đã xóa thành công",time()+2);
                header("Location: index.php?act=listvariant");
            }
            include "variant/listvariant.php";
        break;
        case "liststaff":
            if(isset($_POST['submit'])){
                $search = $_POST['search'];
            }
            else{
                $search = "";
            }
            $count_staff = count_staff2();
            extract($count_staff);
            $itemperpage = 4;
            
            if(!empty($_GET['page'])){
                $currentpage  = $_GET['page'];
            }
            else{
                $currentpage = 1;
            }
            
            $offset = ($currentpage-1) * $itemperpage;
            $totalpage = ceil($soluong / $itemperpage);
            $liststaff = get_staff_list($itemperpage,$offset,$search);
            
            include "staff/liststaff.php";
        break;
        case "add_staff":
            if (isset($_POST['btn-submit'])) {
                $name_customer = $_POST['username'];
                $picture = $_FILES['image'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone_number = $_POST['phone_number'];
                $passWord = $_POST['password'];
                $picture_name = ($picture['error'] == 0) ? $picture['name'] : '';
                $role = $_POST['role'];
                $error = [];
                if (check_email($email) == true){
                    $error['email'] = "Email đã tồn tại";
                }
                if (check_user($name_customer)== true){
                    $error['user'] = "Tên người dùng đã tồn tại";
                }
                if ($picture == "") {
                    $error['3'] = 3;
                    setcookie('notice',"Phải có ảnh",time()+2,'/');
                    header("Location: index.php?act=listaccount");
                }
                if(empty($error)){
                    $folder = "../customer/";
                    $file_extension = explode('.', $picture_name)[1];
                    $file_name = time() . '.' . $file_extension;
                    $path_file = $folder . $file_name;
                    move_uploaded_file($picture['tmp_name'], $path_file);
                    create_customer($name_customer, $email, $passWord, $file_name, $role, $address, $phone_number);
                    header("Location: index.php?act=liststaff");
                    setcookie('notice',"Đã thêm thành công",time()+2,'/'); 
                }
                else{
                    if(!empty($error['email'])){
                        header("Location: index.php?act=liststaff");
                        setcookie('notice',$error['email'],time()+2);  
                    }
                    elseif(!empty($error['user'])){
                    header("Location: index.php?act=liststaff");
                    setcookie('notice',$error['user'],time()+2);
                    } 
                }
            }
                include "account/liststaff.php";
            break;
            case "update_staff":
                if(isset($_GET['id']) && $_GET['id']>0){
                    $id = $_GET['id'];
                    $user = get_user_byId($id);
                }
                if(isset($_POST["btn_save"])) {
                    $id = $_POST['ID'];
                    $error = [];
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
        
                    if(empty($_POST["address"])) {
                        $address = $_POST["current_address"];
                    } else {
                        $address = $_POST["address"];
                    }
        
                    if(empty($_POST["user_name"])) {
                        $name = $_POST["current_name"];
                    } else {
                        $name = $_POST["user_name"];
                    }
    
                    if(empty($_POST["pass"])) {
                        $pass = $_POST["current_pass"];
                    } else {
                        $pass = $_POST["pass"];
                    }
                    // var_dump($avatar);
                    // die;
                    // if (check_email($email) == true){
                    //     $error['email'] = "Email đã tồn tại";
                       
                    // }
                    // if (check_user($name)== true){
                    //     $error['user'] = "Tên người dùng đã tồn tại";
                        
                    // }
                   
                    $image = $_FILES["new-picture"];
                    if(!empty($image) && $_FILES['new-picture']['error'] == 0){
                        $dir = "../customer/";
                        $namefile = $_FILES['new-picture']['name'];
                        $targetfile = $dir.$namefile;
                        $typefile = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION));
                        if($typefile == "jpg" || $typefile == "png" || $typefile == "gif" || $typefile == "jpeg" || $typefile == "webp" || $typefile == "jfif"){
                            move_uploaded_file($_FILES['new-picture']['tmp_name'],$targetfile);
                        }
                        else{
                            $error['picture'] = "Bạn chỉ được chọn File ảnh(jpg,png,jpeg)";
                        }
                    }
                    else{
                        $namefile = $_POST['current_picture'];
                    }
                    if(empty($error)){
                    move_uploaded_file($_FILES["new-picture"]["tmp_name"],"customer/".$_FILES["new-picture"]["name"]);
                    up_date_info_admin($name,$email,$phone_number,$address,$namefile,$pass,$id);
                    setcookie('notice',"Đã cập nhật thông tin thành công",time() + 2);
                    header("location: index.php?act=liststaff");
                    }else{
                       
                        if(!empty($error['picture'])){
                            setcookie('notice',$error['picture'],time()+2);
                            header("Location: index.php?act=update_staff&id=$id");
                        }
                    }
                }
                include "staff/updatestaff.php";
                break;    
        case "delete_staff":
            if(isset($_GET['id']) && $_GET['id']>0){
                $id = $_GET['id'];
                delete_account($id);
                setcookie('notice',"Nhân viên đã được xóa đã",time()+2);
                header("Location: index.php?act=liststaff");
            }
            include "staff/liststaff.php";
        break;
        case "listorder":
            $count_orders = count_order3();
            extract($count_orders);
            $itemperpage = 4;
            if(isset($_POST['submit'])){
                $search = $_POST['search'];
            }else{
                $search = "";
            }
            if(!empty($_GET['page'])){
                $currentpage  = $_GET['page'];
            }
            else{
                $currentpage = 1;
            }
            
            $offset = ($currentpage-1) * $itemperpage;
            $totalpage = ceil($soluong / $itemperpage);
            // var_dump($itemperpage,$offset,$search);
            // var_dump(getOrder($itemperpage,$offset,$search));
            // die;
            $orders = getOrder($itemperpage,$offset,$search);
            include "order/listorder.php";
        break;
        case "listordersucess":
            $count_orders = count_order4();
            extract($count_orders);
            $itemperpage = 4;
            
            if(!empty($_GET['page'])){
                $currentpage  = $_GET['page'];
            }
            else{
                $currentpage = 1;
            }
            
            $offset = ($currentpage-1) * $itemperpage;
            $totalpage = ceil($soluong / $itemperpage);
            $orders = getOrdersucess($itemperpage,$offset);
            include "order/listcordersucess.php";
        break;
        case "order_detail":
            if (isset($_GET['id_order'])){
                $id = $_GET['id_order'];
                $order_detail = getOrderDetailById($id);
            }
            include "order/order_detail.php";
           
        break;
        case "detail_success":
            if (isset($_GET['id_order'])){
                $id = $_GET['id_order'];
                $order_detail = getOrderDetailById($id);
            }
            include "order/detailsucess.php";
           
        break;
        case "delete_order":
            if (isset($_GET['id_order'])){
                $id = $_GET['id_order'];
                delete_order($id);
                setcookie('notice',"Đơn hàng đã được xóa đã",time()+2);
                header("Location: index.php?act=listorder");
            }
            include "order/listorder.php";
        break;
        case "confirm_order":
            if (isset($_GET['id_order'])){
                $id = $_GET['id_order'];
                $item = getEmailbyID($id);
                $check = check_email_order($item['email']);
                $order = getOrderDetailById($id);
                
                if ($check != false) {
                    sendMailorder($item['email'], $item['name_customer'],$order);
                    confirm_order($id);
                    setcookie('notice',"Đơn hàng đã được xác nhận",time()+2);
                    header("Location: index.php?act=listorder");
                } else {
                    $sendMailMess = "Email bạn nhập ko có trong hệ thống";
                }
                
            }
            include "order/listorder.php";
        break;
        case "cancel_order":
            if (isset($_GET['id_order'])){
                $id = $_GET['id_order'];
                cancel_order($id);
                setcookie('notice',"Đơn hàng đã được hủy",time()+2);
                header("Location: index.php?act=listorder");
            }
            include "order/listorder.php";
        break;
        case "re_confirm":
            if (isset($_GET['id_order'])){
                $id = $_GET['id_order'];
                re_confirm_order($id);
                setcookie('notice',"Đơn hàng đã được hủy",time()+2);
                header("Location: index.php?act=listorder");
            }
            include "order/listorder.php";
        break;
    }
    } else {
        $total_moneys = doanh_thu_hang_thang();
        $total_moneys12 = doanh_thu_hang_thang12();
        $count_staff = count_staff();
        $count_customers = count_account();
        $count_comment2 = count_comment();
        $count_products = count_pro(); 
        $count_product_category = count_category();
        $count_orders = count_order();
        $orders23 = count_category_order23();
        $orders24 = count_category_order24();
        $orders25 = count_category_order25();
        $orders26 = count_category_order26();
        if($orders26==false){
            $orders26['soluong'] = 0;
        }
        $orders27 = count_category_order27();
        if($orders27==false){
            $orders27['soluong'] = 0;
        }
        $orders29 = count_category_order29();
        if($orders29==false){
            $orders29['soluong'] = 0;
        }
       
        include 'home.php';
    }
    
    include 'footer.php';
?>