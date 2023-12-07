

<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Quản lý đơn hàng</h3>
                <div id="clock"></div>
            </div>
        </div>
    </div>

    <!-- container main -->
    <main class="container__main">
    <div class="container__main-handler">
                <div class="container__main-search">
                    <form action="index.php?act=listorder" method="post">
                        <select style="height: 40px; width:180px; border-radius: 5px;" name="search" id="">
                            <option value="0" selected>Lọc theo trạng thái đơn hàng</option>
                            <option value="1">Chờ xác nhận</option>
                            <option value="2">Đã xác nhận</option>
                            <option value="3">Admin hủy hàng</option>
                            <option value="4">Đơn hàng bị hủy bởi người dùng</option>
                        </select>
                        <button  style="height: 40px; width:80px; border-radius: 5px;" type="submit" name="submit" >Tim</button>
                    </form>
                </div>
            </div>
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
                        <?php if ($each['order_status'] == 3) { ?>
                            <h3><?php echo 'Đã hủy đơn hàng' ?></h3>
                        <?php }?>
                        <?php if ($each['order_status'] == 4) { ?>
                            <h3><?php echo 'Đơn hàng đã bị hủy bởi người dùng' ?></h3>
                        <?php }?>
                        <?php if ($each['order_status'] == 2) { ?>
                        <h3><?php echo 'Đã xác nhận đơn hàng' ?></h3>
                        <?php } else if ($each['order_status'] == 1) { ?>
                        <h3><?php echo 'Đang chờ xác nhận' ?></h3>
                        <a
                            href="index.php?act=confirm_order&id_order=<?= $each['id'] ?>">
                            Xác nhận
                        </a>
                        </br>
                        <?php } ?>
                        <?php if ( $each['order_status'] == 1) { ?>
                        <a href="index.php?act=cancel_order&id_order=<?= $each['id'] ?>">
                            Hủy đơn hàng
                        </a>
                        <?php } ?>
                    </td>
                    <td>
                        <a href="index.php?act=order_detail&id_order=<?= $each['id']; ?>" title="Xem chi tiết đơn hàng">
                            <i class="fa-solid fa-clipboard fs-1"></i>
                        </a>
                        <!-- <a href="index.php?act=delete_order&id_order=<?= $each['id']; ?>" title="Xóa đơn hàng" onclick="return confirm('Bạn có chắc chắn muốn xóa')">
                            <i class="fa-solid fa-trash-can fs-1"></i>
                        </a> -->
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <?php if(empty($search)){ ?>
        <nav aria-label="Page navigation">
            <ul class="pagination pb-3 d-flex justify-content-center">
            <?php for ($num = 1; $num <= $totalpage; $num++) { ?>
                <li class="page-item">
                    <?php if($num != $currentpage){ ?>
                    <a class="page-link fs-3 px-3 text-danger mx-1" href="index.php?act=listorder&page=<?php echo $num; ?>"><?php echo $num ?></a>
                    <?php }else{ ?>
                    <a class="page-link fs-3 px-3 text-danger mx-1 active" style="" href="index.php?act=listorder&page=<?php echo $num; ?>"><?= $num ?></a>
                    <?php } ?> 
                </li>
                <?php } ?>
            </ul>
        </nav>
        <?php } ?>
    </main>
</main>
<?php if(isset($_COOKIE['notice'])){
    echo '<script>alert("'.$_COOKIE['notice'].'")</script>';
 } ?>