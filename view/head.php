<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XOSS || Fashion</title>

    <!-- faviicon -->
    <link rel="icon" type="image/x-icon" href="./images/favicon.ico">

    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- gg font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- font icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css slick slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reponsive.css">
</head>

<body>

    <div class="main-wrapper">
        <!-- =========== header =========== -->
        <div class="header__container">
            <!-- header - top -->
            <div class="header__navbar">
                <!-- menu destop -->
                <div class="container header__navbar-desktop">
                    <div class="row">
                        <!-- language + current -->
                        <div class="col-sm-6 col-xs-4 header__top-lanuage-cur">
                            <!-- Header Language Currency -->
                            <ul class="heade__lan-cur">
                                <!-- Header Language -->
                                <li>
                                    <a class="header__link" href="#">
                                        <i class="icon fa-solid fa-earth-asia"></i>
                                        eng
                                        <i class="icon fa-solid fa-angle-down"></i>
                                    </a>
                                    <ul class="header__sub-menu">
                                        <li><a href="#">hoho</a></li>
                                        <li><a href="#">hihi</a></li>
                                        <li><a href="#">hhhhhh</a></li>
                                        <li><a href="#">german</a></li>
                                        <li><a href="#">spanish</a></li>
                                    </ul>
                                </li>
                                <!-- Header Currency -->
                                <li>
                                    <a class="header__link" href="#">
                                        <i class="icon fa-solid fa-dollar-sign"></i>
                                        usd
                                        <i class="icon fa-solid fa-angle-down"></i>
                                    </a>
                                    <ul class="header__sub-menu">
                                        <li><a href="#">usd</a></li>
                                        <li><a href="#">uero</a></li>
                                        <li><a href="#">taka</a></li>
                                        <li><a href="#">pound</a></li>
                                        <li><a href="#">rupi</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- menu -->
                        <div class="col-sm-6 col-xs-4 header__top-controll">
                            <ul class="header__top-menu-list">
                                <li class="header__top-menu-item">
                                   
                                    <?php if(isset($_SESSION['user'])){ ?>
                                        <a  class="header__top-menu-link">
                                       Xin chào <?=$_SESSION['user']; ?>
                                    </a>
                                    <?php } ?>
                                </li>
                                
                                <?php if(isset($_SESSION['user'])){ ?>
                                    <li class="header__top-menu-item">
                                    <a href="#" class="header__top-menu-link">
                                        Tài khoản của tôi
                                        <i class="icon fa-solid fa-angle-down"></i>
                                    </a>
                                    <ul class="header__sub-menu">
                                        <li><a href="index.php?act=cart">Giỏ hàng</a></li>
                                        <li><a href="index.php?act=info">Cá nhân</a></li>
                                        <?php if($_SESSION['role'] != 3){ ?>
                                            <li><a href="admin/index.php">Quản trị</a></li>
                                        <?php }?>
                                    </ul>
                                    </li>
                                    <li class="header__top-menu-item">
                                    <a href="index.php?act=logout" class="header__top-menu-link">
                                        Đăng xuất
                                        <i class="icon fa-solid fa-sign-out"></i>
                                    </a>
                                    </li>
                                <?php }else{ ?>
                                <li class="header__top-menu-item">
                                    <a href="#" class="header__top-menu-link">
                                        Đăng nhập
                                        <i class="icon fa-solid fa-angle-down"></i>
                                    </a>
                                    <div class="header__sub-menu login">
                                        <h5>Đăng nhập hoặc đăng ký</h5>
                                        <div class="header__log">
                                            <a href="index.php?act=login" class="header__log-btn btn-login">Đăng nhập</a>
                                            <h3>Hoặc</h3>
                                            <a href="index.php?act=register" class="header__log-btn btn-register">Đăng ký</a>
                                        </div>
                                    </div>
                                </li>
                                <?php }?>
                            </ul>
                            <ul class="header__top-menu-list cart">
                                <li class="header__top-menu-item">
                                    <a href="#" class="header__top-menu-link">
                                        <i class="fa-brands fa-opencart"></i>
                                    </a>
                                    <ul class="header__top-menu-list cart">
                                
                                    <ul class="header__sub-menu">
                                        <li>
                                            <a href="./cart.html" class="cart__item-menu-link">
                                                <img src="./images/mini-cart/1.jpg" class="cart__mini" alt="">
                                                <div class="cart__item-menu-list">
                                                    <h5 class="">Women’s winter dress</h5>
                                                    <span class="">1x$45.00</span>
                                                    <button class="cart__remove-btn">
                                                        <i class="icon fa-solid fa-trash"></i>
                                                    </button>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="./cart.html" class="cart__item-menu-link">
                                                <img src="./images/mini-cart/2.jpg" class="cart__mini" alt="">
                                                <div class="cart__item-menu-list">
                                                    <h5 class="">Full sleev women shirt</h5>
                                                    <span class="">1x$50.00</span>
                                                    <button class="cart__remove-btn">
                                                        <i class="icon fa-solid fa-trash"></i>
                                                    </button>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    </ul>
                                </li>
                            </ul>   
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <!-- header - bottom -->
            <div class="header__bottom">
                <div class="container">
                    <div class="row">
                        <!-- menu -->
                        <div class="header__menu-bottom">
                            <!-- logo -->
                            <a class="col-sm-2 logo__shop">
                                <img src="./images/logo-3.png" alt="" class="logo__shop-img">
                            </a>
                            <ul class="col-lg-8 header__menu-bottom-list">
                                <li><a class="header__menu-bottom-link" href="index.php">Trang chủ</a></li>
                                <li>
                                    <a class="header__menu-bottom-link" href="index.php?act=products">
                                        Sản phẩm
                                    </a>
                                </li>
                                
                            </ul>
                            <!-- search -->
                            <div class="col-sm-8 col-lg-2 header__search">
                                <form action="index.php?act=products" method="post" class="header__search-form">
                                    <input type="search" name="search" class="header__search-input"
                                        placeholder="Search ....">
                                    <button class="header__search-btn" type="submit" name="submit">
                                        <i class="icon fa-solid fa-search"></i>
                                    </button>
                                </form>
                            </div>

                            <!-- menu mobile tablet -->
                            <div class="col-sm-2 header__menu-responsive">
                                <div class="header__menu-responsive-btn">
                                    <i class="icon fa-solid fa-bars"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- menu mega click -->
        <div class="header__menu-responsive-list active">
            <div class="row">
                <div class="col-sm-12">
                    <div class="header__menu-responsive-item">
                        <a class="header__menu-responsive-link" href="index.php">Trang chủ</a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="header__menu-responsive-item">
                        <a class="header__menu-responsive-link" href="index.php?act=products">
                            Sản phẩm
                        </a>
                    </div>
                </div>
               
            </div>
        </div>