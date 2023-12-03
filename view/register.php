<body>
    <div class="regis__container">
        <form action="index.php?act=register" method="post" class="regis__main">
            <div class="regis__box">
                <label for="" class="regis__title">email</label> <br>
                <input type="email" name="email" id="" class="regis__input" required>
                <?php if(isset($error['email'])){ ?>
                        <h4 style="color: red;"><?= $error['email'] ?></h4>
                 <?php } ?>
            </div>
            <div class="regis__box">
                <label for="" class="regis__title">Tên đăng nhập</label> <br>
                <input type="text" name="name" id="" class="regis__input" required>
                <?php if(isset($error['user'])){ ?>
                        <h4 style="color: red;"><?= $error['user'] ?></h4>
                 <?php } ?>
            </div>
            <div class="regis__box">
                <label for="" class="regis__title">Địa chỉ</label> <br>
                <input type="text" name="address" id="" class="regis__input" required>
            </div>
            <div class="regis__box">
                <label for="" class="regis__title">Số điện thoại</label> <br>
                <input type="text" name="phone" id="" class="regis__input" required>
            </div>
            <div class="regis__box">
                <label for="" class="regis__title">Mật khẩu</label><br>
                <input type="password" name="pass" id="" class="regis__input" required>
            </div>
            <input type="submit" name="register" value="Đăng ký" class="regis__sub"><br>
            <?php if(isset($thongbao)){ ?>
            <h4 style="color:green;"><?= $thongbao ?></h4>
            <button type="button" class="regis__sub"><a href="index.php?act=login">Đăng nhập ngay</a></button>
            <?php } ?>
        </form>
        
    </div>
</body>