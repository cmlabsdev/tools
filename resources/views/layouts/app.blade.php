<!DOCTYPE html>

<html lang="{{$local}}">
<!--begin::Head-->
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta-desc')" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keyword" content="@yield('meta-keyword')"/>
    <link rel="canonical" href="https://tools.cmlabs.co<?php echo $_SERVER['REQUEST_URI'];?>">
    <meta property="og:type" content="tools"/>
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:description" content="@yield('meta-desc')"/>
    <meta property="og:url" content="https://tools.cmlabs.co<?php echo $_SERVER['REQUEST_URI'];?>"/>
    <meta property="og:image" content="{{asset('media/logos/new/new-logo-default.png')}}" />
    <meta property="og:image:width" content="1142" />
    <meta property="og:image:height" content="1142" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(env('APP_ENV')==='production')
        <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156389913-2"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'UA-156389913-2');
            </script>
        @endif
    @if(env('APP_ENV')==='development')
        <meta name="robots" content="noindex,nofollow">
    @endif
    @if(env('APP_ENV')==='production')
        <meta name="robots" content="index,follow">
    @endif
    <link rel="alternate" hreflang="en-ID" href="https://tools.cmlabs.co/@yield('en-link')" />
    <link rel="alternate" hreflang="id-ID" href="https://tools.cmlabs.co/@yield('id-link')" />
    <!--begin::Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{asset('plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('plugins/global/plugins.bundle.css?v=7.0.9')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/custom/prismjs/prismjs.bundle.css?v=7.0.9')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/style.bundle.css?v=7.0.9')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/themes/layout/header/base/light.css?v=7.0.9')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/themes/layout/header/menu/light.css?v=7.0.9')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/themes/layout/aside/light.css?v=7.0.9')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/themes/layout/brand/light.css?v=7.0.9')}}" rel="stylesheet" type="text/css"/>

    <!-- Custom Page CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css"/>


    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.14/dist/css/splide.min.css">
    @stack('style')

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{ asset('media/logos/cmlabs.ico') }}"/>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed">
<!--begin::Main-->
<!--begin::Header Mobile-->
@include('layouts.headermobile')
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        @include('layouts.asidemobile')
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper custom-wrapper" id="kt_wrapper">
            <!--begin::Header-->
            @include('layouts.header')
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-row-fluid custom-data-content pb-0" id="kt_content">
              @include('layouts.subheader')
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div style="padding-top: 20px; width:100%">
                        @yield('content')
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>
            <!--end::Content-->
            @include('layouts.footernew')
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
                <!--end::Svg Icon-->
			</span>
</div>
<!--end::Scrolltop-->
<!--end::Demo Panel-->
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#8950FC", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Roboto" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{asset('plugins/global/plugins.bundle.js?v=7.0.5')}}"></script>
<script src="{{asset('plugins/custom/prismjs/prismjs.bundle.js?v=7.0.5')}}"></script>
<script src="{{asset('js/scripts.bundle.js?v=7.0.9')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.14/dist/js/splide.min.js"></script>


<!-- Custom JS -->
<script src="{{ asset('js/custom.js?v=20210116213500')}}"></script>

<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.5')}}"></script>
<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM?v=7.0.5"></script>
<script src="{{asset('plugins/custom/gmaps/gmaps.js?v=7.0.5')}}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('js/pages/widgets.js?v=7.0.5')}}"></script>
<script>const lang = "{{\Illuminate\Support\Facades\App::getLocale()}}"</script>
<script type="text/javascript">
  var sticky = new Sticky('.sticky');
  sticky.update();
  window.onresize = function(e) {
    sticky.update();
  };
</script>
<script>

</script>
<script src="{{asset('js/logic/cta-function.js')}}"></script>
@stack('script')
<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>
