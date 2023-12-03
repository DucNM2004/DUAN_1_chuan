
<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Quản lý kho hàng</h3>
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
                    Thêm mới kho hàng
                </a>
            </div>
            <div class="container__main-search">
                <form action="index.php?act=listvariant" method="post">
                    <input type="search" name="search" id="" placeholder="Tìm kiếm danh mục" value="">
                    <button type="submit" name="submit" hidden>Tim</button>
                </form>
            </div>
        </div>
        <!-- mobile -->
        <div class="container__main-handler-mobile">
            <button data-bs-toggle="modal" data-bs-target="#openModal" class="btn btn-danger fs-4" name="submit">
                <i class="fa-solid fa-plus"></i>
                </button>
            <!-- <div class="container__main-search">
                <form action="">
                    <input type="search" name="search" id="" placeholder="Tìm kiếm danh mục sản phẩm" value="">
                </form>
            </div> -->
        </div>
        <div class="container__table">
            <table>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Id sản phẩm</th>
                    <th>Loại Size</th>
                    <th>Giá loại Size</th>
                    <th>Số lượng loại size</th>
                    <th>Chức năng</th>
                </tr>
                <!-- render danh sách sản phẩm -->
                <?php foreach ($list_var as $each) { ?>
                <tr>
                    <td><?= $each['name_pro']; ?></td>
                    <td><?= $each['id_pro']; ?></td>
                    <td><?= $each['name_size']; ?></td>
                    <td><?= $each['price']; ?></td>
                    <td><?= $each['quantity_size']; ?></td>
                    <td>
                        <a href="index.php?act=update_var&id=<?= $each['id'] ?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="index.php?act=delete_var&id=<?= $each['id'] ?>">
                            <i onclick="return confirm('Bạn có chắc muốn xóa không')" class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
                <?php }  ?>
            </table>
        </div>
        <?php if(isset($_COOKIE['notice'])){
                    echo '<script>alert("'.$_COOKIE['notice'].'")</script>';
                } ?>
        <!-- pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination pb-3 d-flex justify-content-center">
            <?php for ($num = 1; $num <= $totalpage; $num++) { ?>
                <li class="page-item">
                    <?php if($num != $currentpage){ ?>
                    <a class="page-link fs-3 px-3 text-danger mx-1" href="index.php?act=listvariant&page=<?php echo $num; ?>"><?php echo $num ?></a>
                    <?php }else{ ?>
                    <a class="page-link fs-3 px-3 text-danger mx-1 active" style="" href="index.php?act=listvariant&page=<?php echo $num; ?>"><?= $num ?></a>
                    <?php } ?> 
                </li>
                <?php } ?>
            </ul>
        </nav>
        
    </main>
</main>

<!-- Modal -->
<div class="modal fade modal-xl" id="openModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="exampleModalLabel">Thêm vào kho hàng</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="index.php?act=add_var" method="post">
                    <label for="" class="form-label fs-3">Chọn sản phẩm</label>
                    <select class="form-select fs-3" aria-label="Default select example" name="id_pro">
                        <?php foreach ($var_pro as $each) { ?>
                        <option value="<?= $each['id_pro'] ?>"><?= $each['name_pro']?></option>
                        <?php } ?>
                    </select>
                    <label for="" class="form-label fs-3">Chọn Size</label>
                    <select class="form-select fs-3" aria-label="Default select example" name="size">
                        <?php foreach ($var_size as $each) { ?>
                        <option value="<?= $each['id'] ?>"><?= $each['name']?></option>
                        <?php } ?>
                    </select>
                    <div class="mb-3">
                        <label for="" class="form-label fs-3">Giá Size</label>
                        <input type="number" min="10" class="form-control fs-3" name="size_price"
                            placeholder="nhập giá size" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fs-3">Số lượng Size</label>
                        <input type="number" min="1" class="form-control fs-3" name="size_quantity"
                            placeholder="Nhập số lượng của size" required>
                    </div>
                    <!-- <button id="btnSubmit" name="submit" class="btn btn-primary">oke</button> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-danger fs-4" data-bs-target="submit-form"
                            name="submit">Thêm vào kho</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>