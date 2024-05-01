<x-main title="بارگزاری محصولات" icon="./assets/media/icons/uploadproduct.png">
  @section('css')
  <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
  @endsection
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">بارگزاری محصولات</h3>
      </div>
    </div>
    <div class="card-body border-top p-9">
      <!--begin:: Group-->
      <div class="row mb-6">
        <!--begin::Tags-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">گروه محصولات</label>
        <!--end::Tags-->
        <!--begin::Col-->
        <div class="col-lg-8">
          <!--begin::Col-->
          <select class="form-select form-select-solid" data-control="select2" id="products_select" data-close-on-select="true" data-placeholder="انتخاب کنید"  data-minimum-results-for-search="Infinity">
            <option></option>
            @foreach ($categories as $category)
                <option value="{{  $category['code'] }}">{{  $category->name }}</option>
            @endforeach

          </select>
          <!--end::Col-->




        </div>
        <!--end::Col-->
      </div>
      <!--end::group-->
      <!--begin:: Group-->
      <div class="row mb-6">
        <!--begin::Tags-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">گروه هدف</label>
        <!--end::Tags-->
        <!--begin::Col-->
        <div class="col-lg-8">
          <!--begin::Col-->
          <select class="form-select form-select-solid" data-control="select2" id="products_select_2" data-close-on-select="true" data-placeholder="انتخاب کنید" data-minimum-results-for-search="Infinity">
          <option></option>
           @foreach ($wcCategories as $wcCategory)

                <option value="{{ $wcCategory->code }}">{{ $wcCategory->name }}</option>

            @endforeach
          </select>
          <!--end::Col-->
        </div>
        <!--end::Col-->
      </div>
      <!--end::group-->





      <div class="row mb-6">
        <div class="col-12">
          <div class="d-flex flex-column justify-content-center container-fluid" id="products_container">
            <div class="row">
              <div class="mt-4">
                <div class="d-flex justify-content-end align-items-center " data-kt-customer-table-toolbar="selected">
                <button type="button" class="btn btn-sm btn-info" style="visibility: hidden;" id="delete_selected">ثبت انتخاب شده</button>
                </div>
              </div>
            </div>
            <!-- START:TABLE -->
            <table id="products" class="table table-striped table-row-bordered gy-5 gs-7">
              <thead>
                <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                <th class="w-10px pe-2">
                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                      <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#products .form-check-input" value="1" />
                    </div>
                  </th>
                  <th class="cursor-pointer p-0 pb-3 min-w-175px text-start">نام کالا</th>
                  <th class="cursor-pointer p-0 pb-3 min-w-175px text-start">کد هلو</th>
                  <th class="cursor-pointer p-0 pb-3 min-w-175px text-start">موجودی</th>
                  <th class="cursor-pointer p-0 pb-3 min-w-175px text-start">قیمت</th>
                  <th class="p-0 pb-3 min-w-100px text-end">عملیات</th>
                </tr>
              </thead>
            </table>
            <!-- END:TABLE -->
          </div>
        </div>
      </div>
    </div>
  </div>
  @section('js')
  <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
  <script>
    Products()
  </script>
  @endsection
</x-main>
