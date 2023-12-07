<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Quản lý bình luận</h3>
                <div id="clock"></div>
            </div>
        </div>
    </div>
    <!-- container main -->
    <main class="container__main">
        <div class="container__main-handler">
            <div class="container__main-link">
                <!-- <a href="add-customer.php">
                    Thêm người dùng mới
                </a> -->
            </div>
            <div class="container__main-search">
                <form action="index.php?act=listcomment" method="post">
                    <input type="search" name="search" id="" placeholder="Tìm kiếm bình luận" />
                    <button type="submit" name="submit" hidden>Tim</button>
                </form>
            </div>
        </div>
        <div class="container__table">
            <table>
                <tr>
                    <th>Nội dung bình luận</th>
                    <th>Người bình luận</th>
                    <th>Sản phẩm bình luận</th>
                    <th>Thời gian</th>
                    <th>Tính năng</th>
                </tr>
                <!-- render-products -->
                <?php foreach ($list_comment as $each) : ?>
                <tr>
                    <td class="container__table-desc-parent">
                        <div class="container__table-desc">
                            <p><?= $each['comment_content']; ?></p>
                        </div>
                    </td>
                    <td><?= $each['name_customer']; ?></td>
                    <td><?= $each['name']; ?></td>
                    <td><?= $each['timeComment'] ?></td>
                    <td>
                        <a href="index.php?act=delete_comment&id=<?= $each['id_comment'] ?>">
                        <i onclick="return confirm('Bạn có chắc muốn xóa không')" class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>

        <!-- pagination -->
        <?php if(empty($search)){ ?>
        <nav aria-label="Page navigation">
            <ul class="pagination pb-3 d-flex justify-content-center">
            <?php for ($num = 1; $num <= $totalpage; $num++) { ?>
                <li class="page-item">
                    <?php if($num != $currentpage){ ?>
                    <a class="page-link fs-3 px-3 text-danger mx-1" href="index.php?act=listcomment&page=<?php echo $num; ?>"><?php echo $num ?></a>
                    <?php }else{ ?>
                    <a class="page-link fs-3 px-3 text-danger mx-1 active" style="" href="index.php?act=listcomment&page=<?php echo $num; ?>"><?= $num ?></a>
                    <?php } ?> 
                </li>
                <?php } ?>
            </ul>
        </nav>
        <?php } ?>
    </main>
</main>
                            