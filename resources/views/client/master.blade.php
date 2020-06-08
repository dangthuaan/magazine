<!DOCTYPE html>
<html lang="en">

@include('client.includes.head')

<body>
    @include('client.includes.header.master')

    @yield('content')

    @include('client.includes.footer')
</body>

@include('client.includes.script')

@yield('js')

</html>
