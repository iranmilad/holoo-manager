<x-main title="گزارش گیری اشکالات" icon="./assets/media/icons/findoption.png">
  <!-- START:CARD -->
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">سرویس ابری</h3>
      </div>
    </div>
    <div class="card-body border-top p-9">
      <div class="d-flex flex-column justify-content-center container-fluid">
        <!-- START:ITEM -->
        <div class="row my-3">
          <div class="col-10">
          <span> دریافت کالا ها از کلاد</span>
          </div>
            @if ($cloud_product_count['count']>0)
            <div class="col-2">
                <i class="ki-duotone ki-check-circle fs-1 text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="  {{ $cloud_product_count['count'] }} محصول با موفقیت دریافت شدند">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @else
            <div class="col-2">
                <i class="ki-duotone ki-cross-circle fs-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title=" هیچ محصولی برای کاربر یافت نشد یا دسترسی به کلاد دچار اختلال است خطای بازگشتی دارای کد {{ $cloud_product_count['response'] }} است">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @endif
        </div>
        <!-- END:ITEM -->
        <!-- START:ITEM -->
        <div class="row my-3">
          <div class="col-10">
          <span> دریافت گروه بندی از کلاد</span>
          </div>
            @if ($cloud_category_count['count']>0)
            <div class="col-2">
                <i class="ki-duotone ki-check-circle fs-1 text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="  {{ $cloud_category_count['count'] }} گروه بندی با موفقیت دریافت شدند">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @else
            <div class="col-2">
                <i class="ki-duotone ki-cross-circle fs-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title=" هیچ دسته بندی برای کاربر یافت نشد یا دسترسی به کلاد دچار اختلال است خطای بازگشتی دارای کد {{ $cloud_category_count['response'] }} است">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @endif
        </div>
        <!-- END:ITEM -->
        <!-- START:ITEM -->
        <div class="row my-3">
          <div class="col-10">
            <span>اعتبار لایسنس افزونه</span>
          </div>
          @if ($user->active==true)
          <div class="col-2">
            <i class="ki-duotone ki-check-circle fs-1 text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="لایسنس معتبر و فعال است">
              <span class="path1"></span>
              <span class="path2"></span>
            </i>
          </div>
          @else
            <div class="col-2">
                <i class="ki-duotone ki-cross-circle fs-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="لایسنس غیرفعال یا منقضی شده است جهت تمدید یا فعال سازی با شرکت تماس بگیرید">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
          @endif
        </div>
        <!-- END:ITEM -->
        <!-- START:ITEM -->
        <div class="row my-3">
          <div class="col-10">
            <span>سرفصل حساب فاکتور</span>
          </div>
          @if ($cloud_account_count['count']>0)
          <div class="col-2">
            <i class="ki-duotone ki-check-circle fs-1 text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $cloud_account_count['count'] }} سرفصل حساب در کلاد یافت شد">
              <span class="path1"></span>
              <span class="path2"></span>
            </i>
          </div>
          @else
          <div class="col-2">
            <i class="ki-duotone ki-cross-circle fs-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="هیچ سرفصل حساب برای فاکتور در کلاد یافت نشد حداقل یک حساب به طور مثال بانک یا نقدی تعریف کنید">
              <span class="path1"></span>
              <span class="path2"></span>
            </i>
          </div>
          @endif
        </div>
        <!-- END:ITEM -->
        <!-- START:ITEM -->
        <div class="row my-3">
          <div class="col-10">
            <span>سرفصل حساب مشتری</span>
          </div>
          @if ($cloud_customer_count['count']>0)
          <div class="col-2">
            <i class="ki-duotone ki-check-circle fs-1 text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $cloud_customer_count['count'] }} سرفصل مشتری با موفقیت دریافت شدند">
              <span class="path1"></span>
              <span class="path2"></span>
            </i>
          </div>
          @else
          <div class="col-2">
                <i class="ki-duotone ki-cross-circle fs-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title=" هیچ سرفصل حساب برای کاربر یافت نشد یا دسترسی به کلاد دچار اختلال است خطای بازگشتی دارای کد {{ $cloud_customer_count['response'] }} است">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
          @endif
        </div>
        <!-- END:ITEM -->
      </div>
    </div>
  </div>
  <!-- END:CARD -->
  <!-- START:CARD -->
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">گزارش فروشگاه کاربر</h3>
      </div>
    </div>
    <div class="card-body border-top p-9">
      <div class="d-flex flex-column justify-content-center container-fluid">

        <!-- START:ITEM -->
        <div class="row my-3">
          <div class="col-10">
            <span>دریافت کانفیگ از کاربر</span>
          </div>
            @if ($user->config!=null and $user->consumerKey!=null)
            <div class="col-2">
                <i class="ki-duotone ki-check-circle fs-1 text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="کانفیگ و اطلاعات ووکامرس کاربر با موفقیت دریافت شده است">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @else
            <div class="col-2">
                <i class="ki-duotone ki-cross-circle fs-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="کانفیگ یا اطلاعات ووکامرس دریافت نشده است احتمالا دیتای کاربر به سرور نمیرسد از شرکت هاست خود بخواهید دسترسی هاست شما را روی پورت 443 باز نماید">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @endif
        </div>
        <!-- END:ITEM -->


        <!-- START:ITEM -->
        <div class="row my-3">
          <div class="col-10">
            <span>دسترسی به گروه بندی کاربر</span>
          </div>
          @if ($wc_category)
          <div class="col-2">
            <i class="ki-duotone ki-check-circle fs-1 text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="گروه بندی با موفقیت دریافت شد">
              <span class="path1"></span>
              <span class="path2"></span>
            </i>
          </div>
          @else
          <div class="col-2">
            <i class="ki-duotone ki-cross-circle fs-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="هیچ گروه بندی برای کاربر یافت نشد یا دسترسی به ووکامرس از بیرون دچار مشکل است">
              <span class="path1"></span>
              <span class="path2"></span>
            </i>
          </div>
          @endif

        </div>
        <!-- END:ITEM -->
        <!-- START:ITEM -->
        <div class="row my-3">
          <div class="col-10">
            <span>دریافت کالاهای فروشگاه کاربر</span>
          </div>
            @if ($wc_products)
            <div class="col-2">
                <i class="ki-duotone ki-check-circle fs-1 text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="محصولات با موفقیت دریافت می شوند">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @else
            <div class="col-2">
                <i class="ki-duotone ki-cross-circle fs-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="هیچ محصولی برای کاربر یافت نشد یا دسترسی به ووکامرس از بیرون دچار مشکل است">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @endif
        </div>
        <!-- END:ITEM -->

        <!-- START:ITEM -->
        <div class="row my-3">
          <div class="col-10">
            <span>دسترسی به ووکامرس فروشگاه کاربر</span>
          </div>
            @if ($wc_response==200)
            <div class="col-2">
                <i class="ki-duotone ki-check-circle fs-1 text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="فروشگاه کاربر با کد 200 در دسترس است">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @else
            <div class="col-2">
                <i class="ki-duotone ki-cross-circle fs-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="ووکامرس کاربر از بیرون در دسترسی نیست کد عدم دسترسی به شماره {{ $wc_response }}  دریافت شده است با شرکت هاست یا ادمین سایت تماس گرفته و برای رفع مشکل اقدام فرمایید">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @endif
        </div>
        <!-- END:ITEM -->

        <!-- START:ITEM -->
        <div class="row my-3">
          <div class="col-10">
            <span>سرعت دریافت کالاها از ووکامرس</span>
          </div>
            @if ($wc_time< 20 )
            <div class="col-2">
                <i class="ki-duotone ki-check-circle fs-1 text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="سرعت پاسخ دهی هاست شما مطلوب است">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @else
            <div class="col-2">
                <i class="ki-duotone ki-cross-circle fs-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="سرعت پاسخ دهی سرویس کند و در محدوده {{ $wc_time }} ثانیه است در صورتی که از هاست اشتراکی استفاده میکنید منابع هاستینگ خود را بهبود دهید یا از سرویس پشتیبانی برای هاست خود استفاده کنید">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @endif
        </div>
        <!-- END:ITEM -->

        <!-- START:ITEM -->
        <div class="row my-3">
          <div class="col-10">
            <span>ماژول به روزرسانی قیمت</span>
          </div>
            @if ($user->config->update_product_price==1 )
            <div class="col-2">
                <i class="ki-duotone ki-check-circle fs-1 text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="به روزرسانی قیمت فعال است">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @else
            <div class="col-2">
                <i class="ki-duotone ki-cross-circle fs-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="به روزرسانی قیمت خاموش است">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @endif
        </div>
        <!-- END:ITEM -->

        <!-- START:ITEM -->
        <div class="row my-3">
          <div class="col-10">
            <span>ماژول به روزرسانی موجودی</span>
          </div>
            @if ($user->config->update_product_stock==true )
            <div class="col-2">
                <i class="ki-duotone ki-check-circle fs-1 text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="به روزرسانی موجودی فعال است">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @else
            <div class="col-2">
                <i class="ki-duotone ki-cross-circle fs-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="به روزرسانی موجودی خاموش است">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @endif
        </div>
        <!-- END:ITEM -->

        <!-- START:ITEM -->
        <div class="row my-3">
          <div class="col-10">
            <span>ماژول ثبت فاکتور یا پیش فاکتور</span>
          </div>
            @if ($user->config->save_sale_invoice!=0 or $user->config->save_pre_sale_invoice!=0)
            <div class="col-2">
                <i class="ki-duotone ki-check-circle fs-1 text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="ماژول ثبت فاکتور یا پیش فاکتور فعال است">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @else
            <div class="col-2">
                <i class="ki-duotone ki-cross-circle fs-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="هر دو سیستم ثبت فاکتور و پیش فاکتور خاموش هستند">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @endif
        </div>
        <!-- END:ITEM -->

        <!-- START:ITEM -->
        <div class="row my-3">
          <div class="col-10">
            <span>آدرس سایت</span>
          </div>
            @if ($validDomain )
            <div class="col-2">
                <i class="ki-duotone ki-check-circle fs-1 text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="دامین مورد نظر معتبر است">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @else
            <div class="col-2">
                <i class="ki-duotone ki-cross-circle fs-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="دامین مورد نظر نامعتبر است یا شامل https بوده و دسترسی ووکامرس بر روی ان ادرس فعال باشد سرویس تنها قادر است روی ادرس های رمزنگاری شده سرویس دهی انجام دهد">
                <span class="path1"></span>
                <span class="path2"></span>
                </i>
            </div>
            @endif
        </div>
        <!-- END:ITEM -->

      </div>
    </div>
  </div>
  <!-- END:CARD -->
</x-main>
