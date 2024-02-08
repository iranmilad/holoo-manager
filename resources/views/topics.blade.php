<x-main title="سرفصل ها" icon="./assets/media/icons/task.png">
  <!-- START: CARD -->
  <div class="card mb-5 mb-xl-10">
    <form method="POST" class="form" action="/topics">
        @csrf
      @foreach ($wcPaymentGateways as $wcPaymentGateway)
        <div class="card-body border-top p-9">
            <div class="card-title mb-6">
            <h3 class="fw-bold m-0">{{ $wcPaymentGateway->title }}</h3>
            </div>
            <!--begin:: Group-->
            <div class="row mb-6">
            <!--begin::Tags-->
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">شماره سرفصل</label>
            <!--end::Tags-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Col-->
                <select name="holo[{{ $wcPaymentGateway->id }}][number]" class="form-select form-select-solid" data-control="select2" data-close-on-select="true" data-placeholder="انتخاب کنید" data-allow-clear="false">
                @foreach ($holoAccounts as $account)
                        @php
                            $selected = (is_object($user->config->payment) and property_exists($user->config->payment,$wcPaymentGateway->id)) ? $user->config->payment->{$wcPaymentGateway->id}->number==$account->sarfasl_Code : false;
                        @endphp
                        <option value="{{ $account->sarfasl_Code }}" @if($selected) selected @endif>{{ $account->sarfasl_Name }}</option>
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
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">کارمزد درگاه</label>
            <!--end::Tags-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Col-->
                @php
                    $fee = $user->config->payment->{$wcPaymentGateway->id}->fee ?? null;
                @endphp
                <input type="text" name="holo[{{ $wcPaymentGateway->id }}][fee]" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="کارمزد درگاه" value="{{ $fee }}" />
                <!--end::Col-->
            </div>
            <!--end::Col-->
            </div>
            <!--end::group-->
            <!--begin:: Group-->
            <div class="row mb-6">
            <!--begin::Tags-->
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">مالیات بر ارزش افزوده</label>
            <!--end::Tags-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Col-->
                <label class="form-check form-switch form-check-custom form-check-solid">
                @php
                    $checked = isset($user->config->payment->{$wcPaymentGateway->id}) && $user->config->payment->{$wcPaymentGateway->id}->vat==true;
                    $value = isset($checked) ? 1 : 0;
                @endphp

                <input name="holo[{{ $wcPaymentGateway->id }}][vat]" class="form-check-input" type="checkbox" value="{{ $value }}" @if($checked) checked @endif/>
                </label>
                <!--end::Col-->
            </div>
            <!--end::Col-->
            </div>
            <!--end::group-->
        </div>
      @endforeach

      <!--START:CARD FOOTER  -->
      <div class="card-footer border-0 d-flex justify-content-end py-6 px-9">
        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">ذخیره</button>
      </div>
      <!-- END:CARD FOOTER -->
    </form>
  </div>
  <!-- END:CARD -->
</x-main>
