<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keys')">
    <title>@yield('title', setting('appy_site_title'). " | ". "Business Startseite")</title>

    <meta name="author" content="{{config('settings.site_owner')}}">
    <!-- Place favicon.ico in the root directory -->
    @include('layouts.component.styles')
</head>

<body>

<!-- preloader -->
<div id="preloader">
    <div class="preloader">
        <span></span>
        <span></span>
    </div>
</div>
<!-- preloader end  -->

<!-- back-to-top-start  -->
<button class="scroll-top scroll-to-target" data-target="html">
    <i class="far fa-angle-double-up"></i>
</button>

@include('layouts.menu.mobile')
@include('layouts.menu.top')
<div class="mouseCursor cursor-inner"><a  href="#"><i class="fas fa-play"></i></a></div>
<div class="mouseCursor cursor-outer"></div>
<div id="smooth-wrapper">
    <div id="smooth-content">