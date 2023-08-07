<x-main title="بروزرسانی ها" icon="./assets/media/icons/updates.png">
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">بروزرسانی ها</h3>
      </div>
    </div>
    <div class="card-body border-top p-9">
      <div class="row mb-6">
        <div class="col-lg-9">
          <p>دریافت به روزرسانی محصولات شامل موجودی و اخرین قیمت تنظیم شده (محدودیت درخواست هر 24 ساعت یکبار)</p>
        </div>
        <div class="col-lg-3">
            <a class="btn btn-flex btn-sm fw-bold btn-primary" href="/updates/updateAllProductFromHolooToWC">
                <i class="ki-duotone ki-fasten fs-6 me-1">
                <i class="path1"></i>
                <i class="path2"></i>
                </i>
                بروزرسانی محصولات
            </a>
        </div>
      </div>
      <div class="separator my-5"></div>
      <div class="row mb-6">
        <div class="col-lg-9">
          <p>دریافت دسته بندی محصولات از سرویس هلو و پیکربندی ووکامرس </p>
        </div>
        <div class="col-lg-3">
          <a class="btn btn-flex btn-sm fw-bold btn-primary" href="/updates/getProductCategory">
            <i class="ki-duotone ki-fasten fs-6 me-1">
              <i class="path1"></i>
              <i class="path2"></i>
            </i>
            دریافت دسته بندی محصولات
          </a>
        </div>
      </div>
        <div class="separator my-5"></div>
        <div class="row mb-6">
            <div class="col-lg-9">
                <p>دریافت کلیه کالاها از نرم افزار هلو </p>
            </div>
            <div class="col-lg-3">
                <a class="btn btn-flex btn-sm fw-bold btn-primary" href="/updates/wcAddAllHolooProductsCategory">
                    <i class="ki-duotone ki-fasten fs-6 me-1">
                    <i class="path1"></i>
                    <i class="path2"></i>
                    </i>
                    دریافت  محصولات
                </a>
            </div>
        </div>

        <div class="separator my-5"></div>
        <div class="row mb-6">
            <div class="col-lg-9">
                <p>خروجی محصولات با گروه بندی</p>
            </div>
            <div class="col-lg-3">
                <a class="btn btn-flex btn-sm fw-bold btn-primary"  target="_blank" href="/updates/wcGetExcelProducts">
                    <i class="ki-duotone ki-fasten fs-6 me-1">
                    <i class="path1"></i>
                    <i class="path2"></i>
                    </i>
                    خروجی فایل محصولات
                </a>
            </div>
        </div>


        <div class="separator my-5"></div>
        <div class="row mb-6">
            <div class="col-lg-9">
                <p>خروجی محصولات بدون گروه بندی</p>
            </div>
            <div class="col-lg-3">
                <a class="btn btn-flex btn-sm fw-bold btn-primary"  target="_blank" href="/updates/wcGetExcelProducts2">
                    <i class="ki-duotone ki-fasten fs-6 me-1">
                    <i class="path1"></i>
                    <i class="path2"></i>
                    </i>
                    خروجی فایل محصولات
                </a>
            </div>
        </div>

        <div class="separator my-5"></div>
        <div class="row mb-6">
            <div class="col-lg-9">
                <p>دریافت لینک دسترسی</p>
            </div>
            <div class="col-lg-3">
                <a class="btn btn-flex btn-sm fw-bold btn-primary"  target="_blank" href='{{$user->siteUrl."/wp-json/wc/v3/products?consumer_key=".$user->consumerKey."&consumer_secret=".$user->consumerSecret}}'>
                    <i class="ki-duotone ki-fasten fs-6 me-1">
                    <i class="path1"></i>
                    <i class="path2"></i>
                    </i>
                    لینک دسترسی به فروشگاه
                </a>
            </div>
        </div>

    </div>
  </div>
</x-main>
