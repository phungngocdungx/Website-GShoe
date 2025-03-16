<?php include_once 'layout/header.php'; ?><!-- header -->
<?php include_once 'layout/menu.php'; ?><!-- menu -->
<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Single Product</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="<?= BASE_URL ?>"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="<?= BASE_URL ?>">Shop</a></li>
                    <li>Chi tiết sản phẩm</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Item Details -->
<section class="item-details section">
    <div class="container">
        <div class="top-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-images">
                        <main id="gallery">
                            <div class="main-img">
                                <img style="width: 605px; height: 550px;" src="<?= $sanPham['hinh_anh'] ?>" id="current" alt="#">
                            </div>
                            <div class="images">
                                <?php foreach ($listAnhSanPham as $key => $anhSanPham): ?>
                                    <img style="width: 109.8px; height: 77.22px;" src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" class="img" alt="#">
                                <?php endforeach ?>
                            </div>
                        </main>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-info">
                        <h2 class="title"><?= $sanPham['ten_san_pham'] ?></h2>
                        <p class="category"><i class="lni lni-tag"></i> Danh mục:<a href="javascript:void(0)"><?= $sanPham['ten_danh_muc'] ?></a></p>
                        <h3 class="price"><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?><span><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span></h3>
                        <p class="info-text"><?= $sanPham['mo_ta'] ?></p>
                        <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="POST">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group color-option">
                                        <label class="title-label" for="size">Choose color</label>
                                        <div class="single-checkbox checkbox-style-1">
                                            <input type="checkbox" id="checkbox-1" checked>
                                            <label for="checkbox-1"><span></span></label>
                                        </div>
                                        <div class="single-checkbox checkbox-style-2">
                                            <input type="checkbox" id="checkbox-2">
                                            <label for="checkbox-2"><span></span></label>
                                        </div>
                                        <div class="single-checkbox checkbox-style-3">
                                            <input type="checkbox" id="checkbox-3">
                                            <label for="checkbox-3"><span></span></label>
                                        </div>
                                        <div class="single-checkbox checkbox-style-4">
                                            <input type="checkbox" id="checkbox-4">
                                            <label for="checkbox-4"><span></span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="color">Battery capacity</label>
                                        <select class="form-control" id="color">
                                            <option>5100 mAh</option>
                                            <option>6200 mAh</option>
                                            <option>8000 mAh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group quantity">
                                        <label for="color">Số lượng</label>
                                        <input type="hidden" name="san_pham_id" value="<?= $sanPham['id']?>">
                                        <select class="form-control" name="so_luong" id="so_luong">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="bottom-content">
                                <div class="row align-items-end">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="button cart-button">
                                            <button class="btn" type="submit" style="width: 100%;">Add to Cart</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="wish-button">
                                            <button class="btn"><i class="lni lni-reload"></i> Compare</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="wish-button">
                                            <button class="btn"><i class="lni lni-heart"></i> To Wishlist</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-details-info">
            <div class="single-block">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="info-body custom-responsive-margin">
                            <h4>Sản phẩm liên quan</h4>
                            <div class="row">
                                <?php foreach ($listSanPhamDanhMucId as $key => $sanPham): ?>
                                    <div class="col-lg-3 col-md-12 col-12">
                                        <!-- Start Single Product -->
                                        <div class="single-product">
                                            <div class="product-image">
                                                <img style="width: 288px; height: 286.40px; " src="<?= BASE_URL . $sanPham['hinh_anh']; ?>" alt="#">
                                                <div class="button">
                                                    <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <span class="category"><?= $sanPham['ten_danh_muc'] ?></span>
                                                <h4 class="title">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                                                </h4>
                                                <ul class="review">
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star"></i></li>
                                                    <li><span>4.0 Review(s)</span></li>
                                                </ul>
                                                <div class="price">
                                                    <?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Product -->
                                    </div>
                                <?php endforeach ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="single-block">
                        <div class="reviews">
                            <h4 class="title">Bình luận</h4>
                            <!-- Start Single Review -->
                            <?php foreach ($listBinhLuan as $binhLuan): ?>
                                <div class="single-review">
                                    <img src="<?= $binhLuan['anh_dai_dien'] ?>" alt="">
                                    <div class="review-info">
                                        <h4><?= $binhLuan['ho_ten'] ?>
                                            <span><?= $binhLuan['ngay_dang'] ?>
                                            </span>
                                        </h4>
                                        <ul class="stars">
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                        </ul>
                                        <p><?= $binhLuan['noi_dung'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <!-- End Single Review -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="single-block give-review">
                        <h4>4.5 (Overall)</h4>
                        <ul>
                            <li>
                                <span>5 stars - 38</span>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                            </li>
                            <li>
                                <span>4 stars - 10</span>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star"></i>
                            </li>
                            <li>
                                <span>3 stars - 3</span>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star"></i>
                                <i class="lni lni-star"></i>
                            </li>
                            <li>
                                <span>2 stars - 1</span>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star"></i>
                                <i class="lni lni-star"></i>
                                <i class="lni lni-star"></i>
                            </li>
                            <li>
                                <span>1 star - 0</span>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star"></i>
                                <i class="lni lni-star"></i>
                                <i class="lni lni-star"></i>
                                <i class="lni lni-star"></i>
                            </li>
                        </ul>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn review-btn" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Leave a Review
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Item Details -->
<?php include_once 'layout/footer.php'; ?><!-- footer -->