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
                            <?php if ($detailpro['quantity'] > 0) { ?>
                            <?php $new_price = $detailpro['price'] - $detailpro['saleOff'] ?>
                            <span class="detail__product-price-new">$ <?= $new_price ?></span>
                            <!-- Old Price -->
                            <span class="detail__product-price-old">
                            <?php if (number_format($detailpro['saleOff']) != 0) {
                                    echo '(' . $detailpro['price'] . ')';
                                } ?>
                        </span>
                        <span class="detail__product-price-sale">
                            <?php if (number_format($detailpro['saleOff']) != 0) {
                                    echo 'Giảm ' . $detailpro['saleOff'] . '%';
                                } ?>
                        </span>
                        <?php } else { ?>
                        <span class="detail__product-price-new">
                            $ <?php echo $detailpro['price']; ?>.00
                        </span>
                        <?php } ?>
                        </div>
                    </div>
                    <!-- Product Overview -->
                    <div class="detail__product-overview">
                        <h5>Miêu tả:</h5>
                        <p><?= $detailpro['description'] ?></p>
                    </div>
                    <!-- Product Size -->
                    <form action="index.php?act=add_cart&idpro=<?= $detailpro['id'] ?>" method="post">
                    <div class="detail__product-size">
                        <h5>Size:</h5>
                        <input type="radio" name="size" value="S"  style="height: 24px; width: 30px; margin: 5px;" checked>
                        <input type="radio" name="size" value="M" style="height: 24px; width: 30px; margin: 5px;">
                        <input type="radio" name="size" value="L" style="height: 24px; width: 30px; margin: 5px;">
                        <input type="radio" name="size" value="XL" style="height: 24px; width: 30px; margin: 5px;">
                        <input type="radio" name="size" value="XXL" style="height: 24px; width: 30px; margin: 5px;"><br>
                        <div> <span style="font-size: large; margin: 15px;">S</span>
                        <span style="font-size: large; margin: 12px;">M</span>
                        <span style="font-size: large; margin: 17px;">L</span>
                        <span style="font-size: large; margin: 10px;">XL</span>
                        <span style="font-size: large; margin: 10px;">XXL</span></div>
                    </div>
                   
                    <!-- Product Color + Quantity -->
                   
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
                                <input type="number" value="1" min="1" name="quantity" class="detail_product-input-plus-minus quantity"
                                id="<?= $detailpro['quantity'] ?>">
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
                          <input type="hidden" value="<?php echo $detailpro['price'] - $detailpro['saleOff'] ?>" name="price">
                          <input type="hidden" value="<?php echo $detailpro['id'] ?>" name="id_pro">
                        <!-- Product Action -->
                        <div class="detail__product-action">
                            
                           <?php  if(isset($_SESSION['user'])){ ?>
                            <button name="btn_add" class="detail__product-action-btn btn-text" <?php if($detailpro['quantity']==0){echo 'disabled';} ?>>THÊM VÀO GIỎ HÀNG</button><br>
                           <?php  }else{ ?>
                            <h3>Bạn cần đăng nhập để mua hàng</h3>
                            <div>
                            <button type="button" class="detail__product-action-btn btn-text" name="btn_submit"><a style="color: white;" href="index.php?act=login">Đến đăng nhập</a> </button><br>
                            </div>
                         <?php  } ?>
                        </div>
                        <div>
                        <h5>số lượng sản phẩm còn: <?= $detailpro['quantity'] ?></h5>
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
                    <div class="detail__product-comment-box" style='<?php if (count($comment) > 6) {
                             echo "overflow: scroll; max-height: 350px;";
                            } ?>'>
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
                            <p class="detail__product-comment-view-content">
                               <?= $cm['comment_content'] ?>
                            </p>
                        </div>
                        <?php endforeach ?>
                    </div>
                    <!-- Form Comment -->
                    <div class="detail__comment-form-wrap-box">
                        <h3>Thêm bình luận của bạn</h3>
                        <?php if(isset($_SESSION['user'])){ ?>
                        <form action="index.php?act=detail&idsp=<?= $detailpro['id'] ?>" class="detail__comment-form-action" method="post">
                            <!-- id product -->
                            <input type="text" name="id_product" value="<?php echo $detailpro['id'] ?>" hidden>
                            <!-- Imput Name -->
                            <div class="input-name-box">
                                <label for="name">Tên:</label>
                                <input type="text" name="name" value="<?= $_SESSION['user'] ?>" disabled>
                            </div>
                            <!-- Input Email -->
                            <div class="input-email-box">
                                <label for="email">Email:</label>
                                <input type="email" name="email" value="<?= $_SESSION['email'] ?>" disabled>
                            </div>
                            <!-- Textarea Comment -->
                            <div class="input-comment-box">
                                <label for="comment">Bình luận của bạn:</label>
                                <textarea name="comment" id="" cols="30" rows="10" placeholder="Write a comment"></textarea>
                            </div>
                            <!-- Button Submit -->
                            <div class="input-btnsubmit-box">
                                <button type="submit" name="btn_submit">Thêm bình luận</button>
                            </div>
                        </form>
                        <?php }else{  ?>
                            <h3>Bạn cần đăng nhập để bình luận</h3>
                            <div class="input-btnsubmit-box">
                                <button type="button" name="btn_submit"><a href="index.php?act=login">Đến đăng nhập</a> </button>
                            </div>
                        <?php }?>

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
                                <a href="index.php?act=detail&idsp=<?= $top8v['id'] ?>"><button class="detail__item-action-btn btn-text">
                                    Mua ngay 
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
                            <a href="index.php?act=detail&idsp=<?= $top8v['id'] ?>" class="detail__item-title">
                                <?= $top8v['name'] ?>
                            </a>
                            
                            <!-- Price New -->
                            <?php $new_price = $top8v['price'] - $top8v['saleOff'] ?>
                            <span class="detail__item-price new">
                                <?= $new_price ?>
                            </span>
                            <!-- Price Old -->
                            <span class="detail__item-price old">
                               <?= $top8v['price']?>.00
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
    <?php if(isset($_COOKIE['notice'])){
                    echo '<script>alert("'.$_COOKIE['notice'].'")</script>';
                } ?>