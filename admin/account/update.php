
<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <a href="index.php?act=listaccount">
                <h3 class="app__title-title">Quay lại danh sách</h3>
                </a>
                <h3 class="app__title-title">Thông tin</h3>
                <div id="clock"></div>
            </div>
        </div>
    </div>
    <!-- container main -->
    <div class="row mt-3">
            <h2>Hồ sơ của tôi</h2>
            <div class="col-sm-12 col-md-6">
                <form action="index.php?act=update_acc" method="POST" enctype="multipart/form-data" >
                        <input type="text" name="ID" value="<?= $user['id'] ?>"  hidden>
                        <input type="text" name="current_phone_number" value="<?php echo $user['phone_number']?>" id="phone_number" hidden>
                        <input type="email" name="current_email" value="<?php echo $user['email']?>" id="email" hidden>
                        <input type="text" name="current_name" value="<?php echo $user['name_customer']?>" id="name" hidden>
                        <input type="text" name="current_address" value="<?php echo $user['address']?>" id="address" hidden>
                        <input type="text" name="current_pass" value="<?php echo $user['passWord']?>" id="pass" hidden>
                        <input type="text" name="current_picture" value="<?php echo $user['picture']?>" id="piture" hidden>
                    <div class="mb-3 fs-3">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                        <input class="form-control py-3 fs-3" maxlength="50" type="text" id="name_value" name="user_name"  value="<?php echo $user['name_customer']?>" >
                       
                    </div>
                    <div class="mb-3 fs-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control py-3 fs-3" maxlength="50" type="email" id="email_value" name="email" value="<?php echo $user['email']?>" >
                        
                    </div>
                    <div class="mb-3 fs-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input class="form-control py-3 fs-3" maxlength="9" type="text" id="phone_number_value" name="phoneNumber" value="<?php echo $user['phone_number']?>">
                        
                    </div>
                    <div class="mb-3 fs-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input class="form-control py-3 fs-3" type="text" placeholder="address" name="address" id="address_value"  value="<?php echo $user['address']?>" >
                        
                    </div>
                    <div class="mb-3 fs-3">
                        <label for="picture" class="form-label fs-3">Ảnh hiện tại</label>
                        <input type="hidden" name="picture-old" id="picture" value="<?= $_user['picture']?>">
                        <img src="../customer/<?= $user['picture']?>"  class="body__image img_item" />
                    </div>
                    <div class="mb-3 fs-3">
                        <label for="picture" class="form-label fs-3">Tải ảnh mới</label>
                        <input type="file" min="0" maxlength="50" class="form-control fs-3" id="picture"
                        name="new-picture">
                    </div>
                    <div class="mb-3 fs-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input class="form-control py-3 fs-3" type="password" placeholder="password" name="pass" id="password"  value="<?php echo $user['passWord']?>" >
                        
                    </div>
                    <button class="btn btn-danger" name="btn_save">Lưu thông tin</button>
                </form>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="text-center d-flex justify-content-center align-items-center" style="height: 100%;">
                <?php if ( $user['picture'] == null) { ?>
                    <img src="../customer/avatar-trang-facebook.jpg" alt="" style="height: 300px; width: 300px; object-fit: cover;" class="sidebar__admin-avatar">
                <?php } else { ?>
                    <img src="../customer/<?= $user['picture']; ?>" alt="" style="height: 300px; width: 300px; object-fit: cover;"
                    class="sidebar__admin-avatar">
                <?php } ?>
                        
                </div>
            </div>
        </div>
    </main>
<?php
    if(isset($_COOKIE['notice'])) {
        echo '<script>alert("'.$_COOKIE['notice'].'")</script>';
    }
?>