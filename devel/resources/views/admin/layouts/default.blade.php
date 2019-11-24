<!DOCTYPE html>
<html>
<head>
    @include('admin.partials.head')
</head>
<style>
    td.details-control {
        background: url('https://raw.githubusercontent.com/DataTables/DataTables/1.10.7/examples/resources/details_open.png') no-repeat center center;
        cursor: pointer;
    }
    tr.shown td.details-control {
        background: url('https://raw.githubusercontent.com/DataTables/DataTables/1.10.7/examples/resources/details_close.png') no-repeat center center;
    }
    .zoom:hover {
        transform: scale(1.5);
    }
</style>
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