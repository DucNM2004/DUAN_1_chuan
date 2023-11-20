<main class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="app__title">
                    <h3 class="app__title-title">Quản lý sản phẩm</h3>
                    <div id="clock"></div>
                </div>
            </div>
<main class="container__main">
            <div class="container__main-handler">
                <div class="container__main-link">
                    <a href="index.php?act=addsp"  class="text-white">
                        <i class="fa-solid fa-plus"></i>
                        Tạo sản phẩm mới
                    </a>
                    <a href="index.php?act=xoasp">
                        <i class="fa-solid fa-trash-can"></i>
                        Xóa sản phẩm
                    </a>
                </div>
                <div class="container__main-search">
                    <form action="">
                        <input type="search" name="search" id="" placeholder="Tìm kiếm sản phẩm">
                    </form>
                </div>
            </div>
            <div class="container__main-handler-mobile">
                <button data-bs-toggle="modal" data-bs-target="#openModal" class="btn btn-danger fs-4" name="submit">
                    <i class="fa-solid fa-plus"></i>
                    Thêm sản
                    phẩm</button>
                    
                <div class="container__main-search">
                    <form action="">
                        <input type="search" name="search" id="" placeholder="Tìm kiếm sản phẩm">
                    </form>
                </div>
            </div>
            <div class="container__table">
                <table>
                    <tr>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Sale</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th>Ngày nhận</th>
                    <th>Tính năng</th>
                      
                      
                    </tr>
                    <?php foreach($list as $l): ?>
                    <tr>
                        <td><?= $l['name'] ?></td>
                        <td><?= $l['price'] ?></td>
                        <td><?= $l['saleOff'] ?></td>
                        <td>
                            <img src="../products/<?= $l['picture'] ?>" alt="" class="img_item">
                        </td>
                        <td class="container__table-desc-parent">
                            <div class="container__table-desc">
                                <p><?= $l['description'] ?></p>
                            </div>
                        </td>
                        <td><?= $l['date_added'] ?></td>
                        <td>
                            <a href="">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="index.php?act=delete_pro&idpro=<?= $l['id']?>">
                            <i onclick="return confirm('Bạn có chắc muốn xóa không')" class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
            <?php if(isset($_COOKIE['notice'])){
                    echo '<script>alert("'.$_COOKIE['notice'].'")</script>';
                } ?>
        </main>