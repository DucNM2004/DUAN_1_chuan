<div class="order__container">
    <div class='order__btn'>
        <a href="index.php?act=info"><button>Quay Lại</button></a>
        <span>Thông Tin Hóa Đơn</span>
    </div>
    <div class="order_wrap-box table-responsive">
        <table >
            <thead>
                <tr>
                    <td>#</td>
                    <td>Ảnh</td>
                    <td>Tên</td>
                    <td>Số lượng</td>
                    <td>giá</td>
                    <td>Tổng tiền</td>
                </tr>
            </thead>
            <tbody>
                <?php $key=0;  foreach($order_detail as $od):  ?>
                    <tr>
                       <td><?= $key+1 ?></td>
                       <td><img src="products/<?= $od['picture'] ?>" alt=""></td>
                       <td><?= $od['name_product'] ?></td>
                       <td><?= $od['quantity'] ?></td>
                       <td>$<?= $od['price'] ?>.00</td>
                       <td>$<?= $od['total'] ?>.00</td>
                    </tr>
                    <?php $total_quantity = $od['quantity'];
                    $total_price = $od['total'];
                     ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="order__total">
        <h2>Tổng tiền thanh toán của <?= $total_quantity  ?> sản phẩm: $ <?= $total_price ?>.00</h2>
    </div>
</div>