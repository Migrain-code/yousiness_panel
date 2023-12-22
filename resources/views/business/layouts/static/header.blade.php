<!DOCTYPE html>
<html lang="de">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">

    <title> {{setting('appy_site_title') . ' | ' }} @yield('title')  </title>

    @include('business.layouts.component.links')
</head>
<body>

<!--*******************
    Preloader start
********************-->

<!--
    <div id="preloader">
    <div class="loader"></div>
</div>
-->
<!--*******************
    Preloader end
********************-->

<!--**********************************Main wrapper start***********************************-->
<div id="main-wrapper">

    <!--********************************** Nav header start ***********************************-->
    <div class="nav-header">
        <a href="{{route('business.home')}}" class="brand-logo">
            <img src="{{asset(setting('bussiness_main_white_logo'))}}" style="width: 100%;border-radius: 15px">
        </a>
        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="22" y="11" width="4" height="4" rx="2" fill="#2A353A"/>
                    <rect x="11" width="4" height="4" rx="2" fill="#2A353A"/>
                    <rect x="22" width="4" height="4" rx="2" fill="#2A353A"/>
                    <rect x="11" y="11" width="4" height="4" rx="2" fill="#2A353A"/>
                    <rect x="11" y="22" width="4" height="4" rx="2" fill="#2A353A"/>
                    <rect width="4" height="4" rx="2" fill="#2A353A"/>
                    <rect y="11" width="4" height="4" rx="2" fill="#2A353A"/>
                    <rect x="22" y="22" width="4" height="4" rx="2" fill="#2A353A"/>
                    <rect y="22" width="4" height="4" rx="2" fill="#2A353A"/>
                </svg>
            </div>
        </div>
    </div>
    <!--**********************************Nav header end***********************************-->
    @include('business.layouts.component.box.chat')
    <!--**********************************Top Menu start ***********************************-->
    @include('business.layouts.menu.top')
    <!--**********************************Top Menu end***********************************-->
    <!--**********************************Sidebar start***********************************-->
    @include('business.layouts.menu.sidebar')
    <!--**********************************Sidebar end***********************************-->
    <div class="content-body">
        <div class="container-fluid">


