<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
    @yield('head_style')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('includes.header')
    @include('includes.main-sidebar')
    <div class="content-wrapper">
        @include('includes.error')
        @yield('content')
    </div>
    @include('includes.footer')
    @include('includes.setting_header')
    {{-- <div class="control-sidebar-bg"></div>--}}
</div>
@include('includes.script')

@yield('script_style')
</body>
</html>
