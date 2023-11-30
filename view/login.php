<body>
    <div class="log__container">
        <form action="index.php?act=login" method="post" class="log__main">
            <div class="log__box">
                <label for="" class="log__title">Tên đăng nhập</label> <br>
                <input type="text" name="name" id="" class="log__input" required>
            </div>
            <div class="log__box">
                <label for="" class="log__title">Mật khẩu</label><br>
                <input type="password" name="pass" id="" class="log__input" required>
            </div>
            <?php if(isset($erros) && $erros != ""){ ?>
                <div class="log__title"> <?= $erros ?></div>
            <?php } ?>
            <input type="submit" name="signin" value="Đăng nhập" class="log__sub"><br>
            <div class="controll">
                <a href="index.php?act=register" class="log__a">
                    <p>Đăng ký</p>
                </a>
                <a href="index.php?act=forgotpass" class="log__a">
                    <p>Quên mật khẩu?</p>
                </a>
            </div>
        </form>
    </div>
</body>