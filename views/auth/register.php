<?php include_once './views/layout/header.php'; ?><!-- header -->

<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Đăng ký</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                    <li>Đăng ký</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Account Register Area -->
<div class="account-login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                <div class="register-form">
                    <div class="title">
                        <h3>Đăng ký</h3>
                        <p>Nếu bạn chưa có hãy đăng ký tài khoản để truy cập vào trang.</p>
                    </div>
                    <form class="row" method="post">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-fn">First Name</label>
                                <input class="form-control" type="text" id="reg-fn" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-ln">Last Name</label>
                                <input class="form-control" type="text" id="reg-ln" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-email">E-mail Address</label>
                                <input class="form-control" type="email" id="reg-email" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-phone">Phone Number</label>
                                <input class="form-control" type="text" id="reg-phone" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-pass">Password</label>
                                <input class="form-control" type="password" id="reg-pass" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-pass-confirm">Confirm Password</label>
                                <input class="form-control" type="password" id="reg-pass-confirm" required>
                            </div>
                        </div>
                        <div class="button">
                            <button class="btn" type="submit">Đăng ký</button>
                        </div>
                        <p class="outer-link">Đã có tài khoản? <a href="<?= BASE_URL . '?act=login' ?>">Đăng nhập</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Account Register Area -->



<?php include_once './views/layout/footer.php'; ?><!-- footer -->