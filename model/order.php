<?php 
function getOrderByIdCustomer($id) {
    $sql = "SELECT orders.id, id_customer, order_status,orders.order_address as address, orders.order_phone as phone_number,order_date, orders.total, id_order, sum(order_detail.quantity) as 'total_quantity' 
    FROM orders join customer on orders.id_customer = customer.id join order_detail on orders.id = order_detail.id_order 
    WHERE order_status IN(1,2) AND id_customer = $id GROUP BY orders.id;"; 
    $list = pdo_query($sql);
    return $list; 
}
function getOrdersuccessByIdCustomer($id) {
    $sql = "SELECT orders.id, id_customer, order_status,orders.order_address as address, orders.order_phone as phone_number,order_date, orders.total, id_order, sum(order_detail.quantity) as 'total_quantity' 
    FROM orders join customer on orders.id_customer = customer.id join order_detail on orders.id = order_detail.id_order 
    GROUP by id_order having id_customer = $id and order_status = 5"; 
    $list = pdo_query($sql);
    return $list; 
}
function getOrderfailByIdCustomer($id) {
    $sql = "SELECT orders.id, id_customer, order_status,orders.order_address as address, orders.order_phone as phone_number,order_date, orders.total, id_order, sum(order_detail.quantity) as 'total_quantity' 
    FROM orders join customer on orders.id_customer = customer.id join order_detail on orders.id = order_detail.id_order 
     WHERE order_status IN(3,4) AND id_customer = $id GROUP BY orders.id;"; 
    $list = pdo_query($sql);
    return $list; 
}
function getOrderDetailById($id){
    $sql = "SELECT order_date, orders.total as 'total_price', idProduct,order_detail.total,  product_name as 'name_product', product_picture as 'picture', order_detail.price, order_detail.quantity 
    FROM orders join order_detail on orders.id = order_detail.id_order where orders.id = $id";
    $list = pdo_query($sql);
    return $list;
}

function delete_order($id){
    $sql = "delete from orders where id = $id";
    pdo_execute($sql);
}
function delete_order_detail($id){
    $sql = "delete from order_detail where id_order = $id";
    pdo_execute($sql);
}
function getOrder($itemperpage,$offset,$search){
    $sql = "SELECT orders.id, name_customer ,customer.id as 'customer_id', email, order_date, orders.order_address as address, orders.order_phone as phone_number, orders.total, id_order, sum(order_detail.quantity) 
    as 'total_quantity', order_status FROM orders join customer on orders.id_customer = customer.id 
    join order_detail on orders.id = order_detail.id_order where orders.order_status <> 5 ";
   if($search != ""){
    $sql .= " AND orders.order_status = '$search' GROUP BY orders.id";
    }
    else{
        $sql .= "";
    }
   if($itemperpage>0 && $offset>=0 && $search ==""){
    $sql .= "GROUP BY orders.id ORDER BY orders.order_status ASC LIMIT $itemperpage OFFSET $offset";
    }
    $list = pdo_query($sql);
    return $list;
}
function count_order3(){
    $sql = "SELECT count(id) as soluong from orders where orders.order_status <> 5";
    $list = pdo_query_one($sql);
    return $list;
}
function count_order4(){
    $sql = "SELECT count(id) as soluong from orders where orders.order_status = 5";
    $list = pdo_query_one($sql);
    return $list;
}
function getOrdersucess($itemperpage,$offset){
    $sql = "SELECT orders.id, name_customer ,customer.id as 'customer_id', email, order_date, orders.order_address as address, orders.order_phone as phone_number, orders.total, id_order, sum(order_detail.quantity) 
    as 'total_quantity', order_status FROM orders join customer on orders.id_customer = customer.id 
    join order_detail on orders.id = order_detail.id_order where orders.order_status = 5 GROUP by id_order ORDER BY orders.id DESC ";
   if($itemperpage>0 && $offset>=0){
    $sql .= "LIMIT $itemperpage OFFSET $offset";
    }
    $list = pdo_query($sql);
    return $list;
}
function confirm_order($id){
    $sql = "UPDATE orders SET order_status = 2 where id = $id";
    pdo_execute($sql);
}
function cancel_order($id){
    $sql = "UPDATE orders SET order_status = 3 where id = $id";
    pdo_execute($sql);
}
function re_confirm_order($id){
    $sql = "UPDATE orders SET order_status = 1 where id = $id";
    pdo_execute($sql);
}
function user_cancel_order($id){
    $sql = "UPDATE orders SET order_status = 4 where id = $id";
    pdo_execute($sql);
}
function getEmailbyID($id){
    $sql = "SELECT customer.email as email, customer.name_customer  FROM orders inner join customer on orders.id_customer = customer.id where orders.id = $id";
    $list = pdo_query_one($sql);
    return $list;
}
function check_email_order($email) {
    $sql="SELECT * FROM customer WHERE email='$email'";
    $result = pdo_query_one($sql);
   return $result;
}
function sendMailorder($email, $username,$list_order_detail) { //index quenmk (user)
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
        $mail->Subject = 'Thông báo đặt hàng thành công!';
        $mail->    Body = 'hihi';
        $mail->    Body .= '<p>Xin chào, ' . $username . '!</p>';
        $mail->    Body .= '<hr/>';
        $mail->    Body .= '<h2>THÔNG TIN ĐƠN HÀNG - DÀNH CHO NGƯỜI MUA</h2>';
        $mail->    Body .= '<table>';
        $mail->    Body .= '<thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Ngày đặt hàng</th>
                                </tr>
                            </thead>';
                    foreach ($list_order_detail as $each) {
                        $date = date_create($each['order_date']);
                        $date = date('d/m/Y');
                        $mail-> Body .= "<tr>
                                            <td center>" . $each['name_product'] . "</td>
                                            <td center>" . $each['price'] . ".00</td>
                                            <td center>" . $each['quantity'] . "</td>
                                            <td center>" . $date . "</td>
                                        </tr>";
                    }
                    $mail->            Body .= '</table>';
                    $mail->            Body .= '<p>Cảm ơn bạn đã đặt hàng tại XOSS Shop!</p>';
                               

                    $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>