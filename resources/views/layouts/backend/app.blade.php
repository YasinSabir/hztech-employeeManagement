<!DOCTYPE html>
<html>

@include('layouts.backend.head')

@yield('page-css')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    @include('layouts.backend.header')

    @include('layouts.backend.navbar')

    @yield('section')

    @include('layouts.backend.footer')

    @include('layouts.backend.additional-sidebar')

    @include('layouts.backend.script')
    <script> @if(Session::has('message')) var type = "{{ Session::get('alert-type','info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{Session::get('message')}}");
                break;
            case 'success':
                toastr.success("{{Session::get("message")}}");
                break;
            case 'warning':
                toastr.warning("{{Session::get('message')}}");
                break;
            case 'error':
                toastr.error("{{Session::get("message")}}");
                break;
        } @endif
    </script>
    @yield('page-script')

</div>
<!-- ./wrapper -->
</body>
</html>
