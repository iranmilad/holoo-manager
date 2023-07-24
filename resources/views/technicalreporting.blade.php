<x-main title="گزارش تبادل داده" icon="./assets/media/icons/warning-sign.png">
  @section('css')
  <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
  @endsection
  <!-- START:CARD -->
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">گزارش وب هوک</h3>
      </div>
    </div>
    <div class="card-body border-top p-9">
      <div class="d-flex flex-column justify-content-center container-fluid">
        <!-- START:TABLE -->
        <table id="technicalreporting_table_1" class="table table-striped table-row-bordered gy-5 gs-7">
          <thead>
            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                <th class="p-0 pb-3 min-w-100px text-start">زمان</th>
                <th class="p-0 pb-3 min-w-175px text-start">کد کالا</th>

                <th class="p-0 pb-3 min-w-100px text-start">نوع</th>
                <th class="p-0 pb-3 min-w-100px text-start">عملیات</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($webhooks as $webhook)
                <tr>
                <td class="text-start" style="direction: ltr;">{{ $webhook->created_at }}</td>
                <td class="text-start">{{ Str::limit($webhook->content["MsgValue"], 100) ?? null }}</td>
                <td class="text-start">{{ $webhook->content['Table'] }}</td>
                <td class="text-start"><a href="/technicalreporting/sendWebhook/{{ $webhook->id }}">ارسال مجدد</a></td>
                </tr>
            @endforeach
          </tbody>
        </table>
        <!-- END:TABLE -->
      </div>
    </div>
  </div>
  <!-- END:CARD -->

  <!-- START:CARD -->
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">گزارش فاکتور</h3>
      </div>
    </div>
    <div class="card-body">
      <div class="d-flex flex-column justify-content-center container-fluid">
        <!-- START:TABLE -->
        <table id="technicalreporting_table_2" class="table table-striped table-row-bordered gy-5 gs-7">
          <thead>
            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
              <th class="p-0 pb-3 min-w-100px text-start">زمان</th>
              <th class="p-0 pb-3 min-w-175px text-start">شماره فاکتور</th>
              <th class="p-0 pb-3 min-w-100px text-start">نوع</th>
              <th class="p-0 pb-3 min-w-100px text-start">وضعیت</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($invoices as $invoice)
            <tr>
              <td class="text-start" style="direction: ltr;">{{ $invoice->updated_at }}</td>
              <td class="text-start">{{ $invoice->invoiceId }}</td>
              <td class="text-start">{{ $invoice->invoiceStatus=='pending' ? 'پیش فاکتور' : 'فاکتور'}}</td>
              <td class="text-start">
              <i class="ki-duotone ki-{{ ($invoice->status == 'ثبت سفارش فروش انجام شد') ?  'check' : 'cross' }}-circle fs-1 {{ ($invoice->status == 'ثبت سفارش فروش انجام شد') ?  'text-success' : 'text-danger'  }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $invoice->status }}">
                  <span class="path1"></span>
                  <span class="path2"></span>
                </i>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!-- END:TABLE -->
      </div>
    </div>
  </div>
  <!-- END:CARD -->

  <!-- START:CARD -->
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">گزارش بروزرسانی </h3>
        <h5 class="m-0">(ویژه سرویس اختصاصی)</h5>

      </div>
    </div>
    <div class="card-body">
      <div class="d-flex flex-column justify-content-center container-fluid">
        <!-- START:TABLE -->
        <table id="technicalreporting_table_3" class="table table-striped table-row-bordered gy-5 gs-7">
          <thead>

            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
              <th class="p-0 pb-3 min-w-auto text-start">تاریخ شروع</th>
              <th class="p-0 pb-3 min-w-auto text-start">تاریخ پایان</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($requests as $request)
            <tr>
              <td class="text-start"  style="direction: ltr;">{{ $request->request_time }}</td>
              <td class="text-start"  style="direction: ltr;">{{ $request->request_finish }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!-- END:TABLE -->
      </div>
    </div>
  </div>
  <!-- END:CARD -->

  <!-- START:CARD -->
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">گزارش پردازش </h3>
        <h5 class="m-0">(ویژه سرویس اختصاصی) </h5>

      </div>
    </div>
    <div class="card-body">
      <div class="d-flex flex-column justify-content-center container-fluid">
        <!-- START:TABLE -->
        <table id="technicalreporting_table_3" class="table table-striped table-row-bordered gy-5 gs-7">
          <thead>

            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
              <th class="p-0 pb-3 min-w-100px text-start">سرویس</th>
              <th class="p-0 pb-3 min-w-100px text-start">ظرفیت در انتظار</th>
              <th class="p-0 pb-3 min-w-100px text-start">عملیات</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($queues as $queue)
              @php
                $reset=false;
                $myString="user_server_23";
                if ( strstr( $queue->name, 'user' ) or $user->id==1 ) {
                    $reset=true;
                }
              @endphp
            <tr>
              <td class="text-start"  style="direction: ltr;">{{ $queue->name }}</td>
              <td class="text-start"  style="direction: ltr;">{{ $queue->count }}</td>
              @if ($reset)
              <td class="text-start"><a href="/technicalreporting/queueFlush">ریست</a></td>
              @else
              <td class="text-start"></td>
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>
        <!-- END:TABLE -->
      </div>
    </div>
  </div>
  <!-- END:CARD -->

  @section('js')
  <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
  <script>
    $("#technicalreporting_table_1").DataTable({
      language: {
        emptyTable: 'داده ای وجود ندارد'
      },
      info: false
    });
    $("#technicalreporting_table_2").DataTable({
      language: {
        emptyTable: 'داده ای وجود ندارد'
      },
      info: false
    });
    $("#technicalreporting_table_3").DataTable({
      language: {
        emptyTable: 'داده ای وجود ندارد'
      },
      info: false
    });
  </script>
  @endsection
</x-main>
