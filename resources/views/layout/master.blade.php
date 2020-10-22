<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Kiểm kê - @yield('title')</title>
    @section('map')
        @show
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}"/>
    <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer
    ></script>
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        defer
    ></script>
    <script src="{{asset('assets/js/charts-lines.js')}}" defer></script>
    <script src="{{asset('assets/js/charts-pie.js')}}" defer></script>
</head>
<body>
<div
    class="flex h-screen bg-gray-50 "
    :class="{ 'overflow-hidden': isSideMenuOpen }"
>
    @section('sidebar')

    @show
    <div class="flex flex-col flex-1 w-full">
        @section('content')

        @show
{{--        @include('sidebar.footer')--}}
    </div>
</div>


</body>
</html>
