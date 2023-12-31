<div class="cart__container">
    <div class="cart__menu cart__page-breadcrumb bg-off-white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="cart__breadcrumbs">
                        <li><a href="?url=home">Trang chủ</a></li>
                        <li><span>Giỏ hàng</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart__Page -->
    <div class="cart__page bg-off-white padding-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table cart__table text-center">
                            <thead>
                                <tr>
                                    <th class="number">#</th>
                                    <th class="image">Hình ảnh</th>
                                    <th class="name">Tên sản phẩm</th>
                                    <th class="qty">Số lượng</th>
                                    <th class="price">Size</th>
                                    <th class="price">Giá</th>
                                    <th class="total">Tổng</th>
                                    <th class="remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($_SESSION['carts'])) { ?>
                                <?php $i = 1;
                                    $results = 0;
                                    foreach ($_SESSION['carts'] as $key => $value) : ?>
                                <tr>
                                    <td><span class="cart__number"><?php echo $i++; ?></span></td>
                                    <td><a href="#" class="cart__pro-image"><img
                                                src="products/<?php echo $value['picture'] ?>"
                                                alt="" /></a></td>
                                    <td><a href="#" class="cart__pro-title"><?php echo $value['name'] ?></a></td>
                                    <td>
                                        <div class="cart__pro-qua">
                                            <div class="cart__product-wrap-quantity">
                                                <!-- Input Quantity -->
                                                <input type="text" value="<?php echo $value['quantity'] ?>"
                                                    name="quantity" class="cart_product-input-plus-minus"
                                                    id="<?php echo $value['max_quantity'] ?>">

                                                <!-- Increase -->
                                                <span class="cart__product-inc btnqty">
                                                    <a
                                                        href="index.php?act=change_quantity&id_product=<?php echo $value['id'] ?>&set=incre"><i
                                                            class="fa-solid fa-chevron-up"></i></a>
                                                </span>

                                                <!-- Decrease -->
                                                <span class="cart__product-dec btnqty">
                                                    <a
                                                        href="index.php?act=change_quantity&id_product=<?php echo $value['id'] ?>&set=decre"><i
                                                            class="fa-solid fa-chevron-down"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="cart__pro-price"> <?php echo $value['size'] ?></p>
                                    </td>
                                    <td>
                                        <p class="cart__pro-price">$ <?php echo $value['price'] ?>.00</p>
                                    </td>
                                    <td>
                                        <p class="cart__pro-total">$
                                            <?php $total = $value['price'] * $value['quantity'];
                                                    echo $total; ?>.00</p>
                                    </td>
                                    <td><a href="index.php?act=delete_cart&id=<?php echo $value['id'] ?>"><button
                                                class="cart__pro-remove" onclick="return confirm('Bạn có chắc muốn xóa không')">Xóa</button></a>
                                    </td>
                                </tr>
                                <?php $results = $results + $total ?>
                                <?php endforeach ?>
                                <?php } else { ?>
                                <tr align='center'>
                                    <td style='padding: 40px 0;' colspan="7">
                                        <h2>Giỏ hàng trống</h2>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-xs-12 cart__actions cart__button-cuppon">
                            <div class="cart__action float-left">
                                <a href="index.php?act=products" class="button color-hover">Tiếp tục mua</a>
                            </div>
                            <div class="cart__cuppon-wrap float-right">
                                <h4>Voucher</h4>
                                <p>Nhận voucher nếu bạn có</p>
                                <form action="#" class="cart__cuppon-form ">
                                    <input type="text" />
                                    <button class="button color-hover">apply coupon</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 cart__checkout-process text-right">
                            <div class="wrap">
                                <p><span>Tổng tiền:</span><?php if (isset($results)) { ?><span>$
                                        <?php echo $results ?>.00</span><?php } ?></p>
                                <!-- <h4><span>Grand total</span><span>$190.98</span></h4> -->
                                <form action="index.php?act=order" method="POST"
                                    onsubmit="return confirm('Bạn có chắc chắn đặt hàng!!')">
                                    <div class="cart__cuppon-wrap float-right">
                                        <h4>Giao hàng</h4>
                                        <p>Nhập địa chỉ giao hàng mới nếu bạn khôgn muốn sử dụng địa chỉ hiện tại</p>
                                        <div class="cart__cuppon-form ">
                                        <input type="text" name="results" value="<?= $results ?>" hidden>
                                        <input type="text" name="address_order" placeholder="Nhập địa chỉ giao hàng khác" >
                                        <input type="text" name="phone_order" maxlength="10" placeholder="Nhập số điện thoại khác"  >
                                        </div>
                                    </div>
                                    <button name="btn_create" class="button color-hover">Thanh toán</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_COOKIE['notice'])) {
    echo '<script>alert("' . $_COOKIE['notice'] . '")</script>';
}
?>

