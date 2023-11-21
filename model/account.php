<?php 
function login($name,$pass) { 
    $sql="SELECT * FROM customer WHERE name_customer ='$name' and passWord='$pass'";
    $account = pdo_query_one($sql);
    return $account;
}
function logout() { 
    if (isset($_SESSION['user'])) {
        unset($_SESSION['role']);
        unset($_SESSION['user']);
        unset($_SESSION['id_user']);
        unset($_SESSION['email']);
        unset($_SESSION['notice']);
    }
}

function get_user_info($name){
    $sql = "SELECT * FROM customer WHERE name_customer = '$name'";
    $account = pdo_query_one($sql);
    return $account;
}
function up_date_info($name,$email,$phone,$avatar,$id){
    $sql = "UPDATE customer SET name_customer='$name', email = '$email',phone_number = '$phone',picture = '$avatar' where id = '$id' ";
    pdo_execute($sql);
}
function check_email($email) { 
    $sql="SELECT * FROM customer WHERE email='$email'";
    $result = pdo_query_one($sql);
    if($result){
        return true;
    }else{
        return false;
    }
}
function check_user($name) { 
    $sql="SELECT * FROM customer WHERE name_customer='$name'";
    $result = pdo_query_one($sql);
    if($result){
        return true;
    }else{
        return false;
    }
}
function insert_user($name,$pass,$email,$addres,$phone,$role){
    $sql = "INSERT INTO customer(name_customer,passWord,email,address,phone_number,role) VALUES ('$name','$pass','$email','$addres','$phone',$role);";
    pdo_execute($sql);
}
function check_pass($username,$pass){
    $sql="SELECT * FROM customer WHERE name_customer='$username' AND passWord ='$pass' ";
    $result = pdo_query_one($sql);

    if($result){
        return true;
    }else{
        return false;
    }
}

function update_pass($user,$pass){ 
    $sql = "UPDATE customer SET passWord = '$pass' WHERE name_customer = '$user' ";
    pdo_execute($sql);
}

function get_user_list($itemperpage,$offset,$search){
    $sql = "SELECT customer.*, customer.id as 'id_customer' from customer where customer.role = 3  ";
    if($search != ""){
        $sql .= " AND name_customer like '%$search%' ";
    }
    if($itemperpage>0 && $offset>=0){
        $sql .= "LIMIT $itemperpage OFFSET $offset";
    }
    $list = pdo_query($sql);
    return $list;
}
function create_customer($name_customer, $email, $passWord, $picture_name, $role, $address, $phone_number){
    $sql = "INSERT INTO customer(name_customer, email, passWord, picture, role, address, phone_number) 
    values('$name_customer', '$email', '$passWord', '$picture_name', $role, '$address', '$phone_number')";
    pdo_execute($sql);  
}
function delete_account($id){
    $sql ="DELETE FROM customer where id = $id";
    pdo_execute($sql);
}
function count_account(){
    $sql = "SELECT count(id) as soluong from customer where customer.role = 3 ";
    $list = pdo_query_one($sql);
    return $list;
}
?>