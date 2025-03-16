<?php include_once 'layout/header.php'; ?><!-- header -->
<?php include_once 'layout/menu.php'; ?><!-- menu -->

<!-- Start Phần slider -->
<section class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 custom-padding-right">
                <div class="slider-head">
                    <!-- Start Hero Slider -->
                    <div class="hero-slider">
                        <!-- Start Single Slider -->
                        <div class="single-slider" style="background-image: url(assets/images/banner/nike1.webp);"></div>
                        <!-- End Single Slider -->

                        <!-- Start Single Slider -->
                        <div class="single-slider" style="background-image: url(assets/images/banner/nike2.webp);"></div>
                        <!-- End Single Slider -->

                        <!-- Start Single Slider -->
                        <div class="single-slider" style="background-image: url(assets/images/banner/nike3.webp);"></div>
                        <!-- End Single Slider -->


                    </div>
                    <!-- End Hero Slider -->
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End Phần slider -->

<!-- Start Phần danh mục sản phẩm -->
<section class="featured-categories section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Danh mục sản phẩm</h2>
                    <p>Toàn bộ danh mục sản phẩm sẽ được cập nhật hằng ngày.</p>
                </div>
            </div>
        </div>
        <!-- /////////////////// -->
        <div class="row">
            <?php foreach ($listDanhMuc as $danhMuc): ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">

                        <h3 class="heading"><?= $danhMuc['ten_danh_muc'] ?></h3>
                        <ul>
                            <li><a href="product-grids.html"></a></li>
                            <li><a href="product-grids.html"></a></li>
                            <li><a href="product-grids.html"></a></li>
                            <li><a href="product-grids.html"></a></li>
                            <li><a href="product-grids.html"></a></li>
                        </ul>

                        <div class="images">
                            <img style="width: 201px; height: 204px;" src="<?= $danhMuc['anh'] ?>" alt="#">
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div>
            <?php endforeach ?>
        </div>
        <!-- /////////////////////////////////// -->


    </div>
</section>
<!-- End Phần danh mục sản phẩm -->


