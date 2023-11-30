<body>
    <div class="log__container">
        <form action="index.php?act=forgotpass" method="post" class="log__main">
            <?php if (isset($sendMailMess)) { ?>
            <h3 style="color: red"><?php echo $sendMailMess ?></h3>
            <?php } ?>
            <div class="log__box">
                <label for="" class="log__title">Email</label> <br>
                <input type="email" name="email" id="" class="log__input" required>
            </div>
            <input type="submit" name="forget_password" value="Gửi mật khẩu mới" class="log__sub"><br>
            <button type="button" class="regis__sub"><a href="index.php?act=login">Trở lại đăng nhập</a></button>
        </form>
    </div>
</body>