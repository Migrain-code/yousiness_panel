<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from finlab.dexignlab.com/codeigniter/demo/page_login by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Dec 2022 10:01:08 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="FinLab : Crypto Trading UI Codeigniter Admin Dashboard" />
    <meta property="og:title" content="FinLab : Crypto Trading UI Codeigniter Admin Dashboard" />
    <meta property="og:description" content="FinLab : Crypto Trading UI Codeigniter Admin Dashboard" />
    <meta property="og:image" content="../social-image.html" />
    <meta name="format-detection" content="telephone=no">
    <title>Hızlı Randevu Admin Panel</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/admin/assets/images/favicon.png">
    <link href="/admin/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/admin/assets/css/style.css" rel="stylesheet">

</head>



<body class="vh-100">
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form page-r-logo">
                                <div class="text-center mb-3">
                                    <a href="index.html"><img src="/admin/assets/images/logo-full.png" alt=""></a>
                                    <a href="index.html"><img src="/admin/assets/images/logo-full-light.png" alt="" class="light-logo m-auto"></a>
                                </div>
                                <h4 class="fs-20 text-center">Sign in your account</h4>
                                <div class="sign-in-your py-4 px-2">
                                    <form action="{{route('admin.login')}}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" value="hello@example.com">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control" value="12345678">
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                                <div class="form-check custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <a href="page_forgot_password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="/admin/assets/vendor/global/global.min.js"></script>
<script src="/admin/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/admin/assets/js/dlabnav-init.js"></script>
<script src="/admin/assets/js/custom.js"></script>
</body>

<!-- Mirrored from finlab.dexignlab.com/codeigniter/demo/page_login by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Dec 2022 10:01:09 GMT -->
</html>
