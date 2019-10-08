<!DOCTYPE html>
<html>
<head>
    @include('admin.partials.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        @include('admin.partials.header')
        @include('admin.partials.navbar')
    </header>
    @include('admin.partials.sidebar')
    <div class="content-wrapper">
        @yield('content')
    </div>
    @include('admin.partials.footer')
</div>
@include('admin.partials.script')
</body>
</html>