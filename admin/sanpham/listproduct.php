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
                    <a href="index.php?act=add"  class="text-white">
                        <i class="fa-solid fa-plus"></i>
                        Tạo sản phẩm mới
                    </a>
                   
                </div>
                <div class="container__main-search">
                    <form action="index.php?act=listproduct" method="post">
                        <input type="search" name="search"  id="" placeholder="Tìm kiếm sản phẩm">
                        <button type="submit" name="submit" hidden>Tim</button>
                    </form>
                </div>
            </div>
            <div class="container__main-handler-mobile">
                <button data-bs-toggle="modal" data-bs-target="#openModal" class="btn btn-danger fs-4" name="submit">
                    <i class="fa-solid fa-plus"></i>
                    Thêm sản
                    phẩm</button>
                    
                <!-- <div class="container__main-search">
                    <form action="">
                        <input type="search" name="search" id="" placeholder="Tìm kiếm sản phẩm">
                    </form>
                </div> -->
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
                    <th>Loại hàng</th>
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
                        <td><?= $l['title_category'] ?></td>
                        <td>
                            <a href="index.php?act=updatepro&id=<?= $l['id']?>">
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
            <!-- pagination -->
            <?php if(empty($search)){ ?>
            <nav aria-label="Page navigation">
            <ul class="pagination pb-3 d-flex justify-content-center">
            <?php for ($num = 1; $num <= $totalpage; $num++) { ?>
                <li class="page-item">
                    <?php if($num != $currentpage){ ?>
                    <a class="page-link fs-3 px-3 text-danger mx-1" href="index.php?act=listproduct&page=<?php echo $num; ?>"><?php echo $num ?></a>
                    <?php }else{ ?>
                    <a class="page-link fs-3 px-3 text-danger mx-1 active" style="" href="index.php?act=listproduct&page=<?php echo $num; ?>"><?= $num ?></a>
                    <?php } ?> 
                </li>
                <?php } ?>
            </ul>
        </nav>
        <?php } ?>
        </main>