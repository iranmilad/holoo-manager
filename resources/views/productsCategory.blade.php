<x-main title="دسته بندی محصولات" icon="./assets/media/icons/blocks.png">
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">محصولات</h3>
      </div>
    </div>
    <form method="POST" class="form" action="/productscategory">
        @csrf
      <div class="card-body border-top p-9">
        <!--begin:: Group-->
        @foreach ($categories as $category)
        <div class="row mb-6">

                <!--begin::Tags-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ $category->name }}</label>
                <!--end::Tags-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Col-->
                    <select class="form-select form-select-solid" name="holo[{{$category->code}}][]" data-control="select2" data-hide-search="true" data-close-on-select="false" data-placeholder="انتخاب کنید" data-allow-clear="true" multiple="multiple" data-minimum-results-for-search="Infinity">
                        @foreach ($wcCategories as $wcCategory)
                            @php

                                $selected = isset($user->config->product_cat->{$category['code']}) && in_array($wcCategory->code, $user->config->product_cat->{$category->code});
                                if($one_select==0 and $selected==true){
                                    $one_select =  true;
                                }
                            @endphp
                            <option value="{{ $wcCategory->code }}" @if($selected) selected @endif>{{ $wcCategory->name }}</option>
                        @endforeach
                        @if($one_select==0)
                        <option value="" selected>عدم ذخیره</option>
                        @endif

                    </select>
                    <!--end::Col-->
                </div>
                <!--end::Col-->
        </div>
        @endforeach
        <!--end::group-->
      </div>
      <div class="card-footer border-0 d-flex justify-content-end py-6 px-9">
        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">ذخیره</button>
      </div>
    </form>
  </div>
</x-main>
