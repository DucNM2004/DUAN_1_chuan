<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Cập nhật kho hàng</h3>
                <div id="clock"></div>
            </div>
        </div>
    </div>

    <!-- container main -->
    <main class="container__main">
        <div class="" id="openModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog pb-3">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-1" id="exampleModalLabel">Sửa loại sản phẩm</h1>
                    </div>
                    <div class="modal-body">
                        <form action="index.php?act=update_var" method="post">
                            <input type="hidden" class="form-control fs-3" name="id-var" value="<?= $item['id']; ?>">
                            <input type="hidden" class="form-control fs-3" name="id-product" value="<?= $item['id_pro']; ?>">
                            <input type="hidden" class="form-control fs-3" name="id-size" value="<?= $item['id_size']; ?>">
                            <input type="hidden" class="form-control fs-3" name="name_product" value="<?= $item['name_pro']; ?>">
                            <input type="hidden" class="form-control fs-3" name="name_size"  value="<?= $item['name_size']; ?>" >
                            <input type="hidden" class="form-control fs-3" name="old_quantity"  value="<?= $item['quantity_size']; ?>" >
                            <div class="mb-3">
                                <label for="" class="form-label fs-3">Tên sản phẩm</label>
                                <input type="text" class="form-control fs-3" name="" value="<?= $item['name_pro']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label fs-3">Loại size</label>
                                <input type="text" class="form-control fs-3" name=""  value="<?= $item['name_size']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label fs-3">Giá</label>
                                <input type="number" min="10" class="form-control fs-3" name="price" required value="<?= $item['price']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label fs-3">Số lượng</label>
                                <input type="number" min="1" class="form-control fs-3" name="quantity_size" required value="<?= $item['quantity_size']; ?>">
                                
                            </div>
                            <?php if(isset($error['price'])){ ?>
                                <h4><?= $error['price'] ?></h4>
                            <?php } ?>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary fs-4"
                                    data-bs-dismiss="modal"><a style="color:white;" href="index.php?act=listvariant">Đóng</a></button>
                                <button type="submit" class="btn btn-danger fs-4" data-bs-target="submit-form"
                                    name="submit">Sửa danh mục sản
                                    phẩm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</main>
<?php
    if(isset($_COOKIE['notice'])) {
        echo '<script>alert("'.$_COOKIE['notice'].'")</script>';
    }
?>