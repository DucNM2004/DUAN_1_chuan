
<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Quản lý danh mục sản phẩm</h3>
                <div id="clock"></div>
            </div>
        </div>
    </div>

    <!-- container main -->
    <main class="container__main">
        <div class="container__main-handler">
            <div class="container__main-link">
                <a data-bs-toggle="modal" data-bs-target="#openModal" class="text-white">
                    <i class="fa-solid fa-plus"></i>
                    Tạo danh mục mới
                </a>
            </div>
            <div class="container__main-search">
                <form action="index.php?act=listcategory" method="post">
                    <input type="search" name="search" id="" placeholder="Tìm kiếm danh mục" value="">
                    <button type="submit" name="submit" hidden>Tim</button>
                </form>
            </div>
        </div>
        <!-- mobile -->
        <div class="container__main-handler-mobile">
            <button data-bs-toggle="modal" data-bs-target="#openModal" class="btn btn-danger fs-4" name="submit">
                <i class="fa-solid fa-plus"></i>
                Thêm sản
                phẩm</button>
            <!-- <div class="container__main-search">
                <form action="">
                    <input type="search" name="search" id="" placeholder="Tìm kiếm danh mục sản phẩm" value="">
                </form>
            </div> -->
        </div>
        <div class="container__table">
            <table>
                <tr>
                    <th>Tên loại sản phẩm</th>
                    <th>Miêu tả</th>
                    <th>Loại danh mục</th>
                    <th>Tính năng</th>
                </tr>
                <!-- render danh sách sản phẩm -->
                <?php foreach ($category_type as $each) { if($each['status']==0){?>
                <tr>
                    <td><?= $each['title_category']; ?></td>
                    <td class="container__table-desc-parent">
                        <div class="container__table-desc">
                            <p><?= $each['description']; ?></p>
                        </div>
                    </td>
                    <td><?= $each['category_type_name']; ?></td>
                    <td>
                        <a href="index.php?act=update_cate&id=<?= $each['id'] ?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="index.php?act=delete_category&id=<?= $each['id'] ?>">
                            <i onclick="return confirm('Bạn có chắc muốn xóa không')" class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
                <?php } } ?>
            </table>
        </div>
        <?php if(isset($_COOKIE['notice'])){
                    echo '<script>alert("'.$_COOKIE['notice'].'")</script>';
                } ?>
        
        <!-- pagination -->
        <?php if(empty($search)){ ?>
        <nav aria-label="Page navigation">
            <ul class="pagination pb-3 d-flex justify-content-center">
            <?php for ($num = 1; $num <= $totalpage; $num++) { ?>
                <li class="page-item">
                    <?php if($num != $currentpage){ ?>
                    <a class="page-link fs-3 px-3 text-danger mx-1" href="index.php?act=listcategory&page=<?php echo $num; ?>"><?php echo $num ?></a>
                    <?php }else{ ?>
                    <a class="page-link fs-3 px-3 text-danger mx-1 active" style="" href="index.php?act=listcategory&page=<?php echo $num; ?>"><?= $num ?></a>
                    <?php } ?> 
                </li>
                <?php } ?>
            </ul>
        </nav>
        <?php } ?>
    </main>
</main>

<!-- Modal -->
<div class="modal fade modal-xl" id="openModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="exampleModalLabel">Thêm danh mục sản phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="index.php?act=add_category" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label fs-3">Tên danh mục</label>
                        <input type="text" class="form-control fs-3" name="name-product-category"
                            placeholder="Tên danh mục" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fs-3">Mô tả danh mục</label>
                        <textarea class="form-control fs-3" id="" rows="3" name="desc-product-category"
                            placeholder="Mô tả danh mục" required></textarea>
                    </div>
                    <select class="form-select fs-3" aria-label="Default select example" name="id_product_type">
                        <!-- render ra loại sản phẩm -->
                        <?php foreach ($category_type as $each) { ?>
                        <option value="<?= $each['category_type_id'] ?>"><?= $each['category_type_name']?></option>
                        <?php } ?>
                        <!-- end -->
                    </select>
                    <!-- <button id="btnSubmit" name="submit" class="btn btn-primary">oke</button> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-danger fs-4" data-bs-target="submit-form"
                            name="submit">Thêm loại hàng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>