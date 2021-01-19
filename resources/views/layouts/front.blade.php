<!doctype html>
<html lang="en">
<head>
    @include('front.components.head')
</head>
    <body>
        @include('front.components.navbar')
        @yield('content')
        @include('front.components.footer')
    </body>
</html>
