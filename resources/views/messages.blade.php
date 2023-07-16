<x-main title="پیام ها" icon="/assets/media/icons/messages.png">
  <ul class="nav nav-tabs nav-pills  border-0 mb-5 fs-6">
    <li class="nav-item">
      <a class="nav-link btn btn-sm btn-active-primary active" data-bs-toggle="tab" href="#all_messages">همه</a>
    </li>
    <li class="nav-item">
      <a class="nav-link btn btn-sm btn-active-primary" data-bs-toggle="tab" href="#unseen_messages">خوانده نشده</a>
    </li>
    <li class="nav-item">
      <a class="nav-link btn btn-sm btn-active-primary" data-bs-toggle="tab" href="#seen_messages">خوانده شده</a>
    </li>
  </ul>

  <div class="tab-content" id="messages_content">
    <div class="tab-pane fade show active" id="all_messages" role="tabpanel"></div>
    <div class="tab-pane fade" id="seen_messages" role="tabpanel"></div>
    <div class="tab-pane fade" id="unseen_messages" role="tabpanel"></div>
  </div>
  @section('js')
  <script>
    Messages();
  </script>
  @endsection
</x-main>