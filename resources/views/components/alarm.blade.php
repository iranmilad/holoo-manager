<div>
    @section("js")
    <script>
        Alarm({
            msg: "{{$msg}}",
            title: "{{$title}}",
            type: "{{$type}}",
            closeButton: "{{$closeButton}}",
            debug: "{{$debug}}",
            newestOnTop: "{{$newestOnTop}}",
            progressBar: "{{$progressBar}}",
            positionClass: "{{$positionClass}}",
            preventDuplicates: "{{$preventDuplicates}}",
            onclick: "{{$onclick}}",
            showDuration: "{{$showDuration}}",
            hideDuration: "{{$hideDuration}}",
            timeOut: "{{$timeOut}}",
            extendedTimeOut: "{{$extendedTimeOut}}",
            showEasing: "{{$showEasing}}",
            hideEasing: "{{$hideEasing}}",
            showMethod: "{{$showMethod}}",
            hideMethod: "{{$hideMethod}}"
        })
    </script>
    @endsection
</div>