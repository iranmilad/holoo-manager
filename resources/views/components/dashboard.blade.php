<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl" style="direction: rtl;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title}}</title>
    @yield('css')
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .app-header {
            right: 0 !important;
        }

        .app-wrapper {
            margin-right: 0 !important;
        }
    </style>
</head>

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Header-->
        <div id="kt_app_header" class="app-header">
            <!--begin::Header container-->
            <div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
                <!--begin::Sidebar mobile toggle-->
                <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="مشاهده sidebar menu">
                    <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                        <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <!--end::Sidebar mobile toggle-->
                <!--begin::Mobile logo-->
                <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                    <a href="/" class="d-lg-none">
                        <img alt="Logo" src="assets/media/logos/default-small.svg" class="h-30px">
                    </a>
                </div>
                <!--end::Mobile logo-->
                <!--begin::Header wrapper-->
                <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
                    <!--begin::Menu wrapper-->
                    <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                        <!--begin::Menu-->
                        <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
                            <a href="/" class="d-flex align-items-center">
                                <img alt="Logo" src="assets/media/logos/default-dark.svg" class="h-25px app-sidebar-logo-default">
                                <img alt="Logo" src="assets/media/logos/default-small.svg" class="h-20px app-sidebar-logo-minimize">
                            </a>
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Menu wrapper-->
                    <!--begin::Navbar-->
                    <div class="app-navbar flex-shrink-0">
                        <!--begin::Theme mode-->
                        <div class="app-navbar-item ms-1 ms-md-3">
                            <!--begin::Menu toggle-->
                            <a href="#" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                <i class="ki-duotone ki-night-day theme-light-show fs-2 fs-lg-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                    <span class="path7"></span>
                                    <span class="path8"></span>
                                    <span class="path9"></span>
                                    <span class="path10"></span>
                                </i>
                                <i class="ki-duotone ki-moon theme-dark-show fs-2 fs-lg-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </a>
                            <!--begin::Menu toggle-->
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2 active" data-kt-element="mode" data-kt-value="light">
                                        <span class="menu-icon" data-kt-element="icon">
                                            <i class="ki-duotone ki-night-day fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                                <span class="path6"></span>
                                                <span class="path7"></span>
                                                <span class="path8"></span>
                                                <span class="path9"></span>
                                                <span class="path10"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">روشن</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                        <span class="menu-icon" data-kt-element="icon">
                                            <i class="ki-duotone ki-moon fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">تیره</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                                        <span class="menu-icon" data-kt-element="icon">
                                            <i class="ki-duotone ki-screen fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">سیستم</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Theme mode-->
                        <!--begin::کاربر menu-->
                        <div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
                            <!--begin::Menu wrapper-->
                            <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                <img src="assets/media/avatars/blank.png" alt="user">
                                <span class="symbol-badge badge badge-circle bg-success start-100" id="notification_count"></span>
                            </div>
                            <!--begin::کاربر account menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content d-flex align-items-center px-3">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px me-5">
                                            <img alt="Logo" src="assets/media/avatars/blank.png">
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::کاربرname-->
                                        <div class="d-flex flex-column">
				                                    <div class="fw-bold d-flex align-items-center fs-5">{{ Auth::user()->name  }}
				                                        <span class="badge badge-light-warning fw-bold fs-8 px-2 py-1 ms-2">{{ (Auth::user()->active==1)  ? "اشتراک فعال"  : "اشتراک منقضی" }}</span>
				                                    </div>
				                                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">اشتراک افزونه نیلا</a>
				                                </div>
                                        <!--end::کاربرname-->
                                    </div>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
				                        <a href="/account" class="menu-link px-5">تنظیمات حساب</a>
				                        </div>
				                        <!--end::Menu item-->
																<!--begin::Menu item-->
				                        <!-- <div class="menu-item px-5">
				                            <a href="/messages" class="menu-link px-5">پیام ها</a>
				                        </div> -->
				                        <!--end::Menu item-->
				                        <!--begin::Menu item-->
				                        <div class="menu-item px-5">
				                            <a href="/subscriptions" class="menu-link px-5">اشتراک</a>
				                        </div>
				                        <!--end::Menu item-->
				                        <!--begin::Menu separator-->
				                        <div class="separator my-2"></div>
				                        <!--end::Menu separator-->
				                        <!--begin::Menu item-->
				                        <div class="menu-item px-5">
				                            <a href="/logout" class="menu-link px-5 text-danger">خروج</a>
				                        </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::کاربر account menu-->
                            <!--end::Menu wrapper-->
                        </div>
                        <!--end::کاربر menu-->
                    </div>
                    <!--end::Navbar-->
                </div>
                <!--end::Header wrapper-->
            </div>
            <!--end::Header container-->
        </div>
        <!--end::Header-->
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6" data-select2-id="select2-data-kt_app_toolbar">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack" data-select2-id="select2-data-kt_app_toolbar_container">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{$title}}</h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    <x-breadcrumb />
                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Page title-->
                            </div>
                            <!--end::Toolbar container-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-xxl">
                                <!-- begin::PAGE -->
                                {{$slot}}
                                <!-- begin::PAGE -->
                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->
                    <div id="kt_app_footer" class="app-footer">
                        <!--begin::Footer container-->
                        <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                            <!--begin::Copyright-->
                            <div class="text-dark order-2 order-md-1">
                                <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">داشبورد مدیریت نیلا</a>
                                <span class="text-muted fw-semibold me-1">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                </span>
                            </div>
                            <!--end::Copyright-->
                            <!--begin::Menu-->
                            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1 d-none">
                                <li class="menu-item">
                                    <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">درباره ی ما</a>
                                </li>
                                <li class="menu-item">
                                    <a href="https://rtl-theme.com" target="_blank" class="menu-link px-2">پشتیبانی</a>
                                </li>
                                <li class="menu-item">
                                    <a href="https://www.rtl-theme.com/metronic-admin-html-template/" target="_blank" class="menu-link px-2">خرید</a>
                                </li>
                            </ul>
                            <!--end::Menu-->
                        </div>
                        <!--end::Footer container-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>


    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
    <script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/widgets.js')}}"></script>
    <!-- CUSTOMJS -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
    @yield('js')
</body>

</html>
