<!-- body -->
<div class="products__container">
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
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="products__sin_sidebar brand-sidebar">
                        <h3 class="sidebar-title">POPULAR BRAND</h3>
                        <div class="sidebar-wrapper fix">
                            <ul class="cus-scroll">
                                <li><a href="#">rayban</a></li>
                                <li><a href="#">denim</a></li>
                                <li><a href="#">polo</a></li>
                                <li><a href="#">adiddas</a></li>
                                <li><a href="#">nike</a></li>
                                <li><a href="#">gucci</a></li>
                                <li><a href="#">cats eye</a></li>
                                <li><a href="#">rayban</a></li>
                                <li><a href="#">denim</a></li>
                                <li><a href="#">polo</a></li>
                                <li><a href="#">adiddas</a></li>
                                <li><a href="#">nike</a></li>
                                <li><a href="#">gucci</a></li>
                                <li><a href="#">cats eye</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="products__sin_sidebar price-sidebar">
                        <h3 class="sidebar-title">FILTER BY COLOR</h3>
                        <div class="sidebar-wrapper fix">
                            <div id="price-range"></div>
                            <div class="price-values fix">
                                <p>Range</p>
                                <input type="text" id="price-amount" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="products__sin_sidebar products__size_sidebar">
                        <h3 class="sidebar-title">FILTER BY COLOR</h3>
                        <div class="sidebar-wrapper fix">
                            <a href="#">s</a>
                            <a href="#">m</a>
                            <a href="#">l</a>
                            <a href="#">xl</a>
                            <a href="#">xxl</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="products__sin_sidebar color-sidebar">
                        <h3 class="sidebar-title">FILTER BY COLOR</h3>
                        <div class="sidebar-wrapper fix">
                            <ul class="cus-scroll">
                                <li><a href="#"><span><i class="fa-solid" style="background-color: black; width: 12px;height: 12px;"></i></span>black</a></li>
                                <li><a href="#"><span><i class="fa-solid" style="background-color: red; width: 12px;height: 12px;"></i></span>red</a></li>
                                <li><a href="#"><span><i class="fa-solid" style="background-color: green; width: 12px;height: 12px;"></i></span>green</a></li>
                                <li><a href="#"><span><i class="fa-solid" style="background-color: yellow; width: 12px;height: 12px;"></i></span>yellow</a></li>
                                <li><a href="#"><span><i class="fa-solid" style="background-color: pink; width: 12px;height: 12px;"></i></span>pink</a></li>
                            </ul>
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
                            <label>show:</label>
                            <form action="index.php?act=products" method="post">
                            <select class="show-select" name= "sl">
                                <option value="0">9</option>
                                <option value="1">16</option>
                                <option value="2">32</option>
                                <option value="3">ALL</option>
                                <?php echo $sl; ?>
                            </select>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12 short-by text-center">
                        <div class="products__short_by_wrap">
                            <label>short by:</label>
                            <select class="sort-select">
                                <option>Name Ascending</option>
                                <option>Name Descending</option>
                                <option>Date Ascending</option>
                                <option>Date Descending</option>
                                <option>Price Ascending</option>
                                <option>Price Descending</option>
                            </select>
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
                                                <i class="fa-solid fa-arrows-rotate"></i>
                                            </button></a>
                                        <a href="#"><button class="products__item-action-btn btn-text">
                                                Giỏ hàng
                                            </button></a>
                                        <a href="#"><button class="products__item-action-btn btn-icon">
                                                <i class="fa-regular fa-heart"></i>
                                            </button></a>
                                    </div>
                                <?php } ?>
                                <div class="products__sin_details fix">
                                    <a class="products__sin_title" href="index.php?act=detail&idsp=<?= $ap['id'] ?>l"><?= $ap['price'] ?></a>
                                    <!-- Product Price -->
                                    <div class="products__sin_price float-left">
                                        <span class="new">$ <?= $ap['price'] ?>.00</span>
                                    </div>
                                    <!-- Product Ratting -->
                                    <div class="products__sin_ratting float-right">
                                        <div class="rattings float-left">
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                        </div>
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
                    <div class="col-lg-4 col-sm-5 col-xs-12 pagination text-center">
                        <ul class="pagination pb-3 d-flex justify-content-center">
                            <li><a href="#"><i class="fa-solid fa-chevron-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#" class="active">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa-solid fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-sm-5 col-xs-9 short-by text-right float-right">
                        <div class="products__short_by_wrap">
                            <label>short by:</label>
                            <select class="sort-select">
                                <option>Name Ascending</option>
                                <option>Name Descending</option>
                                <option>Date Ascending</option>
                                <option>Date Descending</option>
                                <option>Price Ascending</option>
                                <option>Price Descending</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>