<!-- Start Phần Top sản phẩm -->
<section class="trending-product section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Top sản phẩm</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($listSanPham as $key => $sanPham): ?>
                <div class="col-lg-3 col-md-6 col-12">
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
                                <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                    <p><?= formatPrice($sanPham['gia_san_pham']) . ' đ' ?></p>
                                    <span><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
                                <?php } else { ?>
                                    <span><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
            <?php endforeach ?>

        </div>
    </div>
</section>
<!-- End Phần Top sản phẩm -->

<!-- Start Home Phần sản phẩm Best Sellers, sản phẩm mới -->
<section class="home-product-list section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                <h4 class="list-title">Best Sellers</h4>
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="assets/images/home-product-list/AIR+FORCE+1+'07.png" alt="#"></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">Nike Air Force 1'07</a>
                        </h3>
                        <span>2.929.000đ</span>
                    </div>
                </div>
                <!-- End Single List -->
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="assets/images/home-product-list/Giay-Air-Jordan-1-Low-Triple-White-553558-130.jpg.webp" alt="#"></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">Nike Air Jordan 1 Low Triple White</a>
                        </h3>
                        <span>2.990.000đ</span>
                    </div>
                </div>
                <!-- End Single List -->
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="assets/images/home-product-list/adidas-samba.webp" alt="#"></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">Giày Thể Thao Adidas Samba</a>
                        </h3>
                        <span>3.290.000đ</span>
                    </div>
                </div>
                <!-- End Single List -->
            </div>
            <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                <h4 class="list-title">New Arrivals</h4>
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="assets/images/home-product-list/lv-trainer.avif" alt="#"></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">Giày Thể Thao LV Trainer</a>
                        </h3>
                        <span>4.990.000đ</span>
                    </div>
                </div>
                <!-- End Single List -->
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="assets/images/home-product-list/gucci-beige.webp" alt="#"></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">Giày Sneaker Nam Gucci Beige</a>
                        </h3>
                        <span>7.950.000đ</span>
                    </div>
                </div>
                <!-- End Single List -->
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="assets/images/home-product-list/balenciaga-track.avif" alt="#"></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">Balenciaga Track</a>
                        </h3>
                        <span>9.900.000đ</span>
                    </div>
                </div>
                <!-- End Single List -->
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <h4 class="list-title">Top Rated</h4>
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="assets/images/home-product-list/converse-X.webp" alt="#"></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">Converse x Comme des Garçons Chuck 70</a>
                        </h3>
                        <span>3.100.000đ</span>
                    </div>
                </div>
                <!-- End Single List -->
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="assets/images/home-product-list/vans-old-skool.webp" alt="#"></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">Vans old skool classic black/white</a>
                        </h3>
                        <span>1.572.000đ</span>
                    </div>
                </div>
                <!-- End Single List -->
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="assets/images/home-product-list/Giay_run_72.avif" alt="#"></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">Giày Run 72</a>
                        </h3>
                        <span>3.000.000đ</span>
                    </div>
                </div>
                <!-- End Single List -->
            </div>
        </div>
    </div>
</section>
<!-- End Home Phần sản phẩm Best Sellers, sản phẩm mới -->

<!-- Start Phần Thương hiệu hiện có -->
<div class="brands">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                <h2 class="title">Thương hiệu hiện có</h2>
            </div>
        </div>
        <div class="brands-logo-wrapper">
            <div class="brands-logo-carousel d-flex align-items-center justify-content-between">
                <?php foreach ($listDanhMuc as $anhDanhMuc): ?>
                    <div class="brand-logo">
                        <img src="<?= $anhDanhMuc['anh'] ?>" alt="#">
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<!-- End Phần Thương hiệu hiện có -->

<!-- Phần đánh giá và trải nghiệm -->
<section class="blog-section section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Đánh giá sau trải nghiệm</h2>
                    <p>Những đánh giá của người dùng khi tải nghiệm thực tế sản phẩm.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Blog -->
                <div class="single-blog">
                    <div class="blog-img">
                        <a href="blog-single-sidebar.html">
                            <img src="assets/images/blog/blog-1.jpg" alt="#">
                        </a>
                    </div>
                    <div class="blog-content">
                        <a class="category" href="javascript:void(0)">eCommerce</a>
                        <h4>
                            <a href="blog-single-sidebar.html">What information is needed for shipping?</a>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt.</p>
                        <div class="button">
                            <a href="javascript:void(0)" class="btn">Read More</a>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Blog -->
                <div class="single-blog">
                    <div class="blog-img">
                        <a href="blog-single-sidebar.html">
                            <img src="assets/images/blog/blog-2.jpg" alt="#">
                        </a>
                    </div>
                    <div class="blog-content">
                        <a class="category" href="javascript:void(0)">Gaming</a>
                        <h4>
                            <a href="blog-single-sidebar.html">Interesting fact about gaming consoles</a>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt.</p>
                        <div class="button">
                            <a href="javascript:void(0)" class="btn">Read More</a>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Blog -->
                <div class="single-blog">
                    <div class="blog-img">
                        <a href="blog-single-sidebar.html">
                            <img src="assets/images/blog/blog-3.jpg" alt="#">
                        </a>
                    </div>
                    <div class="blog-content">
                        <a class="category" href="javascript:void(0)">Electronic</a>
                        <h4>
                            <a href="blog-single-sidebar.html">Electronics, instrumentation & control engineering
                            </a>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt.</p>
                        <div class="button">
                            <a href="javascript:void(0)" class="btn">Read More</a>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
        </div>
    </div>
</section>
<!-- End Phần đánh giá và trải nghiệm -->

<!-- Start Phần ship & hỗ trợ -->
<section class="shipping-info">
    <div class="container">
        <ul>
            <!-- Free Shipping -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-delivery"></i>
                </div>
                <div class="media-body">
                    <h5>Free Shipping</h5>
                    <span>On order over $99</span>
                </div>
            </li>
            <!-- Money Return -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-support"></i>
                </div>
                <div class="media-body">
                    <h5>24/7 Support.</h5>
                    <span>Live Chat Or Call.</span>
                </div>
            </li>
            <!-- Support 24/7 -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-credit-cards"></i>
                </div>
                <div class="media-body">
                    <h5>Online Payment.</h5>
                    <span>Secure Payment Services.</span>
                </div>
            </li>
            <!-- Safe Payment -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-reload"></i>
                </div>
                <div class="media-body">
                    <h5>Easy Return.</h5>
                    <span>Hassle Free Shopping.</span>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- End Phần ship & hỗ trợ -->

<?php include_once 'layout/footer.php'; ?><!-- footer -->