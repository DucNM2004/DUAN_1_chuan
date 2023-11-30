<?php
 session_start();
 include '../model/pdo.php';
 include "../model/products.php";
 include "../model/account.php";
 if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = $_POST['current-password'];
    $account = login_admin($email,$pass);
       
    if(is_array($account)){
       
        $_SESSION['user'] = $account['name_customer'];
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
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../layout admin/scss/main.css">
    <link rel="stylesheet" href="../layout admin/scss/content.css">
</head>

<body onload="time()">
    <div class="login__limit">
        <div class="login__container">
            <div class="login__wrapper">
                <div class="login__img">
                    <img src="../images/team.jpg" alt="">
                </div>

                <div class="login__form">
                    <p class="login__form-title">
                        ĐĂNG NHẬP HỆ THỐNG
                    </p>
                    <!-- đăng nhập tài khoản & password -->
                    <form action="" method="POST" class="validate-form">
                        <div class="validate-input">
                            <span><i class="fa-solid fa-user"></i></span>
                            <input type="email" placeholder="Email quản trị" name="email" id="username">
                        </div>
                        <div class="validate-input">
                            <span><i class="fa-solid fa-key"></i></span>
                            <input autocomplete="off" class="input100" type="text" placeholder="Mật khẩu"
                                name="current-password" id="password-field">
                            <span toggle="#password-field" class="bx fa-fw bx-hide field-icon click-eye"></span>
                        </div>

                        <!-- đăng nhập -->
                        <div class="validate-form-btn">
                            <input type="submit" name="submit" value="Đăng nhập" id="submit" onclick="validate()" />
                        </div>
                        <!-- /* quên mật khẩu */ -->
                        <div class="text-start mt-3">
                            <a href="" class="fs-5 text-black fw-normal">
                                Bạn quên mật khẩu?
                            </a>
                        </div>
                    </form>
                    </d>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
<script src="./js/time.js"></script>
<script src="js/chart.js"></script>

</html>