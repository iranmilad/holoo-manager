<!DOCTYPE html>

<html lang="en" dir="rtl">

<head>
	<title>ورود</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="app-default">
	<script>
		var defaultThemeMode = "light";
		var themeMode;
		if (document.documentElement) {
			if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
				themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
			} else {
				if (localStorage.getitem("data-bs-theme") !== null) {
					themeMode = localStorage.getitem("data-bs-theme");
				} else {
					themeMode = defaultThemeMode;
				}
			}
			if (themeMode === "system") {
				themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
			}
			document.documentElement.setAttribute("data-bs-theme", themeMode);
		}
	</script>
	<div class="d-flex flex-column flex-root" id="kt_app_root">



		<div class="d-flex flex-column flex-center flex-column-fluid">

			<div class="d-flex flex-column flex-center text-center p-10">

				<div class="card card-flush w-lg-650px py-5">
					<div class="card-body py-15 py-lg-20">
						<!--begin::Logo-->
						<div class="mb-13">
							<a href="/" class="">
								<img alt="Logo" src="assets/media/logos/custom-2.svg" class="h-40px" />
							</a>
						</div>
						<!--end::Logo-->
						<!--begin::Title-->
						<h1 class="fw-bolder text-gray-900 mb-7">ورود</h1>
						<!--end::Counter-->
						<!--begin::Text-->
						<div class="fw-semibold fs-6 text-gray-500 mb-7">برای ورود به سیستم ، نام کاربری و گذرواژه خود را به درستی وارد کنید</div>
						<!--end::Text-->
						<!--begin::Form-->
						<form class="w-md-350px mb-2 mx-auto" method="post" id="kt_coming_soon_form" action="/login">
                            @csrf
							<div class="fv-row text-start">
								<div class="row gap-5">

									<!--end::Input=-->
									<div class="fv-row mb-3 mt-3">
										<input autocomplete="true" type="text" name="mobile" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="نام کاربری">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Input=-->

									<!--end::Input=-->
									<div class="fv-row mb-3">
										<input autocomplete="true" type="password" name="password" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="گذرواژه">
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Input=-->

									<div class="d-grid mb-10">
										<button type="submit" class="btn btn-primary">
											<span class="indicator-label">ورود</span>
										</button>
									</div>

									<div class="text-center">
										<a href="#" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom">
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
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
											<!--begin::Menu item-->
											<div class="menu-item px-3 my-0">
												<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
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
										</div>
									</div>


								</div>
						</form>

						<!--end::Illustration-->
					</div>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Authentication - Signup Welcome Message-->
	</div>
	<!--end::Root-->
	<!--begin::Javascript-->
	<script>
		var hostUrl = "assets/";
	</script>
	<!--begin::Global Javascript Bundle(mandatory for all pages)-->
	<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
	<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Custom Javascript(used for this page only)-->
	<!--end::Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>
