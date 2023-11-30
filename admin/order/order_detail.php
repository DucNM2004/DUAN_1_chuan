
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
            <div class="container__main-link">
                <a href="index.php?act=listorder" class="text-white" style="cursor: pointer;">
                    < Quay Lại </a>
            </div>
        </div>
        <div class="container__table">
            <table>
                <tr>
                    <td>#</td>
                    <td>Ảnh</td>
                    <td>Tên</td>
                    <td>Số lượng</td>
                    <td>giá</td>
                    <td>Tổng tiền</td>
                </tr>
                <!-- render danh sách sản phẩm -->
                <?php foreach ($order_detail as $key => $each) { ?>
                <tr>
                    <td><?= $key + 1; ?></td>
                    <td><img src="../products/<?= $each['picture']; ?>" alt="" class="img_item"></td>
                    <td><?= $each['name_product']; ?></td>
                    <td class="container__table-desc-parent"><?= $each['quantity']; ?></td>
                    <td>$ <?= $each['price']; ?>.00</td>
                    <td>$ <?= $each['total']; ?>.00</td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </main>
</main>

