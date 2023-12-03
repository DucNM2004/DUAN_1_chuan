

<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Đơn hàng đã được gian thành công</h3>
                <div id="clock"></div>
            </div>
        </div>
    </div>

    <!-- container main -->
    <main class="container__main">
        <div class="container__table">
            <table>
                <tr>
                    <th>Thời gian đặt</th>
                    <th>Thông tin người nhận</th>
                    <th>Địa chỉ/Sđt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng Thái</th>
                    <th>Tính năng</th>
                </tr>
                <!-- render danh sách sản phẩm -->
                <?php foreach ($orders as $each) { ?>
                <tr>
                    <td><?= $each['order_date']; ?></td>
                    <td><?= $each['name_customer']; ?></td>
                    <td class="container__table-desc-parent">
                        <div class="container__table-desc">
                            <p>email: <?= $each['email']; ?></p>
                            <p>địa chỉ:<?= $each['address'] ?> || sđt:<?= $each['phone_number'] ?></p>
                        </div>
                    </td>
                    <td>$ <?= $each['total']; ?>.00</td>
                    <td style="font-weight: bold;">
                        <h3><?php echo 'Đã giao hàng thành công' ?></h3>
                    </td>
                    <td>
                        <a href="index.php?act=detail_success&id_order=<?= $each['id']; ?>" title="Xem chi tiết đơn hàng">
                            <i class="fa-solid fa-clipboard fs-1"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <nav aria-label="Page navigation">
            <ul class="pagination pb-3 d-flex justify-content-center">
            <?php for ($num = 1; $num <= $totalpage; $num++) { ?>
                <li class="page-item">
                    <?php if($num != $currentpage){ ?>
                    <a class="page-link fs-3 px-3 text-danger mx-1" href="index.php?act=listordersucess&page=<?php echo $num; ?>"><?php echo $num ?></a>
                    <?php }else{ ?>
                    <a class="page-link fs-3 px-3 text-danger mx-1 active" style="" href="index.php?act=listordersucess&page=<?php echo $num; ?>"><?= $num ?></a>
                    <?php } ?> 
                </li>
                <?php } ?>
            </ul>
        </nav>
    </main>
</main>
<?php if(isset($_COOKIE['notice'])){
    echo '<script>alert("'.$_COOKIE['notice'].'")</script>';
 } ?>