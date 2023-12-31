<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <a href="index.php?act=listproduct">
                <h3 class="app__title-title">Quay lại danh sách</h3>
                </a>
                <h3 class="app__title-title">Thêm sản phẩm</h3>
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
                        <h1 class="modal-title fs-1" id="exampleModalLabel">Thêm sản phẩm</h1>
                    </div>
                    <div class="modal-body">
                        <form action="index.php?act=add" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label fs-3">Tên sản phẩm</label>
                                <input type="text" class="form-control fs-3" id="name"
                                    placeholder="Tên sản phẩm" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label fs-3">Giá sản phẩm</label>
                                <input type="number" min="1" class="form-control fs-3" id="price" placeholder="Giá sản phẩm"
                                    name="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="saleOff" class="form-label fs-3">Giảm giá sản phẩm</label>
                                <input type="number" min="0" class="form-control fs-3" id="sale"
                                    placeholder="Giảm giá sản phẩm" name="saleOff" required>
                            </div>
                            <div class="mb-3">
                                <label for="picture" class="form-label fs-3">Hình ảnh sản phẩm</label>
                                <input class="form-control fs-3" type="file" id="picture" name="picture" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label fs-3">Mô tả sản phẩm</label>
                                <textarea name="description" placeholder="Mô tả sản phẩm" class="form-control fs-3"
                                    id="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label fs-3">Số lượng sản phẩm</label>
                                <input name="quantity" type="number" min="1" placeholder="Số lượng sản phẩm" class="form-control fs-3" id="quantity" required/>
                            </div>
                            <div class="mb-3">
                                <label for="id_category" class="form-label fs-3">Loại sản phẩm</label>

                                <select name="id_category" class="form-select fs-3"
                                    aria-label="Default select example" id="product_categories">
                                    <option value="">Để trong kho</option>
                                    <?php foreach ($category_type as $each) { ?>
                                        <option value="<?php echo $each['id']; ?>">
                                            <?php echo $each['title_category']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-danger fs-4" data-bs-target="submit-form"
                            name="submit">Thêm sản phẩm</button>
                            </div>
                        </form>
                        <?php if(isset($_COOKIE['notice'])){
                    echo '<script>alert("'.$_COOKIE['notice'].'")</script>';
                    } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</main>