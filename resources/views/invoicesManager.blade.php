<x-main title="مدیریت فاکتور ها" icon="./assets/media/icons/computer-monitor.png">
  <!-- START: CARD -->
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">تنظیمات فاکتور ها</h3>
      </div>
    </div>
    <form method="POST" class="form" action="/invoicesActive">
        @csrf
      <div class="card-body border-top p-9">
        <!--begin:: Group-->
        <div class="row mb-6">
          <!--begin::Tags-->
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">وضعیت فاکتور ها</label>
          <!--end::Tags-->
          <!--begin::Col-->
          <div class="col-lg-8">
            <!--begin::Col-->
            <select name="config[save_sale_invoice]" class="form-select form-select-solid" data-control="select2"  data-placeholder="انتخاب کنید" data-close-on-select="true"  data-minimum-results-for-search="Infinity">
              <option value="1" @selected($user->config->save_sale_invoice != "0")>ثبت خودکار</option>
              <option value="0" @selected($user->config->save_sale_invoice == "0")>ثبت دستی</option>
            </select>
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
  <!-- END: CARD -->
  <!-- START: CARD -->
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">لیست فاکتور ها</h3>
      </div>
    </div>
    <form>
      <div class="card-body border-top p-9">
        <div id="invoicesTableContainer" class="p-2">
          <div class="row mb-6 align-items-end">
            <div class="col-lg-4">
              <div class="mb-0">
                <label for="" class="form-label">انتخاب تاریخ</label>
                <input class="form-control form-control-solid" placeholder="انتخاب کنید" id="kt_datepicker_2" />
              </div>
            </div>
            <div class="col-lg-8 mt-4">
              <div class="d-flex justify-content-end align-items-center " data-kt-customer-table-toolbar="selected">
                <!-- <button type="button" class="btn btn-danger" id="delete_selected">حذف انتخاب شده</button> -->
              </div>
            </div>
          </div>
          <!--begin:: Group-->
          <div class="row mb-6">
            <table id="invoices_table1" class="table table-striped table-row-bordered gy-5 gs-7">
              <thead>
                <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                  <th class="w-10px pe-2">
                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                      <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#invoices_table1 .form-check-input" value="1"  data-close-on-select="true" />
                    </div>
                  </th>
                  <th class="cursor-pointer p-0 pb-3 min-w-175px text-start">شماره فاکتور</th>
                  <th class="cursor-pointer p-0 pb-3 min-w-175px text-start">نام طرف حساب</th>
                  <th class="cursor-pointer p-0 pb-3 min-w-100px text-start">مبلغ فاکتور</th>
                  <th class="cursor-pointer p-0 pb-3 min-w-100px text-start">وضعیت سرویس</th>
                  <th class="cursor-pointer p-0 pb-3 min-w-100px text-start">تاریخ</th>
                  <th class="p-0 pb-3 min-w-100px text-end">عملیات</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <!--end::group-->
        </div>

      </div>
    </form>
  </div>
  <!-- END: CARD -->
  @section('js')
  <script src="/assets/js/flatpicker_fa.js"></script>
  <script src="/assets/js/jdate.min.js"></script>
  <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
  <script>
    window.Date = window.JDate;
  </script>
  <script>
    InvoicesManager();
  </script>
  @endsection
</x-main>
