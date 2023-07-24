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
</head>

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default" data-kt-app-sidebar-minimize="on">

  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <x-header />
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <!--begin::Wrapper-->
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <!--begin::Sidebar-->
        <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
          <!--begin::Logo-->
          <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
            <!--begin::Logo image-->
            <a href="/">
              <img alt="Logo" src="assets/media/logos/default-dark.svg" class="h-25px app-sidebar-logo-default">
              <img alt="Logo" src="assets/media/logos/default-small.svg" class="h-20px app-sidebar-logo-minimize">
            </a>
            <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
              <i class="ki-duotone ki-double-left fs-2 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
              </i>
            </div>
            <!--end::Sidebar toggle-->
          </div>
          <!--end::Logo-->
          <!--begin::sidebar menu-->
          <div class="app-sidebar-menu overflow-hidden flex-column-fluid ">
            <!--begin::Menu wrapper-->
            <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true" style="height: 726px;">
              <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expو="false">
                <!--begin:Menu item-->
                <!-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion"> -->
                  <!--begin:Menu link-->
                  <!-- <span class="menu-link">
                    <span class="menu-icon">
                      <i class="ki-duotone ki-abstract-25 fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                      </i>
                    </span>
                    <span class="menu-title">منو</span>
                    <span class="menu-arrow"></span>
                  </span> -->
                  <!--end:Menu link-->
                  <!--begin:Menu sub-->
                  <!-- <div class="menu-sub menu-sub-accordion"> -->
                    <!--begin:Menu item-->
                    <!-- <div class="menu-item"> -->
                      <!--begin:Menu link-->
                      <!-- <a class="menu-link" href="./">
                        <span class="menu-bullet">
                          <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">زیر منو</span>
                      </a> -->
                      <!--end:Menu link-->
                    <!-- </div> -->
                    <!--end:Menu item-->
                  <!-- </div> -->
                  <!--end:Menu sub-->
                <!-- </div> -->
                <!--end:Menu item-->

            <!--begin:Array-->
            <?php
            $menu_items = [
              ["href" => "settings", "title" => "تنظیمات", "img" => "./assets/media/icons/gear.png"],
              ["href" => "updates", "title" => "بروزرسانی ها", "img" => "./assets/media/icons/updates.png"],
              ["href" => "products", "title" => "بارگزاری محصولات", "img" => "./assets/media/icons/uploadproduct.png"],
              ["href" => "/issuereporting", "title" => "گزارش گیری اشکالات", "img" => "./assets/media/icons/findoption.png"],
              ["href" => "productscategory", "title" => "دسته بندی ها", "img" => "./assets/media/icons/blocks.png"],
              ["href" => "topics", "title" => "سر فصل ها", "img" => "./assets/media/icons/task.png"],
              ["href" => "subscriptions", "title" => "اشتراک", "img" => "./assets/media/icons/important.png"],
              ["href" => "invoicesmanager", "title" => "مدیریت فاکتور ها", "img" => "./assets/media/icons/computer-monitor.png"],
              ["href" => "technicalreporting", "title" => "گزارش تبادل داده", "img" => "./assets/media/icons/warning-sign.png"]
            ];
            ?>
            <!--end:Array-->



                <!--begin:Menu-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                @foreach ($menu_items as $item)
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" href="{{ $item['href'] }}">
                    <span class="menu-icon">
                        <img src="{{ $item['img'] }}" height="25" width="25" class="" alt="">

                    </span>
                    <span class="menu-title">{{ $item['title'] }}</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                @endforeach
                </div>
                <!--end:Menu-->






              </div>
            </div>
            <!--end::Menu wrapper-->
          </div>
          <!--end::sidebar menu-->
        </div>
        <!--end::Sidebar-->
        <!--begin::Main-->
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <!--begin::Content wrapper-->
          <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6" data-select2-id="select2-data-kt_app_toolbar">
              <!--begin::Toolbar container-->
              <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack" data-select2-id="select2-data-kt_app_toolbar_container">
                <!--begin::Page title-->
                <div class="d-flex align-items-center">
                  <div class="symbol symbol-50px me-3">
                    <img src="{{$icon}}" height="50" width="50" class="" alt="">
                  </div>
                  <div class="d-flex justify-content-start flex-column">
                    <h2 class="page-heading d-flex text-dark fw-bold fs-4 flex-column justify-content-center my-0">{{$title}}</h2>
                    <x-breadcrumb />
                  </div>
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
                <a href="https://niladashboard.ir" target="_blank" class="text-gray-800 text-hover-primary">داشبورد مدیریت افزونه نیلا</a>
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
                  <a href="https://niladashboard.ir/" target="_blank" class="menu-link px-2">درباره ی ما</a>
                </li>
                <li class="menu-item">
                  <a href="https://niladashboard.ir/" target="_blank" class="menu-link px-2">پشتیبانی</a>
                </li>
                <li class="menu-item">
                  <a href="https://niladashboard.ir/" target="_blank" class="menu-link px-2">خرید</a>
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
  <script src="/assets/js/axios.min.js"></script>
  <!-- CUSTOMJS -->
  <script src="{{asset('assets/js/custom.js')}}"></script>
    @if (session('success'))
        <x-alarm msg="{{ session('success') }}" title="نتیجه عملیات" type="success" />
    @elseif (session('error'))
        <x-alarm msg="{{ session('error') }}" title="نتیجه عملیات" type="error" />
    @endif
  @yield('js')
</body>

</html>
