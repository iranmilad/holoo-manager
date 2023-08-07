<x-main title="اشتراک ها" icon="./assets/media/icons/important.png">
	<!-- begin:Card -->
	<div class="card mb-5 mb-xl-10">
		<div class="card-header border-0">
			<div class="card-title m-0">
				<h3 class="fw-bold m-0">کد اشتراک</h3>
			</div>
		</div>
		<form class="form">
			<div class="card-body border-top p-9">
				<!--begin:: Group-->
				<div class="row mb-6">
					<!--begin::Tags-->
					<label class="col-lg-4 col-form-label required fw-semibold fs-6">کد اشتراک خود را در این قسمت وارد کنید</label>
					<!--end::Tags-->
					<!--begin::Col-->
					<div class="col-lg-8">
						<!--begin::Col-->
						<input type="text" name="fname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="کد خود را وارد کنید" value="{{ $user->activeLicense }}" />
						<!--end::Col-->
					</div>
					<!--end::Col-->
				</div>
				<!--end::group-->
			</div>
			<div class="card-footer border-0 d-flex justify-content-end py-6 px-9">
				<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">ذخیره</button>
			</div>
		</form>
	</div>
	<div class="card mb-5 mb-xl-10">
		<div class="card-body border-top p-9">

			<div class="notice d-flex bg-light-{{ $user->active==true ? 'success' : 'warning'}} rounded border-{{ $user->active==true ? 'success' : 'warning'}} border border-dashed p-6 align-items-center">
				<!--begin::Icon-->
				<i class="ki-duotone ki-information fs-2tx text-{{ $user->active==true ? 'success' : 'warning'}} me-4">
					<span class="path1"></span>
					<span class="path2"></span>
					<span class="path3"></span>
				</i>
				<!--end::Icon-->
				<!--begin::Wrapper-->
				<div >
					<!--begin::Content-->
					<div class="fw-semibold">
                        @if($user->active==true and $user->poshak)

						<h4 class="text-gray-900 fw-bold m-0">اشتراک افزونه فروشگاهی ویژه نیلا برای حساب شما فعال شده است</h4>
                        <p class="m-0">{{ auth()->user()->days_since_registration }} روز از اعتبار شما باقی مانده است </p>
                        @elseif($user->active==true)
                        <h4 class="text-gray-900 fw-bold m-0">اشتراک افزونه فروشگاهی نیلا برای حساب شما فعال شده است</h4>
                        <p class="m-0">{{ auth()->user()->days_since_registration }} روز از اعتبار شما باقی مانده است </p>
                        @else
                        <h4 class="text-gray-900 fw-bold m-0">اشتراک افزونه شما به دلیل انقضا غیرفعال شده است</h4>
                        @endif
					</div>
					<!--end::Content-->
				</div>
				<!--end::Wrapper-->
			</div>
		</div>
	</div>
	<!-- begin: plans -->
	<!--begin::Post-->
	<div class="content flex-row-fluid d-none" id="kt_content">
		<!--begin::قیمت گذاری card-->
		<div class="card" id="kt_pricing">
			<!--begin::کارت body-->
			<div class="card-body p-lg-17">
				<!--begin::برنامه ریزی ها-->
				<div class="d-flex flex-column">
					<!--begin::Heading-->
					<div class="mb-13 text-center">
						<h1 class="fs-2hx fw-bold mb-5">برنامه را انتخاب کنید</h1>
						<div class="text-gray-400 fw-semibold fs-5">
							در صورت داشتن هر گونه سوال در خصوص پلن ها با ما در تماس باشید
						</div>
					</div>
					<!--end::Heading-->
					<!--begin::Row-->
					<div class="row g-10">
						<!--begin::Col-->
						<div class="col-xl-4">
							<div class="d-flex h-100 align-items-center">
								<!--begin::Option-->
								<div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
									<!--begin::Heading-->
									<div class="mb-7 text-center">
										<!--begin::Title-->
										<h1 class="text-dark mb-5 fw-bolder">استارت آپ</h1>
										<!--end::Title-->
										<!--begin::توضیحات-->
										<div class="text-gray-400 fw-semibold mb-5">بهینه برای اندازه 10+ تیم
											<br />استارت آپ
										</div>
										<!--end::توضیحات-->
										<!--begin::قیمت-->
										<div class="text-center">
											<span class="fs-3x fw-bold text-primary" data-kt-plan-price-month="39" data-kt-plan-price-annual="399">99000</span>
											<span class="fs-7 fw-semibold opacity-50">ريال
										</div>
										<!--end::قیمت-->
									</div>
									<!--end::Heading-->
									<!--begin::ویژگی ها-->
									<div class="w-100 mb-10">
										<!--begin::آیتم-->
										<div class="d-flex align-items-center mb-5">
											<span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">فعال ترین کاربران</span>
											<i class="ki-duotone ki-check-circle fs-1 text-success">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
										<!--begin::آیتم-->
										<div class="d-flex align-items-center mb-5">
											<span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">حداکثر 30 ادغام پروژه</span>
											<i class="ki-duotone ki-check-circle fs-1 text-success">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
										<!--begin::آیتم-->
										<div class="d-flex align-items-center mb-5">
											<span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">ماژول تجزیه و تحلیل</span>
											<i class="ki-duotone ki-check-circle fs-1 text-success">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
										<!--begin::آیتم-->
										<div class="d-flex align-items-center mb-5">
											<span class="fw-semibold fs-6 text-gray-400 flex-grow-1">ماژول دارایی ، مالیه ، سرمایه گذاری</span>
											<i class="ki-duotone ki-cross-circle fs-1">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
										<!--begin::آیتم-->
										<div class="d-flex align-items-center mb-5">
											<span class="fw-semibold fs-6 text-gray-400 flex-grow-1">ماژول حسابداری</span>
											<i class="ki-duotone ki-cross-circle fs-1">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
										<!--begin::آیتم-->
										<div class="d-flex align-items-center mb-5">
											<span class="fw-semibold fs-6 text-gray-400 flex-grow-1">بستر شبکه</span>
											<i class="ki-duotone ki-cross-circle fs-1">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
										<!--begin::آیتم-->
										<div class="d-flex align-items-center">
											<span class="fw-semibold fs-6 text-gray-400 flex-grow-1">فضای نامحدود ابر</span>
											<i class="ki-duotone ki-cross-circle fs-1">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
									</div>
									<!--end::ویژگی ها-->
									<!--begin::انتخاب-->
									<a href="#" class="btn btn-sm btn-primary">انتخاب</a>
									<!--end::انتخاب-->
								</div>
								<!--end::Option-->
							</div>
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-xl-4">
							<div class="d-flex h-100 align-items-center">
								<!--begin::Option-->
								<div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-20 px-10">
									<!--begin::Heading-->
									<div class="mb-7 text-center">
										<!--begin::Title-->
										<h1 class="text-dark mb-5 fw-bolder">پیشرفته</h1>
										<!--end::Title-->
										<!--begin::توضیحات-->
										<div class="text-gray-400 fw-semibold mb-5">بهینه برای اندازه 100+ تیم
											<br />کمپانی
										</div>
										<!--end::توضیحات-->
										<!--begin::قیمت-->
										<div class="text-center">
											<span class="fs-3x fw-bold text-primary" data-kt-plan-price-month="339" data-kt-plan-price-annual="3399">199000</span>
											<span class="fs-7 fw-semibold opacity-50">ريال
										</div>
										<!--end::قیمت-->
									</div>
									<!--end::Heading-->
									<!--begin::ویژگی ها-->
									<div class="w-100 mb-10">
										<!--begin::آیتم-->
										<div class="d-flex align-items-center mb-5">
											<span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">فعال ترین کاربران</span>
											<i class="ki-duotone ki-check-circle fs-1 text-success">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
										<!--begin::آیتم-->
										<div class="d-flex align-items-center mb-5">
											<span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">حداکثر 30 ادغام پروژه</span>
											<i class="ki-duotone ki-check-circle fs-1 text-success">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
										<!--begin::آیتم-->
										<div class="d-flex align-items-center mb-5">
											<span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">ماژول تجزیه و تحلیل</span>
											<i class="ki-duotone ki-check-circle fs-1 text-success">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
										<!--begin::آیتم-->
										<div class="d-flex align-items-center mb-5">
											<span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">ماژول دارایی ، مالیه ، سرمایه گذاری</span>
											<i class="ki-duotone ki-check-circle fs-1 text-success">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
										<!--begin::آیتم-->
										<div class="d-flex align-items-center mb-5">
											<span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">ماژول حسابداری</span>
											<i class="ki-duotone ki-check-circle fs-1 text-success">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
										<!--begin::آیتم-->
										<div class="d-flex align-items-center mb-5">
											<span class="fw-semibold fs-6 text-gray-400 flex-grow-1">بستر شبکه</span>
											<i class="ki-duotone ki-cross-circle fs-1">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
										<!--begin::آیتم-->
										<div class="d-flex align-items-center">
											<span class="fw-semibold fs-6 text-gray-400 flex-grow-1">فضای نامحدود ابر</span>
											<i class="ki-duotone ki-cross-circle fs-1">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
									</div>
									<!--end::ویژگی ها-->
									<!--begin::انتخاب-->
									<a href="#" class="btn btn-sm btn-primary">انتخاب</a>
									<!--end::انتخاب-->
								</div>
								<!--end::Option-->
							</div>
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-xl-4">
							<div class="d-flex h-100 align-items-center">
								<!--begin::Option-->
								<div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
									<!--begin::Heading-->
									<div class="mb-7 text-center">
										<!--begin::Title-->
										<h1 class="text-dark mb-5 fw-bolder">شرکت، پروژه</h1>
										<!--end::Title-->
										<!--begin::توضیحات-->
										<div class="text-gray-400 fw-semibold mb-5">بهینه برای 1000+ تیم
											<br />سازمانی
										</div>
										<!--end::توضیحات-->
										<!--begin::قیمت-->
										<div class="text-center">
											<span class="fs-3x fw-bold text-primary" data-kt-plan-price-month="999" data-kt-plan-price-annual="9999">299000</span>
											<span class="fs-7 fw-semibold opacity-50">ريال
										</div>
										<!--end::قیمت-->
									</div>
									<!--end::Heading-->
									<!--begin::ویژگی ها-->
									<div class="w-100 mb-10">
										<!--begin::آیتم-->
										<div class="d-flex align-items-center mb-5">
											<span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">فعال ترین کاربران</span>
											<i class="ki-duotone ki-check-circle fs-1 text-success">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
										<!--begin::آیتم-->
										<div class="d-flex align-items-center mb-5">
											<span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">حداکثر 30 ادغام پروژه</span>
											<i class="ki-duotone ki-check-circle fs-1 text-success">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
										<!--begin::آیتم-->
										<div class="d-flex align-items-center mb-5">
											<span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">ماژول تجزیه و تحلیل</span>
											<i class="ki-duotone ki-check-circle fs-1 text-success">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
										<!--begin::آیتم-->
										<div class="d-flex align-items-center mb-5">
											<span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">ماژول دارایی ، مالیه ، سرمایه گذاری</span>
											<i class="ki-duotone ki-check-circle fs-1 text-success">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
										<!--begin::آیتم-->
										<div class="d-flex align-items-center mb-5">
											<span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">ماژول حسابداری</span>
											<i class="ki-duotone ki-check-circle fs-1 text-success">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
										<!--begin::آیتم-->
										<div class="d-flex align-items-center mb-5">
											<span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">بستر شبکه</span>
											<i class="ki-duotone ki-check-circle fs-1 text-success">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
										<!--begin::آیتم-->
										<div class="d-flex align-items-center">
											<span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">فضای نامحدود ابر</span>
											<i class="ki-duotone ki-check-circle fs-1 text-success">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
										<!--end::آیتم-->
									</div>
									<!--end::ویژگی ها-->
									<!--begin::انتخاب-->
									<a href="#" class="btn btn-sm btn-primary">انتخاب</a>
									<!--end::انتخاب-->
								</div>
								<!--end::Option-->
							</div>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
				</div>
				<!--end::برنامه ریزی ها-->
			</div>
			<!--end::کارت body-->
		</div>
		<!--end::قیمت گذاری card-->
	</div>
	<!--end::Post-->
	<!-- end: plans -->
</x-main>
