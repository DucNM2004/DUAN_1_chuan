<?php 
function login($name,$pass) { 
    $sql="SELECT * FROM customer WHERE name_customer ='$name' and passWord='$pass'";
    $account = pdo_query_one($sql);
    return $account;
}
function login_admin($email,$pass) { 
    $sql="SELECT * FROM customer WHERE email ='$email' and passWord='$pass'";
    $account = pdo_query_one($sql);
    return $account;
}
function logout() { 
    if (isset($_SESSION['user'])) {
        session_destroy();
    }
}

function get_user_info($name){
    $sql = "SELECT * FROM customer WHERE name_customer = '$name'";
    $account = pdo_query_one($sql);
    return $account;
}
function up_date_info($name,$email,$address,$phone,$avatar,$id){
    $sql = "UPDATE customer SET name_customer='$name', email = '$email',address = '$address',phone_number = '$phone',picture = '$avatar' where id = '$id' ";
    pdo_execute($sql);
}
function up_date_info_admin($name,$email,$phone_number,$address,$avatar,$pass,$id){
    $sql = "UPDATE customer SET name_customer='$name', email = '$email',phone_number = '$phone_number',address = '$address',picture = '$avatar',passWord = '$pass' where id = '$id' ";
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
function get_user_byId($id){
    $sql ="SELECT * FROM customer where id = $id";
    $list = pdo_query_one($sql);
    return $list;
}
function check_email_forgotpass($email) {
    $sql="SELECT * FROM customer WHERE email='$email'";
    $result = pdo_query_one($sql);

   return $result;
}
function sendMail($email, $username, $pass) { //index quenmk (user)
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
            //Server settings
         $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '2f9c2c334e5837';                     //SMTP username
        $mail->Password   = 'a92999d382bd1b';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->CharSet = 'UTF-8';

        //Recipients
        $mail->setFrom('testduanmau@example.com', 'DuAnMau');
        $mail->addAddress($email, $username);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Lấy lại mật khẩu';
        $mail->Body    = 'Mật khẩu của bạn là ' .$pass;

        $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>