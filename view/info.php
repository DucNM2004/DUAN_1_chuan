 <!-- =========== info =========== -->
 <div class="info__container">
     <!-- Aside Info -->
     <aside class="info__aside">
         <div class="info__aside-wrap-box">
             <!-- head aside -->
             <div class="info__aside-header">
                 <div class="info__Avatar">
                     <img src="<?php if ($accountinfo['picture'] == "") {
                                    echo "customer/avatar-trang-facebook.jpg";
                                } else {
                                    echo "customer/" . $accountinfo['picture'];
                                } ?>" alt="">
                 </div>
                 <div class="info__Name-phone-number">
                     <h4><?= $accountinfo['name_customer'] ?></h4>
                     <span><?= $accountinfo['phone_number'] ?></span>
                 </div>
             </div>
             <!-- content aside -->
             <div class="info__aside-main">
                 <!-- List Option -->
                 <ul class="info__list-option">
                     <li class="active"><i class="fa-regular fa-id-badge"></i> Hồ Sơ</li>
                     <li><i class="fa-sharp fa-solid fa-money-check-dollar"></i> Ngân Hàng</li>
                     <li><i class="fa-solid fa-map-location-dot"></i> Địa Chỉ</li>
                     <li><i class="fa-solid fa-user-lock"></i> Đổi Mật Khẩu</li>
                     <li><i class="fa-solid fa-file-invoice-dollar"></i> Đơn Mua</li>
                     <li><i class="fa-sharp fa-solid fa-bell"></i> Thông báo</li>
                 </ul>
             </div>
         </div>
     </aside>
     <!-- Main Content Info -->
     <main class="info__main-content">
         <div class="info__main-wrap-box">
             <!-- Infomaition -->
             <div class="info__main-infomation">
                 <!-- Title -->
                 <h2>Hồ sơ của tôi</h2>
                 <h5>Quản lý thông tin hồ sơ để bảo mật tài khoản</h5>
                 <!-- Content -->
                 <div class="info__content-box">
                     <form action="index.php?act=info" method="post" enctype="multipart/form-data">
                         <!-- current phone_number -->
                         <input type="text" name="current_phone_number" value="<?= $accountinfo['phone_number'] ?>" id="phone_number" hidden>
                         <!-- curent email -->
                         <input type="email" name="current_email" value="<?= $accountinfo['email'] ?>" id="email" hidden>
                         <!-- curent name -->
                         <input type="text" name="current_name" value="<?= $accountinfo['name_customer'] ?>" id="name" hidden>
                         <!-- curent address -->
                         <input type="text" name="current_address" value="<?= $accountinfo['address'] ?>" id="address" hidden>
                         <table class="info__table-view-info">
                             <tr>
                                 <td>Tên đăng nhập</td>
                                 <td><input type="text" id="name_value" name="user_name" value="<?php echo $accountinfo['name_customer'] ?>" disabled> 
                                 <button id="change_name" type="button">Thay đổi</button></span></td>
                             </tr>
                             </tr>
                             <tr>
                                 <td>email</td>
                                 <td><input type="text" id="email_value" name="email" value="<?php echo $accountinfo['email'] ?>" disabled> 
                                 <button id="change_email" type="button">Thay đổi</button></span></td>
                             </tr>
                             <tr>
                                 <td>Số điện thoại</td>
                                 <td><input type="text" id="phone_number_value" name="phoneNumber" value="<?php echo $accountinfo['phone_number'] ?>" disabled> 
                                 <button id="change_phone_number" type="button">Thay đổi</button></span></td>
                             </tr>
                             <tr>
                                 <td>địa chỉ</td>
                                 <td><input type="text" id="address_value" name="address" value="<?php echo $accountinfo['address'] ?>" disabled> 
                                 <button id="change_address" type="button">Thay đổi</button></span></td>
                             </tr>
                         </table>
                         <div class="info__change-avatar">
                             <div class="info__view-avatar">
                                 <img src="<?php if ($accountinfo['picture'] == "") {
                                                echo "customer/avatar-trang-facebook.jpg";
                                            } else {
                                                echo "customer/" . $accountinfo['picture'];
                                            } ?>" alt="">
                                 <input type="text" name="current_picture" value="<?= $accountinfo['picture'] ?>" hidden>
                             </div>
                             <input name="avatar" type="file" accept=".jpg,.jpeg,.png" id="img_input">
                            <div class="info__image-preview" style="display: none;">
                                <p>Xem trước ảnh</p>
                                <div class="info__preview">
                                    <img src="" alt="" id="view_image">
                                </div>
                                <button type='button' id='cancel'>Hủy Lựa Chọn</button>
                            </div>
                            <p>Giới hạn dung lượng chỉ 1MB <br> định dạng jpg, jpeg, png</p>
                         </div>
                         <button class="info_btn-save" name="btn_save">Lưu thông tin</button>
                     </form>
                 </div>
             </div>
             <!-- Bank -->
             <div class="info__main-bank" style="display:none;">
                 <!-- Title -->
                 <h2>Thẻ Tín Dụng/Ghi Nợ</h2>
                 <a href="#"><button class="info_btn-save"><i class="fa-regular fa-square-plus"></i> Thêm thẻ mới</button></a>
                 <!-- Content -->
                 <h1 align="center">Bạn chưa liên kết tới ngân hàng nào</h1>
             </div>
             <!-- Address -->
             <div class="info__main-address" style="display:none;">
                 <!-- Title -->
                 <h2>Địa chỉ của tôi</h2>
                 <!-- Content -->
                 <div class="info__address-wrap-box">
                     <h4><?= $accountinfo['name_customer'] ?></h4> <span>+ <?= $accountinfo['phone_number'] ?></span>
                     <p>Địa chỉ: <span><?= $accountinfo['address'] ?></span></p>
                 </div>
             </div>
             <!-- Change Pass -->
             <div class="info__main-change-pass" style="display:none;">
                 <!-- Title -->
                 <h2>Đổi mật khẩu</h2>
                 <h5>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</h4>
                     <!-- Content -->
                     <form action="index.php?act=change_pass" class='info__form-pass' method="POST">
                         <label for="passWord">Mật khẩu của bạn</label> <br>
                         <input type="password" name="passWord" placeholder="Enter Your Password" required>
                         <br>
                         <label for="new-password">Mật khẩu mới</label> <br>
                         <input type="password" name="new-password" placeholder="Enter New Password" required>
                         <br>
                         <label for="rePassWord">Nhập lại mật khẩu mới</label> <br>
                         <input type="password" name="rePassWord" placeholder="Repeat Password" required>
                         <br>
                         <button type="submit" class="info_btn-save" name="btn-change">Đổi mật khẩu</button>
                     </form>
             </div>
             <!-- Bill -->
            <div class="info__main-bill" style="display:none;">          
                <div class="info__bill-list" style="<?php if(count($order) > 3) { echo 'overflow: scroll;'; }?>">
                    <table>
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Ngày đặt</td>
                                <td>Trạng thái</td>
                                <td>Địa chỉ/Số điện thoại</td>
                                <td>Hoạt động</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($order as $o): ?>
                           <tr>
                                <td><?= $o['id'] ?></td>
                                <td><?= $o['order_date'] ?></td>
                                <td>
                                <?php if($o['order_status'] == 1) { 
                                            echo 'Đang chờ xác nhận';
                                        } else if($o['order_status'] == 2) {
                                            echo 'Đơn hàng đã được xác nhận';
                                        } else {
                                            echo 'Đơn hàng đã bị hủy bởi người bán';
                                        }?>
                                </td>
                                <td>
                                <?php echo 'địa chỉ: '.$o['address'].' || sđt: '.$o['phone_number'] ?> 
                                </td>
                                <td>
                                <?php if($o['order_status']  == 2) {?>
                                    <a href="index.php?act=cancel_bill&id_order=<?= $o['id'] ?>" onclick="return confirm('Bạn có muốn hủy không')"><button>Hủy Đơn Hàng</button></a>
                                <?php  }elseif($o['order_status'] == 3) {?>
                                            <a href="index.php?act=delete_bill&id_order=<?= $o['id'] ?>"><button>Xóa Bill</button></a>
                                        <?php  } else { ?>
                                            <a href="index.php?act=cancel_bill&id_order=<?= $o['id'] ?>" onclick="return confirm('Bạn có muốn hủy không')"><button>Hủy Đơn Hàng</button></a>
                                        <?php } ?>
                                        <a href="index.php?act=order_detail&id_order=<?= $o['id'] ?>" ><button>Xem chi tiết</button></a>
                                </td>
                           </tr>
                           <?php endforeach ?>
                        </tbody>
                    </table>
                </div>  
            </div>
             <div class="info__main-notification" style="display:none;">
                <?php if(isset($_COOKIE['notice'])){
                    echo '<script>alert("'.$_COOKIE['notice'].'")</script>';
                } ?>
             </div>
         </div>
     </main>
 </div>
