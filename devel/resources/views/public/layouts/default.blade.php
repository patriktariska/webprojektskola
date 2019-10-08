<!DOCTYPE html>
<html lang="en">
<head>
    @include('public.partials.head')
</head>
<body>
<div class="site-wrap">
    @include('public.partials.header')
    @yield('content')
    @include('public.partials.footer')
</div>
@include('public.partials.script')
</body>
</html>