<!-- body -->
<div class="products__container">
<?php if (isset(($search)) && !empty($search)) { ?>
        <h1 style="margin-left: 30px;" align='left'>Các kết quả tìm kiếm cho từ khóa
            "<?= $search ?>"</h1>
    <?php } ?>
    <div class="row">
        <div class="col-md-3 col-xs-12 sidebar-container float-right">
            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="products__sin_sidebar category-sidebar">
                        <h3 class="sidebar-title">categories</h3>
                        <div class="sidebar-wrapper fix">
                            <!-- dropdown -->
                            <div class="products__dropdown">
                                <?php foreach ($loadcategorytype as $c_type) : ?>
                                    <ul class="products__drop_btn btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><?= $c_type['type'] ?></ul>
                                        <ul class="dropdown-menu">
                                        <?php foreach ($loadcategory as $c) : ?>
                                            <?php if($c_type['id'] == $c['id_category_type']){ ?>
                                            <li><a class="dropdown-item" href="index.php?act=products&iddm=<?=$c['id'] ?>"><?= $c['title_category'] ?></a></li>
                                            <?php }?>
                                            <?php endforeach ?>
                                        </ul>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>


        <div class="col-md-9 col-xs-12 shop-products">
            <div class="shop-toolbar shop-toolbar-top fix">
                <div class="row">
                    <div class="col-sm-3 col-xs-5 view-mode text-left">
                        <a class="grid active" href="#grid-view" data-toggle="tab"><i class="fa-sharp fa-solid fa-grid"></i></a>
                        <a class="list" href="#list-view" data-toggle="tab"><i class="fa-solid fa-list"></i></a>
                    </div>
                    <div class="col-sm-3 col-xs-7 pro-show text-right float-right">
                        <div class="products__show_wrap">
                            <label>Hiển thị:</label>
                            <form action="index.php?act=products" method="post">
                            <select class="show-select" name="soluong">
                                <option value="6">6</option>
                                <option value="9">9</option>
                                <option value="12">12</option>
                            </select>
                            <button type="submit" name="loc" >Hiển thị</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12 short-by text-center">
                        <div class="products__short_by_wrap">
                            <label>Sắp xếp:</label>
                            <form action="index.php?act=products" method="post">
                            <select class="sort-select" name="sort_select">
                                <option value="1">Tên A-Z</option>
                                <option value="4">Tên Z-A</option>
                                <option value="2">Ngày A-Z</option>
                                <option value="5">Ngày Z-A</option>
                                <option value="3">Giá A-Z</option>
                                <option value="6">Giá Z-A</option>
                            </select>
                            <button type="submit" name="sort" >Hiển thị</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="products__content row">
                <?php foreach ($allpro as $ap) : ?>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="products__product-item">
                            <!-- Item Image + Action -->
                            <div class="products__wrap-item">
                                <!-- Item Image -->
                                <div class="products__item-image">
                                    <a href="index.php?act=detail&idsp=<?= $ap['id'] ?>">
                                        <img src="products/<?= $ap['picture'] ?>" alt="">
                                    </a>
                                </div>
                                <!-- View products -->
                                <a href="index.php?act=detail&idsp=<?= $ap['id'] ?>" class="products__view-products">
                                    <i class="fa-regular fa-square-plus"></i>
                                </a>
                                <!-- Action -->
                                <?php if ($ap['quantity'] > 0) { ?>
                                    <div class="products__item-action">
                                        <a href="#"><button class="products__item-action-btn btn-icon">
                                               
                                            </button></a>
                                        <?php if(isset($_SESSION['user'])){  ?>
                                        <a href="index.php?act=add_cart&idpro=<?=$ap['id'] ?>">
                                        <button class="products__item-action-btn btn-text">
                                                Thêm vào giỏ
                                            </button></a>
                                        <?php } else { ?>
                                            <a href="index.php?act=login">
                                        <button class="products__item-action-btn btn-text">
                                                Thêm vào giỏ
                                            </button></a>
                                        <?php } ?>
                                        <a href="#"><button class="products__item-action-btn btn-icon">
                                                
                                            </button></a>
                                    </div>
                                <?php } ?>
                                <div class="products__sin_details fix">
                                    <a class="products__sin_title" href="index.php?act=detail&idsp=<?= $ap['id'] ?>l"><?= $ap['name'] ?></a>
                                    <!-- Product Price -->
                                    <div class="products__sin_price float-left">
                                        <span class="new">$ <?= $ap['price'] ?>.00</span>
                                    </div>
                                    <!-- Product Ratting -->
                                    <div class="products__sin_ratting float-right">
                                        
                                        <span>(<?= $ap['view_number'] ?>)</span>
                                    </div>
                                    <?php if ($ap['quantity'] == 0) { ?>
                                        <h5>Đã hết hàng</h5>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="shop-toolbar shop-toolbar-bottom fix">
                <div class="row">
                    <div class="col-lg-4 col-sm-2 col-xs-3 view-mode text-left">
                        <a class="grid active" href="#grid-view" data-toggle="tab"><i class="zmdi zmdi-apps"></i></a>
                        <a class="list" href="#list-view" data-toggle="tab"><i class="zmdi zmdi-storage"></i></a>
                    </div>
                    <?php if(isset($search)&& empty($search) ){ ?>
                    <div class="col-lg-4 col-sm-5 col-xs-12 pagination text-center">
                        <ul class="pagination pb-3 d-flex justify-content-center">
                            <li><a href="index.php?act=products&perpage=<?= $itemperpage?>&page=<?=$currentpage - 1?>"><i class="fa-solid fa-chevron-left"></i></a></li>
                            <li><a href="index.php?act=products&perpage=<?= $itemperpage?>&page=1">First</a></li>
                            <?php for($num=1;$num<=$totalpage;$num++){ ?>
                                <?php if($num != $currentpage){ ?>
                                    <?php if($num > $currentpage - 3 && $num < $currentpage +3){ ?>
                            <li><a href="index.php?act=products&perpage=<?= $itemperpage?>&page=<?= $num?>"><?= $num ?></a></li>
                                <?php }?>    
                                <?php }else{ ?>
                                        <li><strong><a class="active" href="index.php?act=products&perpage=<?= $itemperpage?>&page=<?= $num?>"><?= $num ?></a></strong></li> 
                                    <?php } ?> 
                            <?php }?>
                            <li><a href="index.php?act=products&perpage=<?= $itemperpage?>&page=<?= $totalpage ?>">End</a></li>
                            <li><a href="index.php?act=products&perpage=<?= $itemperpage?>&page=<?=$currentpage + 1?>"><i class="fa-solid fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>