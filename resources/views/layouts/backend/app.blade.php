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

@yield('page-script')

</div>
<!-- ./wrapper -->
</body>
</html>
