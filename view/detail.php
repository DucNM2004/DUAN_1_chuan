 <!-- =========== body ============ -->
 <div class="detail__container">
        <div class="detail__wrap-box">
            <!-- Detail Product -->
            <div class="detail__product-view">
                <!-- Product Image -->
                <div class="detail__product-image"> 
                <?php if ($detailpro['quantity'] == 0) { ?>
                <div class="detail__wall-wrap-image">
                    <h2>Đã hết hàng</h2>
                </div>
                <?php } ?> 
                    <img src="products/<?= $detailpro['picture'] ?>" alt="">
                </div>
                <!-- Product Content -->
                <div class="detail__product-content">
                    <!-- Product Title -->
                    <a href="#" class="detail__product-title"><?= $detailpro['name'] ?></a>
                    <!-- Product Price -->
                    <div class="detail__product-price">
                        <div class="detail__product-wrap-price">
                            <!-- New Price -->
                            <span class="detail__product-price-new">$ <?= $detailpro['price'] ?></span>
                            <!-- Old Price -->
                            <span class="detail__product-price-old">( <?= $detailpro['price'] + 50 ?>.00)</span>
                        </div>
                    </div>
                    <!-- Product Overview -->
                    <div class="detail__product-overview">
                        <h5>overview:</h5>
                        <p><?= $detailpro['description'] ?></p>
                    </div>
                    <!-- Product Size -->
                    <div class="detail__product-size">
                        <h5>Size:</h5>
                        <a href="#">S</a>
                        <a href="#">M</a>
                        <a href="#">L</a>
                        <a href="#">XL</a>
                        <a href="#">XXL</a>
                    </div>
                    <!-- Product Color + Quantity -->
                    <form action="">
                    <div class="detail__product-color-quantity">
                        <!-- Color -->
                        <div class="detail__product-color">
                            <h5>COLOR:</h5>
                            <div class="detail__product-wrap-color">
                                <a style="background-color: rgba(255, 172, 154, 1);" href="#" class="detail__product-color-active">color 1</a>
                                <a style="background-color: rgba(255, 64, 129, 1);" href="#">color 2</a>
                                <a style="background-color: rgb(0, 0, 0);" href="#">color 3</a>
                            </div>
                        </div>
                            <!-- Product Quantity -->
                            <div class="detail__product-quantity">
                            <h5>Số lượng:</h5>
                            <div class="detail__product-wrap-quantity">
                                <!-- Input Quantity -->
                                <input type="text" value="1" name="quantity" class="detail_product-input-plus-minus"
                                id="<?php echo $detailpro['id']; ?>">

                                <!-- Increase -->
                                <span class="detail__product-inc btnqty">
                                    <i class="fa-solid fa-chevron-up"></i>
                                </span>

                                <!-- Decrease -->
                                <span class="detail__product-dec btnqty">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </span>
                            </div>
                        </div>  
                        </div>
                       
                        <!-- Product Action -->
                        <div class="detail__product-action">
                            <button name="btn_add" class="detail__product-action-btn btn-text" <?php if($detailpro['quantity']==0){echo 'disabled';} ?>>THÊM VÀO GIỎ HÀNG</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Reviews + Description -->
            <div class="detail__reviews-description">
                <!-- Tab list -->
                <ul class="detail__tablist-container">
                    <li class="active">
                        <a href="#" >Bình luận</a>
                    </li>
                    <li>
                        <a href="#">Giới thiệu</a>
                    </li>
                </ul>

                <!-- Reviews -->
                <div class="detail__reviews">
                    <div class="detail__product-avg-ratting">
                        <h4>4.5 <span>(Tổng quan)</span></h4>
                        <span>Dựa trên <?= count($comment) ?></span>
                    </div>
                    <!-- View Comment -->
                    <div class="detail__product-comment-box">
                        <!-- Item -->
                        <?php foreach($comment as $cm): ?>
                        <div class="detail__product-comment-view">
                            <div class="detail__product-comment-view-info">
                                <div class="detail__product-comment-author">
                                    <span></span>
                                </div>
                                <div class="detail__product-comment-time">
                                    <strong><span ><?= $cm['timeComment'] ?></span></strong>
                                </div>
                            </div>
                            <p class="detail__product-comment-view-title">
                               <?= $cm['name_customer'] ?>
                            </p>
                            <p class="detail__product-comment-view-title">
                               <?= $cm['comment_content'] ?>
                            </p>
                        </div>
                        <?php endforeach ?>
                    </div>
                    <!-- Form Comment -->
                    <div class="detail__comment-form-wrap-box">
                        <h3>Thêm bình luận của bạn</h3>
                        <form action="#" class="detail__comment-form-action">
                            <!-- Imput Name -->
                            <div class="input-name-box">
                                <label for="name">Tên:</label>
                                <input type="text" name="name" value="" placeholder="Type your name">
                            </div>
                            <!-- Input Email -->
                            <div class="input-email-box">
                                <label for="email">Email:</label>
                                <input type="email" name="email" value="" placeholder="Type your email address">
                            </div>
                            <!-- Textarea Comment -->
                            <div class="input-comment-box">
                                <label for="comment">Bình luận của bạn:</label>
                                <textarea name="" id="" cols="30" rows="10" placeholder="White a comment"></textarea>
                            </div>
                            <!-- Button Submit -->
                            <div class="input-btnsubmit-box">
                                <button type="submit" name="btn_submit">Thêm bình luận</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Description -->
                <div class="detail__description">
                    <!-- Title -->
                    <p>
                       <?php echo $detailpro['description'] ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- Suggested Products -->
        <div class="detail__suggested-products">
            <div class="detail__wrap-box">
                <h1>SẢN PHẨM ĐỀ XUẤT</h1>
                <!-- Slider Product -->
                <div class="detail__product-slider">
                    <!-- Item -->
                    <?php foreach($top8view as $top8v): ?>
                    <div class="detail__product-item">
                        <!-- Item Image + Action -->
                        <div class="detail__wrap-item">
                            <!-- Item Image -->
                            <div class="detail__item-image">
                                <a href="index.php?act=detail&idsp=<?= $top8v['id'] ?>">
                                    <img src="products/<?= $top8v['picture'] ?>" alt="">
                                </a>
                            </div>
                            <!-- Item new -->
                            <!-- <span>new</span> -->
                            <!-- View Detail -->
                            <a href="index.php?act=detail&idsp=<?= $top8v['id'] ?>" class="detail__view-detail">
                                <i class="fa-regular fa-square-plus"></i>
                            </a>
                            <!-- Action -->
                            <?php if($top8v['quantity'] > 0){ ?>
                            <div class="detail__item-action">
                                <a href="#"><button class="detail__item-action-btn btn-icon">
                                    <i class="fa-solid fa-arrows-rotate"></i>
                                </button></a>
                                <a href="#"><button class="detail__item-action-btn btn-text">
                                    Thêm vào giỏ 
                                </button></a>
                                <a href="#"><button class="detail__item-action-btn btn-icon">
                                    <i class="fa-regular fa-heart"></i>
                                </button></a>
                            </div>
                            <?php }?>
                        </div>
                        <!-- Detail Item -->
                        <div class="detail__item-detail">
                            <!-- Item title -->
                            <a href="#" class="detail__item-title">
                                <?= $top8v['name'] ?>
                            </a>
                            <!-- Price New -->
                            <span class="detail__item-price new">
                                <?= $top8v['price'] ?>
                            </span>
                            <!-- Price Old -->
                            <span class="detail__item-price old">
                               <?= $top8v['price'] + 50 ?>.00
                            </span>
                            <?php if ($top8v['quantity'] == 0) { ?>
                                <h5>Đã hết hàng</h5>
                            <?php } ?>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div> 
    </div>