<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XOSS || Admin</title>

    <!-- faviicon -->
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../layout admin/scss/main.css">
    <link rel="stylesheet" href="../layout admin/scss/content.css">
</head>

<body onload="time()">
    <!-- header -->
    <header class="header">
        <div class="header__logout">
            <a href="../index.php">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </div>
        <i class="icon fa-solid fa-bars"></i>
    </header>

    <div class="sidebar__mobile-container active icon">
        <i class="fa-solid fa-xmark icon"></i>
    </div>
    <!-- aside mobile -->
    <div class="sidebar__mobile active">
        <!-- admin -->
        <div class="sidebar__admin">
            <img src="../customer/<?= $_SESSION['picture'] ?>" alt=""
                class="sidebar__admin-avatar">
            <div class="sidebar__admin-body">
                <h3><?= $_SESSION['user'] ?></h3>
                <p>Chào mừng bạn đã quay trở lại!</p>
            </div>
        </div>
        <!-- content -->
        <aside class="sidebar__menu">
            <ul class="sidebar__menu-list">
                <li>
                    <a href="" class="sidebar__menu-link">
                        <i class="fa-brands fa-microsoft"></i>
                        Bảng điều khiển
                    </a>
                </li>
                <li>
                    <a href="index.php?act=dstk" class="sidebar__menu-link">
                        <i class="fa-solid fa-list-check"></i>
                        Quản lý sản phẩm
                    </a>
                </li>
                <li>
                    <a href="" class="sidebar__menu-link">
                        <i class="fa-solid fa-address-card"></i>
                        Quản lý user
                    </a>
                </li>
                <li>
                    <a href="" class="sidebar__menu-link">
                        <i class="fa-solid fa-comments-dollar"></i>
                        Quản lý bình luận
                    </a>
                </li>
            </ul>
        </aside>
    </div>

    <!-- aside -->
    <div class="container-fluid sidebar">
        <!-- admin -->
        <div class="sidebar__admin">
            <img src="../customer/<?php echo $_SESSION['picture'] ?>" alt=""
                class="sidebar__admin-avatar">
            <div class="sidebar__admin-body">
                <h3><?= $_SESSION['user'] ?></h3>
                <p>Chào mừng bạn đã quay trở lại!</p>
            </div>
        </div>

        <!-- content -->
        <aside class="sidebar__menu">
            <ul class="sidebar__menu-list">
                <li>
                    <a href="index.php" class="sidebar__menu-link">
                        <i class="fa-brands fa-microsoft"></i>
                        Bảng điều khiển
                    </a>
                </li>
                <li>
                    <a href="index.php?act=listproduct" class="sidebar__menu-link">
                        <i class="fa-solid fa-list-check"></i>
                        Quản lý sản phẩm
                    </a>
                </li>
                <li>
                    <a href="index.php?act=dsdm" class="sidebar__menu-link">
                        <i class="fa-solid fa-list-check"></i>
                        Quản lý danh mục
                    </a>
                </li>
                <li>
                    <a href="index.php?act=dstk"class="sidebar__menu-link">
                        <i class="fa-solid fa-address-card"></i>
                        Quản lý user
                    </a>
                </li>
                <li>
                    <a href="index.php?act=dsdn" class="sidebar__menu-link">
                        <i class="fa-solid fa-comments-dollar"></i>
                        Quản lý bình luận
                    </a>
                </li>
            </ul>
        </aside>
    </div>
