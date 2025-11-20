<!DOCTYPE html>
<html>
    <head>
        @include('admin.layouts.head-print')
        @yield('after_head')
    </head>
    <body onload="window.print();">
            @yield('content')
        @yield('after_foot')
        </body>
</html>
